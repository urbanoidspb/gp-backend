<?php

namespace App\Http\Controllers\API;

use App\Models\Album;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AlbumController extends Controller
{
    /**
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        $albums = Album::latest()
            ->with('photos')
            ->get();

        return response()->json($albums);
    }
}
