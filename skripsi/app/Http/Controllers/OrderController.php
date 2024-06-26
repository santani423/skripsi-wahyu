<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrderRequest;
use App\Http\Resources\OrderResource;
use App\Models\Order;
use App\Models\Service;
use App\Models\Timeline;
use App\Models\User;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function indexAdmin()
    {
        $orders =  OrderResource::collection(Order::latest()->get());

        return inertia('Admin/Orders/Index',[
            'orders' =>  $orders,
        ]);
    }

    public function orderUser(Service $service, OrderRequest $request)
    {
        $data = $request->validated();
        $order = Order::create([
            'user_id' => auth()->user()->id,
            'service_id' => $service->id,
            'order_date' => $data['orderDate'],
            'phone_number' => $data['phoneNumber'],
            'address' => $data['address'],
            'timeline_value' => 'Pembayaran Dp / Lunas'
        ]);

        return to_route('payment-user', $order->id);

    }

    public function create()
    {
        $services = Service::get();
        $users = User::get();
        return inertia('Admin/Orders/Create', [
            'services' => $services,
            'users' => $users
        ]);
    }

    public function orderByAdmin(Service $service, Request $request)
    {
         $request->validate([
            'userId' => 'required',
            'serviceId' => 'required',
            'orderDate' => 'required',
            'phoneNumber' => 'required',
            'address' => 'required',
        ]);
        $order =Order::create([
            'user_id' => $request->userId,
            'service_id' => $request->serviceId,
            'order_date' => $request->orderDate,
            'phone_number' => $request->phoneNumber,
            'address' => $request->address,
            'timeline_value' => 'Pembayaran Dp / Lunas'
        ]);
        return redirect('/admin/orders');
    }

    public function edit(Order $order)
    {
        $services = Service::get();
        $users = User::get();
        return inertia('Admin/Orders/Edit', [
            'order' => $order,
            'users' => $users,
            'services' => $services,
        ]);
    }

    public function update(Order $order, Request $request)
    {
        $request->validate([
            'userId' => 'required',
            'serviceId' => 'required',
            'orderDate' => 'required',
            'phoneNumber' => 'required',
            'address' => 'required',
        ]);

        $order->update([
            'user_id' => $request->userId,
            'service_id' => $request->serviceId,
            'order_date' => $request->orderDate,
            'phone_number' => $request->phoneNumber,
            'address' => $request->address,
        ]);

        return redirect('/admin/orders');
    }

    public function editTimeline(Order $order){
        return inertia('Admin/Orders/TimelineEdit', [
            'timelines' => Timeline::get(),
            'order' => $order
        ]);
    }

    public function updateTimeline(Order $order, Request $request)
    {
        $request->validate([
            'timelineValue' => 'required'
        ]);

        $order->update([
            'timeline_value' => $request->timelineValue
        ]);

        return redirect('/admin/orders');
    }

    public function destroy(Order $order)
    {
        $order->delete();
        return redirect('/admin/orders');
    }

}
