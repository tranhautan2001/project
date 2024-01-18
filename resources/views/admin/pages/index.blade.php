<div class="wrapper">



  @include('admin.layouts.navbar')


  @include('admin.layouts.sidebar')

  <div class="content-wrapper iframe-mode" data-widget="iframe" data-loading-screen="750">
    <h1> Danh sách Trang</h1>
    <a type="button" class="btn btn-info" href="{{ route('pages.create') }}">Thêm mới</a>

    <div class="card">
      <div class="table-responsive">
        <table class="table align-items-center mb-0">
          <thead>
            <tr>
              <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">#</th>
              <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Name</th>
              <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">SLUG</th>
              <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">STATUS</th>
              <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">EDIT</th>
              <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">DELETE</th>
              <th></th>
            </tr>
          </thead>
          <tbody>
            @foreach($pages as $page)
            <tr>
              <td>{{$page->id}}</td>
              <td>{{$page->name}}</td>
              <td>{{$page->detail}}</td>
              <td>{{$page->status}}</td>



              <td scope="row">
                <form action="{{ route('pages.edit', $page->id) }}" method="GET">
                  @csrf
                  <button class="btn btn-outline-danger" type="submit">Edit</button>
                </form>
              </td>
              <td scope="row">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                 Delete
                </button>
              </td>

              <!-- Modal -->
              <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Modal Xóa</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                     Bạn có muốn xóa trang này hay không ?
                    </div> 
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                      <form action="{{ route('pages.destroy', $page->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-outline-danger" type="submit">Detele</button>
                      </form>                    </div>
                  </div>
                </div>
              </div>

            </tr>
            @endforeach
          </tbody>
        </table>
        {{$pages->links('pagination::bootstrap-5')}}

      </div>
    </div>
  </div>
  @include('admin.layouts.footer')


</div>


@include('admin.layouts.script')
@if(Session::has('message'))
<script>
  swal("Xóa trang", "{{Session::get('message')}}", 'error', {
    button: true,
    button: "OK",
    timer: 3000,
    dangerMode: true,
  });
</script>
@endif

<!-- Button trigger modal -->