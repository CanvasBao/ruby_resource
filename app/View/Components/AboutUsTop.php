<?php

namespace App\View\Components;

use Illuminate\View\Component;

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
        $description =  $this->about['description'];
        $test = 'test';
        return View::renderFromString($description);
    }

    
    
    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function getDescription2()
    {
        return view('components.about-us-top');
    }
}
