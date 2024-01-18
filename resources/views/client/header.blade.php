<header>
    <div class="header">

        <div class="header__top">
            <div class="container">
                <div class="header__top--left">
                    <p> <a href="">Tài khoản</a>
                        <a href="">Sản phẩm yêu thích</a>
                    </p>
                </div>
                <div class="header__top--center">
                </div>
                <div class="header__top--right">
                    <p>
                        <span>Hotline:
                            <a href="(+84) 384.474.238">(+84) 384.474.238</a>
                        </span>
                        <span>hoặc:
                            <a href="mailto::infor@sudo.vn">infor@sudo.vn</a>
                        </span>
                    </p>
                </div>

            </div>

        </div>
        <div class="header__center">
            <div class="container">
                <div class="header__center--left">

                    <svg xmlns="http://www.w3.org/2000/svg" height="16" width="16" viewBox="0 0 512 512">
                        <path d="M80 368H16a16 16 0 0 0 -16 16v64a16 16 0 0 0 16 16h64a16 16 0 0 0 16-16v-64a16 16 0 0 0 -16-16zm0-320H16A16 16 0 0 0 0 64v64a16 16 0 0 0 16 16h64a16 16 0 0 0 16-16V64a16 16 0 0 0 -16-16zm0 160H16a16 16 0 0 0 -16 16v64a16 16 0 0 0 16 16h64a16 16 0 0 0 16-16v-64a16 16 0 0 0 -16-16zm416 176H176a16 16 0 0 0 -16 16v32a16 16 0 0 0 16 16h320a16 16 0 0 0 16-16v-32a16 16 0 0 0 -16-16zm0-320H176a16 16 0 0 0 -16 16v32a16 16 0 0 0 16 16h320a16 16 0 0 0 16-16V80a16 16 0 0 0 -16-16zm0 160H176a16 16 0 0 0 -16 16v32a16 16 0 0 0 16 16h320a16 16 0 0 0 16-16v-32a16 16 0 0 0 -16-16z" />
                    </svg>
                    <img class="img" src="https://s101.chanh.in/uploads/2023/10/logo.png.webp" alt="">

                </div>
                <div class="header__center--center">
                    <input type="text" class="input" placeholder="Tìm kiếm">
                    <button class="search"><i class="fas fa-search"></i></button>
                </div>
                <div class="header__center--right">
                    <div class="header-login">
                        <p> Tài khoản <i class="fa-solid fa-chevron-down"></i></p>
                        <span class="login-text"> <a href="{{ route('loginAdmin') }}">Đăng nhập</a></span>
                    </div>
                    <div class="header-favourite">
                        <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACAAAAAgCAYAAABzenr0AAAABHNCSVQICAgIfAhkiAAAAAlwSFlzAAAA3QAAAN0BcFOiBwAAABl0RVh0U29mdHdhcmUAd3d3Lmlua3NjYXBlLm9yZ5vuPBoAAAJoSURBVFiFxZc9SBxBFMd/sycLildYiDYakIBlAnJXxE6wvi5gZWVlIWJaDSm1sTONla2xVUhlFVAxJJUcBEwVsIvkgkI4X4p7675b5za7e3e5gYGbef8vZmdn9pyIMMgWDNQdGOpUcM6VgFngBdAEvgDfROQhTdA5FwDPgZdACfgK1EWk6SWISFtX0xPgDpBEbwAfgGkPb1prDQ/vTjVnn/CMQAi8Be4T5B/AjSfIG13BIf2dNL5Rrp27V4/QF+DQAK+AGjBu6pPAa+Da4D5qj8bXipk0vHHVujK4w7YAwLIpvrMJPUs9Aux6lnkXGEnhhaod4ZejN/AZcKuT+50EPIKrwIP21Ry8ffW6VW82dOI7MJpVSMXmgLmcnFH1EmAjACq02rGINMjRRORSRC5zchrAsQ4rAVDVwUUeoS5b5FUNgLIOfv3HAJFXOTBpKh3A/WiR10UAnOtgwTnn+u2sHgs6PIfWHmjS2pVreXZ0kQ6sqVcTqEaT28RndqWP5hXiO2bbnoQh8FkLP4H5PpjPq7aoV/gYQAEzxAfEb2Cxh+aLqhkdeDOPtQRwCqgT31y1HpjXiG/YOjDVVvcQJmh9RAjwB1jqwnxJNUQ1J55gOhDHgDOzW1cKmK+Yt+sMGPPiUgTKwCnx9bmew3zd8E6BckfsP4SGaX1KRWJbGcy3DP4EGE7FZxAMgSMjupOC3TG4I1I+bDIHUOEScGDE3wPO1J3ORfUDoJRJO8dzdcBe0sQTbs+G61mAlGXO9Hh6FkBDbBrTqG8W0ipC0hD2Vcv8iia7U7FCzTn3CkBEPhXW6CZAL9rA/x3/BRgixnh/DACcAAAAAElFTkSuQmCC" alt="Icon heart" width="24" height="24">
                    </div>
                    <div class="header-cart">
                        <a href="{{ route('client.carts.index') }}"> 
                        <div class="cart-count">
                            {{$cartCount}}
                            </div>
                            <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACAAAAAgCAYAAABzenr0AAAABHNCSVQICAgIfAhkiAAAAAlwSFlzAAAA3QAAAN0BcFOiBwAAABl0RVh0U29mdHdhcmUAd3d3Lmlua3NjYXBlLm9yZ5vuPBoAAAJlSURBVFiFxZc/aBRBFMZ/X05EJcR/aCeCoOYCKVQw/iWkUAQ7FQlIsLIQbC1sRHuxT0ijpSBYiZ2XCxFDwHiKFkK0MFcIoqgRjRifxc66c8ne7MntXh4MM/t2vnnfvvfmzazMjNUUAaeBC0CXp38D3DSzpU6QqAOW0obNjKJbF3AdeAxUXPvmiA114utXMALuOA+87pQHlsuk63slbS3aAWsCBASMSHpakO0lYFZp21DSB2B7QYZ9qaSFABIvFC170kIAUAXOuvEg8DVnw/eA3cBUMwK+B9abWTUvy5J6gF3ucaJZCGokX308L+NOjgGlIAEz+wNMeYA8ZdD1H4FXzTwASRgGJK0tgEDVzCxEII77OuBAHpYldXtrTQCplTCWGeCnG+eVB0dIil8lSMDMfgHTOROI3f8JeBkk4CTOg6OSlCOBSXMluFkdWE5gM3BD0uc2CRx0feWfJnRUAt3Ab9IvLO20fbGNoAfMbEHSLeASSfFoRwx4CDyPFamnYSclKwcAkLQF2E9UnmtmttgirgSUgR3ACzOrr5iUkQMCrgGLJPGrAyezrlpALzBLY+zHgA0N8zIWuUx6Ev0AygFcD/CuCXb0fwjMO9AzYAA474wbMB7AXfEMXgX6gQeeblsmAaK9HwNGPP19p5sOYEfdnDlP1++tNxS6FcfyheQf4YSkkqRNwCGnex/Axu92Siq78amU95khGPdYzwPfvedzAVwf0UFmRIVszsPN4LZ/KzmwEXjCykS63cIuuOiRiNtbYK8/L7MQub08DBwmqgOPWr0jSuoDzhDVgRpw18wWGuasdiX8C9qvvAr/I/1bAAAAAElFTkSuQmCC" alt="Icon cart" width="24" height="24">
                           

                        </a>
                    </div>
                </div>

            </div>
        </div>

    </div>

</header>

<script>
    function updateCartCount(count) {
    var cartCountElement = document.querySelector('.cart-count');
    cartCountElement.textContent = count;

    // Đặt màu đỏ nếu có hàng trong giỏ
    if (count > 0) {
        cartCountElement.style.backgroundColor = 'red';
    } else {
        cartCountElement.style.backgroundColor = 'transparent';
    }
}
</script>