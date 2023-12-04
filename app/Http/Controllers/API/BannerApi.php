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
        return $this->successResponse($results, 'success');
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
            return $this->validateError($validator->errors());
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
                        copy($copyImagePath, $uploadDir . $fileName);
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

            return $this->errorResponse($e);
        }

        return $this->registeredResponse($data);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function multiUpload(Request $request)
    {
        $input = $request->all();

        $validatorInput = [
            'upload' => 'required|array',
            'upload.*.image' => 'required'
        ];

        // check input
        $validator = Validator::make($input, $validatorInput);
        if ($validator->fails()) {
            return $this->validateError($validator->errors());
        }

        $rollbackImage = [];
        DB::beginTransaction();
        try {
            $bannerUpload = [];

            // upload image
            try {
                $banners = $input['upload'];
                $uploadDir = Banner::getImgFullPath();
                $newOrder = Banner::max('sort_no') + 1;
                foreach ($banners as $banner) {
                    $image = $banner['image'];
                    if (is_uploaded_file($image)) {
                        $fileName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
                        $image->move($uploadDir, $fileName);
                        $bannerUpload[] = [
                            'image' => $fileName,
                            'sort_no' =>  $newOrder
                        ];
                        $rollbackImage[] = $uploadDir . $fileName;
                    } else {
                        $copyImagePath =  $uploadDir . $image;
                        if (file_exists($copyImagePath)) {
                            $fileName = time() . '_' . uniqid() . '.' . pathinfo($copyImagePath, PATHINFO_EXTENSION);
                            copy($copyImagePath,  $uploadDir.$fileName);
                            $bannerUpload[] = [
                                'image' => $fileName,
                                'sort_no' =>  $newOrder
                            ];
                            $rollbackImage[] = $uploadDir . $fileName;
                        }
                    }
                    $newOrder++;
                }
            } catch (\Exception $e) {
                throw new \Exception('upload image fail, please reupload.', 3000);
            }

            foreach($bannerUpload as $uploadData){
                Banner::create($uploadData);
            }

            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();

            foreach ($rollbackImage as $imagePath) {
                if (empty($imagePath)) continue;
                if (file_exists($imagePath) && is_file($imagePath)) {
                    unlink($imagePath);
                }
            }

            return $this->errorResponse($e);
        }

        return $this->registeredResponse();
    }

    /**
     * order update
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function updateBannerIndex(Request $request)
    {
        // check input
        $input = $request->all();

        $validatorInput = [
            'ids' => 'required|array',
        ];

        // check input
        $validator = Validator::make($input, $validatorInput);
        if ($validator->fails()) {
            return $this->validateError($validator->errors());
        }

        DB::beginTransaction();
        try {
            $bannerIds = $input['ids'];
            foreach ($bannerIds as $idx => $id) {
                $banner = Banner::find($id);
                if ($banner === null) {
                    throw new \Exception('update fail', 3000);
                }

                if( $banner->sort_no != ($idx + 1)){
                    $banner->sort_no = $idx + 1;
                    $banner->update();
                }
            }
            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();

            return $this->errorResponse($e);
        }

        return $this->registeredResponse();
    }

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
            return $this->notExist();
        }

        //update DB
        $banner->delete();

        return $this->successResponse();
    }


    /**
     * order update
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function deleteBanners(Request $request)
    {
        // check input
        $input = $request->all();

        $validatorInput = [
            'ids' => 'required|array',
        ];

        // check input
        $validator = Validator::make($input, $validatorInput);
        if ($validator->fails()) {
            return $this->validateError($validator->errors());
        }

        DB::beginTransaction();
        try {
            $bannerIds = $input['ids'];
            Banner::whereIn('id', $bannerIds)->delete();
            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();

            return $this->errorResponse($e);
        }

        return $this->registeredResponse();
    }
}
