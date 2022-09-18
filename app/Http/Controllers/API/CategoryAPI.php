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
        ];
        // 入力チェック
        $validator = Validator::make($input, $validatorInput);
        if ($validator->fails()) {
            return $this->response->valiError($validator->errors());
        }
        DB::beginTransaction();
        try {
            // カテゴリー登録
            $newOrder = Category::max('sort_no') + 1;
            $registerInput = [
                'category_name' => $input['category_name'],
                'category_slug' => $input['category_slug'],
                'sort_no' =>  $newOrder
            ];
            Category::create($registerInput);

            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            return $this->response->data($e)->error();
        }

        return $this->response->registed();
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
        ];
        // check input
        $validator = Validator::make($input, $validatorInput);
        if ($validator->fails()) {
            return $this->response->valiError($validator->errors());
        }
        DB::beginTransaction();
        try {
            // update category information
            if (isset($input['category_name'])) $category->category_name = $input['category_name'];
            if (isset($input['category_slug'])) $category->category_slug = $input['category_slug'];
            $category->updated_at = date('Y-m-d H:i:s');

            $category->update();

            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            return $this->response->data($e)->error();
        }
        return $this->response->registed();
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
