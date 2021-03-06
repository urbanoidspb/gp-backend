<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\AlbumRequest;
use App\Models\Album;
use App\Models\Image;
use App\Services\ImageUploader;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\UploadedFile;
use Illuminate\View\View;

class AlbumController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index(): View
    {
        $albums = Album::latest()->paginate(10);

        return \view('admin.albums.index', compact('albums'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create(): View
    {
        return \view('admin.albums.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param AlbumRequest $request
     * @param ImageUploader $imageUploader
     * @return RedirectResponse
     */
    public function store(AlbumRequest $request, ImageUploader $imageUploader): RedirectResponse
    {
        $album = Album::create($request->all());

        if ($request->hasFile('photos')) {
           $imageUploader->upload($album, $request->file('photos'));
        }

        return redirect()->route('admin.albums.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Album $album
     * @return View
     */
    public function edit(Album $album): View
    {
        $album->load('photos');

        return \view('admin.albums.edit', compact('album'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param AlbumRequest $request
     * @param Album $album
     * @param ImageUploader $imageUploader
     * @return RedirectResponse
     */
    public function update(AlbumRequest $request, Album $album, ImageUploader $imageUploader): RedirectResponse
    {
        $album->update($request->all());

        if ($request->hasFile('photos')) {
            $imageUploader->upload($album, $request->file('photos'));
        }

        return redirect()->route('admin.albums.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Album $album
     * @return RedirectResponse
     */
    public function destroy(Album $album): RedirectResponse
    {
        try {
            $album->delete();
        } catch (\Exception $e) {
            return redirect()->back();
        }

        return redirect()->back();
    }

    /**
     * @param Image $image
     * @param Album $album
     * @param ImageUploader $imageUploader
     * @return RedirectResponse
     */
    public function deleteImage(Album $album, Image $image, ImageUploader $imageUploader): RedirectResponse
    {
        try {
            $imageUploader->delete($album, $image);
        } catch (\Exception $e) {
            return redirect()->back();
        }

        return redirect()->back();
    }
}
