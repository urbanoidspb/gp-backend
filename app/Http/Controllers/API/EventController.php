<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\ParticipantRequest;
use App\Models\Event;
use App\Models\Participant;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class EventController extends Controller
{
    /**
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        $events = Event::orderBy('is_relevant', 'desc')
            ->orderBy('time', 'desc')
            ->latest()
            ->with('photos')
            ->with('participants')
            ->get();

        return response()->json($events);
    }

    /**
     * @param ParticipantRequest $request
     * @param Event $event
     * @return JsonResponse
     */
    public function join(ParticipantRequest $request, Event $event): JsonResponse
    {
        $participant = new Participant($request->all());

        $event->participants()->save($participant);

        return response()->json($event, 201);
    }
}
