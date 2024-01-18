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
            <h1 style="text-align: center;">Danh sách sản phẩm</h1>
            <a style="margin-left: 50px;" type="button" class="btn btn-info" href="{{ route('categorys.index') }}">Về Trang chủ</a>
            <form style="padding: 20px 50px;" action="{{ route('categorys.update', ['category' => $editCategorys->id]) }}" method="post" enctype="multipart/form-data" >
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Tên nhà cung cấp</label>
                    <input type="text" name="name" class="form-control" id="exampleFormControlInput1" placeholder="nhập tên sản phẩm.." value="{{$editCategorys->name}}">
                </div>
                @error('name')
                <div class="col-3 alert alert-info">{{ Str::limit($message, 50) }}</div>
                @enderror
                <div class="mb-3">
                <input class="form-control" type="file" name="image" value="{{$editCategorys->image}}" >
                    <img src="{{ asset('img/'.$editCategorys->image) }}" alt="Product Image" style="max-width: 200px; max-height: 200px;">
                </div>
                @error('image')
                <div class="col-3 alert alert-info">{{ Str::limit($message, 50) }}</div>
                @enderror
                <label for="exampleFormControlSelect1" class="ms-0">Parent Name</label>
                <select name="parent_id" class="form-control" id="exampleFormControlSelect1">
                    <option value="">Chọn Parent </option>
                    @foreach($parents as $parent)
                    <option value="{{ $parent->id }}" {{ $editCategorys->parent_id == $parent->id ? 'selected' : '' }}> {{ $parent->name }}</option>
                    @endforeach
                </select>
                @error('parent_id')
                <div class="col-3 alert alert-info">{{ Str::limit($message, 50) }}</div>
                @enderror
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Slug</label>
                    <input type="text" name="slug" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com" value="{{$editCategorys->slug}}">
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlSelectStatus" class="form-label">Status</label>
                    <select name="status" class="form-control" id="exampleFormControlSelectStatus">
                        <option value="1" {{ $editCategorys->status == 1 ? 'selected' : '' }}>Không hoạt động</option>
                        <option value="2" {{ $editCategorys->status == 2 ? 'selected' : '' }}>Hoạt động</option>
                    </select>
                </div>

                <button type="submit" class="btn btn-primary">Chỉnh sửa</button>
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