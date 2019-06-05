<?php

namespace App\Http\Controllers\Admin;

use App\Models\Image;
use App\Models\News;
use App\Services\ImageUploader;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\View\View;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index(): View
    {
        $news = News::latest()->paginate(10);

        return \view('admin.news.index', compact('news'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create(): View
    {
        return \view('admin.news.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param ImageUploader $imageUploader
     * @return RedirectResponse
     */
    public function store(Request $request, ImageUploader $imageUploader): RedirectResponse
    {
        $news = News::create($request->all());

        if ($request->hasFile('photo')) {
            $imageUploader->upload($news, [$request->file('photo')]);
        }

        return redirect()->route('admin.news.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param News $news
     * @return View
     */
    public function edit(News $news): View
    {
        $news->load('photos');

        return \view('admin.news.edit', compact('news'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param News $news
     * @param ImageUploader $imageUploader
     * @return RedirectResponse
     */
    public function update(Request $request, News $news, ImageUploader $imageUploader): RedirectResponse
    {
        $news->update($request->all());

        if ($request->hasFile('photo')) {
            $imageUploader->upload($news, [$request->file('photo')]);
        }

        return redirect()->route('admin.news.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param News $news
     * @return RedirectResponse
     */
    public function destroy(News $news): RedirectResponse
    {
        try {
            $news->delete();
        } catch (\Exception $e) {
            return redirect()->back();
        }

        return redirect()->back();
    }

    /**
     * @param News $news
     * @param Image $image
     * @param ImageUploader $imageUploader
     * @return RedirectResponse
     */
    public function deleteImage(News $news, Image $image, ImageUploader $imageUploader): RedirectResponse
    {
        try {
            $imageUploader->delete($news, $image);
        } catch (\Exception $e) {
            return redirect()->back();
        }

        return redirect()->back();
    }
}
