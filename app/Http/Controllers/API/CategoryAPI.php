<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\API\ApiController as Controller;
use App\Http\Resources\CategoryResource;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryAPI extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $input = request()->all();
        try {
            $query = Category::query();

            $response = $this->getListWithParams($query, $input);

            return CategoryResource::collection($response);
        } catch (\Exception $e) {
            return $this->response->data($e)->rollback();
        }
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
            'category_name' => 'required|max:30',
            'category_slug' => 'required|regex:/^[a-zA-Z0-9\-]+$/',
            'image' => 'required'
        ];

        // check input
        $validator = Validator::make($input, $validatorInput);
        if ($validator->fails()) {
            return $this->sendError($validator->errors(), 'check input error', 403);
        }
        DB::beginTransaction();
        $uploadedImg = [];
        try {
            // カテゴリー登録
            $newOrder = Category::max('sort_no') + 1;
            $registerInput = [
                'category_name' => $input['category_name'],
                'category_slug' => $input['category_slug'],
                'title' => $input['title'],
                'description' => $input['description'],
                'sort_no' =>  $newOrder
            ];

            // 説明の画像
            if ($request->hasFile('image')) {
                $uploadDir = Category::getImgFullPath();
                $image = $request->file('image');
                $fileName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
                $image->move($uploadDir, $fileName);
                $registerInput['image'] = $fileName;
                array_push($uploadedImg, $fileName);
            }

            $category = Category::create($registerInput);

            $data = $category->fresh();
            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            if(isset($uploadedImg)){
                Category::removeFileUploaded($uploadedImg);
            }
            return $this->sendError($e);
        }

        return $this->registered($data);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $category = Category::find($id);

        // check exist
        if ($category === null) {
            return $this->response->error('category is not exist');
        }

        return new CategoryResource($category);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // check exist
        $category = Category::where('id', '=', $id)->first();
        if ($category === null) {
            return $this->response->error('category is not exist');
        }

        $input = $request->all();

        $validatorInput = [
            'category_name' => 'sometimes|required|max:30',
            'category_slug' => 'sometimes|required|regex:/^[a-zA-Z0-9\-]+$/',
            'image' => 'required'
        ];
        // check input
        $validator = Validator::make($input, $validatorInput);
        if ($validator->fails()) {
            return $this->response->valiError($validator->errors());
        }

        $uploadedImg = [];
        DB::beginTransaction();
        try {
            // image
            if ($request->hasFile('image')) {
                $uploadDir = Category::getImgFullPath();
                $image = $request->file('image');
                $fileName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
                $image->move($uploadDir, $fileName);
                $category->image = $fileName;
                array_push($uploadedImg, $fileName);
            }

            // update category information
            if (isset($input['category_name'])) $category->category_name = $input['category_name'];
            if (isset($input['category_slug'])) $category->category_slug = $input['category_slug'];
            if (isset($input['title'])) $category->category_name = $input['title'];
            if (isset($input['description'])) $category->category_slug = $input['description'];
            if (isset($input['sort_no'])) $category->category_slug = $input['sort_no'];
            $category->updated_at = date('Y-m-d H:i:s');

            $category->update();

            $data = $category->fresh();
            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            if(isset($uploadedImg)){
                Category::removeFileUploaded($uploadedImg);
            }
            return $this->sendError($e);
        }

        return $this->registered($data);
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
        $category = Category::find($id);
        if ($category === null) {
            return $this->response->error('category is not exist');
        }

        //update DB
        $category->delete();

        return $this->response->success();
    }
}
