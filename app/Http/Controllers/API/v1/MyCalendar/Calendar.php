<?php

namespace App\Http\Controllers\API\v1\MyCalendar;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class Calendar extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        dd(1212121);
        $orders = Order::with('users')->with('products')->get();
        return $this->sendResponse($orders->toArray(), 'orders retrieved successfully.');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //creating order
    }


    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //show one order by id
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        $input = $request->all();
        $validator = $order->validateRequest($input);

        if ($validator->fails()) {
            return $this->sendError('Validation Error.', $validator->errors());
        }

        $order->status = $input['status'];
        $order->save();

        return $this->sendResponse($order->toArray(), 'Order updated successfully.');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //deleting order
    }
}
