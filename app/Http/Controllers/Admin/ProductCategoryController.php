<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProductCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = auth()->user();
        $userPermissions = json_decode($user->permission, true);
        if ($user && is_array($userPermissions) && in_array("show_Category", $userPermissions)) {
        $categorys = ProductCategory::with('parent')->latest('id')->paginate(5);
        $categorys->onEachSide(5);
        // dd($categorys);
        return view('admin.categorys.index', compact('categorys'));
    } else {
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
        if ($user && is_array($userPermissions) && in_array("create_Category", $userPermissions)) {
        $parents  = ProductCategory::with('parent')->latest('id')->get();
        return view('admin.categorys.create', compact('parents'));
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
            'name' => 'required|string|regex:/^[\pL\s\-]+$/u',
            'image' => 'required',
        ], [
            'name.required' => 'Vui lòng nhập tên đầy đủ',
            'name.string' => 'Tên đầy đủ phải là một chuỗi',
            'name.regex' => 'Tên đầy đủ chỉ được chứa chữ cái và dấu cách',
            'image.required' => 'Vui lòng chọn hình ảnh',
        ]);
        if ($validateData->fails()) {
            return redirect('categorys/create')
                ->withErrors($validateData)
                ->withInput();
        }
        $categorys = $request->all();
        $create = ProductCategory::create($categorys);
        return back()->with('message' , 'thêm mới thành công');  
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = auth()->user();
        $userPermissions = json_decode($user->permission, true);
        if ($user && is_array($userPermissions) && in_array("edit_Category", $userPermissions)) {
        $editCategorys = ProductCategory::find($id);
        $parents  = ProductCategory::with('parent')->latest('id')->get();
        // dd($editCategorys);
        return view('admin.categorys.update',compact('editCategorys','parents'));
    } else {
        return view('client.errors');
    }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validateData = Validator::make($request->all(), [
            'name' => 'required|string|regex:/^[\pL\s\-]+$/u',
            // 'image' => 'required',
            // 'parent_id' => 'required', 
        ], [
            'name.required' => 'Vui lòng nhập tên đầy đủ',
            'name.string' => 'Tên đầy đủ phải là một chuỗi',
            'name.regex' => 'Tên đầy đủ chỉ được chứa chữ cái và dấu cách',
            // 'image.required' => 'Vui lòng chọn hình ảnh',
            // 'parent_id.required' => 'Vui lòng nhập thông tin trạng thái',
        ]);
        if ($validateData->fails()) {
            return redirect()->route('categorys.edit', $id)

                ->withErrors($validateData)
                ->withInput();
        }

        $dataUpdate = ProductCategory::findOrFail($id);
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            // $imageName = $id . '.' . $image->getClientOriginalExtension();
            $imageName = $image->getClientOriginalName();
            $image->move(public_path('img'), $imageName);
            $dataUpdate->image = $imageName;
        }
    
        $updateCategory = $request->except(['_token', '_method', 'image']);
        $dataUpdate->update($updateCategory);
        return back()->with('message',' Chỉnh sửa thành công ?');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = auth()->user();
        $userPermissions = json_decode($user->permission, true);
        if ($user && is_array($userPermissions) && in_array("delete_Category", $userPermissions)) {
        ProductCategory::destroy($id);
        return back()->with('message' , 'xóa thành công');   
    } else {
        return view('client.errors');
    }
    }
}
