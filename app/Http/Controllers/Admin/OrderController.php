<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

use Cart;
class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = auth()->user();
        $userPermissions = json_decode($user->permission, true);
        if ($user && is_array($userPermissions) && in_array("show_Order", $userPermissions)) {
            // $cartIds = Cart::pluck('id');
            // Lấy id của giỏ hàng
            $orders = Order::paginate(5);
            $orders->onEachSide(5);
            return view('admin.orders.index', compact('orders'));
        } else {
            return view('client.errors');

        }
    }


    public function show(string $id)
    {
        $user = auth()->user();
        $userPermissions = json_decode($user->permission, true);
        if ($user && is_array($userPermissions) && in_array("showDetail_Order", $userPermissions)) {
            $order = Order::find($id);
            
            $productOrders = $order->OrderDetail;
            // dd( $productOrders);
            if (!$order) {
                // Xử lý khi không tìm thấy đơn hàng
                return redirect()->route('orders.index')->with('error', 'Không tìm thấy đơn hàng.');
            }

            // Lấy thông tin giỏ hàng dựa trên đơn hàng
           

            return view('admin.orders.history', compact('productOrders'));
        } else {
            return view('client.errors');

        }
    }
   
}
