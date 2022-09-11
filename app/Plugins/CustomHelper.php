<?php

namespace App\Plugins;

use Illuminate\Support\Facades\Schema;
use Intervention\Image\Facades\Image;

trait CustomHelper
{

    /**
     * Save Image
     *
     * @param $imageFile
     * @param $desPath
     * @return bool
     */
    protected function saveImage($imageFile, $desPath, $fileName, $file_path = null)
    {
        $storagePath =  storage_path('app/public/uploads/' . $desPath);
        if ($imageFile != null) {
            // 元画像を保存する
            $imageFile->move($storagePath, $fileName);
        } else if ($file_path != null) {
            // 元画像を複製する
            copy($file_path, $storagePath . '/' . $fileName);
        } else {
            return false;
        }

        // 350px幅サムネイル画像を保存する
        $imageThumb = Image::make($storagePath . '/' . $fileName);
        $imageThumb->resize(350, null, function ($constraint) {
            $constraint->aspectRatio();
        });

        $imageThumb->save($storagePath . '/' . '350xh-' . $fileName, 80);
        return true;
    }

    /**
     * 画像を削除
     */
    protected function removeImage($desPath, $fileName)
    {
        $storagePath =  storage_path('app/public/uploads/' . $desPath);
        $pathOld = $storagePath . '/' . $fileName;
        if (file_exists($pathOld)) {
            unlink($pathOld);
        }
        $pathOld =  $storagePath . '/' . '350xh-' . $fileName;
        if (file_exists($pathOld)) {
            unlink($pathOld);
        }
        return true;
    }

    /**
     * パラメータで一覧取得
     *
     * @param $query
     * @param $input
     * @return
     */
    protected function getListWithPraram($query, $input)
    {
        if (!empty($input['limit'])) {
            $query = $query->limit($input['limit']);
        }

        if (!empty($input['sort'])) {
            $sort = explode(":", $input['sort']);
            $direction = (isset($sort[1]) && $sort[1] == 'desc') ? 'desc' : 'asc';
            if (Schema::hasColumn($query->getModel()->getTable(), $sort[0])) {
                $query->orderBy($sort[0], $direction);
            }
        }

        if (!empty($input['paginate'])) {
            return $query->paginate($input['paginate']);
        } else {
            return $query->get();
        }
    }
}
