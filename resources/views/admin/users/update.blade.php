<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Arabica</title>

    </style>

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
            <h1 style="text-align: center;">Danh sách sản phẩm</h1>
            <a style="margin-left: 50px;" type="button" class="btn btn-info" href="{{ route('users.index') }}">Về Trang chủ</a>
            <form style="padding: 20px 50px;" action="{{ route('users.update', $users->id) }}" method="post">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Tên người dùng</label>
                    <input type="text" name="name" class="form-control" id="exampleFormControlInput1" value="{{ $users->name }}">
                </div>
                @error('name')
                <div class="col-3 alert alert-info">{{ Str::limit($message, 50) }}</div>
                @enderror
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Email </label>
                    <input type="text" name="email" class="form-control" id="exampleFormControlInput1" value="{{ $users->email }}">
                </div>
                @error('email')
                <div class="col-3 alert alert-info">{{ Str::limit($message, 50) }}</div>
                @enderror
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Số điện thoại</label>
                    <input type="text" name="phone" class="form-control" id="exampleFormControlInput1" value="{{ $users->phone }}">
                </div>
                @error('phone')
                <div class="col-3 alert alert-info">{{ Str::limit($message, 50) }}</div>
                @enderror
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Địa chỉ</label>
                    <input type="text" name="address" class="form-control" id="exampleFormControlInput1" value="{{ $users->address }}">
                </div>
                @error('address')
                <div class="col-3 alert alert-info">{{ Str::limit($message, 50) }}</div>
                @enderror
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Giới tính</label>
                    <input type="radio" name="gender" value="Nam" {{ $users->gender == 'Nam' ? 'checked' : '' }}>Nam
                    <input type="radio" name="gender" value="Nữ" {{ $users->gender == 'Nữ' ? 'checked' : '' }}>Nữ

                </div>
                @error('gender')
                <div class="col-3 alert alert-info">{{ Str::limit($message, 50) }}</div>
                @enderror
                <!-- <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Ngày sinh</label>
                    <input type="date" name="date_of_birth" class="form-control" id="exampleFormControlInput1" value="{{ $users->date_of_birth }}">
                </div> -->
                <div class="form-check">
                        @foreach($userPermissions as $permission)
                        <input class="form-check-input" {{ $users->email  == 'Admin@gmail.com' ? 'disabled' : '' }} type="checkbox" name="permissions[]" value="{{ $permission }}" id="{{ $permission }}" {{ is_array($userPermissions) && in_array($permission, $userPermissions) ? 'checked' : '' }}>
                        <label class="form-check-label" for="{{ $permission }}">
                            {{ $permission }}
                        </label><br>
                        @endforeach
                </div>
                <button type="submit" class="btn btn-primary">Thêm update</button>
            </form>
            @if(Session::has('message'))
            <script>
                swal("Chỉnh sửa", "{{Session::get('message')}}", 'info', {
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