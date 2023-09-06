<?php

namespace App\View\Components\top;

use Illuminate\View\Component;
use App\Models\Banner;

class slider extends Component
{
  public $images;

  public $assetDir;

  /**
   * Create a new component instance.
   *
   * @param  string  $name
   * @param  boolean  $active
   * @return void
   */
  public function __construct()
  {
    $this->images = Banner::orderBy('sort_no', 'ASC')->get()->toArray();

    $this->assetDir = Banner::getAssetPath();
  }


  /**
   * Get the view / contents that represent the component.
   *
   * @return \Illuminate\Contracts\View\View|\Closure|string
   */
  public function render()
  {
      return view('components.top.slider');
  }
}