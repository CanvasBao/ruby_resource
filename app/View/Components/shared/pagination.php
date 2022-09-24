<?php

namespace App\View\Components\shared;

use Illuminate\View\Component;

class pagination extends Component
{
    /**
     * title
     *
     * @var string
     */
    public $paginator;
    /**
     * title
     *
     * @var string
     */
    public $queryString;

    /**
     * Create a new component instance.
     *
     * @param  string  $pagination
     * @return void
     */
    public function __construct($paginator)
    {
        $this->paginator = $paginator;
        $query_array = explode('&', request()->getQueryString());
        // dd(explode('&', request()->getQueryString()));
        foreach ($query_array as $key => $field) {
            if (preg_match("/page=/", $field)) {
                unset($query_array[$key]);
            }
        }
        $this->queryString = implode('&', $query_array);
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.shared.pagination');
    }
}
