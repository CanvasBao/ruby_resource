<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
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
            'name' => $this->first_name . ' ' . $this->last_name,
            'company' => $this->company,
            'email' => $this->email,
            'address' => $this->address,
            'tel' => $this->tel,
            'created_at' => date('Y/m/d H:i:s', strtotime($this->created_at)),
            'updated_at' => date('Y/m/d H:i:s', strtotime($this->updated_at))
        ];
    }
}
