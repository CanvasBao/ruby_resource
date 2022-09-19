<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\API\ApiController as Controller;
use App\Http\Resources\OrderResource;
use Illuminate\Http\Request;

class OrderApi extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $list = Order::query();
        if (!empty($request['search'])) {
            $list->where(function ($query) use ($request) {
                $query->where('order.cus_email', 'LIKE', '%' . $request['search'] . '%')
                    ->orWhere('order.id', 'LIKE', '%' . $request['search'] . '%')
                    ->orWhere('order.cus_last_name', 'LIKE', '%' . $request['search'] . '%')
                    ->orWhere('order.cus_first_name', 'LIKE', '%' . $request['search'] . '%')
                    ->orWhere('order.cus_tel', 'LIKE', '%' . $request['search'] . '%')
                    ->orWhere('order.payment_total', 'LIKE', '%' . $request['search'] . '%');
            });
        }
        if (!empty($request['status'])) {
            $status = explode(',', $request['status']);
            $list->whereIn('order.order_status', $status);
        }

        return OrderResource::collection($response);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $order = Order::with(['products.product'])->find($id);
        return new OrderResource($order);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
