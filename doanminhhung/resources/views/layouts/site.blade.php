<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Website-LapTop</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('site/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('site/images') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.3/css/bootstrap.min.css"
        integrity="sha512-SbiR/eusphKoMVVXysTKG/7VseWii+Y3FdHrt0EpKgpToZeemhqHeZeLWLhJutz/2ut2Vw1uQEj2MbRF+TVBUA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
        integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js"
        integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.min.js"
        integrity="sha384-ODmDIVzN+pFdexxHEHFBQH3/9/vQ9uori45z4JjnFsRydbmQbmL5t1tQ0culUzyK" crossorigin="anonymous">
    </script>

</head>

<body>
    <div class="container">
        <div class="nav justify-content-between ">
            <a href="/">
            <div class="logo-img">
                <img class="w-100" src="{{ asset('site/images/logo.psd.jpg') }}" alt="">
            </div>
            </a>
            <div class="search mt-5">
                <div class="input-group mb-3">
                    <form action={{ route('site.search') }} class="d-flex" method="post">
                        @csrf
                    <input type="text" name="search" class="form-control rounded-0 border-primary" placeholder="search..."
                        aria-label="Recipient's username" aria-describedby="basic-addon2">
                    <span class="input-group-text bg-primary text-white rounded-0" id="basic-addon2"><i
                            class="fa-solid fa-magnifying-glass"></i></span>
                    </form>
                </div>
            </div>
            <div class="hotline mt-5">
                <p class="text-danger m-0 p-0 fs-5"><i class="fa-solid fa-phone xanh"></i><strong class="xanh"> HOTLINE</strong></p>
                <p class="m-0 p-0 ms-3"><strong>0866190841</strong></p>
            </div>
            <div class="user mt-5">
                <div class="row">
                    <div class="col">
                        <a class="row" href="{{ route('site.loginn') }}">
                            <div class="text-danger col-12"><i class="fa-solid fa-user ms-4 fs-3 xanh"></i></div>
                            <div href="helo" class="col-12"><strong>Tài Khoản</strong></div>
                        </a>

                    </div>
                    <div class="col">
                        <div class="row">
                            <div class="text-danger col-12"><i class="fa-solid fa-heart ms-3 fs-3 xanh"></i></div>
                            <div class="col-12"><strong>Yêu Thích</strong></div>
                        </div>

                    </div>
                    <div class="col">
                        <div class="row">
                            <div class="text-danger col-12"><i class="fa-solid fa-cart-plus ms-3 fs-3 xanh"></i></div>
                            <div class="col-12"><strong>Giỏ Hàng</strong></div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <x-main-menu />

    <style>
        #snowflakeContainer{position:absolute;left:0px;top:0px;}
        .snowflake{padding-left:15px;font-size:14px;line-height:24px;position:fixed;color:#ebebeb;user-select:none;z-index:1000;-moz-user-select:none;-ms-user-select:none;-khtml-user-select:none;-webkit-user-select:none;-webkit-touch-callout:none;}
        .snowflake:hover {cursor:default}
    </style>
    <div id='snowflakeContainer'>
    <p class='snowflake'></p>
    </div>
    <script style='text/javascript'>
        //<![CDATA[
        var requestAnimationFrame=window.requestAnimationFrame||window.mozRequestAnimationFrame||window.webkitRequestAnimationFrame||window.msRequestAnimationFrame;var transforms=["transform","msTransform","webkitTransform","mozTransform","oTransform"];var transformProperty=getSupportedPropertyName(transforms);var snowflakes=[];var browserWidth;var browserHeight;var numberOfSnowflakes=50;var resetPosition=false;function setup(){window.addEventListener("DOMContentLoaded",generateSnowflakes,false);window.addEventListener("resize",setResetFlag,false)}setup();function getSupportedPropertyName(b){for(var a=0;a<b.length;a++){if(typeof document.body.style[b[a]]!="undefined"){return b[a]}}return null}function Snowflake(b,a,d,e,c){this.element=b;this.radius=a;this.speed=d;this.xPos=e;this.yPos=c;this.counter=0;this.sign=Math.random()<0.5?1:-1;this.element.style.opacity=0.5+Math.random();this.element.style.fontSize=4+Math.random()*30+"px"}Snowflake.prototype.update=function(){this.counter+=this.speed/5000;this.xPos+=this.sign*this.speed*Math.cos(this.counter)/40;this.yPos+=Math.sin(this.counter)/40+this.speed/30;setTranslate3DTransform(this.element,Math.round(this.xPos),Math.round(this.yPos));if(this.yPos>browserHeight){this.yPos=-50}};function setTranslate3DTransform(a,c,b){var d="translate3d("+c+"px, "+b+"px, 0)";a.style[transformProperty]=d}function generateSnowflakes(){var b=document.querySelector(".snowflake");var h=b.parentNode;browserWidth=document.documentElement.clientWidth;browserHeight=document.documentElement.clientHeight;for(var d=0;d<numberOfSnowflakes;d++){var j=b.cloneNode(true);h.appendChild(j);var e=getPosition(50,browserWidth);var a=getPosition(50,browserHeight);var c=5+Math.random()*40;var g=4+Math.random()*10;var f=new Snowflake(j,g,c,e,a);snowflakes.push(f)}h.removeChild(b);moveSnowflakes()}function moveSnowflakes(){for(var b=0;b<snowflakes.length;b++){var a=snowflakes[b];a.update()}if(resetPosition){browserWidth=document.documentElement.clientWidth;browserHeight=document.documentElement.clientHeight;for(var b=0;b<snowflakes.length;b++){var a=snowflakes[b];a.xPos=getPosition(50,browserWidth);a.yPos=getPosition(50,browserHeight)}resetPosition=false}requestAnimationFrame(moveSnowflakes)}function getPosition(b,a){return Math.round(-1*b+Math.random()*(a+2*b))}function setResetFlag(a){resetPosition=true};
        //]]>
    </script>
    <!-- end header-->

    {{-- require_once('views/frontend/mod-mainmenu.php')  --}}
    <!-- <section class="mainmenu bg-mainmenu">
        <div class="container">
            <nav>
                <ul class="menu clearfix">
                    <li><a href="#">Trang chủ</a></li>
                    <li><a href="#">Giới thiệu</a></li>
                    <li><a href="#">Sản phẩm</a>
                        <ul class="submenu">
                            <li><a href="#">Asus</a></li>
                            <li><a href="#">Hp</a></li>
                            <li><a href="#">Acer</a></li>
                            <li><a href="#">Msi</a></li>
                            <li><a href="#">Dell</a></li>
                        </ul>
                    </li>
                    
                    <li><a href="#">Phụ kiện</a>
                        <ul class="submenu">
                            <li><a href="#">BaLo LapTop</a></li>
                            <li><a href="#">Ram LapTop</a></li>
                            <li><a href="#">Bàn Phím LapTop</a></li>
                            <li><a href="#">Màng Hình LapTop</a></li>
                            <li><a href="#">Pin LapTop</a></li>
                        </ul>
                        </li>
                    <li><a href="#">Khuyến Mãi</a></li>
                </ul>
            </nav>
        </div>
    </section> -->

    <!-- end mainmenu-->
        @yield('content')
        <div class="container">
           

            <!-- end maincontent-->
            <section class="footer bg-footer py-4">
                <div class="container text-white">
                    <div class="row clearfix">
                        <div class="col-3">
                            <h4 class="h4chucuoi">Gới thiệu về công ty</h4>
                            <div class="row clearfix">
                                <ul class="blue menu1 my-4">
                                    <li>LaptopAZ.vn 2022 Công ty công nghệ thông minh IT</li>
                                    <li>LapTop đang trong giai đoạn phát triển mạnh với nhiều mặt hàng phong phú giá
                                        cả cạnh tranh, mong muốn đem đến chất lượng tốt nhất cho khách hàng.</li>
                                    <li>Địa chỉ: Ký Túc Xá Trường Cao Đẳng Công Thương TP.HCM, Đường Tăng Nhơn Phú,
                                        Phước Long B, Quận 9, Thành phố Hồ Chí Minh</li>
                                    <li>Điện thoại: 0866190841</li>
                                    <li>Email: minhhung201020033@gmail.com</li>
                                    <a href="https://www.facebook.com/doanminhhung.in4"><i class="fab fa-facebook-f"></i></a>
                                    <a href="https://www.youtube.com/"><i class="fab fa-youtube"></i></a>
                                    <a href="https://www.tiktok.com/foryou"><i class="fab fa-tiktok"></i></a>
                                </ul>
                            </div>
                        </div>
                        <div class="col-3">
                            <h4 class="h4chucuoi">Chính sách công ty</h4>
                            <div class="row clearfix">
                                <ul class="blue menu1 my-4 mt">
                                    <li>Chính sách chất lượng</li>
                                    <li>Chính sách bảo hành</li>
                                    <li>Chính sách đổi trả</li>
                                    <li>Chính sách bảo mật thông tin</li>
                                    <li>Chính sách vận chuyển</li>
                                    <li>Hướng dẫn mua hàng- thanh toán</li>
                                </ul>
                            </div>
                            <img src="{{ asset('images/product/bct.png') }}">
                            <h4 class="h4chucuoi">HỆ THỐNG CỬA HÀNG LAPTOPAZ</h4>
                            <div class="row clearfix">
                                <ul class="blue menu1 my-4">
                                    <li>KTX Cao Đẳng CT</li>
                                    <li>Hotline: 0866 190 841</li>
                                    <li>Bán hàng: Từ 8h30 - 21h30</li>
                                    <li>Kỹ thuật: Từ 8h30 - 12h & 13h30 - 17h30</li>
                                    <li>Xem chỉ đường</li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-3">
                            <h4 class="h4chucuoi">Các chính sách</h4>
                            <div class="row clearfix">
                                <ul class="blue menu1 my-4">
                                    <li>Chính sách đổi trả hàng</li>
                                    <li>Chính sách bảo hành - bảo trì</li>
                                    <li>Phương thức thanh toán</li>
                                    <li>Chính sách trả góp</li>
                                    <li>Giao hàng và nhận hàng</li>
                                </ul>
                            </div>
                            <iframe width="560" height="315" src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d125416.89354201766!2d106.6071321413208!3d10.790013022570811!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1svi!2s!4v1700103443925!5m2!1svi!2s" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                        </div>
                        <div class="col-3">
                            <h4 class="h4chucuoi">Hỗ trợ - Dịch vụ</h4>
                            <div class="row clearfix">
                                <ul class="blue menu1 my-4 ">
                                    <li>Dịch vụ sửa chữa</li>
                                    <li>Gói nâng cấp tăng tốc độ</li>
                                    <li>Bảo dưỡng – chăm sóc máy tính</li>
                                    <li>Hướng dẫn mua trả góp</li>
                                    <li>Hướng dẫn mua hàng từ xa</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- end footer-->
            <section class="copyright w-100  bg-footer text-white py-3 ">
                <div class="container border-top ">
                    <p class="blue text-center m-0 p-0 mt-2 text-white"><strong>Bản quyền thuộc về Minh
                            Hưng</strong></p>
                </div>
            </section>
            <!-- end copyright-->
        </div>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.3/js/bootstrap.bundle.min.js"
            integrity="sha512-i9cEfJwUwViEPFKdC1enz4ZRGBj8YQo6QByFTF92YXHi7waCqyexvRD75S5NVTsSiTv7rKWqG9Y5eFxmRsOn0A=="
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</body>

</html>
