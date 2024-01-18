<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = auth()->user();
        $userPermissions = json_decode($user->permission, true);
        if ($user && is_array($userPermissions) && in_array("show_Supplier", $userPermissions)) {
        $suppliers = Supplier::paginate(5);
        $suppliers->onEachSide(5);
        // dd($suppliers);
        return view('admin.suppliers.index', compact('suppliers'));
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
        if ($user && is_array($userPermissions) && in_array("create_Supplier", $userPermissions)) {
        return view('admin.suppliers.create');
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
            'slug' => 'required',
            'status' => 'required', 
        ], [
            'name.required' => 'Vui lòng nhập tên đầy đủ',
            'name.string' => 'Tên đầy đủ phải là một chuỗi',
            'name.regex' => 'Tên đầy đủ chỉ được chứa chữ cái và dấu cách',
            'slug.required' => 'Vui lòng nhập thông tin slug',
            'status.required' => 'Vui lòng nhập thông tin trạng thái',
        ]);
        if ($validateData->fails()) {
            return redirect('suppliers/create')
                ->withErrors($validateData)
                ->withInput();
        }
       $supplier = $request->all();
       $create = Supplier::create($supplier);
       return back()->with('message' , 'thêm mới thành công');    }

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
        if ($user && is_array($userPermissions) && in_array("edit_Supplier", $userPermissions)) {
        $editSuppliers = Supplier::find($id);
        return view('admin.suppliers.update',compact('editSuppliers'));
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
            'name' => 'required|string',
            'slug' => 'required',
            'status' => 'required', 
        ], [
            'name.required' => 'Vui lòng nhập tên đầy đủ',
            'name.string' => 'Tên đầy đủ phải là một chuỗi',
            'slug.required' => 'Vui lòng nhập thông tin slug',
            'status.required' => 'Vui lòng nhập thông tin trạng thái',
        ]);
        if ($validateData->fails()) {
            return redirect()->route('suppliers.edit', $id)
                ->withErrors($validateData)
                ->withInput();
        }
        $dataUpdate = Supplier::findOrFail($id);
         $updateSupplier = $request->all();
         $dataUpdate->update($updateSupplier);
         return back()->with('message',' Chỉnh sửa thành công ?');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = auth()->user();
        $userPermissions = json_decode($user->permission, true);
        if ($user && is_array($userPermissions) && in_array("delete_Supplier", $userPermissions)) {
        Supplier::destroy($id);
        return back()->with('message' , 'xóa thành công');
    } else {
        return view('client.errors');
    }
    }
}
