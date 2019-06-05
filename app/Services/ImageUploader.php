<?php


namespace App\Services;


use App\Contracts\ImageRelationshipsContract;
use App\Models\Image;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class ImageUploader
{
    /**
     * @param ImageRelationshipsContract $model
     * @param UploadedFile[] $files
     * @return void
     */
    public function upload(ImageRelationshipsContract $model, array $files): void
    {
        $currentDirPath = $this->getCurrentDirPath();
        $imageList = [];

        /** @var UploadedFile $photo */
        foreach ($files as $photo) {
            $path = $photo->store('public/' . $currentDirPath);
            $path = str_replace('public/', '', $path);

            $image = Image::create([
                'path' => $path
            ]);
            $imageList[] = $image->id;
        }

        $model->photos()->attach($imageList);
    }

    /**
     * @param Image $image
     * @return void
     * @throws \Exception
     */
    public function delete(ImageRelationshipsContract $model, Image $image): void
    {
        Storage::delete('public/' . $image->realPath);
        $model->photos()->detach($image);
        $image->delete();
    }

    /**
     * @return string
     */
    public function getCurrentDirPath(): string
    {
        return 'photos/' . date('y') . '/' . date('m') . '/' . date('d');
    }
}