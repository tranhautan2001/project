  <div class="wrapper">



    @include('admin.layouts.navbar')


    @include('admin.layouts.sidebar')

    <div class="content-wrapper iframe-mode" data-widget="iframe" data-loading-screen="750">
      <h1> Danh sách sản phẩm</h1>
      <a type="button" class="btn btn-info" href="{{ route('suppliers.create') }}">Thêm mới</a>

      <div class="card">
        <div class="table-responsive">
          <table class="table align-items-center mb-0">
            <thead>
              <tr>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">#</th>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Tên nhà cung cấp</th>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">SLUG</th>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Trạng thái</th>           
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">EDIT</th>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">DELETE</th>
                <th></th>
              </tr>
            </thead>
            <tbody>
              @foreach($suppliers as $supplier)
              <tr>
                <td>{{$supplier->id}}</td>
                <td>{{$supplier->name}}</td>
                <td>{{$supplier->slug}}</td>
                <td>{{$supplier->status}}</td>
                

           
                <td scope="row">
                  <form action="{{ route('suppliers.edit', $supplier->id) }}" method="GET">
                    @csrf
                    <button class="btn btn-outline-danger" type="submit">Edit</button>
                  </form>
                </td>
                <td scope="row">
                  <form action="{{ route('suppliers.destroy', $supplier->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-outline-danger" type="submit">Detele</button>
                  </form>
                </td>
                
              </tr>
              @endforeach
            </tbody>
          </table>
          {{$suppliers->links('pagination::bootstrap-5')}}
        </div>
      </div>
    </div>
    @include('admin.layouts.footer')


  </div>


  @include('admin.layouts.script')
  @if(Session::has('message'))
    <script>
        swal("Xóa nhà cung cấp", "{{Session::get('message')}}", 'error', {
            button: true,
            button: "OK",
            timer: 3000,
            dangerMode: true,
        });
    </script>
    @endif