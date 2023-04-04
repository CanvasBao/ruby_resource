<?php

namespace App\View\Components\product;

use Illuminate\View\Component;
use App\Models\Category as CategoryMD;

class tabs extends Component
{
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
    $this->categories = CategoryMD::get();
  }


  /**
   * Get the view / contents that represent the component.
   *
   * @return \Illuminate\Contracts\View\View|\Closure|string
   */
  public function render()
  {
      return view('components.product.tabs');
  }
}