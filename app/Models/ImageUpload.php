<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;
use File;
use Image;
use Str;
class ImageUpload extends Model
{
    /**
     * Apply the scope to a given Eloquent query builder.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $builder
     * @param  \Illuminate\Database\Eloquent\Model  $model
     * @return void
     */
    public static function removeFile($path)
    {
        // remove file
        if(File::exists(public_path($path))){
            File::delete(public_path($path));
        }
    }

    /**
     * Apply the scope to a given Eloquent query builder.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $builder
     * @param  \Illuminate\Database\Eloquent\Model  $model
     * @return void
     */
    public static function removeDir($path)
    {
        // remove file directory
        if(File::isDirectory(public_path($path))){
            File::deleteDirectory(public_path($path));
        }
    }

    /**
     * Apply the scope to a given Eloquent query builder.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $builder
     * @param  \Illuminate\Database\Eloquent\Model  $model
     * @return void
     */
    public static function upload($path, $image ,$name)
    {
        // upload image

        $file = $image->getClientOriginalName();
        $filename = pathinfo($file, PATHINFO_FILENAME);
        $filename = str_replace(' ', '-', $filename);
        // print_r($image);
        $extension = $image->extension();

        $imageName = $name.'_'.Str::random(3).'_'.time().'.'.$extension;

        $image->move(public_path($path),$imageName);

        return $imageName;
    }

    /**
     * Apply the scope to a given Eloquent query builder.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $builder
     * @param  \Illuminate\Database\Eloquent\Model  $model
     * @return void
     */
    public static function uploadInStorage($path, $image)
    {
        // upload image

        $file = $image->getClientOriginalName();
        $filename = pathinfo($file, PATHINFO_FILENAME);
        $filename = str_replace(' ', '-', $filename);
        $extension = $image->extension();
        $imageName = $filename.'_'.Str::random(3).time().'.'.$extension;

        $image->storeAs($path,$imageName);

        return $imageName;
    }

    /**
     * Apply the scope to a given Eloquent query builder.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $builder
     * @param  \Illuminate\Database\Eloquent\Model  $model
     * @return void
     */
    public static function uploadExcelInStorage($path, $image)
    {
        // upload Excel
        $file = $image->getClientOriginalName();
        $imageName = Str::random(3).time().'_'.$file;

        // $image->move(storage_path($path),$imageName);
        $image->storeAs($path, $imageName);
        return $imageName;
    }

    /**
     * Apply the scope to a given Eloquent query builder.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $builder
     * @param  \Illuminate\Database\Eloquent\Model  $model
     * @return void
     */
    public static function uploadExcel($path, $image)
    {
        // upload excel

        $file = $image->getClientOriginalName();

        $imageName = Str::random(3).time().'_'.$file;

        $image->move(public_path($path),$imageName);

        return $imageName;
    }

    /**
     * Apply the scope to a given Eloquent query builder.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $builder
     * @param  \Illuminate\Database\Eloquent\Model  $model
     * @return void
     */
    public static function uploadFont($path, $image)
    {
        // upload excel

        $file = $image->getClientOriginalName();

        $imageName = Str::random(3).time().'_'.$file;

        $image->move(public_path($path),$imageName);

        return $imageName;
    }
    /**
     * Apply the scope to a given Eloquent query builder.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $builder
     * @param  \Illuminate\Database\Eloquent\Model  $model
     * @return void
     */
    public static function uploadThumbnail($orgPath, $path, $image, $width, $height)
    {
        // upload thumbnail

        return Image::make(public_path($orgPath).$image)->resize($width, $height)->save(public_path($path).$image);
    }

    /**
     * Apply the scope to a given Eloquent query builder.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $builder
     * @param  \Illuminate\Database\Eloquent\Model  $model
     * @return void
     */
    public static function uploadReduce($path, $image)
    {
        // upload with minimum file size

        $imageName = time().'.'.$image->getClientOriginalExtension();
        $ext = $image->getClientOriginalExtension();

        if($ext == 'png'){
            $read_from_path = $image->getPathName();
            $save_to_path = public_path($path.'/'.$imageName);

            $compressed_png_content = ImageUpload::compress_png($read_from_path);
            file_put_contents($save_to_path, $compressed_png_content);

        }else{
            $image->move(public_path($path),$imageName);
        }

        Image::make(public_path($path).$imageName)->resize(700, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save();

        return $imageName;
    }
}
