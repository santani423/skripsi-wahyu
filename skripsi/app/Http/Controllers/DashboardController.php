<?php

namespace App\Http\Controllers;

use App\Http\Resources\OrderResource;
use App\Models\Order;
use App\Models\User;
use App\Models\Payment;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function indexAdmin()
    {
        $orderSuccess = Order::where('order_status', '=' , 'finished')->count();
        $orderOnGoing = Order::where('order_status', '=', 'on-going')->count();
        $users = User::count();
        return inertia('Admin/Dashboard/Index', [
            'orderSuccess' => $orderSuccess,
            'orderOnGoing' => $orderOnGoing,
            'users' => $users
        ]);
    }

    public function index()
    {
        $orders = Order::with('service')->where('user_id','=' ,auth()->user()->id)->latest()->get();

        return inertia('User/Dashboard', [
            'orders' => $orders
        ]);
    }
}
