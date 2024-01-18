<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/category.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>

<body>

    @include('client.header')


    <div class="category">
        <div class="category__top">
            <div class="container">
                <div class="category__top--item"><a href="/">Trang chủ</a> <i class="fas fa-chevron-right"></i> </div>
                <div class="category__top--item1"><a href="">{{ $categorys->name }}</a>
                </div>
            </div>
        </div>
        <div class="category__center">
            <div class="container">
                <div class="category__center--content">
                    <div class="left">
                        <div class="left__top" id="leftContainer">
                            <div class="left__top--item">Ngành Hàng</div>
                            <div class="left__top--item1" id="toggleButton"><i class="fas fa-chevron-up"></i></div>
                        </div>
                        <ul class="hidden" id="itemList" style="display: none;">

                            @foreach($categorys->children as $childCategorie)
                            <li> <input type="checkbox" disabled><a href="{{ route('categories.show', $childCategorie->slug) }}">{{$childCategorie->name}}</a> </li>

                            @endforeach

                        </ul>
                        <div class="left__content">
                            <div class="left__content--title">Khoảng giá</div>
                            <div class="left__content--between">
                                <div class="left1">
                                    <span class="title" for="amount">Giá:</span>
                                    <span><input type="text" id="amount" readonly style="border:0;"></span>
                                </div>
                                <div class="right1">
                                    <button id="filterButton">Lọc</button>
                                </div>
                            </div>
                            <p></p>
                            <div id="slider-range"></div>
                        </div>
                        <div class="left__bottom" id="leftContainer1">
                            <div class="left__bottom--item">Tình trạng sản phẩm</div>
                            <div class="left__bottom--item1"><i class="fas fa-angle-down"></i></div>
                        </div>
                        <ul class="hidden" id="itemList1" style="display: block;">
                            <form id="searchForm" method="get" action="{{ route('category.show', ['slug' => $categorys->slug]) }}">
                                @csrf
                                <input type="checkbox" name="stock_status" id="stock_status" value="2">
                                <label for="stock_status">Còn hàng:</label>
                                <br>
                                <input type="checkbox" name="sale" id="sale" value="1">
                                <label for="sale">Giảm giá:</label>
                                <!-- Các tùy chọn trạng thái khác nếu cần -->
                            </form>
                        </ul>
                    </div>

                    <div class="right">
                        <div class="right__top">
                            <div class="right__top--left">
                                Hiển thị {{ $products->count() }} / {{ $products->count() }} Sản phẩm
                            </div>
                            <div class="right__top--right">

                                <form id="sortForm" action="{{ route('category.show', ['slug' => $categorys->slug]) }}" method="get">
                                    <label for="sortOrder">Sắp xếp:</label>
                                    <select name="sortOrder" id="sortOrder">
                                        <option value="desc" {{ request('sortOrder') == 'desc' ? 'selected' : '' }}>Mới nhất</option>
                                        <option value="asc" {{ request('sortOrder') == 'asc' ? 'selected' : '' }}>Cũ nhất</option>
                                        <option value="price_asc" {{ request('sortField') == 'price_asc' ? 'selected' : '' }}>Giá tăng dần</option>
                                        <option value="price_desc" {{ request('sortField') == 'price_desc' ? 'selected' : '' }}>Giá giảm dần</option>
                                    </select>
                                </form>
                                <form id="sortForm" action="{{ route('category.show', ['slug' => $categorys->slug]) }}" method="get">
                                    <label for="sortOrder">Hiển thị:</label>
                                    <select name="sortPagination" id="sortPagination">
                                        <option value="16" {{ request('sortPagination') == '16' ? 'selected' : '' }}>16 sản phẩm</option>
                                        <option value="32" {{ request('sortPagination') == '32' ? 'selected' : '' }}>32 sản phẩm</option>
                                        <option value="48" {{ request('sortPagination') == '48' ? 'selected' : '' }}>48 sản phẩm</option>
                                        <option value="64" {{ request('sortPagination') == '64' ? 'selected' : '' }}>64 sản phẩm</option>
                                    </select>
                                </form>
                                <div class="it" onclick="expandProduct1()">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" width="14">
                                        <path d="M384 96V224H256V96H384zm0 192V416H256V288H384zM192 224H64V96H192V224zM64 288H192V416H64V288zM64 32C28.7 32 0 60.7 0 96V416c0 35.3 28.7 64 64 64H384c35.3 0 64-28.7 64-64V96c0-35.3-28.7-64-64-64H64z"></path>
                                    </svg>
                                </div>
                                <div class="it" onclick="expandProduct()">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" width="14">
                                        <path d="M64 144a48 48 0 1 0 0-96 48 48 0 1 0 0 96zM192 64c-17.7 0-32 14.3-32 32s14.3 32 32 32H480c17.7 0 32-14.3 32-32s-14.3-32-32-32H192zm0 160c-17.7 0-32 14.3-32 32s14.3 32 32 32H480c17.7 0 32-14.3 32-32s-14.3-32-32-32H192zm0 160c-17.7 0-32 14.3-32 32s14.3 32 32 32H480c17.7 0 32-14.3 32-32s-14.3-32-32-32H192zM64 464a48 48 0 1 0 0-96 48 48 0 1 0 0 96zm48-208a48 48 0 1 0 -96 0 48 48 0 1 0 96 0z"></path>
                                    </svg>
                                </div>
                            </div>
                        </div>
                        <div class="right__bottom">
                            <div class="product1" id="productList">
                                @foreach($products as $product)
                                @if($product->status == 2)
                                <form class="product1__item" action="{{ route('client.carts.add') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                                    <input type="hidden" name="product_name" value="{{ $product->name }}">
                                    <input type="hidden" name="product_img" value="{{  asset('img/'.$product->img) }}">
                                    <input type="hidden" name="product_price" value="{{ $product->price }}"> <!-- Giá trị mặc định cho giá -->

                                    <div class="product1__item--top">
                                        <div class="item-sale">
                                            {{ intval ((($product->price - $product->sale) / $product->price) * 100, 2) }}%
                                        </div>
                                        <div class="item-heart"><i class="fa-regular fa-heart"></i></div>
                                        <div class="item-compare"><svg xmlns="http://www.w3.org/2000/svg" data-name="Layer 1" viewBox="0 0 24 24" width="20" height="20">
                                                <path d="M4.5,9.44946V16A2.50294,2.50294,0,0,0,7,18.5H9.793L7.64648,20.64648a.5.5,0,1,0,.707.707l3-3a.49983.49983,0,0,0,0-.707l-3-3a.5.5,0,0,0-.707.707L9.793,17.5H7A1.50164,1.50164,0,0,1,5.5,16V9.44946a3.5,3.5,0,1,0-1,0ZM5,3.5A2.5,2.5,0,1,1,2.5,6,2.50294,2.50294,0,0,1,5,3.5ZM19.5,14.55054V8A2.50294,2.50294,0,0,0,17,5.5H14.207l2.14649-2.14648a.5.5,0,0,0-.707-.707l-3,3a.49983.49983,0,0,0,0,.707l3,3a.5.5,0,0,0,.707-.707L14.207,6.5H17A1.50164,1.50164,0,0,1,18.5,8v6.55054a3.5,3.5,0,1,0,1,0ZM19,20.5A2.5,2.5,0,1,1,21.5,18,2.50294,2.50294,0,0,1,19,20.5Z" fill="#000000" class="color000 svgShape"></path>
                                            </svg></div>
                                        <div class="item-show"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 50 50" id="eye" width="20">
                                                <path d="M25 39c13.036 0 23.352-12.833 23.784-13.379l.491-.621-.491-.621C48.352 23.833 38.036 11 25 11S1.648 23.833 1.216 24.379L.725 25l.491.621C1.648 26.167 11.964 39 25 39zm0-26c10.494 0 19.47 9.46 21.69 12C44.473 27.542 35.509 37 25 37 14.506 37 5.53 27.54 3.31 25 5.527 22.458 14.491 13 25 13z"></path>
                                                <path d="M25 34c4.963 0 9-4.038 9-9s-4.037-9-9-9-9 4.038-9 9 4.037 9 9 9zm0-16c3.859 0 7 3.14 7 7s-3.141 7-7 7-7-3.14-7-7 3.141-7 7-7z"></path>
                                            </svg></div>
                                        <a href="{{ route('details.show', $product->slug) }}">

                                            <img src="{{ asset('img/'.$product->img) }}" alt=""> </a>

                                    </div>
                                    <div class="product1__item--center">

                                        <a href="">{{$product->name}}</a>
                                        <div class="product1__item--evaluate">
                                            <div class="evaluate-left">
                                                <svg version="1.1" xmlns="http://www.w3.org/2000/svg" viewBox="0 12.705 512 486.59" x="0px" y="0px" xml:space="preserve" width="20px" height="20px" fill="#E1E1E1" style=" width: 15px;">
                                                    <polygon points="256.814,12.705 317.205,198.566 512.631,198.566 354.529,313.435 414.918,499.295 256.814,384.427 98.713,499.295 159.102,313.435 1,198.566 196.426,198.566 "></polygon>
                                                </svg>
                                                <svg version="1.1" xmlns="http://www.w3.org/2000/svg" viewBox="0 12.705 512 486.59" x="0px" y="0px" xml:space="preserve" width="20px" height="20px" fill="#E1E1E1" style=" width: 15px;">
                                                    <polygon points="256.814,12.705 317.205,198.566 512.631,198.566 354.529,313.435 414.918,499.295 256.814,384.427 98.713,499.295 159.102,313.435 1,198.566 196.426,198.566 "></polygon>
                                                </svg>
                                                <svg version="1.1" xmlns="http://www.w3.org/2000/svg" viewBox="0 12.705 512 486.59" x="0px" y="0px" xml:space="preserve" width="20px" height="20px" fill="#E1E1E1" style=" width: 15px;">
                                                    <polygon points="256.814,12.705 317.205,198.566 512.631,198.566 354.529,313.435 414.918,499.295 256.814,384.427 98.713,499.295 159.102,313.435 1,198.566 196.426,198.566 "></polygon>
                                                </svg>
                                                <svg version="1.1" xmlns="http://www.w3.org/2000/svg" viewBox="0 12.705 512 486.59" x="0px" y="0px" xml:space="preserve" width="20px" height="20px" fill="#E1E1E1" style=" width: 15px;">
                                                    <polygon points="256.814,12.705 317.205,198.566 512.631,198.566 354.529,313.435 414.918,499.295 256.814,384.427 98.713,499.295 159.102,313.435 1,198.566 196.426,198.566 "></polygon>
                                                </svg>
                                                <svg version="1.1" xmlns="http://www.w3.org/2000/svg" viewBox="0 12.705 512 486.59" x="0px" y="0px" xml:space="preserve" width="20px" height="20px" fill="#E1E1E1" style=" width: 15px;">
                                                    <polygon points="256.814,12.705 317.205,198.566 512.631,198.566 354.529,313.435 414.918,499.295 256.814,384.427 98.713,499.295 159.102,313.435 1,198.566 196.426,198.566 "></polygon>
                                                </svg>
                                            </div>
                                            <div class="evaluate-right">0 đánh giá</div>
                                        </div>
                                        <div class="product1__item--price">
                                        <del class="price-left">{{ number_format($product->sale, 0, ',', '.') . 'đ' }}</del>
                         
                         <div class="price-center">{{ number_format($product->price, 0, ',', '.'). 'đ' }} </div>    
                                            <div class="price-right"></div>
                                        </div>
                                        <div class="product1__item--stock">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" height="12">
                                                <path d="M234.5 5.7c13.9-5 29.1-5 43.1 0l192 68.6C495 83.4 512 107.5 512 134.6V377.4c0 27-17 51.2-42.5 60.3l-192 68.6c-13.9 5-29.1 5-43.1 0l-192-68.6C17 428.6 0 404.5 0 377.4V134.6c0-27 17-51.2 42.5-60.3l192-68.6zM256 66L82.3 128 256 190l173.7-62L256 66zm32 368.6l160-57.1v-188L288 246.6v188z"></path>
                                            </svg> @if($product->stock_status == 2)
                                            <span>
                                                Còn hàng
                                            </span>
                                            @else
                                            <span style="color:red">
                                                Hết hàng
                                            </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="product1__item--bottom">
                                        <ul>
                                            <li>Thương hiệu: {{$product->suppliers->name}}</li>
                                            <li>Xuất xứ: VietNam</li>
                                            <li>Kích thước: {{$product->size}}</li>
                                            <li>Chu vi bóng(mm): {{$product->perimeter}}</li>
                                            <li>Chất liệu: {{$product->material}}</li>
                                        </ul>
                                        <div class="product1__item--button">
                                            <button type="submit">Thêm giỏ hàng</button>
                                        </div>
                                    </div>

                                </form>
                                @endif
                                @endforeach


                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>



