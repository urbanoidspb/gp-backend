<?php

namespace App\Http\Controllers\API;

use App\Models\News;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class NewsController extends Controller
{
    /**
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        $news = News::latest()
            ->with('photos')
            ->get();

        return response()->json($news);
    }
}
