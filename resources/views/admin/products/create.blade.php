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
            <a style="margin-left: 50px;" type="button" class="btn btn-info" href="{{ route('products.index') }}">Về Trang chủ</a>
            <form style="padding: 20px 50px;" action="{{ route('products.store') }}" method="post">
                @csrf
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Tên sản phẩm</label>
                    <input type="text" name="name" class="form-control" id="exampleFormControlInput1" placeholder="nhập tên sản phẩm..">
                </div>
                @error('name')
                <div class="col-3 alert alert-info">{{ Str::limit($message, 50) }}</div>
                @enderror
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Hình ảnh</label>
                    <input type="file" name="img" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
                </div>
                @error('img')
                <div class="col-3 alert alert-info">{{ Str::limit($message, 50) }}</div>
                @enderror
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Size</label>
                    <input type="text" name="size" class="form-control" id="exampleFormControlInput1" placeholder="nhập size sản phẩm..">
                </div>
                @error('size')
                <div class="col-3 alert alert-info">{{ Str::limit($message, 50) }}</div>
                @enderror
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Chất liệu</label>
                    <input type="text" name="material" class="form-control" id="exampleFormControlInput1" placeholder="nhập chất liệu sản phẩm..">
                </div>
                @error('material')
                <div class="col-3 alert alert-info">{{ Str::limit($message, 50) }}</div>
                @enderror
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Chu vi bóng</label>
                    <input type="text" name="perimeter" class="form-control" id="exampleFormControlInput1" placeholder="nhập chu vi sản phẩm..">
                </div>
                @error('perimeter')
                <div class="col-3 alert alert-info">{{ Str::limit($message, 50) }}</div>
                @enderror
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Giá</label>
                    <input type="text" name="price" class="form-control" id="exampleFormControlInput1" placeholder="nhập giá sản phẩm..">
                </div>
                @error('price')
                <div class="col-3 alert alert-info">{{ Str::limit($message, 50) }}</div>
                @enderror
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Giá sale</label>
                    <input type="text" name="sale" class="form-control" id="exampleFormControlInput1" placeholder="nhập giá sale sản phẩm..">
                </div>
                @error('sale')
                <div class="col-3 alert alert-info">{{ Str::limit($message, 50) }}</div>
                @enderror
                <div class="mb-3">
                    <label for="exampleFormControlSelectStatus" class="form-label">Status</label>
                    <select name="status" class="form-control" id="exampleFormControlSelectStatus">
                        <option value="1" {{ old('status') == 1 ? 'selected' : '' }}>Không hoạt động</option>
                        <option value="2" {{ old('status') == 2 ? 'selected' : '' }}>Hoạt động</option>
                    </select>
                
                </div>
                @error('status')
                <div class="col-3 alert alert-info">{{ Str::limit($message, 50) }}</div>
                @enderror
                <div class="mb-3">
                    <label for="exampleFormControlSelectStatus" class="form-label">StockStatus</label>
                    <select name="stock_status" class="form-control" id="exampleFormControlSelectStatus">
                        <option value="1" {{ old('stock_status') == 1 ? 'selected' : '' }}>Không còn hàng</option>
                        <option value="2" {{ old('stock_status') == 2 ? 'selected' : '' }}>Còn hàng</option>
                    </select>
                </div>
                @error('stock_status')
                <div class="col-3 alert alert-info">{{ Str::limit($message, 50) }}</div>
                @enderror
                <div class="mb-3">
                    <label for="exampleFormControlSelectSupplier" class="form-label">Supplier</label>
                    <select name="supplier_id" class="form-control" id="exampleFormControlSelectSupplier">
                        <option value="" {{ old('supplier_id') == '' ? 'selected' : '' }}>Chọn một nhà cung cấp</option>
                        @foreach($dataSuppliers as $dataSupplier)
                        <option value="{{ $dataSupplier->id }}" {{ old('supplier_id') == $dataSupplier->id ? 'selected' : '' }}>
                            {{ $dataSupplier->name }}
                        </option>
                        @endforeach
                    </select>
                </div>
                @error('supplier_id')
                <div class="col-3 alert alert-info">{{ Str::limit($message, 50) }}</div>
                @enderror
                <div class="mb-3">
                    <label for="exampleFormControlSelectSupplier" class="form-label">Category</label>
                    <select name="category_id" class="form-control" id="exampleFormControlSelectSupplier">
                        <option value="" {{ old('category_id') == '' ? 'selected' : '' }}>Danh mục sản phẩm</option>
                        @foreach($dataCategorys as $dataCategory)
                        <option value="{{ $dataCategory->id }}" {{ old('category_id') == $dataCategory->id ? 'selected' : '' }}>
                            {{ $dataCategory->name }}
                        </option>
                        @endforeach
                    </select>
                </div>
                @error('category_id')
                <div class="col-3 alert alert-info">{{ Str::limit($message, 50) }}</div>
                @enderror
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