<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Page;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = auth()->user();
        $userPermissions = json_decode($user->permission, true);
        if ($user && is_array($userPermissions) && in_array("show_Page", $userPermissions)) {
        $pages = Page::paginate(5);
        $pages->onEachSide(5);
        // dd($pages);  
        return view('admin.pages.index', compact('pages'));
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
        if ($user && is_array($userPermissions) && in_array("create_Page", $userPermissions)) {
        return view('admin.pages.create');
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
            'detail' => 'required',
        ], [
            'name.required' => 'Vui lòng nhập tên đầy đủ',
            'name.string' => 'Tên đầy đủ phải là một chuỗi',
            'name.regex' => 'Tên đầy đủ chỉ được chứa chữ cái và dấu cách',
            'detail.required' => 'Vui lòng nhập thông tin chi tiết',
        ]);
        if ($validateData->fails()) {
            return redirect('pages/create')
                ->withErrors($validateData)
                ->withInput();
        }
        $dataCreate =  $request->all();
        $pages = Page::create($dataCreate);
        return back()->with('message', 'thêm mới thành công');
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
        if ($user && is_array($userPermissions) && in_array("edit_Page", $userPermissions)) {
        $editPages = Page::find($id);
        return view('admin.pages.update',compact('editPages'));
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
            'detail' => 'required',
        ], [
            'name.required' => 'Vui lòng nhập tên đầy đủ',
            'name.string' => 'Tên đầy đủ phải là một chuỗi',
            'name.regex' => 'Tên đầy đủ chỉ được chứa chữ cái và dấu cách',
            'detail.required' => 'Vui lòng nhập thông tin chi tiết',
        ]);
        if ($validateData->fails()) {
            return redirect()->route('pages.edit', $id)
                ->withErrors($validateData)
                ->withInput();
        }
        $dataUpdate = Page::findOrFail($id);

        $updatePages = $request->all(); 
        $dataUpdate->update($updatePages);
        return back()->with('message',' Chỉnh sửa thành công ?');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = auth()->user();
        $userPermissions = json_decode($user->permission, true);
        if ($user && is_array($userPermissions) && in_array("delete_Page", $userPermissions)) {
        Page::destroy($id);
        return back()->with('message' , 'xóa thành công');   
    } else {
        return view('client.errors');
    }
    }
}
