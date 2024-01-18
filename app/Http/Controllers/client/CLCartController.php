<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Cart;
class CLCartController extends Controller
{
    public function index(Request $request)
    {
        $carts = Cart::content();
        $totalPrice = $carts->sum(function ($item) {
            return $item->price * $item->qty;
        });
        $cartCount = $carts->count();
                    return view('client.cart', compact('carts','totalPrice','cartCount'));
    }

    public function store(Request $request)
    {
// dd($request->all());
        $productId = $request->input('product_id');
        $productName = $request->input('product_name');
        $productQuantity = $request->input('product_quantity') ?? 1;
        $productPrice = $request->input('product_price') ?? 0;
        $productImg = $request->input('product_img') ?? 0;
        // Thêm sản phẩm vào giỏ hàng
        $carts = Cart::add([
            'id' => $productId,
            'name' => $productName, 
            'qty' => $productQuantity,
            'price' => $productPrice,
            'options' => [
                'img' =>$productImg,
            ],
            
        ]);
        // dd( $carts);
        return redirect()->route('client.carts.index')->with('message', 'Sản phẩm được thêm vào giỏ hàng thành công!');

    }
    public function updateCart(Request $request)
    {
        $rowId = $request->input('row_id');
    $newQuantity = $request->input('newQuantity');
         Cart::update($rowId,$newQuantity);
    // Thực hiện cập nhật giỏ hàng ở đây

    return response()->json(['success' => true]);
   
    }
    public function destroy(string $id)
    {

        Cart::remove($id);
        return back()->with('message', 'xóa thành công');
    }
    public function clearCart()
    {
        // Xóa tất cả các mục trong giỏ hàng
        Cart::destroy();

        // Redirect hoặc thực hiện hành động khác sau khi xóa
        return back()->with('messa', 'Xóa sản phẩm ra khỏi giỏ hàng thành công !');
    }
}
