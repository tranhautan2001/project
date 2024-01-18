<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Arabica</title>


    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">

    <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">

    <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">

    <link rel="stylesheet" href="{{ asset('plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>

    <div class="wrapper">
        @include('admin.layouts.navbar')
        @include('admin.layouts.sidebar')
        <div class="content-wrapper iframe-mode" data-widget="iframe" data-loading-screen="750">
            <h1 style="text-align: center;">Danh sách người dùng</h1>
            <a style="margin-left: 50px;" type="button" class="btn btn-info" href="{{ route('users.index') }}">Về Trang chủ</a>
            <form style="padding: 20px 50px;" action="{{ route('users.store') }}" method="post">
                @csrf
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Tên người dùng</label>
                    <input type="text" name="name" class="form-control" id="exampleFormControlInput1" placeholder="nhập tên sản phẩm..">
                </div>
                @error('name')
                <div class="col-3 alert alert-info">{{ Str::limit($message, 50) }}</div>
                @enderror
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Email </label>
                    <input type="text" name="email" class="form-control" id="exampleFormControlInput1" placeholder="nhập email">
                </div>
                @error('email')
                <div class="col-3 alert alert-info">{{ Str::limit($message, 50) }}</div>
                @enderror
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Mật khẩu </label>
                    <input type="text" name="password" class="form-control" id="exampleFormControlInput1" placeholder="nhập mật khẩu">
                </div>
                @error('password')
                <div class="col-3 alert alert-info">{{ Str::limit($message, 50) }}</div>
                @enderror
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Số điện thoại</label>
                    <input type="text" name="phone" class="form-control" id="exampleFormControlInput1" placeholder="nhập số điện thoại">
                </div>
                @error('phone')
                <div class="col-3 alert alert-info">{{ Str::limit($message, 50) }}</div>
                @enderror
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Địa chỉ</label>
                    <input type="text" name="address" class="form-control" id="exampleFormControlInput1" placeholder="nhập địa chỉ">
                </div>
                @error('address')
                <div class="col-3 alert alert-info">{{ Str::limit($message, 50) }}</div>
                @enderror
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Giới tính</label>
                    <input type="radio" name="gender" value="Nam" id="exampleFormControlInput1" >Nam
                    <input type="radio" name="gender"  value="Nữ" id="exampleFormControlInput1" >Nữ 
       
                </div>
                @error('gender')
                <div class="col-3 alert alert-info">{{ Str::limit($message, 50) }}</div>
                @enderror
                <!-- <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Ngày sinh</label>
                    <input type="date" name="date_of_birth" class="form-control" id="exampleFormControlInput1">
                </div> -->
                <div class="form-group">
                    <label for="">Role</label>
                    <!-- <div class="form-check">
                        <input class="form-check-input" name="role" type="checkbox" value="user">
                        <label  for="customCheck1">User</label>
                    </div> -->
                    <div class="form-check">
                        <input class="form-check-input" name="role" checked type="checkbox" value="admin">
                        <label  for="customCheck1">Admin</label>
                    </div>

                </div>
                <div class="form-group">
        <label for="">Permisson US</label><br>
        <div class="form-check" style="display: inline-block; ">
          <input class="form-check-input" name="permission[]" type="checkbox" value="show_User">
          <label  for="customCheck1">ShowUser</label>
        </div>
        <div class="form-check" style="display: inline-block;">
          <input class="form-check-input" name="permission[]" type="checkbox" value="create_User">
          <label  for="customCheck1">CreateUser</label>
        </div>
        <div class="form-check" style="display: inline-block;">
          <input class="form-check-input" name="permission[]" type="checkbox" value="edit_User">
          <label  for="customCheck1">EditUser</label>
        </div>
        <div class="form-check" style="display: inline-block;">
          <input class="form-check-input" name="permission[]" type="checkbox" value="delete_User">
          <label  for="customCheck1">DeleteUser</label>
        </div>
        <br>
        <label for="">Permisson PR</label><br>
        <div class="form-check" style="display: inline-block; ">
          <input class="form-check-input" name="permission[]" type="checkbox" value="show_product">
          <label  for="customCheck1">ShowProduct</label>
        </div>
        <div class="form-check" style="display: inline-block;">
          <input class="form-check-input" name="permission[]" type="checkbox" value="create_product">
          <label  for="customCheck1">CreateProduct</label>
        </div>
        <div class="form-check" style="display: inline-block;">
          <input class="form-check-input" name="permission[]" type="checkbox" value="edit_product">
          <label  for="customCheck1">EditProduct</label>
        </div>
        <div class="form-check" style="display: inline-block;">
          <input class="form-check-input" name="permission[]" type="checkbox" value="delete_product">
          <label  for="customCheck1">DeleteProduct</label>
        </div>

        <br>
        <label for="">Permisson CT</label><br>
        <div class="form-check" style="display: inline-block; ">
          <input class="form-check-input" name="permission[]" type="checkbox" value="show_Category">
          <label  for="customCheck1">ShowCategory</label>
        </div>
        <div class="form-check" style="display: inline-block;">
          <input class="form-check-input" name="permission[]" type="checkbox" value="create_Category">
          <label  for="customCheck1">CreateCategory</label>
        </div>
        <div class="form-check" style="display: inline-block;">
          <input class="form-check-input" name="permission[]" type="checkbox" value="edit_Category">
          <label  for="customCheck1">EditCategory</label>
        </div>
        <div class="form-check" style="display: inline-block;">
          <input class="form-check-input" name="permission[]" type="checkbox" value="delete_Category">
          <label  for="customCheck1">DeleteCategory</label>
        </div>
        <br>
        <label for="">Permisson SP</label><br>
        <div class="form-check" style="display: inline-block; ">
          <input class="form-check-input" name="permission[]" type="checkbox" value="show_Supplier">
          <label  for="customCheck1">ShowSupplier</label>
        </div>
        <div class="form-check" style="display: inline-block;">
          <input class="form-check-input" name="permission[]" type="checkbox" value="create_Supplier">
          <label  for="customCheck1">CreateSupplier</label>
        </div>
        <div class="form-check" style="display: inline-block;">
          <input class="form-check-input" name="permission[]" type="checkbox" value="edit_Supplier">
          <label  for="customCheck1">EditSupplier</label>
        </div>
        <div class="form-check" style="display: inline-block;">
          <input class="form-check-input" name="permission[]" type="checkbox" value="delete_Supplier">
          <label  for="customCheck1">DeleteSupplier</label>
        </div>
        <br>
        <label for="">Permisson PG</label><br>
        <div class="form-check" style="display: inline-block; ">
          <input class="form-check-input" name="permission[]" type="checkbox" value="show_Page">
          <label  for="customCheck1">ShowPage</label>
        </div>
        <div class="form-check" style="display: inline-block;">
          <input class="form-check-input" name="permission[]" type="checkbox" value="create_Page">
          <label  for="customCheck1">CreatePage</label>
        </div>
        <div class="form-check" style="display: inline-block;">
          <input class="form-check-input" name="permission[]" type="checkbox" value="edit_Page">
          <label  for="customCheck1">EditPage</label>
        </div>
        <div class="form-check" style="display: inline-block;">
          <input class="form-check-input" name="permission[]" type="checkbox" value="delete_Page">
          <label  for="customCheck1">DeletePage</label>
        </div>
        <br>
        <label for="">Permisson POST</label><br>
        <div class="form-check" style="display: inline-block; ">
          <input class="form-check-input" name="permission[]" type="checkbox" value="show_Post">
          <label  for="customCheck1">ShowPost</label>
        </div>
        <div class="form-check" style="display: inline-block;">
          <input class="form-check-input" name="permission[]" type="checkbox" value="create_Post">
          <label  for="customCheck1">CreatePost</label>
        </div>
        <div class="form-check" style="display: inline-block;">
          <input class="form-check-input" name="permission[]" type="checkbox" value="edit_Post">
          <label  for="customCheck1">EditPost</label>
        </div>
        <div class="form-check" style="display: inline-block;">
          <input class="form-check-input" name="permission[]" type="checkbox" value="delete_Post">
          <label  for="customCheck1">DeletePost</label>
        </div>
        <br>
        <label for="">Permisson Order</label><br>
        <div class="form-check" style="display: inline-block; ">
          <input class="form-check-input" name="permission[]" type="checkbox" value="show_Order">
          <label  for="customCheck1">ShowOrder</label>
        </div>
        <div class="form-check" style="display: inline-block;">
          <input class="form-check-input" name="permission[]" type="checkbox" value="showDetail_Order">
          <label  for="customCheck1">CreateOrder</label>
        </div>
      </div>

                <button type="submit" class="btn btn-primary">Thêm mới</button>
            </form>
            @if(Session::has('message'))
            <script> 
                swal("THÊM MỚI", "{{Session::get('message')}}", 'success', {
                    button: true,
                    button: "OK",
                    timer: 3000,
                    dangerMode: true,
                });
            </script>
            @endif
        </div>
        @include('admin.layouts.footer')
    </div>
    @include('admin.layouts.script')
</body>

</html>