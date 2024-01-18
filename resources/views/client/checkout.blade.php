<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/checkout.min.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>

<body>
    @include('client.header')
    <div class="container">
        <ul class="ul">
            <li><a href="/">Trang Chủ</a> <i class="fas fa-angle-right"></i></li>
            <li class="opacity">Thanh toán
            </li>
        </ul>
    </div>
    <div class="container">
        <div class="title">
            <p>Đăng nhập để nhận ưu đãi khi mua hàng! <a href="">Đăng nhập</a></p>
            <p>Bạn chưa có tài khoản? <a href="">Đăng ký</a></p>
        </div>
    </div>
    <div class="container">
        <div class="checkout">
            <form action="{{ route('oders.store') }}" method="post">
                @csrf
                <div class="checkout__left">
                    <div class="checkout__left--title">
                        <span>THÔNG TIN LIÊN HỆ</span>
                    </div>

                    <div class="checkout__left--row">
                        <label>Tên người nhận *</label>
                        <input type="text" name="customer_name" placeholder="Tên người nhận">
                    </div>
                    @error('customer_name')
                    <div class="col-3 alert alert-info" style="color:red">{{ Str::limit($message, 50) }}</div>
                    @enderror
                    <div class="checkout__left--row1">
                        <div class="col--6">
                            <label>Email người nhận *</label>
                            <input type="text" name="customer_email" placeholder="Email người nhận">
                        </div>
                       
                        <div class="col--6">
                            <label>Số điện thoại người nhận *</label>
                            <input type="text" name="customer_phone" placeholder="Số điện thoại người nhận">
                        </div>
                       
                    </div>
                    <div class="checkout__left--row1">
                        <div class="col--6">
                        @error('customer_email')
                        <div class="col-3 alert alert-info" style="color:red">{{ Str::limit($message, 50) }}</div>
                        @enderror
                        </div>
                       
                        <div class="col--6">
                        @error('customer_phone')
                        <div class="col-3 alert alert-info" style="color:red">{{ Str::limit($message, 50) }}</div>
                        @enderror
                        </div>
                       
                    </div>
                 
                       
                    <div class="checkout__left--row1">
                        <div class="col--6">
                            <label>Tỉnh/ Thành *</label>
                            <!-- <input type="text" placeholder="Tỉnh/ Thành "> -->
                            <select name="province_id" id="province_id">
                                <option value="">Chọn tỉnh thành</option>
                                @foreach($provinces as $province)
                                <option value="{{ $province->id}}">{{ $province->name ?? ''}}</option>
                                @endforeach
                            </select>
                        </div>
                       
                        <div class="col--6">
                            <label>Quận/ Huyện *</label>
                            <!-- <input type="text" placeholder="Quận/ Huyện "> -->

                            <select name="district_id" id="district_id">
                                <option value="">Chọn quận huyện</option>
                            </select>
                        </div>
                    </div>
                    <div class="checkout__left--row1">
                        <div class="col--6">
                        @error('province_id')
                        <div class="col-3 alert alert-info" style="color:red">{{ Str::limit($message, 50) }}</div>
                        @enderror
                        </div>
                       
                        <div class="col--6">
                        @error('district_id')
                        <div class="col-3 alert alert-info" style="color:red">{{ Str::limit($message, 50) }}</div>
                        @enderror
                        </div>
                    </div>
                 
                    <div class="checkout__left--row1">
                        <div class="col--6">
                            <label>Xã/ Phường *</label>

                            <select name="wards_id" id="wards_id">
                                <option value="">Chọn xã/phường</option>
                            </select>
                        </div>
                        <div class="col--6">
                            <label>Địa chỉ *</label>
                            <input type="text" name="customer_customer" placeholder="Địa chỉ">
                        </div>
                  
                    </div>
                    <div class="checkout__left--row1">
                        <div class="col--6">
                        @error('wards_id')
                        <div  class="col-3 alert alert-info" style="color:red">{{ Str::limit($message, 50) }}</div>
                        @enderror
                        </div>
                        <div class="col--6">
                        @error('customer_customer')
                        <div  class="col-3 alert alert-info" style="color:red">{{ Str::limit($message, 50) }}</div>
                        @enderror
                        </div>
                  
                    </div>
                  
                    <div class="checkout__left--textarea ">
                        <textarea name="customer_status" placeholder="Ghi chú ở dây ..."></textarea>
                    </div>
                    @error('customer_status')
                        <div class="col-3 alert alert-info" style="color:red">{{ Str::limit($message, 50) }}</div>
                        @enderror
                    <div class="checkout__left--title">
                        <span>PHƯƠNG THỨC THANH TOÁN</span>
                    </div>
                    <div class="checkout__left--row2">
                        <input type="radio" checked>
                        <p>Thanh toán khi nhận hàng (COD)</p>
                    </div>
                </div>

                <div class="checkout__right">
                    <div class="checkout__right--request">
                        <input type="checkbox"> <label for="">Yêu cầu xuất hoá đơn</label>
                        <br> <label class="label">Yêu cầu xuất hoá đơn điện tử</label>
                    </div>
                    <div class="checkout__right--description">
                        <div class="description--title">
                            <div class="img"><svg xmlns="http://www.w3.org/2000/svg" width="23.319" height="28.117" viewBox="0 0 23.319 28.117">
                                    <g id="bill" transform="translate(-394.57 -270)">
                                        <path id="Path_296" data-name="Path 296" d="M642.758,963.276h12.626a.578.578,0,0,0,0-1.156H642.758a.578.578,0,0,0,0,1.156Z" transform="translate(-242.841 -678.791)"></path>
                                        <path id="Path_297" data-name="Path 297" d="M642.758,580.426h6.524a.578.578,0,0,0,0-1.156h-6.524a.578.578,0,0,0,0,1.156Z" transform="translate(-242.841 -303.314)"></path>
                                        <path id="Path_298" data-name="Path 298" d="M642.758,1154.706h12.626a.578.578,0,1,0,0-1.156H642.758a.578.578,0,1,0,0,1.156Z" transform="translate(-242.841 -866.534)"></path>
                                        <path id="Path_299" data-name="Path 299" d="M642.758,771.856h6.524a.578.578,0,1,0,0-1.155h-6.524a.578.578,0,1,0,0,1.155Z" transform="translate(-242.841 -491.057)"></path>
                                        <path id="Path_300" data-name="Path 300" d="M642.758,1346.135h12.626a.578.578,0,1,0,0-1.156H642.758a.578.578,0,1,0,0,1.156Z" transform="translate(-242.841 -1054.278)"></path>
                                        <path id="Path_301" data-name="Path 301" d="M417.311,270H395.148a.578.578,0,0,0-.578.578V295.55a.578.578,0,0,0,.341.527l4.433,1.989a.577.577,0,0,0,.473,0l4.2-1.883,4.2,1.883a.577.577,0,0,0,.473,0l4.2-1.883,4.2,1.883a.578.578,0,0,0,.814-.527V270.578A.577.577,0,0,0,417.311,270Zm-.578,26.647-3.618-1.624a.577.577,0,0,0-.473,0l-4.2,1.883-4.2-1.883a.577.577,0,0,0-.473,0l-4.2,1.883-3.855-1.73V271.156h21.008Z"></path>
                                        <path id="Path_302" data-name="Path 302" d="M1160.419,406.882a.524.524,0,0,1-.524-.524.578.578,0,1,0-1.155,0,1.681,1.681,0,0,0,1.679,1.679h.264v1.077a.578.578,0,1,0,1.156,0v-1.077h.264a1.681,1.681,0,0,0,1.679-1.679v-.49a1.681,1.681,0,0,0-1.679-1.679h-.264v-1.537h.264a.524.524,0,0,1,.524.524.578.578,0,1,0,1.155,0,1.681,1.681,0,0,0-1.679-1.679h-.264v-1.05a.578.578,0,1,0-1.156,0v1.05h-.264a1.681,1.681,0,0,0-1.679,1.679v.49a1.681,1.681,0,0,0,1.679,1.679h.264v1.537Zm0-2.692a.524.524,0,0,1-.524-.524v-.49a.524.524,0,0,1,.524-.524h.264v1.537Zm1.419,1.155h.264a.524.524,0,0,1,.524.524v.49a.524.524,0,0,1-.524.524h-.264Z" transform="translate(-749.453 -127.369)"></path>
                                    </g>
                                </svg></div>
                            <div class="title1">Tóm tắt đơn hàng</div>

                        </div>

                        <div class="description--price">
                            <span class="name1">Sản phẩm</span>
                            <span class="next1">Thành tiền</span>
                        </div>
                        @foreach($carts as $cart)
                        <input type="hidden" name="id[]" value="{{  $cart->id }}">
                        <input type="hidden" name="row_id[]" value="{{  $cart->rowId }}">
                        <input type="hidden" name="name[]" value="{{  $cart->name }}">
                        <input type="hidden" name="qty[]" value="{{  $cart->qty }}">
                        <input type="hidden" name="price[]" value="{{  $cart->price }}">
                        <input type="hidden" name="total[]" value="{{ $cart->qty*$cart->price}}">
                        <div class="description--price">
                            <span class="name1">{{$cart->name }} X {{ $cart->qty}}</span>
                            <span class="next">${{$cart->qty*$cart->price}}</span>

                        </div>
                        @endforeach
                        <div class="description--price">
                            <span class="name1">Tạm tính</span>
                            <span class="next">${{ $totalPrice }}</span>

                        </div>
                        <div class="description--price">
                            <span class="name1">Phí vận chuyển</span>
                            <span class="next">Tính sau </span>

                        </div>
                        <div class="description--price">
                            <span class="name1">Tổng cộng</span>
                            <span class="next">${{ $totalPrice }}</span>

                        </div>

                        <div class="description--button">
                            <a href="{{ route('checkout', $cart->rowId) }}" class="text-payment">
                                <button type="submit" class="btn btn-primary btn-lg btn-block">Hoàn tất</button>
                            </a>
                        </div>
                    </div>
                </div>
            </form>
        </div>

    </div>

    tinrh thanhf


    @include('client.footer')
    @include('client.javascript')
</body>

</html>
<script>
    $(document).ready(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        // Lấy giá trị (ID) của select
        $("#province_id").on("change", function() {
            // Lấy giá trị (ID) của option được chọn
            var province_id = $(this).val();
            $.ajax({
                url: '/get-district',
                type: 'POST',
                data: {
                    province_id: province_id
                },
                success: function(response) {
                    // console.log(response)    
                    // Cập nhật nội dung của div hiển thị danh sách sản phẩm
                    $('#district_id').html(response);
                },
                error: function(xhr, status, error) {
                    console.error(error);
                }
            });
        });
        $("#district_id").on("change", function() {
            // Lấy giá trị (ID) của option được chọn
            var district_id = $(this).val();
            console.log(district_id);
            $.ajax({
                url: '/get-wards',
                type: 'POST',
                data: {
                    district_id: district_id
                },
                success: function(response) {
                    console.log(response)
                    // Cập nhật nội dung của div hiển thị danh sách sản phẩm
                    $('#wards_id').html(response);
                },
                error: function(xhr, status, error) {
                    console.error(error);
                }
            });
        });
    });
</script>