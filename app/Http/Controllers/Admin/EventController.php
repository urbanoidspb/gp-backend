<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\EventRequest;
use App\Models\Event;
use App\Models\Image;
use App\Services\ImageUploader;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;
use Illuminate\View\View;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index(): View
    {
        $events = Event::latest()->paginate(10);

        return \view('admin.events.index', compact('events'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create(): View
    {
        return \view('admin.events.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param EventRequest $request
     * @param ImageUploader $imageUploader
     * @return RedirectResponse
     */
    public function store(EventRequest $request, ImageUploader $imageUploader): RedirectResponse
    {
        $eventRequest = $request->only(['title', 'description', 'time']);

        $eventRequest['is_relevant'] = false;
        if ($request->has('is_relevant')) {
            $eventRequest['is_relevant'] = true;
        }

        $event = Event::create($eventRequest);

        if ($request->hasFile('photos')) {
            $imageUploader->upload($event, $request->file('photos'));
        }

        return redirect()->route('admin.events.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Event $event
     * @return View
     */
    public function edit(Event $event): View
    {
        $event->load('photos');

        return \view('admin.events.edit', compact('event'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param EventRequest $request
     * @param Event $event
     * @param ImageUploader $imageUploader
     * @return RedirectResponse
     */
    public function update(EventRequest $request, Event $event, ImageUploader $imageUploader): RedirectResponse
    {
        $eventRequest = $request->only(['title', 'description', 'time']);

        $eventRequest['is_relevant'] = false;
        if ($request->has('is_relevant')) {
            $eventRequest['is_relevant'] = true;
        }

        $event->update($eventRequest);

        if ($request->hasFile('photos')) {
            $imageUploader->upload($event, $request->file('photos'));
        }

        return redirect()->route('admin.events.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Event $event
     * @return RedirectResponse
     */
    public function destroy(Event $event): RedirectResponse
    {
        try {
            $event->delete();
        } catch (\Exception $e) {
            return redirect()->back();
        }

        return redirect()->back();
    }

    /**
     * @param Event $event
     * @return View
     */
    public  function participants(Event $event): View
    {
        $participants = $event->participants()->latest()->paginate(15);

        return \view('admin.events.participants', compact('participants'));
    }

    /**
     * @param Event $event
     * @param Image $image
     * @param ImageUploader $imageUploader
     * @return RedirectResponse
     */
    public function deleteImage(Event $event, Image $image, ImageUploader $imageUploader): RedirectResponse
    {
        try {
            $imageUploader->delete($event, $image);
        } catch (\Exception $e) {
            return redirect()->back();
        }

        return redirect()->back();
    }
}
