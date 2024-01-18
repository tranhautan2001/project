<?php

namespace App\Http\Controllers\client;
use Cart;
use Illuminate\Support\Facades\Validator;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Province;
use App\Models\District;
use Illuminate\Support\Facades\Mail;

use App\Models\ProductCategory;
use App\Models\Ward;

class CLOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       
        $categorys = ProductCategory::whereNull('parent_id')->get();
        // dd($categorys);
        $childCategories = ProductCategory::whereNotNull('parent_id')->limit(6)->get();
        // dd($categorys);
        return view('welcome', compact('pages', 'categorys','childCategories','posts','products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function checkout($id , Request $request)
    {
   
        $carts = $request->all();

        $provinces = Province::all();
        
        $carts = Cart::content();

        $cartCount = $carts->count();

        $totalPrice = 0;
        foreach ($carts as $cartItem) {
            $totalPrice += $cartItem->price * $cartItem->qty;
        }    
        if (!$carts->isEmpty()) {
        $provinces = Province::all();
            return view('client.checkout', compact('carts', 'totalPrice','cartCount', 'provinces'));
        } else {
            return view('client.oders.edit')->with('error', 'Giỏ hàng không hợp lệ');
        }
       
    }

    public function getDistrict(Request $request) 
    {
        // dd($request->all());
        $province_id = $request->province_id ?? 0;
        $districts = District::where('province_id', $province_id)->get();
        $html = '';
        foreach($districts as $district) {
            $html .= '<option value="' . $district->id . '">' . $district->name . '</option>';
        }
        return $html;
    }
    
    public function getWards(Request $request) 
    {
        // dd($request->all());
        $district_id = $request->district_id ?? 0;
        $wards = Ward::where('district_id', $district_id)->get();

        $html1 = '';
        foreach($wards as $ward) {
            $html1 .= '<option value="' . $ward->id . '">' . $ward->name . '</option>';
        }
        return $html1;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $id = $request->input('id'); 
        $validateData = Validator::make($request->all(), [
            'customer_name' => 'required',
            'customer_email' => 'required',
            'customer_phone' => 'required',
            'customer_customer' => 'required',
            'customer_status' => 'required',
            'province_id' => 'required',
            'wards_id' => 'required',
            'district_id' => 'required',

            
        ], [
            'customer_name.required' => 'Vui lòng nhập tên',
            'customer_email.required' => 'Vui lòng nhập email',
            'customer_phone.required' => 'Vui lòng nhập số điện thoại',
            'customer_customer.required' => 'Vui lòng nhập địa chỉ',
            'customer_status.required' => 'Vui lòng nhập trạng thái',
            'province_id.required' => 'Vui lòng nhập chọn tỉnh',
            'wards_id.required' => 'Vui lòng nhập chọn xã/phường',
            'district_id.required' => 'Vui lòng nhập chọn quận/huyện',

          
        ]);
        
        if ($validateData->fails()) {
            // dd($validateData->errors());
            return redirect()->route('checkout', $id)
                ->withErrors($validateData)
                ->withInput();
        }
    
        $product_ids = $request->id ?? [];
        $product_quantities = $request->qty ?? [];
        $product_prices = $request->price ?? [];
        $success = "Thành công!";
        $orderData = $request->all();
        $order = Order::create($orderData);
        $order->save();
        $oder_ids = $order->id;
        $order_details = [];

        foreach ($product_ids as $key => $product_id) {
            $order_details[] = [
                'product_id' => (int)$product_id,
                'order_id' => $oder_ids,
                'quantity' => (int)$product_quantities[$key],
                'price' => (float)$product_prices[$key], //
            ];
        }
        foreach ($order_details as $order_detail) {
            $prsArray[] = OrderDetail::create($order_detail);
        }
        // Gửi email
        Mail::send('emails.otp', ['success' => $success, 'prs' => $prsArray], function ($message) use ($request) {
            $message->to($request->customer_email)->subject('Xác nhận thanh toán');
        });
        // Xóa giỏ hàng sau khi đã lưu đơn hàng
        Cart::destroy();

        return redirect()->route('carts.index')->with('success', 'Thanh toán thành công');
    } 


    /**
     * Display the specified resource.
     */
    public function show($slug)
    {
        $products = Product::where('slug', $slug)->firstOrFail();
        $relatedProducts = Product::where('category_id', $products->category_id)
        ->where('id', '<>', $products->id) // Loại trừ sản phẩm hiện tại
        ->limit(5) // Giới hạn số lượng sản phẩm liên quan
        ->get();
        $categorys = ProductCategory::whereNull('parent_id')->get();
        $carts = Cart::content();
        $cartCount = $carts->count();
        return view('client.details', compact('products','relatedProducts','categorys','cartCount'));
    }

   
}
