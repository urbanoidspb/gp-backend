<?php


namespace App\Services;


use App\Contracts\ImageRelationshipsContract;
use App\Models\Image;
use Illuminate\Http\UploadedFile;

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
     * @return string
     */
    public function getCurrentDirPath(): string
    {
        return 'photos/' . date('y') . '/' . date('m') . '/' . date('d');
    }
}