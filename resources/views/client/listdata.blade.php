@foreach($products as $product)
    @if($product->status == 2)
    <form class="product1__item"  action="{{ route('client.carts.add') }}" method="POST">
        @csrf
        <input type="hidden" name="product_id" value="{{ $product->id }}">
        <input type="hidden" name="product_name" value="{{ $product->name }}">
        <input type="hidden" name="product_img" value="{{  asset('img/'.$product->img) }}">
        <input type="hidden" name="product_price" value="{{ $product->price }}"> <!-- Giá trị mặc định cho giá -->

        <div class="product1__item--top">
            <div class="item-sale">30%</div>
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
                <del class="price-left"> {{$product->sale}}
                </del>
                <div class="price-center">{{$product->price}}</div>
                <div class="price-right"></div>
            </div>
            <div class="product1__item--stock">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" height="12">
                    <path d="M234.5 5.7c13.9-5 29.1-5 43.1 0l192 68.6C495 83.4 512 107.5 512 134.6V377.4c0 27-17 51.2-42.5 60.3l-192 68.6c-13.9 5-29.1 5-43.1 0l-192-68.6C17 428.6 0 404.5 0 377.4V134.6c0-27 17-51.2 42.5-60.3l192-68.6zM256 66L82.3 128 256 190l173.7-62L256 66zm32 368.6l160-57.1v-188L288 246.6v188z"></path>
                </svg>@if($product->stock_status == 2)
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