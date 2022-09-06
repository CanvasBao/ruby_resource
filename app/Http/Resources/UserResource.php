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
            'kana' => $this->first_name_kana . ' ' . $this->last_name_kana,
            'email' => $this->email,
            'post_code' => $this->post_code,
            'address_1' => $this->address_1,
            'address_2' => $this->address_2,
            'tel' => $this->tel,
            'birthday' =>  $this->birthday ? date('Y年m月d日', strtotime($this->birthday)) : '',
            'created_at' => date('Y年m月d日 H:i:s', strtotime($this->created_at)),
            'updated_at' => date('Y年m月d日 H:i:s', strtotime($this->updated_at))
        ];
    }
}
