<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/cart.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <style>
        .img-fluidl {
            max-width: 50px;
            height: auto;
        }
    </style>

</head>

<body>


    @include('client.header')
    <div class="container">
        <ul class="ul">
            <li><a href="/">Trang Chủ</a> <i class="fas fa-angle-right"></i></li>
            <li class="opacity">Giỏ hàng
            </li>
        </ul>
    </div>

    <div class="container">
        <div class="cart">
            <div class="cart__list">
                @if(count($carts) > 0)
                <table>
                    <thead>
                        <tr>
                            <th class="img"></th>
                            <th class="name">Name</th>
                            <th class="quantity">Giá</th>
                            <th>Số lượng</th>
                            <th>Thành tiền</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($carts as $cart)
                        <tr>
                            <td>
                                <form action="{{ route('carts.destroy', $cart->rowId) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-outline-danger" type="submit">X</button>
                                </form><img class="img-fluidl" src="{{ $cart->options->img }}" alt="hhh">
                            </td>
                            <td>{{$cart->name}}</td>
                            <td>${{$cart->price}}</td>
                            <td>
                                <div class="qty" data-rowid="{{ $cart->rowId }}" data-price="{{ $cart->price }}">
                                    <a href="" class="btn-minus"><i class="fa fa-minus"></i></a>
                                    <input type="text" class="quantity-input" value="{{ $cart->qty }}">
                                    <a href="" class="btn-plus"><i class="fa fa-plus"></i></a>
                                </div>
                            </td>

                            <td class="total-price__text" data-rowid="{{ $cart->rowId }}" data-price="{{ $cart->price }}" id="total-price-{{ $cart->rowId }}">${{$cart->price*$cart->qty}}</td>


                        </tr>
                        @endforeach
                    </tbody>


                </table>
                <form action="{{ route('cart.clear') }}" method="POST">
                    @csrf
                    <button type="submit">Xóa tất cả</button>
                </form>
                @else
                <div class="cart__list--none">
                    <p>Giỏ hàng của bạn đang trống</p>
                    <a href="/">tiếp tục mua hàng</a>
                </div>

                @endif



            </div>
            @if(count($carts) > 0)
            <div class="cart__description">
                <div class="cart__description--title">
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
                    <div class="title">Tóm tắt đơn hàng</div>

                </div>

                <div class="cart__description--price">
                    <span class="name1">Tạm tính</span>
                    <span class="next summary-total-price">${{$totalPrice}}</span>

                </div>
                <div class="cart__description--total">
                    <span class="name1">Tổng cộng</span>
                    <span class="next summary-total-price">${{$totalPrice}}</span>

                </div>
                <div class="cart__description--button">
                    <a class="btn" href="{{ route('checkout', $cart->rowId) }}">Đặt hàng</a>
                </div>

            </div>
            @else
            @endif
        </div>
    </div>





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

    @include('client.footer')
    @if(Session::has('messa'))
    <script>
        swal("Xóa sản phẩm ", "{{Session::get('messa')}}", 'error', {
            button: true,
            button: "OK",
            timer: 3000,
            dangerMode: true,
        });
    </script>
    @endif
    @include('client.javascript')

</body>

</html>
<script>
    $(document).ready(function() {
        $(".btn-plus").on("click", function(e) {
            e.preventDefault();
            var quantityInput = $(this).siblings(".quantity-input");
            var rowId = $(this).parent().data("rowid");
            var Price = $(this).parent().data("price");
            var newQuantity = parseInt(quantityInput.val()) + 1;
            quantityInput.val(newQuantity);
            updateCart(rowId, newQuantity);
            updateTotalPrice(rowId, Price, newQuantity);
            updateSummaryTotalPrice();
        });

        $(".btn-minus").on("click", function(e) {
            e.preventDefault();
            var quantityInput = $(this).siblings(".quantity-input");
            var rowId = $(this).parent().data("rowid");
            var Price = $(this).parent().data("price");
            var newQuantity = parseInt(quantityInput.val()) - 1;
            if (newQuantity < 1) {
                newQuantity = 1;
            }
            quantityInput.val(newQuantity);
            updateCart(rowId, newQuantity);
            updateTotalPrice(rowId, Price, newQuantity);
            updateSummaryTotalPrice();
        });

        $('.quantity-input').on('change', function() {
            var quantityInput = $(this);
            var rowId = quantityInput.closest(".total-price__text").data("rowid");
            var Price = quantityInput.closest(".total-price__text").data("price");
            var qty = quantityInput.val();
            updateTotalPrice(rowId, Price, qty);
            updateCart(rowId, qty);
            updateSummaryTotalPrice();
        });

        function updateTotalPrice(rowId, Price, qty) {
            var totalPriceCell = $('.total-price__text[data-rowid="' + rowId + '"]');
            totalPriceCell.text('$' + (Price * qty).toFixed(2));
        }

        function updateCart(rowId, newQuantity) {
            console.log('rowId:', rowId);
            console.log('newQuantity:', newQuantity);
            $.ajax({
                type: 'POST',
                url: '{{ route('update.carts') }}',
                data: {
                    _token: '{{ csrf_token() }}',
                    row_id: rowId,
                    newQuantity: newQuantity,
                },
                success: function(response) {
                    if (response.success) {
                        console.log('Cập nhật giỏ hàng thành công.');
                        $('#quantity-display-' + rowId).text(newQuantity);
                    }
                },
                error: function(xhr, status, error) {
                    console.error('Lỗi khi cập nhật giỏ hàng:', error);
                    console.log(xhr.responseText);
                },
            });
        }

        function updateSummaryTotalPrice() {
            var totalPrice = 0;

            $(".total-price__text").each(function() {
                totalPrice += parseFloat($(this).text().replace('$', ''));
            });

            $(".summary-total-price").text('$' + totalPrice.toFixed(2));
        }
    });
</script>