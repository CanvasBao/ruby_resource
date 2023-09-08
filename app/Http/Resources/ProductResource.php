<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
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
            'code' => $this->code,
            'name' => $this->name,
            'short_des' => $this->short_des,
            'sort_no' => $this->sort_no,
            'created_at' => date('Y-m-d H:i:s', strtotime($this->created_at)),
            'updated_at' =>date('Y-m-d H:i:s', strtotime($this->updated_at)),
            'category' => new CategoryResource($this->category),
            'images' => ProductImageResource::collection($this->images),
            'descriptions' => ProductDescriptionResource::collection($this->descriptions),
        ];
    }
}