</body>










@include('client.footer')
@include('client.javascript')
</body>

</html>

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>


<script>
    $('#leftContainer').on('click', function() {
        $('#itemList').slideToggle();
    });
    $('#leftContainer1').on('click', function() {
        $('#itemList1').slideToggle();
    });

    function expandProduct() {
        $(".product1__item").addClass("full-width");
    }

    function expandProduct1() {
        $(".product1__item").removeClass("full-width");
    }
    $(document).ready(function() {
        // Tự động chọn Z->A khi trang được tải
        $('#sortOrder').val('desc');

        // Xử lý sự kiện khi giá trị của dropdown thay đổi
        $('#sortOrder, #sortPagination').on('change', function() {
            // Gửi yêu cầu AJAX để lấy danh sách sản phẩm đã sắp xếp
            updateProductList();

        });
        // Cập nhật số lượng sản phẩm
        var count = $(response).find('.product1__item').length;
        $('.right__top--left').html('Hiển thị ' + count + ' / ' + count + ' Sản phẩm');
        // Hàm cập nhật danh sách sản phẩm thông qua AJAX
        function updateProductList() {

            $.ajax({
                url: $('#sortForm').attr('action'),
                type: 'GET',
                data: $('#sortForm').serialize(),
                success: function(response) {
                    console.log(response);
                    // Cập nhật nội dung của div hiển thị danh sách sản phẩm
                    $('#productList').html(response);


                },
                error: function(xhr, status, error) {
                    console.error(error);
                },
                complete: function() {
                    // Ẩn spinner khi yêu cầu AJAX hoàn thành (thành công hoặc thất bại)

                }
            });

        }
    });
