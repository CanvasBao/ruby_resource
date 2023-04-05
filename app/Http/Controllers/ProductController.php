<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller as BaseController;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Models\MstTaxRule;
use Illuminate\Support\Facades\Validator;

class ProductController extends BaseController
{
    /**
     *　show product list
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $query = Product::with(['images','category']);

        // page
        $perPage = request()->has('per_page') ? (int)request()->per_page : 10;

        $products = $query->paginate($perPage);
        return view('pages.product.index', compact(['products']));
    }

    /**
     *　show product detail
     *
     * @return \Illuminate\View\View
     */
    public function show(Request $request, $id, $text)
    {
        $product = Product::find($id);
        if (!$product) {
            redirect()->route('product.list');
        }
        return view('pages.product.detail', compact(['product']));
    }
}
