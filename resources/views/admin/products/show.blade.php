<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Arabica</title>

    <style>
        .img-fluidl {
            max-width: 100px;
            height: auto;
        }
       
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
            <a type="button" class="btn btn-info" href="{{ route('products.index') }}">Về Trang chủ</a>
            <h1>Product Detail</h1>
        <div class="card">
        <img class="img-fluidl" src="{{ asset('img/'.$showProduct->img) }}" alt="Ảnh sản phẩm">
            <div class="card-body">
                <h5 class="card-title">Product Name : {{$showProduct->name}}</h5>
                <p class="card-text">Price: {{$showProduct->price}}</p>
                <p class="card-text">size:{{$showProduct->size}}</p>
                <p class="card-text">material:{{$showProduct->material}}</p>
                <p class="card-text">perimeter:{{$showProduct->perimeter}}</p>
                <p class="card-text">slug:{{$showProduct->slug}}</p>
                <p class="card-text">status:{{$showProduct->status}}</p>
                
            </div>
        </div>
        </div>
        @include('admin.layouts.footer')
    </div>
    @include('admin.layouts.script')
</body>

</html>