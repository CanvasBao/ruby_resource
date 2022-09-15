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
            // save the original image
            $imageFile->move($storagePath, $fileName);
        } else if ($file_path != null) {
            // copy the original image
            copy($file_path, $storagePath . '/' . $fileName);
        } else {
            return false;
        }

        // save image with size 350xh
        $imageThumb = Image::make($storagePath . '/' . $fileName);
        $imageThumb->resize(350, null, function ($constraint) {
            $constraint->aspectRatio();
        });

        $imageThumb->save($storagePath . '/' . '350xh-' . $fileName, 80);
        return true;
    }

    /**
     * delete image in storage
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
     * get list within params
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
