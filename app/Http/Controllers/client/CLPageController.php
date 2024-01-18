<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Page;
use App\Models\Post;
use App\Models\Product;
use App\Models\ProductCategory;
use Cart;

class CLPageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pages = Page::all();
        $posts = Post::limit(4)->get();



        // Lấy tất cả các category cha (các category có parent_id là null)
        $categorys = ProductCategory::whereNull('parent_id')->get();
        // dd($categorys);
        // Lấy tất cả các category con của tất cả các category cha
        $childCategories = ProductCategory::whereNotNull('parent_id')->limit(6)->get();
        // dd($childCategories);
        $carts = Cart::content();


        $cartCount = $carts->count();
        // dd($cartCount);
        return view('welcome', compact('pages', 'categorys', 'childCategories', 'posts', 'cartCount'));
    }
   

     public function show($slug, Request $request)
{
    $categorys = ProductCategory::where('slug', $slug)->firstOrFail();
    $sortOrder = $request->input('sortOrder', 'desc');
    $sortField = $request->input('sortField', 'name');
    $perPage = $request->input('sortPagination', 16);
    $stockStatus = $request->input('stock_status');
    $discounted = $request->input('sale'); // Dòng được thêm vào
    $minPrice = $request->input('min_price', 0); // Thêm vào
    $maxPrice = $request->input('max_price', 10000); // Thêm vào
    $productsQuery = $categorys->products();

    // Áp dụng điều kiện cho trạng thái còn hàng
    if ($stockStatus !== null) {
        $productsQuery->where('stock_status', $stockStatus);
    }

    // Áp dụng điều kiện cho sản phẩm giảm giá
    if ($discounted) {
        $productsQuery->where('sale', '>', 0); // Điều chỉnh dựa trên cấu trúc của bạn
    }
    $productsQuery->whereBetween('price', [$minPrice, $maxPrice]);

    // Áp dụng sắp xếp cho truy vấn
    $productsQuery = $this->applySorting($productsQuery, $sortField, $sortOrder);

    // Lấy kết quả theo trang
    $products = $productsQuery->paginate($perPage);

    if ($request->ajax()) {
        return response()->json(view('client.listdata', compact('products'))->render());
    } else {

        $carts = Cart::content();
        $cartCount = $carts->count();
        $childCategories = ProductCategory::whereNotNull('parent_id')->limit(6)->get();
        return view('client.category', compact('categorys', 'products', 'childCategories', 'cartCount'));
    }
}


    private function applySorting($query, $sortField, $sortOrder)
    {
        if ($sortOrder === 'price_asc') {
            return $query->orderBy('price', 'asc');
        } elseif ($sortOrder === 'price_desc') {
            return $query->orderBy('price', 'desc');
        } else {
            return $query->orderBy($sortField, $sortOrder);
        }
    }
  
}
