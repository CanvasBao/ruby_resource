<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\API\ApiController as Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use App\Models\Banner;

class BannerApi extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $results = Banner::orderBy('sort_no', 'ASC')->get();
        return $this->sendResponse($results, 'success');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();

        $validatorInput = [
            'title' => 'nullable|string|max:50',
            'sub_title' => 'nullable|string|max:100',
            'image' => 'required'
        ];

        // check input
        $validator = Validator::make($input, $validatorInput);
        if ($validator->fails()) {
            return $this->response->valiError($validator->errors());
        }

        DB::beginTransaction();
        try {
            $registerInput = [];

            // upload image
            try {
                $bannerImage = $request->image;
                $uploadDir = Banner::getImgFullPath();
                if (is_uploaded_file($bannerImage)) {
                    $fileName = time() . '_' . uniqid() . '.' . $bannerImage->getClientOriginalExtension();
                    $bannerImage->move($uploadDir, $fileName);
                    $registerInput['image'] = $fileName;
                    $rollbackImage[] = $uploadDir . $fileName;
                } else {
                    $copyImagePath =  $uploadDir . $bannerImage;
                    if (file_exists($copyImagePath)) {
                        $fileName = time() . '_' . uniqid() . '.' . pathinfo($copyImagePath, PATHINFO_EXTENSION);
                        // $this->saveImage(null, 'uploads/banner', $fileName, $copyImagePath);
                        copy($copyImagePath , $uploadDir . $fileName);
                        $registerInput['image'] = $fileName;
                        $rollbackImage[] =  $uploadDir . $fileName;
                    }
                }
            } catch (\Exception $e) {
                throw new \Exception('upload image fail, please reupload.', 3000);
            }

            // register
            $newOrder = Banner::max('sort_no') + 1;
            $registerInput = array_merge($registerInput, [
                'title' => !empty($input['title']) ? $input['title'] : '',
                'sub_title' => !empty($input['sub_title']) ? $input['sub_title'] : '',
                'sort_no' =>  $newOrder
            ]);
            $banner = Banner::create($registerInput);

            $data = $banner->fresh();
            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();

            foreach ($rollbackImage as $imagePath) {
                if (empty($imagePath)) continue;
                if (file_exists($imagePath) && is_file($imagePath)) {
                    unlink($imagePath);
                }
            }

            return $this->sendError($e);
        }

        return $this->registered($data);
    }

    // /**
    //  * Display the specified resource.
    //  *
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    // public function show($id)
    // {
    //     $category = Category::find($id);

    //     // check exist
    //     if ($category === null) {
    //         return $this->response->error('category is not exist');
    //     }

    //     return new CategoryResource($category);
    // }

    // /**
    //  * Update the specified resource in storage.
    //  *
    //  * @param  \Illuminate\Http\Request  $request
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    // public function update(Request $request, $id)
    // {
    //     // check exist
    //     $category = Category::where('id', '=', $id)->first();
    //     if ($category === null) {
    //         return $this->response->error('category is not exist');
    //     }

    //     $input = $request->all();

    //     $validatorInput = [
    //         'category_name' => 'sometimes|required|max:30',
    //         'category_slug' => 'sometimes|required|regex:/^[a-zA-Z0-9\-]+$/',
    //     ];
    //     // check input
    //     $validator = Validator::make($input, $validatorInput);
    //     if ($validator->fails()) {
    //         return $this->response->valiError($validator->errors());
    //     }
    //     DB::beginTransaction();
    //     try {
    //         // update category information
    //         if (isset($input['category_name'])) $category->category_name = $input['category_name'];
    //         if (isset($input['category_slug'])) $category->category_slug = $input['category_slug'];
    //         $category->updated_at = date('Y-m-d H:i:s');

    //         $category->update();

    //         DB::commit();
    //     } catch (\Exception $e) {
    //         DB::rollback();
    //         return $this->response->data($e)->error();
    //     }
    //     return $this->response->registed();
    // }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // check exist
        $banner = Banner::find($id);
        if ($banner === null) {
            return $this->response->error('record is not exist');
        }

        //update DB
        $banner->delete();

        return $this->sendResponse();
    }
}
