<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Validator;

use Illuminate\Http\Request;

class UserController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index()
    {


        $user = auth()->user();
        $userPermissions = json_decode($user->permission, true);
        if ($user && is_array($userPermissions) && in_array("show_User", $userPermissions)) {
            $users = User::paginate(5);
            $users->onEachSide(5);
            return view('admin.users.index', compact('users'));
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
        if ($user && is_array($userPermissions) && in_array("create_User", $userPermissions)) {
            return view('admin.users.create');
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
            'email' => 'required|email|unique:users,email',
            'password' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'gender' => 'required',
        ], [
            'name.required' => 'Vui lòng nhập tên đầy đủ',
            'name.string' => 'Tên đầy đủ phải là một chuỗi',
            'email.required' => 'Vui lòng nhập email',
            'email.email' => 'Địa chỉ email không hợp lệ',
            'email.unique' => 'Địa chỉ email đã tồn tại', 
            'password.required' => 'Vui lòng nhập mật khẩu',
            'gender.required' => 'Vui lòng chọn giới tính',
        ]);
        
        if ($validateData->fails()) {
            // dd($validateData->errors());
            return redirect('users/create')
                ->withErrors($validateData)
                ->withInput();
        }
        $token = Str::random(32);
        $dataCreate = $request->except('password');
        $dataCreate['password'] = bcrypt($request->password);
        $user = new User([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'gender' => $request->gender,
            'address' => $request->address,
            'permission' => json_encode($request->permission),
            'password' => Hash::make($request->password),
            'token' => $token,
            'role'  => $request->role,
        ]);
        $user->save();
        return back()->with('message', 'thêm mới thành công');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = auth()->user();
        $userPermissions = json_decode($user->permission, true);
        if ($user && is_array($userPermissions) && in_array("edit_User", $userPermissions)) {
            $users = User::find($id);
            $userPermissions = json_decode($users->permission, true);
            return view('admin.users.update', compact('users', 'userPermissions'));
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
            'email' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'gender' => 'required',
        ], [
            'name.required' => 'Vui lòng nhập tên đầy đủ',
            'name.string' => 'Tên đầy đủ phải là một chuỗi',
            'email.required' => 'Vui lòng nhập email',
           
            'gender.required' => 'Vui lòng chọn giới tính',
        ]);
        
        if ($validateData->fails()) {
            // dd($validateData->errors());
            return redirect()->route('users.edit', $id)

                ->withErrors($validateData)
                ->withInput();
        }
        $dataUpdate = User::findOrFail($id);
        $userdata = $request->all();
        $dataUpdate->permission = json_encode($request->input('permissions', []));
        $dataUpdate->update($userdata);

        return back()->with('message', 'chỉnh sửa thành công');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = auth()->user();
        $userPermissions = json_decode($user->permission, true);
        if ($user && is_array($userPermissions) && in_array("delete_User", $userPermissions)) {
            User::destroy($id);
            return back()->with('message', 'Xóa thành công');
        } else {
            return view('client.errors');
        }
    }
}
