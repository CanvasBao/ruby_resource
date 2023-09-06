<?php

namespace App\Traits;

trait UploadPath
{
  public static function getUploadPath($path): string
  {
    $uploadPath = 'app/public/uploads';
    if (!str_starts_with($path, '/')) {
        $uploadPath .= '/';
    }

    return storage_path($uploadPath . $path);
  }


  public static function getImgFullPath($file_path = ''): string
  {
    $imgDir = (new self)->imgDir;

    $uploadPath = self::getUploadPath($imgDir);

    if (str_starts_with($file_path, '/') && str_ends_with($uploadPath, '/')) {
        return substr($uploadPath, 0, -1) . $file_path;
    }else if (!str_starts_with($file_path, '/') && !str_ends_with($uploadPath, '/')){
        return $uploadPath . '/' . $file_path;
    }else{
        return $uploadPath . $file_path;
    }
  }
}