</script>
<link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
<link rel="stylesheet" href="/resources/demos/style.css">
<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
<script>
    $(document).ready(function() {
        $('#stock_status, #sale').on('change', function() {
            // Sử dụng AJAX để gửi form
            $.ajax({
                type: 'GET',
                url: $('#searchForm').attr('action'),
                data: $('#searchForm').serialize(),
                success: function(response) {
                    // Hiển thị kết quả ở resultContainer
                    $('#productList').html(response);
                },
                error: function(error) {
                    console.error('Lỗi:', error);
                }
            });
        });
    });
</script>

<script>
    $(function() {
        $("#slider-range").slider({
            range: true,
            min: 0,
            max: 10000,
            values: [0, 10000],
            slide: function(event, ui) {
                $("#amount").val("$" + ui.values[0] + " - $" + ui.values[1]);
            }
        });
        $("#amount").val("$" + $("#slider-range").slider("values", 0) +
            " - $" + $("#slider-range").slider("values", 1));

        $("#filterButton").click(function() {
            filterProducts();
        });
    });

    function filterProducts() {
        var minPrice = $("#slider-range").slider("values", 0);
        var maxPrice = $("#slider-range").slider("values", 1);

        $.ajax({
            type: 'GET', // Hoặc 'POST' tùy vào phương thức của bạn
            url: '{{ route("category.show", ["slug" => $categorys->slug]) }}',
            data: {
                min_price: minPrice,
                max_price: maxPrice,
                _token: '{{ csrf_token() }}'
            },
            success: function(data) {
                // Cập nhật giao diện người dùng với danh sách sản phẩm mới
                $('#productList').html(data);
            },
            error: function(error) {
                console.error(error);
            }
        });
    }
</script>