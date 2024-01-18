<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/detail.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

</head>
@include('client.header')

<body>
    <div class="container">
        <ul class="ul">
            <li><a href="/">Trang Chủ</a> <i class="fas fa-angle-right"></i></li>
            <li>Bảng điểm thể thao <i class="fas fa-angle-right"></i></li>
            <li class="opacity">{{$products->name}}
            </li>
        </ul>
    </div>

    <div class="container">
        <div class="detail">
            <form action="{{ route('client.carts.add') }}" method="POST">
                @csrf
                <input type="hidden" name="product_id" value="{{ $products->id }}">
                <input type="hidden" name="product_name" value="{{ $products->name }}">
                <input type="hidden" name="product_img" value="{{  asset('img/'.$products->img) }}">


                <input type="hidden" name="product_price" value="{{ $products->price }}"> <!-- Giá trị mặc định cho giá -->
                <div class="detail__left">
                    <div class="detail__left--img"><img src="{{ asset('img/'.$products->img) }}" alt=""></div>
                    <div class="detail__left--thumnails">
                        <img src="https://s101.chanh.in/uploads/2023/10/bl4-large.jpg" loading="lazy" alt="bl4-tiny" width="80" height="80" style="height: 89px;">
                        <img src="https://s101.chanh.in/uploads/2023/10/bl4-large.jpg" loading="lazy" alt="bl4-tiny" width="80" height="80" style="height: 89px;">
                        <img src="https://s101.chanh.in/uploads/2023/10/bl4-large.jpg" loading="lazy" alt="bl4-tiny" width="80" height="80" style="height: 89px;">

                    </div>
                </div>
                <div class="detail__right">
                    <div class="detail__right--title">{{$products->name}}</div>
                    <div class="detail__right--item">
                        <span class="starts"> <svg version="1.1" xmlns="http://www.w3.org/2000/svg" viewBox="0 12.705 512 486.59" x="0px" y="0px" xml:space="preserve" width="20px" height="20px" fill="#E1E1E1" style="margin-left: 1px; width: 15px;">
                                <polygon points="256.814,12.705 317.205,198.566 512.631,198.566 354.529,313.435 414.918,499.295 256.814,384.427 98.713,499.295 159.102,313.435 1,198.566 196.426,198.566 "></polygon>
                            </svg>
                            <svg version="1.1" xmlns="http://www.w3.org/2000/svg" viewBox="0 12.705 512 486.59" x="0px" y="0px" xml:space="preserve" width="20px" height="20px" fill="#E1E1E1" style="margin-left: 1px; width: 15px;">
                                <polygon points="256.814,12.705 317.205,198.566 512.631,198.566 354.529,313.435 414.918,499.295 256.814,384.427 98.713,499.295 159.102,313.435 1,198.566 196.426,198.566 "></polygon>
                            </svg>
                            <svg version="1.1" xmlns="http://www.w3.org/2000/svg" viewBox="0 12.705 512 486.59" x="0px" y="0px" xml:space="preserve" width="20px" height="20px" fill="#E1E1E1" style="margin-left: 1px; width: 15px;">
                                <polygon points="256.814,12.705 317.205,198.566 512.631,198.566 354.529,313.435 414.918,499.295 256.814,384.427 98.713,499.295 159.102,313.435 1,198.566 196.426,198.566 "></polygon>
                            </svg>
                            <svg version="1.1" xmlns="http://www.w3.org/2000/svg" viewBox="0 12.705 512 486.59" x="0px" y="0px" xml:space="preserve" width="20px" height="20px" fill="#E1E1E1" style="margin-left: 1px; width: 15px;">
                                <polygon points="256.814,12.705 317.205,198.566 512.631,198.566 354.529,313.435 414.918,499.295 256.814,384.427 98.713,499.295 159.102,313.435 1,198.566 196.426,198.566 "></polygon>
                            </svg>
                            <svg version="1.1" xmlns="http://www.w3.org/2000/svg" viewBox="0 12.705 512 486.59" x="0px" y="0px" xml:space="preserve" width="20px" height="20px" fill="#E1E1E1" style="margin-left: 1px; width: 15px;">
                                <polygon points="256.814,12.705 317.205,198.566 512.631,198.566 354.529,313.435 414.918,499.295 256.814,384.427 98.713,499.295 159.102,313.435 1,198.566 196.426,198.566 "></polygon>
                            </svg></span>
                        <span>Đánh giá</span>

                        <span class="check"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" height="12">
                                <path d="M234.5 5.7c13.9-5 29.1-5 43.1 0l192 68.6C495 83.4 512 107.5 512 134.6V377.4c0 27-17 51.2-42.5 60.3l-192 68.6c-13.9 5-29.1 5-43.1 0l-192-68.6C17 428.6 0 404.5 0 377.4V134.6c0-27 17-51.2 42.5-60.3l192-68.6zM256 66L82.3 128 256 190l173.7-62L256 66zm32 368.6l160-57.1v-188L288 246.6v188z"></path>
                            </svg><span>Còn hàng</span></span>

                    </div>
                    <div class="detail__right--price">
                       
                        <del class="price-left">{{ number_format($products->sale, 0, ',', '.') . 'đ' }}</del>
                         
                         <ins class="price-center">{{ number_format($products->price, 0, ',', '.'). 'đ' }} </ins>
                    </div>
                    <ul class="description">
                        <li>Thương hiệu: {{$products->suppliers->name}}</li>
                        <li>Xuất xứ: VietNam</li>
                        <li>Kích thước: {{$products->size}}</li>
                        <li>Chu vi bóng(mm): {{$products->perimeter}}</li>
                        <li>Chất liệu: {{$products->material}}</li>
                    </ul>
                    <div class="detail__right--button">
                        <div class="quantity">
                            <div class="quantity__prev"><a href="">-</a></div>
                            <div class="quantity__input"><input type="text" name="product_quantity" value="1"></div>
                            <div class="quantity__next"><a href="">+</a></div>
                        </div>
                        <button type="submit">Thêm mới</button>


                        <div class="button1"><a href="#" id="buyNowBtn">Mua ngay</a></div>
                    </div>
                    <div class="detail__right--text">
                        <div class="text">Bạn có thích sản phẩm này không? Thêm vào mục yêu thích ngay bây giờ và theo dõi sản phẩm.</div>
                        <div class="icon"><a href=""><i class="far fa-heart"></i></a></div>
                    </div>

                    <div class="detail__right--mounted">
                        <div class="item-fb">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512">
                                <path d="M279.14 288l14.22-92.66h-88.91v-60.13c0-25.35 12.42-50.06 52.24-50.06h40.42V6.26S260.43 0 225.36 0c-73.22 0-121.08 44.38-121.08 124.72v70.62H22.89V288h81.39v224h100.17V288z"></path>
                            </svg>
                        </div>
                        <div class="item-tw">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                <path d="M459.37 151.716c.325 4.548.325 9.097.325 13.645 0 138.72-105.583 298.558-298.558 298.558-59.452 0-114.68-17.219-161.137-47.106 8.447.974 16.568 1.299 25.34 1.299 49.055 0 94.213-16.568 130.274-44.832-46.132-.975-84.792-31.188-98.112-72.772 6.498.974 12.995 1.624 19.818 1.624 9.421 0 18.843-1.3 27.614-3.573-48.081-9.747-84.143-51.98-84.143-102.985v-1.299c13.969 7.797 30.214 12.67 47.431 13.319-28.264-18.843-46.781-51.005-46.781-87.391 0-19.492 5.197-37.36 14.294-52.954 51.655 63.675 129.3 105.258 216.365 109.807-1.624-7.797-2.599-15.918-2.599-24.04 0-57.828 46.782-104.934 104.934-104.934 30.213 0 57.502 12.67 76.67 33.137 23.715-4.548 46.456-13.32 66.599-25.34-7.798 24.366-24.366 44.833-46.132 57.827 21.117-2.273 41.584-8.122 60.426-16.243-14.292 20.791-32.161 39.308-52.628 54.253z"></path>
                            </svg>
                        </div>
                        <div class="item-pt">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512">
                                <path d="M204 6.5C101.4 6.5 0 74.9 0 185.6 0 256 39.6 296 63.6 296c9.9 0 15.6-27.6 15.6-35.4 0-9.3-23.7-29.1-23.7-67.8 0-80.4 61.2-137.4 140.4-137.4 68.1 0 118.5 38.7 118.5 109.8 0 53.1-21.3 152.7-90.3 152.7-24.9 0-46.2-18-46.2-43.8 0-37.8 26.4-74.4 26.4-113.4 0-66.2-93.9-54.2-93.9 25.8 0 16.8 2.1 35.4 9.6 50.7-13.8 59.4-42 147.9-42 209.1 0 18.9 2.7 37.5 4.5 56.4 3.4 3.8 1.7 3.4 6.9 1.5 50.4-69 48.6-82.5 71.4-172.8 12.3 23.4 44.1 36 69.3 36 106.2 0 153.9-103.5 153.9-196.8C384 71.3 298.2 6.5 204 6.5z"></path>
                            </svg>
                        </div>
                        <div class="item-in">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                                <path d="M100.28 448H7.4V148.9h92.88zM53.79 108.1C24.09 108.1 0 83.5 0 53.8a53.79 53.79 0 0 1 107.58 0c0 29.7-24.1 54.3-53.79 54.3zM447.9 448h-92.68V302.4c0-34.7-.7-79.2-48.29-79.2-48.29 0-55.69 37.7-55.69 76.7V448h-92.78V148.9h89.08v40.8h1.3c12.4-23.5 42.69-48.3 87.88-48.3 94 0 111.28 61.9 111.28 142.3V448z"></path>
                            </svg>
                        </div>
                        <div class="item-chat">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                                <path d="M380.9 97.1C339 55.1 283.2 32 223.9 32c-122.4 0-222 99.6-222 222 0 39.1 10.2 77.3 29.6 111L0 480l117.7-30.9c32.4 17.7 68.9 27 106.1 27h.1c122.3 0 224.1-99.6 224.1-222 0-59.3-25.2-115-67.1-157zm-157 341.6c-33.2 0-65.7-8.9-94-25.7l-6.7-4-69.8 18.3L72 359.2l-4.4-7c-18.5-29.4-28.2-63.3-28.2-98.2 0-101.7 82.8-184.5 184.6-184.5 49.3 0 95.6 19.2 130.4 54.1 34.8 34.9 56.2 81.2 56.1 130.5 0 101.8-84.9 184.6-186.6 184.6zm101.2-138.2c-5.5-2.8-32.8-16.2-37.9-18-5.1-1.9-8.8-2.8-12.5 2.8-3.7 5.6-14.3 18-17.6 21.8-3.2 3.7-6.5 4.2-12 1.4-32.6-16.3-54-29.1-75.5-66-5.7-9.8 5.7-9.1 16.3-30.3 1.8-3.7.9-6.9-.5-9.7-1.4-2.8-12.5-30.1-17.1-41.2-4.5-10.8-9.1-9.3-12.5-9.5-3.2-.2-6.9-.2-10.6-.2-3.7 0-9.7 1.4-14.8 6.9-5.1 5.6-19.4 19-19.4 46.3 0 27.3 19.9 53.7 22.6 57.4 2.8 3.7 39.1 59.7 94.8 83.8 35.2 15.2 49 16.5 66.6 13.9 10.7-1.6 32.8-13.4 37.4-26.4 4.6-13 4.6-24.1 3.2-26.4-1.3-2.5-5-3.9-10.5-6.6z"></path>
                            </svg>
                        </div>

                    </div>
                </div>
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
    </div>
    <div class="container">
        <div class="sidebar">
            <div class="sidebar__left">
                <div class="sidebar__left--top">
                    <ul>
                        <li><a href="">Mô tả</a></li>
                        <li class="opacity"><a href="">Đánh giá</a></li>
                    </ul>
                </div>
                <div class="sidebar__left--center">
                    <div class="title">
                        <h1><strong>CHÍNH SÁCH THANH TOÁN THÀNH LỢI SPORT</strong></h1>
                    </div>
                    <div class="col">
                        <span><img src="https://s101.chanh.in/core/img/default_image.png" alt=""></span>
                        <span>TÁC GIẢ</span>
                        <span><strong>SUDO ENCOMERCE</strong></span>
                        <span>13/10/2023</span>
                        <span>6 PHÚT ĐỌC</span>
                    </div>
                    <div class="col">
                        <span><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" width="15" height="15">
                                <path d="M352 224H305.5c-45 0-81.5 36.5-81.5 81.5c0 22.3 10.3 34.3 19.2 40.5c6.8 4.7 12.8 12 12.8 20.3c0 9.8-8 17.8-17.8 17.8h-2.5c-2.4 0-4.8-.4-7.1-1.4C210.8 374.8 128 333.4 128 240c0-79.5 64.5-144 144-144h80V34.7C352 15.5 367.5 0 386.7 0c8.6 0 16.8 3.2 23.2 8.9L548.1 133.3c7.6 6.8 11.9 16.5 11.9 26.7s-4.3 19.9-11.9 26.7l-139 125.1c-5.9 5.3-13.5 8.2-21.4 8.2H384c-17.7 0-32-14.3-32-32V224zM80 96c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16H400c8.8 0 16-7.2 16-16V384c0-17.7 14.3-32 32-32s32 14.3 32 32v48c0 44.2-35.8 80-80 80H80c-44.2 0-80-35.8-80-80V112C0 67.8 35.8 32 80 32h48c17.7 0 32 14.3 32 32s-14.3 32-32 32H80z" fill="#000"></path>
                            </svg></span>
                        <span>Chia sẻ</span>
                        <span><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" width="18" height="18">
                                <path d="M279.14 288l14.22-92.66h-88.91v-60.13c0-25.35 12.42-50.06 52.24-50.06h40.42V6.26S260.43 0 225.36 0c-73.22 0-121.08 44.38-121.08 124.72v70.62H22.89V288h81.39v224h100.17V288z" fill="#000"></path>
                            </svg></span>
                        <span><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" width="18" height="18">
                                <path d="M459.37 151.716c.325 4.548.325 9.097.325 13.645 0 138.72-105.583 298.558-298.558 298.558-59.452 0-114.68-17.219-161.137-47.106 8.447.974 16.568 1.299 25.34 1.299 49.055 0 94.213-16.568 130.274-44.832-46.132-.975-84.792-31.188-98.112-72.772 6.498.974 12.995 1.624 19.818 1.624 9.421 0 18.843-1.3 27.614-3.573-48.081-9.747-84.143-51.98-84.143-102.985v-1.299c13.969 7.797 30.214 12.67 47.431 13.319-28.264-18.843-46.781-51.005-46.781-87.391 0-19.492 5.197-37.36 14.294-52.954 51.655 63.675 129.3 105.258 216.365 109.807-1.624-7.797-2.599-15.918-2.599-24.04 0-57.828 46.782-104.934 104.934-104.934 30.213 0 57.502 12.67 76.67 33.137 23.715-4.548 46.456-13.32 66.599-25.34-7.798 24.366-24.366 44.833-46.132 57.827 21.117-2.273 41.584-8.122 60.426-16.243-14.292 20.791-32.161 39.308-52.628 54.253z" fill="#000"></path>
                            </svg></span>
                        <span><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" width="18" height="18">
                                <path d="M48 64C21.5 64 0 85.5 0 112c0 15.1 7.1 29.3 19.2 38.4L236.8 313.6c11.4 8.5 27 8.5 38.4 0L492.8 150.4c12.1-9.1 19.2-23.3 19.2-38.4c0-26.5-21.5-48-48-48H48zM0 176V384c0 35.3 28.7 64 64 64H448c35.3 0 64-28.7 64-64V176L294.4 339.2c-22.8 17.1-54 17.1-76.8 0L0 176z" fill="#000"></path>
                            </svg></span>
                        <span><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512" width="18" height="18">
                                <path d="M579.8 267.7c56.5-56.5 56.5-148 0-204.5c-50-50-128.8-56.5-186.3-15.4l-1.6 1.1c-14.4 10.3-17.7 30.3-7.4 44.6s30.3 17.7 44.6 7.4l1.6-1.1c32.1-22.9 76-19.3 103.8 8.6c31.5 31.5 31.5 82.5 0 114L422.3 334.8c-31.5 31.5-82.5 31.5-114 0c-27.9-27.9-31.5-71.8-8.6-103.8l1.1-1.6c10.3-14.4 6.9-34.4-7.4-44.6s-34.4-6.9-44.6 7.4l-1.1 1.6C206.5 251.2 213 330 263 380c56.5 56.5 148 56.5 204.5 0L579.8 267.7zM60.2 244.3c-56.5 56.5-56.5 148 0 204.5c50 50 128.8 56.5 186.3 15.4l1.6-1.1c14.4-10.3 17.7-30.3 7.4-44.6s-30.3-17.7-44.6-7.4l-1.6 1.1c-32.1 22.9-76 19.3-103.8-8.6C74 372 74 321 105.5 289.5L217.7 177.2c31.5-31.5 82.5-31.5 114 0c27.9 27.9 31.5 71.8 8.6 103.9l-1.1 1.6c-10.3 14.4-6.9 34.4 7.4 44.6s34.4 6.9 44.6-7.4l1.1-1.6C433.5 260.8 427 182 377 132c-56.5-56.5-148-56.5-204.5 0L60.2 244.3z" fill="#000"></path>
                            </svg></span>
                    </div>

                    <div class="col">
                        <h2>CHÍNH SÁCH THANH TOÁN THÀNH LỢI SPORT</h2>

                        <h3>Phương thức thanh toán</h3>
                        <p>- Đối với khách hàng tại Hà Nội, Thành Lợi hỗ trợ giao hàng tận nhà. Sau khi nhận hàng Quý khách hài lòng rồi thanh toán trực tiếp.</p>
                        <p>- Thanh toán trực tiếp bằng thẻ ATM, VISA, hiện nay Công ty đã áp dụng phương thức thanh toán này rất thuận tiện, an toàn.</p>
                        <p>- Đối với khách hàng ở tỉnh, ngay sau khi Quý khách chuyển tiền đến tài khoản của Công ty, chúng tôi sẽ chuyển hàng cho Quý khách một cách nhanh nhất, tiêt kiệm nhất có thể.</p>
                        <p>- THÀNH LỢI SPORT có ship COD toàn quốc, quý khách có thể thanh toán cho đơn vị vận chuyển sau khi nhận hàng và kiểm tra hàng.</p>
                        <p>- Lưu ý: Quý khách giữ giấy chuyển tiền cẩn thận cho đến khi nhân được hàng.</p>
                        <h4><strong>Tài khoản 1:</strong></h4>
                        <p>+ Chủ tài khoản: NGUYỄN VĂN LỢI</p>
                        <p>+ Số tài khoản: 19034653610011 tại Ngân hàng Thương mại cổ phần Kỹ Thương Việt Nam (Techcombank), chi nhánh Hà Nội.</p>
                        <h4><strong>Tài khoản 2:</strong></h4>
                        <p>+ Chủ tài khoản: NGUYỄN VĂN LỢI</p>
                        <p>+ Số tài khoản: 9999696999 Tại Ngân hàng thương mại cổ phần Quân đội (MB Bank), chi nhánh Hà Nội.</p>
                        <p>Chân thành cảm ơn !</p>


                    </div>
                    <div class="col">
                        <div class="product1">
                            @foreach($relatedProducts as $relatedProduct)


                            <div class="product1__item">
                                <form action="{{ route('client.carts.add') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="product_id" value="{{ $relatedProduct->id }}">
                                    <input type="hidden" name="product_name" value="{{ $relatedProduct->name }}">
                                    <input type="hidden" name="product_img" value="{{  asset('img/'.$relatedProduct->img) }}">
                                    <input type="hidden" name="product_price" value="{{ $relatedProduct->price }}"> <!-- Giá trị mặc định cho giá -->
                                    <div class="product1__item--top">
                                        <div class="item-sale">
                                            {{ intval((($relatedProduct->price - $relatedProduct->sale) / $relatedProduct->price) * 100, 2) }}%
                                        </div>
                                        <div class="item-heart"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" width="20" height="20">
                                                <path style="line-height:normal;text-indent:0;text-align:start;text-decoration-line:none;text-decoration-style:solid;text-decoration-color:#000;text-transform:none;block-progression:tb;isolation:auto;mix-blend-mode:normal" d="M4.996 2.004C3.98 1.95 2.961 2.29 2.211 3.04.71 4.544.867 7.068 2.473 8.676l.513.513 4.662 4.666a.5.5 0 0 0 .706 0l4.66-4.666.513-.513c1.606-1.608 1.762-4.132.26-5.635-1.501-1.503-4.02-1.343-5.625.264L8 3.467l-.162-.162C7.035 2.5 6.013 2.058 4.996 2.004zm6.049.994V3c.76-.043 1.497.21 2.037.75 1.08 1.08 1.004 2.951-.26 4.217l-.517.517L8 12.793 3.695 8.484l-.515-.517C1.916 6.7 1.84 4.83 2.92 3.75c.54-.54 1.261-.788 2.023-.748.762.04 1.554.375 2.186 1.008l.52.517a.5.5 0 0 0 .706 0l.516-.52c.632-.632 1.414-.967 2.174-1.009z" color="#000" font-family="sans-serif" font-weight="400" overflow="visible" fill="#000000" class="color000 svgShape"></path>
                                            </svg></div>
                                        <div class="item-compare"><svg xmlns="http://www.w3.org/2000/svg" data-name="Layer 1" viewBox="0 0 24 24" width="20" height="20">
                                                <path d="M4.5,9.44946V16A2.50294,2.50294,0,0,0,7,18.5H9.793L7.64648,20.64648a.5.5,0,1,0,.707.707l3-3a.49983.49983,0,0,0,0-.707l-3-3a.5.5,0,0,0-.707.707L9.793,17.5H7A1.50164,1.50164,0,0,1,5.5,16V9.44946a3.5,3.5,0,1,0-1,0ZM5,3.5A2.5,2.5,0,1,1,2.5,6,2.50294,2.50294,0,0,1,5,3.5ZM19.5,14.55054V8A2.50294,2.50294,0,0,0,17,5.5H14.207l2.14649-2.14648a.5.5,0,0,0-.707-.707l-3,3a.49983.49983,0,0,0,0,.707l3,3a.5.5,0,0,0,.707-.707L14.207,6.5H17A1.50164,1.50164,0,0,1,18.5,8v6.55054a3.5,3.5,0,1,0,1,0ZM19,20.5A2.5,2.5,0,1,1,21.5,18,2.50294,2.50294,0,0,1,19,20.5Z" fill="#000000" class="color000 svgShape"></path>
                                            </svg></div>
                                        <div class="item-show"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 50 50" id="eye" width="20">
                                                <path d="M25 39c13.036 0 23.352-12.833 23.784-13.379l.491-.621-.491-.621C48.352 23.833 38.036 11 25 11S1.648 23.833 1.216 24.379L.725 25l.491.621C1.648 26.167 11.964 39 25 39zm0-26c10.494 0 19.47 9.46 21.69 12C44.473 27.542 35.509 37 25 37 14.506 37 5.53 27.54 3.31 25 5.527 22.458 14.491 13 25 13z"></path>
                                                <path d="M25 34c4.963 0 9-4.038 9-9s-4.037-9-9-9-9 4.038-9 9 4.037 9 9 9zm0-16c3.859 0 7 3.14 7 7s-3.141 7-7 7-7-3.14-7-7 3.141-7 7-7z"></path>
                                            </svg></div>

                                        <img src="{{ asset('img/'.$relatedProduct->img) }}" alt=""> </a>

                                    </div>
                                    <div class="product1__item--center">

                                        <a href="">{{$relatedProduct->name}}</a>
                                        <div class="product1__item--evaluate">
                                            <div class="evaluate-left">
                                                <svg version="1.1" xmlns="http://www.w3.org/2000/svg" viewBox="0 12.705 512 486.59" x="0px" y="0px" xml:space="preserve" width="10px" height="10px" fill="#E1E1E1" style=" width: 10px;">
                                                    <polygon points="256.814,12.705 317.205,198.566 512.631,198.566 354.529,313.435 414.918,499.295 256.814,384.427 98.713,499.295 159.102,313.435 1,198.566 196.426,198.566 "></polygon>
                                                </svg>
                                                <svg version="1.1" xmlns="http://www.w3.org/2000/svg" viewBox="0 12.705 512 486.59" x="0px" y="0px" xml:space="preserve" width="10px" height="10px" fill="#E1E1E1" style=" width: 10px;">
                                                    <polygon points="256.814,12.705 317.205,198.566 512.631,198.566 354.529,313.435 414.918,499.295 256.814,384.427 98.713,499.295 159.102,313.435 1,198.566 196.426,198.566 "></polygon>
                                                </svg>
                                                <svg version="1.1" xmlns="http://www.w3.org/2000/svg" viewBox="0 12.705 512 486.59" x="0px" y="0px" xml:space="preserve" width="10px" height="10px" fill="#E1E1E1" style=" width: 10px;">
                                                    <polygon points="256.814,12.705 317.205,198.566 512.631,198.566 354.529,313.435 414.918,499.295 256.814,384.427 98.713,499.295 159.102,313.435 1,198.566 196.426,198.566 "></polygon>
                                                </svg>
                                                <svg version="1.1" xmlns="http://www.w3.org/2000/svg" viewBox="0 12.705 512 486.59" x="0px" y="0px" xml:space="preserve" width="10px" height="10px" fill="#E1E1E1" style=" width: 10px;">
                                                    <polygon points="256.814,12.705 317.205,198.566 512.631,198.566 354.529,313.435 414.918,499.295 256.814,384.427 98.713,499.295 159.102,313.435 1,198.566 196.426,198.566 "></polygon>
                                                </svg>
                                                <svg version="1.1" xmlns="http://www.w3.org/2000/svg" viewBox="0 12.705 512 486.59" x="0px" y="0px" xml:space="preserve" width="10px" height="10px" fill="#E1E1E1" style=" width: 10px;">
                                                    <polygon points="256.814,12.705 317.205,198.566 512.631,198.566 354.529,313.435 414.918,499.295 256.814,384.427 98.713,499.295 159.102,313.435 1,198.566 196.426,198.566 "></polygon>
                                                </svg>
                                            </div>
                                            <div class="evaluate-right">0 đánh giá</div>
                                        </div>
                                        <div class="product1__item--price">
                                        <del class="price-left">{{ number_format($relatedProduct->sale, 0, ',', '.') . 'đ' }}</del>
                         
                         <div class="price-center">{{ number_format($relatedProduct->price, 0, ',', '.'). 'đ' }} </div>
                                            <div class="price-right"></div>
                                        </div>
                                        <div class="product1__item--stock">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" height="12">
                                                <path d="M234.5 5.7c13.9-5 29.1-5 43.1 0l192 68.6C495 83.4 512 107.5 512 134.6V377.4c0 27-17 51.2-42.5 60.3l-192 68.6c-13.9 5-29.1 5-43.1 0l-192-68.6C17 428.6 0 404.5 0 377.4V134.6c0-27 17-51.2 42.5-60.3l192-68.6zM256 66L82.3 128 256 190l173.7-62L256 66zm32 368.6l160-57.1v-188L288 246.6v188z"></path>
                                            </svg><span>Còn hàng</span>
                                        </div>
                                    </div>

                                    <div class="product1__item--bottom">
                                        <ul>
                                            <li>Thương hiệu: {{$relatedProduct->suppliers->name}}</li>
                                            <li>Xuất xứ: VietNam</li>
                                            <li>Kích thước: {{$relatedProduct->size}}</li>
                                            <li>Chu vi bóng(mm): {{$relatedProduct->perimeter}}</li>
                                            <li>Chất liệu: {{$relatedProduct->material}}</li>
                                        </ul>
                                        <div class="product1__item--button">
                                            <button type="submit">Thêm giỏ hàng</button>
                                        </div>
                                    </div>
                                </form>
                            </div>

                            @endforeach


                        </div>
                    </div>
                </div>
            </div>
            <div class="sidebar__right">
                <div class="sidebar__right--title">
                    <h1>Dịch vụ tốt nhất</h1>
                </div>
                <div class="sidebar__right--description">
                    <ul>
                        <li class="dp-item">
                            <img src="https://mbmart.com.vn/uploads/2023/09/1.png.webp" alt="">
                            <div class="dp-item__it">
                                <strong>Uy tín hàng đầu</strong>
                                <p>Chất lượng - Dịch vụ - Thương hiệu</p>
                            </div>
                        </li>
                        <li class="dp-item">
                            <img src="https://mbmart.com.vn/uploads/2023/09/3.png.webp" alt="">
                            <div class="dp-item__it">
                                <strong>Giao hàng toàn quốc</strong>
                                <p>Liên kết tất cả các đơn vị</p>
                            </div>
                        </li>
                        <li class="dp-item">
                            <img src="https://mbmart.com.vn/uploads/2023/09/4.png.webp" alt="">
                            <div class="dp-item__it">
                                <strong>Sản phẩm đa dạng phong phú</strong>
                                <p>Luôn đi đầu xu hướng sản phẩm</p>
                            </div>
                        </li>
                    </ul>
                </div>

                <div class="sidebar__right--title">
                    <h1>Danh mục sản phẩm</h1>
                </div>
                <div class="sidebar__right--ul">
                    <div class="sidebar__right--ul">
                        @foreach($categorys as $category)
                        <p class="parent">
                            <a class="parent-link" data-toggle-id="{{ $category->id }}" href="{{ route('categories.show', $category->slug) }}">
                                {{ $category->name }}
                                @if($category->children->isNotEmpty())
                                <i class="fas fa-chevron-down"></i>
                                @endif
                            </a>
                        </p>
                        @if($category->children->isNotEmpty())
                        <div id="children{{ $category->id }}" class="children" style="display: none;">
                            @foreach($category->children as $childCategory)
                            <p><a href="{{ route('categories.show', $childCategory->slug) }}">{{ $childCategory->name }}</a></p>
                            @endforeach
                        </div>
                        @endif
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
@include('client.footer')
@include('client.javascript')

