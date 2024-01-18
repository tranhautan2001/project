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
<!-- Đúng: integrity với thuật toán sha384 -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">

<!-- Đúng: integrity với thuật toán sha384 -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>

    
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">

  <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">

  <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">

  <link rel="stylesheet" href="{{ asset('plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">


</head>

<body>


  <div class="wrapper">



    @include('admin.layouts.navbar')


    @include('admin.layouts.sidebar')

    <div class="content-wrapper iframe-mode" data-widget="iframe" data-loading-screen="750">
      <h1> Danh sách sản phẩm</h1>
      <a type="button" class="btn btn-info" href="{{ route('users.create') }}">Thêm mới</a>

      <div class="card">
        <div class="table-responsive">
          <table class="table align-items-center mb-0">
            <thead>
              <tr>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">#</th>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Name</th>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">EMAIL</th>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">PHONE</th>           
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">ADDRESS</th>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">GENDER</th>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">ROLE</th>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">EDIT</th>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">DELETE</th>
                <th></th>
              </tr>
            </thead>
            <tbody>
              @foreach($users as $user)
              <tr>
                <td>{{$user->id}}</td>
                <td>{{$user->name}}</td>
                <td>{{$user->email}}</td>
                <td>{{$user->phone}}</td>
                <td>{{$user->address}}</td>
                <td>{{$user->gender}}</td>
                <td>{{$user->role}}</td>
                

           
                <td scope="row">
                  <form action="{{ route('users.edit', $user->id) }}" method="GET">
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
                     Bạn có muốn xóa người dùng này hay không ?
                    </div> 
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                      <form action="{{ route('users.destroy', $user->id) }}" method="POST">
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
          {{ $users->links('pagination::bootstrap-5') }}  
        </div>
      </div>
    </div>
    @include('admin.layouts.footer')


  </div>


  @include('admin.layouts.script')
</body>

</html>