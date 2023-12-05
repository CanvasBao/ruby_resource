<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CategoryResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'category_name' => $this->category_name,
            'category_slug' => $this->category_slug,
            'title' => $this->title,
            'description' => $this->description,
            'sort_no' => $this->sort_no,
            'created_at' => date('Y-m-d H:i:s', strtotime($this->created_at)),
            'updated_at' =>date('Y-m-d H:i:s', strtotime($this->updated_at))
        ];
    }
}
