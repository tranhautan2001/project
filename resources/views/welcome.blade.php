<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/header.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick-theme.min.css" integrity="sha512-17EgCFERpgZKcm0j0fEq1YCJuyAWdz9KUtv1EjVuaOz8pDnh/0nZxmU6BBXwaaxqoi9PQXnRWqlcDB027hgv9A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.css" integrity="sha512-yHknP1/AwR+yx26cB1y0cjvQUMvEa2PFzt1c9LlS4pRQ5NOTZFWbhBig+X9G9eYW/8m0/4OXNx8pxJ6z57x0dw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>

    <!-- header -->
    @include('client.header')


    <!-- content  -->

    <body>
        <div class="header__bottom">
            <div class="container">
                <div class="header__bottom--category">
                    <p class="category-title"> Ngành hàng
                    </p>
                    <i class="fa-solid fa-caret-down"></i>

                </div>
                <div class="header__bottom--menu">
                    <ul class="nav">
                        @foreach($pages as $page)
                        @if($page->status == 2)
                        <li><a href="#">{{ $page->name }}</a></li>
                        @endif
                        @endforeach
                    </ul>
                </div>
                <div class="header__bottom--li"></div>

            </div>

        </div>
        <div class="sidebar">
            <div class="sidebar__top">
                <div class="container">
                    <div class="sidebar__top--list">
                        <ul class="nav">

                            @foreach($categorys as $category)
                            @if($category->status == 2)
                            <li class="item">
                                <div class="item__left">
                                    <a href="{{ route('categories.show', $category->slug) }}">{{ $category->name }}</a>
                                </div>
                                @if($category->children && count($category->children) > 0)
                                <div class="item__right">
                                    <i class="fas fa-chevron-right"></i>
                                </div>
                                <ul class="hover-list">
                                    <li class="item--title">{{ $category->name }}</li>
                                    @foreach($category->children as $childCategory)
                                    <li class="item">
                                        <a href="{{ route('categories.show', $childCategory->slug) }}">{{ $childCategory->name }}</a>
                                    </li>
                                    @endforeach
                                </ul>
                                @endif
                            </li>
                            @endif
                            @endforeach
                        </ul>

                    </div>
                    <div class="sidebar__top--slider">
                        <div class="fade">
                            <div><img src="https://s101.chanh.in/uploads/2023/10/slide1-doubleextralarge.jpg.webp" alt="Image 1"></div>
                            <div><img src="https://s101.chanh.in/uploads/2023/10/slide2-doubleextralarge.jpg.webp" alt="Image 2"></div>
                            <div><img src="https://s101.chanh.in/uploads/2023/10/slide2-doubleextralarge.jpg.webp" alt="Image 3"></div>

                        </div>

                    </div>

                </div>

            </div>
        </div>
        <div class="detail">
            <div class="container">
                <div class="detail__row">
                    <div class="detail__row--img">
                        <img src="https://s101.chanh.in/uploads/2023/10/bn1-medium.jpg.webp" alt="">
                    </div>
                    <div class="detail__row--badage">
                        chất lượng cao
                    </div>
                    <div class="detail__row--title">
                        Ghế tập tạ
                    </div>
                    <div class="detail__row--button">
                        Mua ngay <i class="fas fa-long-arrow-alt-right"></i>
                    </div>
                </div>
                <div class="detail__row">
                    <div class="detail__row--img">
                        <img src="https://s101.chanh.in/uploads/2023/10/bn1-medium.jpg.webp" alt="">
                    </div>
                    <div class="detail__row--badage">
                        Chuẩn phòng GYM
                    </div>
                    <div class="detail__row--title">
                        Giàn tạ nặng
                    </div>
                    <div class="detail__row--button">
                        Mua ngay <i class="fas fa-long-arrow-alt-right"></i>
                    </div>
                </div>
                <div class="detail__row">
                    <div class="detail__row--img">
                        <img src="https://s101.chanh.in/uploads/2023/10/bn1-medium.jpg.webp" alt="">
                    </div>
                    <div class="detail__row--badage">
                        Ghê masage
                    </div>
                    <div class="detail__row--title">
                        Chuẩn quốc tế
                    </div>
                    <div class="detail__row--button">
                        Mua ngay <i class="fas fa-long-arrow-alt-right"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="title__category">
                <div class="title__category--left">
                    <div class="text">Danh mục sản phẩm</div>
                </div>
                <div class="title__category--right">
                    <div class="detail1"> xem tất cả <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" height="12">
                            <path d="M502.6 278.6c12.5-12.5 12.5-32.8 0-45.3l-128-128c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L402.7 224 32 224c-17.7 0-32 14.3-32 32s14.3 32 32 32l370.7 0-73.4 73.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0l128-128z"></path>
                        </svg></div>
                </div>
            </div>
        </div>
        <br>
        <div class="container">
            <div class="category">
                @foreach($childCategories as $childCategorie)

                <div class="category__item">

                    <div class="category__item--img">
                        <a href="{{ route('categories.show', $childCategorie->slug) }}"><img src="{{ asset('img/'.$childCategorie->image) }}" alt="Ảnh sản phẩm"></a>


                    </div>
                    <div class="category__item--title"><strong>{{ $childCategorie->name}}</strong></div>
                    <div class="category__item--qty"> {{ $childCategorie->getTotalProductsCount() }} sản phẩm</div>

                </div>
                @endforeach
            </div>
        </div>
        <div class="container">
            <div class="advertisement">
                <img src="{{ asset('img/banner-doubleextralarge.jpg') }}" alt="">
            </div>
        </div>
        <div class="container">
            @foreach($categorys as $category)
            @if($category->products && count($category->products) > 0)
            <div class="title__category">
                <div class="title__category--left">
                    <div class="child-title">{{ $category->name ?? ''}}</div>
                    @if($category->children && count($category->children) > 0)
                    <ul>
                        @foreach($category->children as $childCategory)
                        <li class="item">
                            <a href="{{ route('categories.show', $childCategory->slug) }}">{{ $childCategory->name }}</a>
                        </li>
                        @endforeach
                    </ul>
                    @endif
                </div>
                <div class="title__category--right">
                    <div class="detail1"> xem tất cả <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" height="12">
                            <path d="M502.6 278.6c12.5-12.5 12.5-32.8 0-45.3l-128-128c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L402.7 224 32 224c-17.7 0-32 14.3-32 32s14.3 32 32 32l370.7 0-73.4 73.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0l128-128z"></path>
                        </svg></div>

                </div>
            </div>

            <div class="product">

                @foreach($category->products as $product)
                @if($product->status == 2)
                <a href="{{ route('details.show', $product->slug) }}">
                    <form class="product__item" action="{{ route('client.carts.add') }}" method="POST">
                        @csrf
                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                        <input type="hidden" name="product_name" value="{{ $product->name }}">
                        <input type="hidden" name="product_img" value="{{  asset('img/'.$product->img) }}">
                        <input type="hidden" name="product_price" value="{{ $product->price }}"> <!-- Giá trị mặc định cho giá -->

                        <div class="product__item--img">
                            <div class="item-sale">
                                {{ intval((($product->price - $product->sale) / $product->price) * 100, 2) }}%
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

                            <img src="{{ asset('img/'.$product->img) }}" alt="">

                        </div>
                        <div class="product__item--title">
                            <a href="">{{$product->name}}</a>
                        </div>
                        <div class="product__item--evaluate">
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
                        <div class="product__item--price">
                        <del class="price-left">{{ number_format($product->sale, 0, ',', '.') . 'đ' }}</del>
                         
                            <div class="price-center">{{ number_format($product->price, 0, ',', '.'). 'đ' }} </div>

                            <div class="price-right"></div>
                        </div>
                        <div class="product__item--stock">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" height="12">
                                <path d="M234.5 5.7c13.9-5 29.1-5 43.1 0l192 68.6C495 83.4 512 107.5 512 134.6V377.4c0 27-17 51.2-42.5 60.3l-192 68.6c-13.9 5-29.1 5-43.1 0l-192-68.6C17 428.6 0 404.5 0 377.4V134.6c0-27 17-51.2 42.5-60.3l192-68.6zM256 66L82.3 128 256 190l173.7-62L256 66zm32 368.6l160-57.1v-188L288 246.6v188z"></path>
                            </svg>
                            @if($product->stock_status == 2)
                            <span>
                                Còn hàng
                            </span>
                            @else
                            <span>
                                Hết hàng
                            </span>
                            @endif
                        </div>
                        <div class="product__item--dercription">
                            <ul>
                                <li>Thương hiệu: {{$product->suppliers->name}}</li>
                                <li>Xuất xứ: VietNam</li>
                                <li>Kích thước: {{$product->size}}</li>
                                <li>Chu vi bóng(mm): {{$product->perimeter}}</li>
                                <li>Chất liệu: {{$product->material}}</li>
                            </ul>
                            <div class="product__item--button">
                                <button type="submit">Thêm giỏ hàng</button>
                            </div>
                        </div>

                    </form>
                </a>
                @endif
                @endforeach
            </div>
            @endif
            @endforeach
        </div>



        <div class="container">
            <div class="title__category">
                <div class="title__category--left">
                    <div class="child-title">TIN TỨC & SỰ KIỆN</div>
                </div>
                <div class="title__category--right">
                    <div class="detail1"> xem tất cả <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" height="12">
                            <path d="M502.6 278.6c12.5-12.5 12.5-32.8 0-45.3l-128-128c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L402.7 224 32 224c-17.7 0-32 14.3-32 32s14.3 32 32 32l370.7 0-73.4 73.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0l128-128z"></path>
                        </svg></div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="about__top">

                @foreach($posts as $post)
                @if($post->status == 2)
                <div class="about__top--item">
                    <div class="button"><button><a href="">Tin tức</a></button></div>
                    <div class="img"><img src="https://s101.chanh.in/uploads/2023/10/tt4-medium.jpg.webp" alt=""></div>
                    <div class="date">{{ $post->date}}</div>
                    <div class="title"><a href="">
                            <h3>{{ $post->name}}</h3>
                        </a></div>
                    <div class="description">{{ $post->description}}</div>
                </div>
                @endif
                @endforeach
            </div>
        </div>
        <div class="container">
            <div class="about">
                <p class="about__title">KHÁCH HÀNG NÓI VỀ THÀNH LỢI SPORT</p>
            </div>
        </div>
        <div class="container">
            <div class="about2">
                <div class="about2__slider">
                    <div class="multiple-items">

                        <div class="sliderr">
                            <div class="sliderr__left">
                                <div class="sliderr__left--img"><img src="https://s101.chanh.in/uploads/2023/10/cn2-tiny.jpg.webp" alt=""></div>

                            </div>
                            <div class="sliderr__right">
                                <div class="sliderr__right--start"> <svg version="1.1" xmlns="http://www.w3.org/2000/svg" viewBox="0 12.705 512 486.59" x="0px" y="0px" xml:space="preserve" width="20px" height="20px" fill="#F7B500" style="margin-left: 1px; width: 15px;">
                                        <polygon points="256.814,12.705 317.205,198.566 512.631,198.566 354.529,313.435 414.918,499.295 256.814,384.427 98.713,499.295 159.102,313.435 1,198.566 196.426,198.566 "></polygon>
                                    </svg>
                                    <svg version="1.1" xmlns="http://www.w3.org/2000/svg" viewBox="0 12.705 512 486.59" x="0px" y="0px" xml:space="preserve" width="20px" height="20px" fill="#F7B500" style="margin-left: 1px; width: 15px;">
                                        <polygon points="256.814,12.705 317.205,198.566 512.631,198.566 354.529,313.435 414.918,499.295 256.814,384.427 98.713,499.295 159.102,313.435 1,198.566 196.426,198.566 "></polygon>
                                    </svg>
                                    <svg version="1.1" xmlns="http://www.w3.org/2000/svg" viewBox="0 12.705 512 486.59" x="0px" y="0px" xml:space="preserve" width="20px" height="20px" fill="#F7B500" style="margin-left: 1px; width: 15px;">
                                        <polygon points="256.814,12.705 317.205,198.566 512.631,198.566 354.529,313.435 414.918,499.295 256.814,384.427 98.713,499.295 159.102,313.435 1,198.566 196.426,198.566 "></polygon>
                                    </svg>
                                    <svg version="1.1" xmlns="http://www.w3.org/2000/svg" viewBox="0 12.705 512 486.59" x="0px" y="0px" xml:space="preserve" width="20px" height="20px" fill="#F7B500" style="margin-left: 1px; width: 15px;">
                                        <polygon points="256.814,12.705 317.205,198.566 512.631,198.566 354.529,313.435 414.918,499.295 256.814,384.427 98.713,499.295 159.102,313.435 1,198.566 196.426,198.566 "></polygon>
                                    </svg>
                                    <svg version="1.1" xmlns="http://www.w3.org/2000/svg" viewBox="0 12.705 512 486.59" x="0px" y="0px" xml:space="preserve" width="20px" height="20px" fill="#F7B500" style="margin-left: 1px; width: 15px;">
                                        <polygon points="256.814,12.705 317.205,198.566 512.631,198.566 354.529,313.435 414.918,499.295 256.814,384.427 98.713,499.295 159.102,313.435 1,198.566 196.426,198.566 "></polygon>
                                    </svg>
                                </div>
                                <div class="sliderr__right--title">Hoàng Tú</div>
                                <div class="sliderr__right--description">Thương hiệu uy tín và đáng tin cậy, THÀNH LỢI SPORT sẽ là sự lựa chọn đầu tiên của gia đình tôi trong việc nâng cao chất lượng cuộc sống, chăm sóc sức khỏe trong tương lai.</div>
                            </div>

                        </div>
                        <div class="sliderr">
                            <div class="sliderr__left">
                                <div class="sliderr__left--img"><img src="https://s101.chanh.in/uploads/2023/10/cn2-tiny.jpg.webp" alt=""></div>

                            </div>
                            <div class="sliderr__right">
                                <div class="sliderr__right--start"> <svg version="1.1" xmlns="http://www.w3.org/2000/svg" viewBox="0 12.705 512 486.59" x="0px" y="0px" xml:space="preserve" width="20px" height="20px" fill="#F7B500" style="margin-left: 1px; width: 15px;">
                                        <polygon points="256.814,12.705 317.205,198.566 512.631,198.566 354.529,313.435 414.918,499.295 256.814,384.427 98.713,499.295 159.102,313.435 1,198.566 196.426,198.566 "></polygon>
                                    </svg>
                                    <svg version="1.1" xmlns="http://www.w3.org/2000/svg" viewBox="0 12.705 512 486.59" x="0px" y="0px" xml:space="preserve" width="20px" height="20px" fill="#F7B500" style="margin-left: 1px; width: 15px;">
                                        <polygon points="256.814,12.705 317.205,198.566 512.631,198.566 354.529,313.435 414.918,499.295 256.814,384.427 98.713,499.295 159.102,313.435 1,198.566 196.426,198.566 "></polygon>
                                    </svg>
                                    <svg version="1.1" xmlns="http://www.w3.org/2000/svg" viewBox="0 12.705 512 486.59" x="0px" y="0px" xml:space="preserve" width="20px" height="20px" fill="#F7B500" style="margin-left: 1px; width: 15px;">
                                        <polygon points="256.814,12.705 317.205,198.566 512.631,198.566 354.529,313.435 414.918,499.295 256.814,384.427 98.713,499.295 159.102,313.435 1,198.566 196.426,198.566 "></polygon>
                                    </svg>
                                    <svg version="1.1" xmlns="http://www.w3.org/2000/svg" viewBox="0 12.705 512 486.59" x="0px" y="0px" xml:space="preserve" width="20px" height="20px" fill="#F7B500" style="margin-left: 1px; width: 15px;">
                                        <polygon points="256.814,12.705 317.205,198.566 512.631,198.566 354.529,313.435 414.918,499.295 256.814,384.427 98.713,499.295 159.102,313.435 1,198.566 196.426,198.566 "></polygon>
                                    </svg>
                                    <svg version="1.1" xmlns="http://www.w3.org/2000/svg" viewBox="0 12.705 512 486.59" x="0px" y="0px" xml:space="preserve" width="20px" height="20px" fill="#F7B500" style="margin-left: 1px; width: 15px;">
                                        <polygon points="256.814,12.705 317.205,198.566 512.631,198.566 354.529,313.435 414.918,499.295 256.814,384.427 98.713,499.295 159.102,313.435 1,198.566 196.426,198.566 "></polygon>
                                    </svg>
                                </div>
                                <div class="sliderr__right--title">Hoàng Tú</div>
                                <div class="sliderr__right--description">Thương hiệu uy tín và đáng tin cậy, THÀNH LỢI SPORT sẽ là sự lựa chọn đầu tiên của gia đình tôi trong việc nâng cao chất lượng cuộc sống, chăm sóc sức khỏe trong tương lai.</div>
                            </div>

                        </div>

                        <div class="sliderr">
                            <div class="sliderr__left">
                                <div class="sliderr__left--img"><img src="https://s101.chanh.in/uploads/2023/10/cn2-tiny.jpg.webp" alt=""></div>

                            </div>
                            <div class="sliderr__right">
                                <div class="sliderr__right--start">
                                    <svg version="1.1" xmlns="http://www.w3.org/2000/svg" viewBox="0 12.705 512 486.59" x="0px" y="0px" xml:space="preserve" width="20px" height="20px" fill="#F7B500" style="margin-left: 1px; width: 15px;">
                                        <polygon points="256.814,12.705 317.205,198.566 512.631,198.566 354.529,313.435 414.918,499.295 256.814,384.427 98.713,499.295 159.102,313.435 1,198.566 196.426,198.566 "></polygon>
                                    </svg>
                                    <svg version="1.1" xmlns="http://www.w3.org/2000/svg" viewBox="0 12.705 512 486.59" x="0px" y="0px" xml:space="preserve" width="20px" height="20px" fill="#F7B500" style="margin-left: 1px; width: 15px;">
                                        <polygon points="256.814,12.705 317.205,198.566 512.631,198.566 354.529,313.435 414.918,499.295 256.814,384.427 98.713,499.295 159.102,313.435 1,198.566 196.426,198.566 "></polygon>
                                    </svg>
                                    <svg version="1.1" xmlns="http://www.w3.org/2000/svg" viewBox="0 12.705 512 486.59" x="0px" y="0px" xml:space="preserve" width="20px" height="20px" fill="#F7B500" style="margin-left: 1px; width: 15px;">
                                        <polygon points="256.814,12.705 317.205,198.566 512.631,198.566 354.529,313.435 414.918,499.295 256.814,384.427 98.713,499.295 159.102,313.435 1,198.566 196.426,198.566 "></polygon>
                                    </svg>
                                    <svg version="1.1" xmlns="http://www.w3.org/2000/svg" viewBox="0 12.705 512 486.59" x="0px" y="0px" xml:space="preserve" width="20px" height="20px" fill="#F7B500" style="margin-left: 1px; width: 15px;">
                                        <polygon points="256.814,12.705 317.205,198.566 512.631,198.566 354.529,313.435 414.918,499.295 256.814,384.427 98.713,499.295 159.102,313.435 1,198.566 196.426,198.566 "></polygon>
                                    </svg>
                                    <svg version="1.1" xmlns="http://www.w3.org/2000/svg" viewBox="0 12.705 512 486.59" x="0px" y="0px" xml:space="preserve" width="20px" height="20px" fill="#F7B500" style="margin-left: 1px; width: 15px;">
                                        <polygon points="256.814,12.705 317.205,198.566 512.631,198.566 354.529,313.435 414.918,499.295 256.814,384.427 98.713,499.295 159.102,313.435 1,198.566 196.426,198.566 "></polygon>
                                    </svg>
                                </div>
                                <div class="sliderr__right--title">Hoàng Tú</div>
                                <div class="sliderr__right--description">Thương hiệu uy tín và đáng tin cậy, THÀNH LỢI SPORT sẽ là sự lựa chọn đầu tiên của gia đình tôi trong việc nâng cao chất lượng cuộc sống, chăm sóc sức khỏe trong tương lai.</div>
                            </div>

                        </div>

                        <div class="sliderr">
                            <div class="sliderr__left">
                                <div class="sliderr__left--img"><img src="https://s101.chanh.in/uploads/2023/10/cn2-tiny.jpg.webp" alt=""></div>

                            </div>
                            <div class="sliderr__right">
                                <div class="sliderr__right--start"> <svg version="1.1" xmlns="http://www.w3.org/2000/svg" viewBox="0 12.705 512 486.59" x="0px" y="0px" xml:space="preserve" width="20px" height="20px" fill="#F7B500" style="margin-left: 1px; width: 15px;">
                                        <polygon points="256.814,12.705 317.205,198.566 512.631,198.566 354.529,313.435 414.918,499.295 256.814,384.427 98.713,499.295 159.102,313.435 1,198.566 196.426,198.566 "></polygon>
                                    </svg>
                                    <svg version="1.1" xmlns="http://www.w3.org/2000/svg" viewBox="0 12.705 512 486.59" x="0px" y="0px" xml:space="preserve" width="20px" height="20px" fill="#F7B500" style="margin-left: 1px; width: 15px;">
                                        <polygon points="256.814,12.705 317.205,198.566 512.631,198.566 354.529,313.435 414.918,499.295 256.814,384.427 98.713,499.295 159.102,313.435 1,198.566 196.426,198.566 "></polygon>
                                    </svg>
                                    <svg version="1.1" xmlns="http://www.w3.org/2000/svg" viewBox="0 12.705 512 486.59" x="0px" y="0px" xml:space="preserve" width="20px" height="20px" fill="#F7B500" style="margin-left: 1px; width: 15px;">
                                        <polygon points="256.814,12.705 317.205,198.566 512.631,198.566 354.529,313.435 414.918,499.295 256.814,384.427 98.713,499.295 159.102,313.435 1,198.566 196.426,198.566 "></polygon>
                                    </svg>
                                    <svg version="1.1" xmlns="http://www.w3.org/2000/svg" viewBox="0 12.705 512 486.59" x="0px" y="0px" xml:space="preserve" width="20px" height="20px" fill="#F7B500" style="margin-left: 1px; width: 15px;">
                                        <polygon points="256.814,12.705 317.205,198.566 512.631,198.566 354.529,313.435 414.918,499.295 256.814,384.427 98.713,499.295 159.102,313.435 1,198.566 196.426,198.566 "></polygon>
                                    </svg>
                                    <svg version="1.1" xmlns="http://www.w3.org/2000/svg" viewBox="0 12.705 512 486.59" x="0px" y="0px" xml:space="preserve" width="20px" height="20px" fill="#F7B500" style="margin-left: 1px; width: 15px;">
                                        <polygon points="256.814,12.705 317.205,198.566 512.631,198.566 354.529,313.435 414.918,499.295 256.814,384.427 98.713,499.295 159.102,313.435 1,198.566 196.426,198.566 "></polygon>
                                    </svg>
                                </div>
                                <div class="sliderr__right--title">Hoàng Tú</div>
                                <div class="sliderr__right--description">Thương hiệu uy tín và đáng tin cậy, THÀNH LỢI SPORT sẽ là sự lựa chọn đầu tiên của gia đình tôi trong việc nâng cao chất lượng cuộc sống, chăm sóc sức khỏe trong tương lai.</div>
                            </div>

                        </div>





                        <!-- Thêm các slide khác nếu cần -->
                    </div>

                </div>
            </div>
        </div>
        <div class="container">
            <div class="about">
                <p class="about__title">Đối tác của chúng tôi</p>
            </div>
        </div>

        <div class="container">
            <div class="about1">
                <div class="about1__item">
                    <div class="about1__item--img"><img src="https://s101.chanh.in/uploads/2023/10/dt1-small.jpg.webp" alt=""></div>
                    <div class="about1__item--img"><img src="https://s101.chanh.in/uploads/2023/10/dt2-small.jpg.webp" alt=""></div>
                    <div class="about1__item--img"><img src="https://s101.chanh.in/uploads/2023/10/dt3-small.jpg.webp" alt=""></div>
                    <div class="about1__item--img"><img src="https://s101.chanh.in/uploads/2023/10/dt4-small.jpg.webp" alt=""></div>
                    <div class="about1__item--img"><img src="https://s101.chanh.in/uploads/2023/10/dt5-small.jpg.webp" alt=""></div>
                    <div class="about1__item--img"><img src="https://s101.chanh.in/uploads/2023/10/dt6-small.jpg.webp" alt=""></div>
                </div>
            </div>
        </div>
    </body>


    <!-- foooter -->


    @include('client.footer')
    @include('client.javascript')

</body>

</html>