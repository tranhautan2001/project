<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Support\Facades\Validator;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\Supplier;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = auth()->user();
        $userPermissions = json_decode($user->permission, true);
        if ($user && is_array($userPermissions) && in_array("show_product", $userPermissions)) {
            $Product = Product::orderBy('id', 'desc')->paginate(5);
            $Product->onEachSide(5);
      
      
        return view('admin.products.index' , compact('Product'));  } else {
            return view('client.errors');
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user = auth()->user();
        $userPermissions = json_decode($user->permission, true);
        if ($user && is_array($userPermissions) && in_array("create_product", $userPermissions)) {
        $dataSuppliers = Supplier::all();
        $dataCategorys = ProductCategory::all();
        return view('admin.products.create' ,compact('dataSuppliers','dataCategorys'));
    } else {
        return view('client.errors');
    }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validateData = Validator::make($request->all(), [
            'name' => 'required|string',
            'size' => 'required',
            'img' => 'required',
            'material' => 'required',
            'perimeter' => 'required',
            'price' => 'required',
            'sale' => 'required',
            'supplier_id' => 'required',
            'category_id' => 'required',
        ], [
            'name.required' => 'Vui lòng nhập tên đầy đủ',
            'name.string' => 'Tên đầy đủ phải là một chuỗi',
            'img.required' => 'Vui lòng chọn ảnh',
            'size.required' => 'Vui lòng nhập size',
            'material.required' => 'Vui lòng nhập chất liệu',
            'price.required' => 'Vui lòng nhập giá',
            'sale.required' => 'Vui lòng nhập giảm giá',
            'supplier_id.required' => 'Vui lòng chọn nhà cung cấp',
            'category_id.required' => 'Vui lòng chọn danh mục',
        ]);
        if ($validateData->fails()) {
            // dd($validateData->errors());
            return redirect('products/create')
                ->withErrors($validateData)
                ->withInput();
        }
        $product = $request->all();
// dd( $product);
        $dataCreate = Product::create($product);

        return back()->with('message' , 'thêm mới thành công');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $showProduct = Product::find($id);
       
        return view('admin.products.show', compact('showProduct'));
 
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = auth()->user();
        $userPermissions = json_decode($user->permission, true);
        if ($user && is_array($userPermissions) && in_array("edit_product", $userPermissions)) {
        $editProduct = Product::find($id);
        $showSuppliers = Supplier::all();
        $showCategorys = ProductCategory::all();
        return view('admin.products.update', compact('editProduct','showSuppliers','showCategorys'));
    } else {
        return view('client.errors');
    }
    }

  
    public function update(Request $request, string $id)
    {
        $validateData = Validator::make($request->all(), [
            'name' => 'required|string',
            'size' => 'required',
            'material' => 'required',
            'perimeter' => 'required',
            'price' => 'required',
            'sale' => 'required',
            'supplier_id' => 'required',
            'category_id' => 'required',
        ], [
            'name.required' => 'Vui lòng nhập tên đầy đủ',
            'name.string' => 'Tên đầy đủ phải là một chuỗi',
            'size.required' => 'Vui lòng nhập size',
            'material.required' => 'Vui lòng nhập chất liệu',
            'price.required' => 'Vui lòng nhập giá',
            'sale.required' => 'Vui lòng nhập giảm giá',
            'supplier_id.required' => 'Vui lòng chọn nhà cung cấp',
            'category_id.required' => 'Vui lòng chọn danh mục',
        ]);
        if ($validateData->fails()) {
            // dd($validateData->errors());
            return redirect()->route('products.edit', $id)
                ->withErrors($validateData)
                ->withInput();
        }
        $products = Product::findOrFail($id);
    
        // Kiểm tra xem có tệp tin ảnh mới được chọn không
        if ($request->hasFile('img')) {
            $image = $request->file('img');
            // $imageName = $id . '.' . $image->getClientOriginalExtension();
            $imageName = $image->getClientOriginalName();
            $image->move(public_path('img'), $imageName);
            $products->img = $imageName;
        }
    
        $dataUpdate = $request->except(['_token', '_method', 'img']);
        $products->update($dataUpdate);
    
        return back()->with('message', 'Chỉnh sửa thành công');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = auth()->user();
        $userPermissions = json_decode($user->permission, true);
        if ($user && is_array($userPermissions) && in_array("delete_product", $userPermissions)) { 
        Product::destroy($id);
        return back()->with('message', 'xóa thành công');
    } else {
        return view('client.errors');
    }
    }
}
