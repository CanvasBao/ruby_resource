<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\API\ApiController as Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use App\Http\Resources\ProductResource;
use App\Models\BestSelling;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\ProductDescription;

class ProductApi extends Controller
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
            $query = Product::query();

            if (empty($input['sort'])) {
                $query->orderBy('sort_no');
            }

            $response = $this->getListWithParams($query, $input);

            return ProductResource::collection($response);
        } catch (\Exception $e) {
            return $this->errorResponse($e);
        }
    }

    /**
     * register product images
     */
    private function handleProdImage($product, $input, $isCreate = true)
    {
        $images = [];
        try {
            // check has file
            if (!$input) {
                throw new \Exception();
            }

            $uploadDir = ProductImage::getImgFullPath();
            // save image
            $imageIds = [];
            $newImgData = [];
            foreach ($input as $key => $item) {
                $file = $item['image'];
                if(is_uploaded_file($file)){

                    $fileName = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
                    $file->move($uploadDir, $fileName);
                    $images[] = $fileName;

                    array_push($newImgData, [
                        'product_id' =>  $product->id,
                        'image' =>  $fileName,
                        'sort_no' =>  $key + 1,
                    ]);
                }
                else if (!empty($file) && $isCreate){
                    $copyImagePath =  $uploadDir . $image;
                    if (file_exists($copyImagePath)) {
                        $fileName = time() . '_' . uniqid() . '.' . pathinfo($copyImagePath, PATHINFO_EXTENSION);
                        copy($copyImagePath, $uploadDir . $fileName);
                        $images[] = $fileName;

                        array_push($newImgData, [
                            'product_id' =>  $product->id,
                            'image' =>  $fileName,
                            'sort_no' =>  $key + 1,
                        ]);
                    }
                }
                else if (!empty($file) && !$isCreate && !empty($item['id'])){
                    array_push($imageIds, $item['id']);
                }
            }
            // delete image
            ProductImage::where('product_id', $product->id)->whereNotIn('id', $imageIds)->delete();
            // create new image
            $product->images()->createMany($newImgData);
        } catch (\Exception $e) {
            \Log::error($e);
            ProductImage::removeFileUploaded($images);
            throw new \Exception('upload image fail, please reupload.', 3000);
        }

        return $images;
    }

    /**
     * handle register update product descriptions
     */
    private function handleProdDes($product, $input)
    {
        try {
            // check
            if (!$input) {
                return false;
            }

            $newData = [];
            $desIds = [];
            // register description
            foreach ($input as $key => $description) {
                if (empty($description['title']) || empty($description['content'])) continue;

                if (empty($item['id'])){
                    array_push($newData, [
                        'product_id' =>  $product->id,
                        'title' =>  $description['title'],
                        'content' =>  $description['content'],
                        'sort_no' =>  $key + 1,
                    ]);
                }
                else {
                    $des = ProductDescription::where('id', $item['id'])->where('product_id', $product->id)->first();
                    if($des){
                        $des->update([
                            'title' =>  $description['title'],
                            'content' =>  $description['content'],
                            'sort_no' =>  $key + 1
                        ]);

                        array_push($desIds, $des->id);
                    }else{
                        array_push($newData, [
                            'product_id' =>  $product->id,
                            'title' =>  $description['title'],
                            'content' =>  $description['content'],
                            'sort_no' =>  $key + 1,
                        ]);
                    }
                }
            }

            // delete image
            ProductDescription::where('product_id', $product->id)->whereNotIn('id', $desIds)->delete();
            // create new image
            $product->descriptions()->createMany($newData);

        } catch (\Exception $e) {
            \Log::error($e);
            throw new \Exception('register descriptions fail.', 3000);
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
            'code' => 'required|code_ex|max:30',
            'name' => 'required|max:30',
            'images' => 'required|array',
            'images.*.image' => 'image'
        ];

        // check input
        $validator = Validator::make($input, $validatorInput)
            ->setAttributeNames(['name' => 'Tên sản phẩm']);

        if ($validator->fails()) {
            return $this->validateError($validator->errors());
        }

        DB::beginTransaction();
        try {
            $newOrder = Product::max('sort_no') + 1;
            $registerInput = [
                'category_id' => !empty($input['category']['id']) ? $input['category']['id'] : null,
                'name' => $input['name'],
                'code' => $input['code'],
                'short_des' => !empty($input['short_des']) ? $input['short_des'] : '',
                'sort_no' => $newOrder,
                'price' => !empty($input['price']) ? $input['price'] : null
            ];

            // register product
            $product = Product::create($registerInput);

            // register product images
            $images = $input['images'];
            $uploadedImg = $this->handleProdImage($product, $images);

            // register product descriptions
            $prodDes = $input['descriptions'];
            $this->handleProdDes($product, $prodDes);

            $data = $product->fresh(['images', 'descriptions']);
            DB::commit();
        } catch (\Exception $e) {
            if(isset($uploadedImg)){
                ProductImage::removeFileUploaded($uploadedImg);
            }
            DB::rollback();
            return $this->errorResponse($e);
        }

        return $this->registeredResponse($data);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::with('images')->find($id);
        //存在チェック
        if ($product === null) {
            return $this->notExist();
        }

        return new ProductResource($product);
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
        // check product exist
        $product = Product::with('images')->where('id', '=', $id)->first();
        if ($product === null) {
            return $this->errorResponse(null, "product isn't exist");
        }

        $input = $request->all();
        $validatorInput = [
            'code' => 'required|code_ex|max:30',
            'name' => 'required|max:30',
            'images' => 'required|array',
            'images.*.image' => 'image'
        ];

        // check input
        $validator = Validator::make($input, $validatorInput)
            ->setAttributeNames(['code' => 'mã sản phẩm']);

        if ($validator->fails()) {
            return $this->validateError($validator->errors());
        }

        DB::beginTransaction();
        try {
            $input = array_merge($input, [
                'updated_at' => date('Y-m-d H:i:s')
            ]);
            // update product
            $product->update($input);

            // handle product images
            $images = $input['images'];
            $uploadedImg = $this->handleProdImage($product, $images);

            // handle product descriptions
            $prodDes = $input['descriptions'];
            $this->handleProdDes($product, $prodDes);

            $data = $product->fresh(['images', 'descriptions']);

            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            if(isset($uploadedImg)){
                ProductImage::removeFileUploaded($uploadedImg);
            }
            return $this->errorResponse($e);
        }

        return $this->registeredResponse($data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //check exist
        $product = Product::find($id);
        if ($product === null) {
            return $this->errorResponse(null, "product isn't exist");
        }

        // update db
        $product->delete();

        return $this->successResponse();
    }

    /**
     * add to best sell
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function registerBestSell(Request $request, $id)
    {
        $isBest = $request->input('is_best', true);

        //check exist
        $product = Product::find($id);
        if ($product === null) {
            return $this->errorResponse(null, "product isn't exist");
        }

        // check product was best sell and handle database
        $bestSellDB = BestSelling::find($id);
        if ($isBest && !$bestSellDB) {
            // update db
            $newOrder = BestSelling::max('sort_no') + 1;
            $registerInput = [
                'product_id' => $product->id,
                'sort_no' => $newOrder
            ];

            // register product
            BestSelling::create($registerInput);
        }
        else if (!$isBest && $bestSellDB){
            $bestSellDB->delete();
        }

        return $this->successResponse();
    }
}
