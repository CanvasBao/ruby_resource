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
            'price' => $this->price,
            'category' => new CategoryResource($this->category),
            'images' => ProductImageResource::collection($this->images),
            'description' => $this->description,
            'created_at' => date('Y年m月d日 H:i:s', strtotime($this->created_at))
        ];
    }
}
