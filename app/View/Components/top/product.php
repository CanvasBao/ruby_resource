<?php

namespace App\View\Components\top;

use Illuminate\View\Component;
use App\Models\Product as ProductMD;

class product extends Component
{
  public $products;

  /**
   * Create a new component instance.
   *
   * @param  string  $name
   * @param  boolean  $active
   * @return void
   */
  public function __construct()
  {
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