<?php

namespace App\Http\Controllers;

use App\Http\Requests\PaymentRequest;
use App\Http\Resources\OrderResource;
use App\Models\Order;
use App\Models\Payment;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function paymentUser(Order $order)
    {
        $order = OrderResource::make($order);
        $payment = Payment::where('order_id', '=', $order->id)->get();
        return inertia('User/Payment', [
            'order' => $order,
            'payment' => $payment
        ]);
    }

    public function addPayment(Order $order, PaymentRequest $request)
    {
        $data = $request->validated();
        if ($request->hasFile('imageTransfer')) {
            $image = $request->file('imageTransfer');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('storage/images/payments'), $imageName);
        }
        Payment::create([
            'order_id' => $order->id,
            'payment_type' => $data['paymentType'],
            'bank_name' => $data['bankName'],
            'account_number' => $data['accountNumber'],
            'name' => $data['name'],
            'phone_number' => $data['phoneNumber'],
            'image_transfer' => $imageName ?? null
        ]);

        return to_route('user-dashboard');
    }

    public function paymentDetail(Order $order)
    {
        $payments = Payment::where('order_id', '=', $order->id)->get();
        return inertia('User/DetailPayment', [
            'payments' => $payments
        ]);
    }

    public function paymentDetailAdmin(Order $order)
    {
        $payments = Payment::where('order_id', '=', $order->id)->get();
        return inertia('Admin/Orders/Payment', [
            'payments' => $payments
        ]);
    }

    public function updatePaymentStatus(Order $order, $type, Request $request)
    {
        $request->validate([
            'status' => 'required'
        ]);


        $payment = Payment::where([
            'order_id' => $order->id,
            'payment_type' => $type
        ])->first();


        $payment->update([
            'status' => $request->status
        ]);


        if ($payment->payment_type === 'paid-off' && $payment->status === 'paid') {
            $order->update([
                'order_Status' => 'finished'
            ]);
        }
        if ($payment->payment_type === 'paid-off' && $payment->status === 'pending') {
            $order->update([
                'order_status' => 'on-going'
            ]);
        }
        if ($payment->payment_type === 'paid-off' && $payment->status === 'rejected') {
            $order->update([
                'order_status' => 'failed'
            ]);
        }

        return redirect('/admin/orders');
    }
}
