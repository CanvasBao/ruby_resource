<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\API\ApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use App\Http\Resources\ProductResource;
use App\Models\Product;
use App\Models\ProductImage;

class ProductApi extends ApiController
{
    /**
     *　商品IDをもとに商品情報取得
     *
     * @return \Illuminate\Http\Response
     */
    public function detail($id)
    {
        $product = Product::with('images')->find($id);
        //存在チェック
        if ($product === null) {
            return $this->response->error('商品が存在しません。');
        }

        return new ProductResource($product);
    }

    /**
     *　商品一覧取得
     *
     * @return \Illuminate\Http\Response
     */
    public function list(Request $request)
    {
        $input = $request->all();
        try {
            $query = Product::query();

            if (empty($input['sort'])) {
                $query->orderBy('sort_no');
            }

            $response = $this->getListWithPraram($query, $input);

            return ProductResource::collection($response);
        } catch (\Exception $e) {
            return $this->response->data($e)->rollback();
        }
    }

    /**
     * 商品登録
     *
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request)
    {
        $input = $request->all();

        $validatorInput = [
            'code' => 'required|code_ex|max:30',
            'name' => 'required|max:30',
            'price' => 'required|numeric',
            'image' => 'required|array',
            'image.*' => 'image'
        ];

        // 入力チェック
        $validator = Validator::make($input, $validatorInput)
            ->setAttributeNames(['name' => '商品名']);

        if ($validator->fails()) {
            return $this->response->valiError($validator->errors());
        }

        DB::beginTransaction();
        try {
            $newOrder = Product::max('sort_no') + 1;
            $registerInput = [
                'name' => $input['name'],
                'code' => $input['code'],
                'description' => !empty($input['description']) ? $input['description'] : '',
                'sort_no' => $newOrder,
                'price' => !empty($input['price']) ? $input['price'] : null
            ];

            // 商品登録
            $productInsert = Product::create($registerInput);

            // 商品画像登録
            $this->productImageRegist($productInsert, $request);

            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            return $this->response->data($e)->rollback();
        }
        return $this->response->registed();
    }

    /**
     * 商品画像登録
     */
    private function productImageRegist($product, Request $request)
    {
        try {
            // ファイルチェック
            $productImage = $request->file('image');
            if (!$productImage) {
                throw new \Exception();
            }

            // メイン画像
            foreach ($productImage as $file) {
                $fileName = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
                $this->saveImage($file, 'product/', $fileName);

                ProductImage::create([
                    'product_id' =>  $product->id,
                    'image' =>  $fileName,
                ]);
            }
        } catch (\Exception $e) {
            throw new \Exception('画像のアップロードに失敗しました。再度アップロードをお願いいたします。', 3000);
        }
    }



    /**
     * 商品編集
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // 商品存在チェック
        $product = Product::with('images')->where('id', '=', $id)->first();
        if ($product === null) {
            return $this->sendError('商品が存在しません。', '');
        }

        $input = $request->all();
        $validatorInput = [
            'code' => 'sometimes|required|code_ex|max:30',
            'name' => 'sometimes|required|string|max:30',
            'price' => 'sometimes|required|numeric',
            'image' => 'sometimes|required|array',
            'image.*' => 'image',
        ];

        // 入力チェック
        $validator = Validator::make($input, $validatorInput)
            ->setAttributeNames(['name' => '商品名']);

        if ($validator->fails()) {
            return $this->response->valiError($validator->errors());
        }

        DB::beginTransaction();
        try {
            $input = array_merge($input, [
                'updated_at' => date('Y-m-d H:i:s')
            ]);
            // 商品情報変更
            $product->update($input);

            $this->productImageUpdate($product, $request);

            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            return $this->response->data($e)->rollback();
        }
        return $this->response->registed();
    }

    /**
     * 商品画像登録
     */
    private function productImageUpdate($product, Request $request)
    {
        try {
            $productImage = $request->file('image');
            if ($productImage) {
                // メイン画像
                foreach ($productImage as $file) {
                    $fileName = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
                    $this->saveImage($file, 'product/', $fileName);

                    ProductImage::create([
                        'product_id' =>  $product->id,
                        'image' =>  $fileName,
                    ]);
                }
            }

            // DBで画像削除
            $removeImg = [];
            if (!empty($request->delete_img)) {
                foreach ($request->delete_img as $image) {
                    $productImg = $product->images->where('image', $image)->first();
                    if ($productImg) {
                        $removeImg[] = $image;
                        $removeImg[] = '350xh-' . $image;
                        $productImg->delete();
                    }
                }
            }

            // ファイル画像削除
            foreach ($removeImg as $image) {
                $this->removeImage('product/', $image);
            }
        } catch (\Exception $e) {
            throw new \Exception('画像のアップロードに失敗しました。再度アップロードをお願いいたします。', 3000);
        }
    }


    /**
     * 商品削除
     *
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request, $id)
    {
        //存在チェック
        $product = Product::find($id);
        if ($product === null) {
            return $this->response->error('商品が存在しません。');
        }

        //DBに登録
        $product->delete();

        return $this->response->success();
    }
}
