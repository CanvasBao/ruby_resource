<?php

namespace App\View\Components\top;

use Illuminate\View\Component;

class slider extends Component
{
  public $images;

  /**
   * Create a new component instance.
   *
   * @param  string  $name
   * @param  boolean  $active
   * @return void
   */
  public function __construct()
  {
    $this->images = [
      [
        'image' => asset('storage/images/slide-1.jpg'),
        'title' => "Chất lượng tạo niềm tin",
        'subtitle' => 'Với sự chuyên nghiệp, sáng tạo và tiên tiến, chúng tôi cam kết cùng khách hàng xây dựng thương hiệu bền vững và thành công',
        'color' => ''
      ],
      [
        'image' => asset('storage/images/slide-2.jpg'),
        'title' => "Dấu ấn phong cách của bạn",
        'subtitle' => "Chúng tôi cung cấp các giải pháp nhãn và mã vạch linh hoạt, hiệu quả và độc đáo để đáp ứng nhu cầu sản xuất của bạn",
        'color' => ''
      ]
    ];
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