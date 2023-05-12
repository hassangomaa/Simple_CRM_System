<?php

namespace App;

use Illuminate\Http\UploadedFile;

class Helper
{

    public static function uploadImage($request, $fieldName, $path = 'public/images')
    {
        if ($request->hasFile($fieldName)) {
            $file = $request->file($fieldName);
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->storeAs($path, $filename);
            return $filename;
        }
        return null;
    }


}
