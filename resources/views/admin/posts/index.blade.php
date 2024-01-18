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
      <h1> Danh sách Tin tức</h1>
      <a type="button" class="btn btn-info" href="{{ route('posts.create') }}">Thêm mới</a>

      <div class="card">
        <div class="table-responsive">
          <table class="table align-items-center mb-0">
            <thead>
              <tr>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">#</th>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Tên tin tức</th>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Hình ảnh</th>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Mô tả</th>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Ngày tháng</th>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Chi tiết</th>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Trạng thái</th>           
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Chỉnh sửa</th>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Xóa</th>
                <th></th>
              </tr>
            </thead>
            <tbody>
              @foreach($posts as $post)
              <tr>
                <td>{{$post->id}}</td>
                <td>{{$post->name}}</td>
                <td><img class="img-fluidl" src="{{ asset('img/'.$post->image) }}" alt="Ảnh sản phẩm"></td>
                <td>{{$post->description}}</td>
                <td>{{$post->date}}</td>  
                <td>{{$post->detail}}</td>
                <td>{{$post->status}}</td>
                

           
                <td scope="row">
                  <form action="{{ route('posts.edit', $post->id) }}" method="GET">
                    @csrf
                    <button class="btn btn-outline-danger" type="submit">Edit</button>
                  </form>
                </td>
                <td scope="row">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                 Delete
                </button>
                </td>
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Modal Xóa</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                     Bạn có muốn xóa trang tin tức này hay không ?
                    </div> 
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                      <form action="{{ route('posts.destroy', $post->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-outline-danger" type="submit">Detele</button>
                  </form>                 </div>
                  </div>
                </div>
              </div>
              </tr>
              @endforeach
            </tbody>
          </table>
          {{$posts->links('pagination::bootstrap-5')}}

        </div>    
      </div>
    </div>
    @include('admin.layouts.footer')


  </div>


  @include('admin.layouts.script')
  @include('admin.layouts.script')
  @if(Session::has('message'))
    <script>
        swal("Xóa tin tức", "{{Session::get('message')}}", 'error', {
            button: true,
            button: "OK",
            timer: 3000,
            dangerMode: true,
        });
    </script>
    @endif
</body>

</html>