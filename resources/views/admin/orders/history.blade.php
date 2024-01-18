


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
        table{
            padding: 20px;
        }
    </style>

    
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">

  <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">

  <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">

  <link rel="stylesheet" href="{{ asset('plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">

  <!-- CSS only -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous">
  <!-- JavaScript Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-p34f1UUtsS3wqzfto5wAAmdvj+osOnFyQFpp4Ua3gs/ZVWx6oOypYoCJhGGScy+8" crossorigin="anonymous"></script>
</head>

<body>


  <div class="wrapper">



    @include('admin.layouts.navbar')


    @include('admin.layouts.sidebar')

    <div class="content-wrapper iframe-mode" data-widget="iframe" data-loading-screen="750">
      <a type="button" class="btn btn-info" href="{{ route('orders.index') }}">Trờ về</a>

      <div class="card">
    <h1>Trang quản lý đơn hàng</h1>
    <br>
    <div>
      <div>
      </div>
      <table class="table table-striped">
                                                <thead>
                                                    <tr>
                                                        <th scope="col">#</th>
                                                        <th scope="col">Tên</th>
                                                        <th scope="col">Số lượng:</th>
                                                        <th scope="col">Đơn giá:</th>
                                                        <th scope="col">Tổng tiền:</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                @foreach ($productOrders as $productOrder)
                                                    <tr>
                                                        <td scope="row">{{ $productOrder->id }}</td>
                                                        <td scope="row">{{ $productOrder->product->name ?? '' }}</td>
                                                        <td scope="row">{{ $productOrder->quantity }}</td>
                                                        <td scope="row">${{ $productOrder->price }}</td>
                                                        <td scope="row">${{ $productOrder->price*$productOrder->quantity }}</td>
                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
    </div>
  </div>
    </div>
    @include('admin.layouts.footer')


  </div>


  @include('admin.layouts.script')
</body>

</html>