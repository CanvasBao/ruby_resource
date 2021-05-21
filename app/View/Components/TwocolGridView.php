<?php

namespace App\View\Components;

use Illuminate\View\Component;

class TwocolGridView extends Component
{
    public $griddata;
    public $editFlag;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($griddata, $editFlag)
    {
        $this->griddata = $griddata;
        $this->editFlag = $editFlag;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.twocol_grid_view');
    }
}
