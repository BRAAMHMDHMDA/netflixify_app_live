<?php

namespace App\Traits;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

trait HasImage
{

    //Begin::Image Actions
    public static function storeImage($data, $name_image_in_request='image', $name_image_in_DB='image_path')
    {
        $image = $data[$name_image_in_request];
        if ($image){
            $image_path = $image->store(static::$imageFolder, static::$imageDisk);
                $data[$name_image_in_DB] = $image_path;
        }
        return $data;
    }

    public static function updateImage($data, $oldImage, $name_image_in_request='image', $name_image_in_DB='image_path')
    {
        $result = static::storeImage($data, $name_image_in_request, $name_image_in_DB);
        static::deleteImage($oldImage);
        return $result;
    }

    public static function deleteImage($image_url)
    {
        // Extract the path from the URL
        $path = parse_url($image_url, PHP_URL_PATH);
        // Remove leading slashes
        $diskPath = ltrim($path, "/storage/".static::$imageDisk."/");
        // Delete the file if it exists
        if (Storage::disk(static::$imageDisk)->exists($diskPath)) {
            return Storage::disk(static::$imageDisk)->delete($diskPath);
        } else {
            return false;
        }
    }
    //End::Image Actions

    //Begin::GetImageUrl
    public function getImageUrlAttribute(): string
    {
        if (!$this->image_path){
            return asset('storage/media/no-image.jpg');
        }elseif (Str::startsWith($this->image_path, ['http://', 'https://'])) {
            return $this->image_path;
        }else {
            return asset('storage/media/' . $this -> image_path);
        }
    }
    // Define a method to return the append attributes defined in the trait
    public function getTraitAppends(): array
    {
        return ['image_url'];
    }
    public function getArrayableAppends(): array
    {
        // Get the trait's $appends array
        $traitAppends = $this->getTraitAppends();

        // Get the parent's $appends array
        $parentAppends = parent::getArrayableAppends();

        // Merge the trait's $appends array with the parent's $appends array
        return array_merge($traitAppends, $parentAppends);
    }
    //End::GetImageUrl

}
