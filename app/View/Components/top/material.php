<?php

namespace App\View\Components\top;

use Illuminate\View\Component;
use App\Models\Category;

class material extends Component
{
  public $materials;

  /**
   * Create a new component instance.
   *
   * @param  string  $name
   * @param  boolean  $active
   * @return void
   */
  public function __construct()
  {
    //   $this->materials = [
    //     [
    //         'image' => 'https://images.unsplash.com/photo-1496128858413-b36217c2ce36?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1679&q=80',
    //         'type' => 'Art1icle',
    //         'title' => 'Boost your conversion rate',
    //         'description' => "Lorem ipsum dolor sit amet consectetur adipisicing elit.
    //           Architecto accusantium praesentium eius, ut atque fuga culpa, similique sequi cum eos quis
    //           dolorum.",
    //     ],
    //     [
    //         'image' => 'https://images.unsplash.com/photo-1547586696-ea22b4d4235d?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1679&q=80',
    //         'type' => 'Video',
    //         'title' => 'How to use search engine optimization to drive sales',
    //         'description' => "Lorem ipsum dolor sit amet consectetur adipisicing elit.
    //           Velit facilis asperiores porro quaerat doloribus, eveniet dolore. Adipisci tempora aut inventore
    //           optio animi., tempore temporibus quo laudantium.",
    //     ],
    //     [
    //         'image' => 'https://images.unsplash.com/photo-1492724441997-5dc865305da7?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1679&q=80',
    //         'type' => 'Case Study',
    //         'title' => 'Improve your customer experience',
    //         'description' => "Lorem ipsum dolor sit amet consectetur adipisicing elit.
    //           Sint harum rerum voluptatem quo recusandae magni placeat saepe molestiae, sed excepturi cumque
    //           corporis perferendis hic.",
    //     ],

    // ];
    $this->materials = Category::get();
  }


  /**
   * Get the view / contents that represent the component.
   *
   * @return \Illuminate\Contracts\View\View|\Closure|string
   */
  public function render()
  {
      return view('components.top.material');
  }
}