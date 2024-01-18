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
      <h1> Danh sách sản phẩm</h1>
      <a type="button" class="btn btn-info" href="{{ route('products.create') }}">Thêm mới</a>

      <div class="card">
        <div class="table-responsive">
          <table class="table align-items-center mb-0">
            <thead>
              <tr>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">#</th>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Name</th>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">IMG</th>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">PRICE</th>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">SALE</th>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">STATUS</th>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">CATEGORY</th>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">SUPPLIER</th>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">SHOW</th>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">EDIT</th>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">DELETE</th>
                <th></th>
              </tr>
            </thead>
            <tbody>
              @foreach($Product as $products)
              <tr>
                <td>{{$products->id}}</td>
                <td>{{$products->name}}</td>
                <td><img class="img-fluidl" src="{{ asset('img/'.$products->img) }}" alt="Ảnh sản phẩm"></td>
                <td>{{$products->price}}</td>
                <td>{{$products->sale}}</td>
                <td>{{$products->status}}</td>
                <td>{{ $products->category->name }}</td>
                <td>{{ $products->suppliers->name }}</td>

                <td scope="row">
                  <form action="{{ route('products.show', $products->id) }}" method="get">
                    @csrf

                    <button class="btn btn-outline-danger" type="submit">Show</button>
                  </form>
                </td>
                <td scope="row">
                  <form action="{{ route('products.edit', $products->id) }}" method="GET">
                    @csrf
                    <button class="btn btn-outline-danger" type="submit">Edit</button>
                  </form>
                </td>
                <td scope="row">
                  <form action="{{ route('products.destroy', $products->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-outline-danger" type="submit">Detele</button>
                  </form>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
          {{$Product->links('pagination::bootstrap-5')}}
        </div>
      </div>
    </div>
    @include('admin.layouts.footer')


  </div>


  @include('admin.layouts.script')
  @if(Session::has('message'))
<script>
  swal("Xóa sản phẩm", "{{Session::get('message')}}", 'error', {
    button: true,
    button: "OK",
    timer: 3000,
    dangerMode: true,
  });
</script>
@endif
</body>

</html>