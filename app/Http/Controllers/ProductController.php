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

        $query = Product::with('images');
        $products = $query->paginate($perPage);
        return view('pages.product.index', compact(['products']));
    }

}
