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

  public static function getAssetPath(): string
  {
    $imgDir = (new self)->imgDir;


    $assetPath = 'storage/uploads';
    if (!str_starts_with($imgDir, '/')) {
        $assetPath .= '/';
    }

    $assetPath .=  $imgDir;

    if (!str_ends_with($assetPath, '/')){
        $assetPath .= '/';
    }

    return $assetPath;
  }

  public static function removeFileUploaded($files = []): bool
  {
    if (empty($files)){
      return true;
    }
    elseif (!is_array($files)){
      return false;
    }

    $dirPath = self::getImgFullPath();

    foreach($files as $file){
      try {
        $filePath = $dirPath . $file;
        if (file_exists($filePath) && is_file($filePath)) {
          unlink($filePath);
        }else{
          \Log::warning($filePath . ' is not file.');
        }
      } catch (\Exception $e) {
        \Log::warning($e->getMessage());
      }
    }

    return true;
  }
}