</html>

<script>
    $(document).ready(function() {
        // Thêm sự kiện click cho tất cả các liên kết cha có thư mục con
        $('.parent-link').click(function(e) {
            e.preventDefault(); // Ngăn chặn hành động mặc định của liên kết

            // Lấy ID của danh mục cha
            var categoryId = $(this).data('toggle-id');

            // Lấy thẻ <i> trong thẻ cha
            var icon = $(this).find('i');

            // Nếu người dùng click vào mũi tên, ẩn/hiện danh sách con
            if ($(e.target).is(icon)) {
                $('#children' + categoryId).slideToggle();
            } else {
                // Nếu click vào phần còn lại của liên kết, chuyển hướng đến route
                window.location.href = $(this).attr('href');
            }
        });
    });
</script>
<!-- Trong tệp .blade.php -->
<div id="checkoutRoute" data-route="{{ route('checkout', $products->id) }}"></div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Chọn thẻ a theo ID
        var buyNowBtn = document.getElementById('buyNowBtn');

        // Thêm sự kiện click cho thẻ a
        buyNowBtn.addEventListener('click', function(event) {
            event.preventDefault(); // Ngăn chặn chuyển hướng mặc định

            // Lấy dữ liệu sản phẩm từ các phần tử HTML
            var productId = {
                {
                    $products - > id
                }
            };
            var productQuantity = document.querySelector('input[name="product_quantity"]').value;
            var productName = document.querySelector('input[name="product_name"]').value;
            var productPrice = document.querySelector('input[name="product_price"]').value;

            // Lấy giá trị route từ thuộc tính HTML
            var checkoutRoute = document.getElementById('checkoutRoute').dataset.route;

            // Chuyển hướng đến trang checkout với thông tin sản phẩm đã chọn
            window.location.href = checkoutRoute + '?product_id=' + productId + '&quantity=' + productQuantity + '&name=' + productName + '&price=' + productPrice;
        });
    });
</script>