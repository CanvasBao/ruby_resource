<?php

namespace App\View\Components\top;

use Illuminate\View\Component;
use App\Models\Product as ProductMD;
use App\Models\Category as CategoryMD;

class product extends Component
{
  public $products;
  public $categories;

  /**
   * Create a new component instance.
   *
   * @param  string  $name
   * @param  boolean  $active
   * @return void
   */
  public function __construct()
  {
    $this->categories = CategoryMD::has('products')->with('products')->get();
    $this->products = ProductMD::get();
  }


  /**
   * Get the view / contents that represent the component.
   *
   * @return \Illuminate\Contracts\View\View|\Closure|string
   */
  public function render()
  {
      return view('components.top.product');
  }
}