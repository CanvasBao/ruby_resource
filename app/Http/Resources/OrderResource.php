<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\OrderProductResource;
use App\Http\Resources\OrderCustomerResource;

class OrderResource extends JsonResource
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
            'payment_total' => $this->payment_total,
            'payment_method' => $this->payment_method,
            'payment_date' => date('Y年m月d日 H:i:s', strtotime($this->payment_date)),
            'postage' => $this->postage,
            'receipt_date' => date('Y年m月d日 H:i:s', strtotime($this->receipt_date)),
            'created_at' => date('Y年m月d日 H:i:s', strtotime($this->created_at)),
            'products' => OrderProductResource::collection($this->products),
            'customer' => new OrderCustomerResource($this->customer),

        ];
    }
}
