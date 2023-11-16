@extends('layouts.site')
@section('title', 'Trang chủ')

@section('content')
    <div class="container">

        <x-slide-show />

        {{-- require_once('views/frontend/mod-slider.php')  --}}
    </div>
    <div class="container">
        <div class="row py-3">
            <div class="col-3">
                <div class="row clearfix">
                    <div class="col-6">
                        <div class="tuvan2 text-right lammo">
                            <i class="fa-solid fa-truck"></i>
                        </div>
                    </div>
                    <div class="col-6 ">
                        <p class="m-0 p-0 lambo1">FREE SHIP</p>
                        <p class="m-0 p-0 lammo">Free ship với đơn hàng > 498K</p>
                    </div>
                </div>
            </div>
            <div class="col-3">
                <div class="row clearfix">
                    <div class="col-6">
                        <div class="tuvan2 text-right lammo">
                            <i class="fa-solid fa-money-check"></i>
                        </div>
                    </div>
                    <div class="col-6 ">
                        <p class="m-0 p-0 lambo1">PAY COD</p>
                        <p class="m-0 p-0 lammo">Thanh toán khi nhận hàng (COD)</p>
                    </div>
                </div>
            </div>
            <div class="col-3">
                <div class="row clearfix">
                    <div class="col-6">
                        <div class="tuvan2 text-right lammo">
                            <i class="fa-solid fa-gem"></i>
                        </div>
                    </div>
                    <div class="col-6 ">
                        <p class="m-0 p-0 lambo1">VIP</p>
                        <p class="m-0 p-0 lammo">Ưu đãi dành cho khách hàng VIP</p>
                    </div>
                </div>
            </div>
            <div class="col-3">
                <div class="row clearfix">
                    <div class="col-6">
                        <div class="tuvan2 text-right lammo">
                            <i class="fa-solid fa-cash-register"></i>
                        </div>
                    </div>
                    <div class="col-6">
                        <p class="m-0 p-0 lambo1"> BẢO HÀNH</p>
                        <p class="m-0 p-0 lammo">Đổi, sửa đồ tại tất cả store</p>
                    </div>
                </div>
            </div>

        </div>
        <style>
            .thanh {
                height: 45px;
            }

            ul {
                list-style: none;
            }

            .d-flex {
                color: blue;
            }

            .thanh ul li:hover {
                color: orange;
                cursor: pointer;
            }

            .row {
                cursor: pointer;
            }

            .mt-4 {
                list-style: none;
            }

            .card img {
                /* -webkit-transform:scale(0.5); Webkit: Thu nhỏ kích thước ảnh còn 0.8 so với ảnh gốc */
                -moz-transform: scale(1.1);
                /*Thu nhỏ đối với Mozilla*/
                -o-transform: scale(1.1);
                /*Thu nhỏ đối với Opera*/
                -webkit-transition-duration: 0.5s;
                /*Webkit: Thời gian phóng to, nhỏ ảnh*/
                -moz-transition-duration: 0.5s;
                /*Như trên*/
                -o-transition-duration: 0.5s;
                /*Như trên*/
                /* opacity: 0.7; Độ mờ của hình ảnh */
                margin: 0 10px 5px 0;
                /*căn đều giữa ảnh*/
            }

            .card img:hover {
                -webkit-transform: scale(0.9);
                /*Webkit: Tăng kích cỡ ảnh lên 1.1 lần*/
                -moz-transform: scale(1.1);
                -o-transform: scale(1.1);
                box-shadow: 0px 0px 30px gray;
                /*Đổ bóng bằng CSS3*/
                -webkit-box-shadow: 0px 0px 30px gray;
                -moz-box-shadow: 0px 0px 30px gray;
                opacity: 1;
                /*Độ mờ của hình ảnh*/
            }
        </style>
        <div class="container">
            @foreach ($list_category as $cat)
                <x-product-home :cat="$cat" />
            @endforeach
        </div>
    @endsection
