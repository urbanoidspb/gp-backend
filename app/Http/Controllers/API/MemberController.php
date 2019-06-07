<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\MemberRequest;
use App\Models\Member;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MemberController extends Controller
{
    /**
     * @param MemberRequest $request
     * @return JsonResponse
     */
    public function store(MemberRequest $request): JsonResponse
    {
        Member::create($request->all());

        return response()->json(['status' => true], 201);
    }
}
