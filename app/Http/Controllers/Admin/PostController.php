<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Validator;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = auth()->user();
        $userPermissions = json_decode($user->permission, true);
        if ($user && is_array($userPermissions) && in_array("show_Post", $userPermissions)) {
            $posts = Post::paginate(5);
            $posts->onEachSide(5);

            // dd($posts);
            return view('admin.posts.index', compact('posts'));
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
        if ($user && is_array($userPermissions) && in_array("create_Post", $userPermissions)) {
            return view('admin.posts.create');
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
            'description' => 'required|string|max:255',
            'image' => 'required',
            'detail' => 'required',
            'date' => 'required',
        ], [
            'name.required' => 'Vui lòng nhập tên đầy đủ',
            'name.string' => 'Tên đầy đủ phải là một chuỗi',
            'name.regex' => 'Tên đầy đủ chỉ được chứa chữ cái và dấu cách',
            'description.required' => 'Vui lòng nhập mô tả',
            'description.string' => 'Mô tả phải là một chuỗi',
            'description.max' => 'Mô tả không được vượt quá 255 ký tự',
            'image.required' => 'Vui lòng nhập ảnh',
            'date.required' => 'Vui lòng nhập chọn ngày tháng năm',
            'detail.required' => 'Vui lòng nhập thông tin chi tiết',
        ]);
        if ($validateData->fails()) {
            return redirect('posts/create')
                ->withErrors($validateData)
                ->withInput();
        }

        $post = $request->all();
        $create = Post::create($post);
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
        if ($user && is_array($userPermissions) && in_array("edit_Post", $userPermissions)) {
            $editPosts = Post::find($id);
            return view('admin.posts.update', compact('editPosts'));
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
            'description' => 'required|string|max:255',
            // 'image' => 'required',
            'detail' => 'required',
            'date' => 'required',
        ], [
            'name.required' => 'Vui lòng nhập tên đầy đủ',
            'name.string' => 'Tên đầy đủ phải là một chuỗi',
            'description.required' => 'Vui lòng nhập mô tả',
            'description.string' => 'Mô tả phải là một chuỗi',
            'description.max' => 'Mô tả không được vượt quá 255 ký tự',
            // 'image.required' => 'Vui lòng nhập ảnh',
            'date.required' => 'Vui lòng nhập chọn ngày tháng năm',
            'detail.required' => 'Vui lòng nhập thông tin chi tiết',
        ]);
        if ($validateData->fails()) {
            return redirect()->route('posts.edit', $id)

                ->withErrors($validateData)
                ->withInput();
        }
        $products = Post::findOrFail($id);


        if ($request->hasFile('image')) {
            $image = $request->file('image');
            // $imageName = $id . '.' . $image->getClientOriginalExtension();
            $imageName = $image->getClientOriginalName();
            $image->move(public_path('img'), $imageName);
            $products->image = $imageName;
        }

        $dataUpdate = $request->except(['_token', '_method', 'image']);

        $products->update($dataUpdate);
        return back()->with('message', ' Chỉnh sửa thành công ?');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = auth()->user();
        $userPermissions = json_decode($user->permission, true);
        if ($user && is_array($userPermissions) && in_array("delete_Post", $userPermissions)) {
            Post::destroy($id);
            return back()->with('message', 'xóa thành công');
        } else {
            return view('client.errors');
        }
    }
}
