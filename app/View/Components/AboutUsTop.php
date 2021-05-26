<?php

namespace App\View\Components;

use Illuminate\View\Component;
use View;

class AboutUsTop extends Component
{
    public $about;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($about)
    {
        $this->about = $about;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.about-us-top');
    }

    
    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function getDescription1()
    {
        // $str = "{{ $abc }}";
        // return View::renderFromString($str)->with('abc', $xyz);
        $description =  "<h2>Tại RUBY LABEL</h2>";
        $description .=  "<h3>Chúng tôi cung cấp cho bạn các loại tem nhãn phù hợp nhất</h3>";
        return $description;
        //return View::render('{{$var}}')->with('var', $description); 
        //return View::make($description);
    }

    
    
    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function getDescription2()
    {
        $description =  $this->about['description'];
        $des = preg_split('/\n|\r\n?/', $description);
        foreach($des as $idx => $line){
            if(strpos (  $line , '-' ) === 0 ){
                $check_line = substr($line, 1); 
                $des[$idx] = '<p><i class="ri-check-double-line" style="color: blue;"></i>'.$check_line.'</p>';
            }else{
                $des[$idx] = '<p>'. $line .'</p>';
            }
        }
        $des_affer = implode('', $des);
        return  $des_affer;
    }
}
