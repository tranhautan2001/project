<div class="wrapper">
        @include('admin.layouts.navbar')
        @include('admin.layouts.sidebar')
        <div class="content-wrapper iframe-mode" data-widget="iframe" data-loading-screen="750">
            <h1 style="text-align: center;">Danh sách sản phẩm</h1>
            <a style="margin-left: 50px;"  type="button" class="btn btn-info" href="{{ route('pages.index') }}">Về Trang chủ</a>
            <form style="padding: 20px 50px;" action="{{ route('pages.store') }}" method="post">
                @csrf
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Tên Trang</label>
                    <input type="text" name="name" class="form-control" id="exampleFormControlInput1" placeholder="vui lòng nhập tên trang">
                </div>
                @error('name')
                <div class="col-3 alert alert-info">{{ Str::limit($message, 50) }}</div>
                @enderror
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Chi tiết</label>
                    <input type="text" name="detail" class="form-control" id="exampleFormControlInput1" placeholder="vui lòng nhập chi tiết">
                </div>
                @error('detail')
                <div class="col-3 alert alert-info">{{ Str::limit($message, 50) }}</div>
                @enderror
                <div class="mb-3">
                    <label for="exampleFormControlSelectStatus" class="form-label">Trạng thái</label>
                    <select name="status" class="form-control" id="exampleFormControlSelectStatus">
                        <option value="1" {{ old('status') == 1 ? 'selected' : '' }}>Không hoạt động</option>
                        <option value="2" {{ old('status') == 2 ? 'selected' : '' }}>Hoạt động</option>
                    </select>
                </div>
               
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