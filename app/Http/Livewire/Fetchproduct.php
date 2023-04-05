<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Product;

class Fetchproduct extends Component
{
    public $records;

    protected $listeners = ['fetchProductList' => 'fetchProduct', 'clearProduct'];

    public function __construct()
    {
        $this->fetchProduct('all');
    }

    // clear records
    public function clearProduct()
    {
        $this->records = null;
    }

    // Fetch records
    public function fetchProduct($slug = '')
    {
        if ($slug == 'all') {
            $this->records = Product::get();
        } else {
            $this->records = Product::whereRelation('category', 'category_slug', $slug)->get();
        }
    }

    public function render()
    {
        return view('livewire.fetchproduct');
    }
}
