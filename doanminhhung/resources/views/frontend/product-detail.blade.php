@extends('layouts.site')

@section('content')
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="utf-8">
        <meta name="robots" content="noindex, nofollow">

        <title>Product Detail Page - Ecommerce - Bootsnipp.com</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <style type="text/css">
            ul>li {
                margin-right: 25px;
                font-weight: lighter;
                cursor: pointer
            }

            li.active {
                border-bottom: 3px solid silver;
            }

            .item-photo {
                display: flex;
                justify-content: center;
                align-items: center;
                border-right: 1px solid #f6f6f6;
            }

            .menu-items {
                list-style-type: none;
                font-size: 11px;
                display: inline-flex;
                margin-bottom: 0;
                margin-top: 20px
            }

            .btn-success {
                width: 100%;
                border-radius: 0;
            }

            .section {
                width: 100%;
                margin-left: -15px;
                padding: 2px;
                padding-left: 15px;
                padding-right: 15px;
                background: #f8f9f9
            }

            .title-price {
                margin-top: 30px;
                margin-bottom: 0;
                color: black
            }

            .title-attr {
                margin-top: 0;
                margin-bottom: 0;
                color: black;
            }

            .btn-minus {
                cursor: pointer;
                font-size: 7px;
                display: flex;
                align-items: center;
                padding: 5px;
                padding-left: 10px;
                padding-right: 10px;
                border: 1px solid gray;
                border-radius: 2px;
                border-right: 0;
            }

            .btn-plus {
                cursor: pointer;
                font-size: 7px;
                display: flex;
                align-items: center;
                padding: 5px;
                padding-left: 10px;
                padding-right: 10px;
                border: 1px solid gray;
                border-radius: 2px;
                border-left: 0;
            }

            div.section>div {
                width: 100%;
                display: inline-flex;
            }

            div.section>div>input {
                margin: 0;
                padding-left: 5px;
                font-size: 10px;
                padding-right: 5px;
                max-width: 18%;
                text-align: center;
            }

            .attr,
            .attr2 {
                cursor: pointer;
                margin-right: 5px;
                height: 20px;
                font-size: 10px;
                padding: 2px;
                border: 1px solid gray;
                border-radius: 2px;
            }

            .attr.active,
            .attr2.active {
                border: 1px solid orange;
            }

            @media (max-width: 426px) {
                .container {
                    margin-top: 0px !important;
                }

                .container>.row {
                    padding: 0 !important;
                }

                .container>.row>.col-xs-12.col-sm-5 {
                    padding-right: 0;
                }

                .container>.row>.col-xs-12.col-sm-9>div>p {
                    padding-left: 0 !important;
                    padding-right: 0 !important;
                }

                .container>.row>.col-xs-12.col-sm-9>div>ul {
                    padding-left: 10px !important;

                }

                .section {
                    width: 104%;
                }

                .menu-items {
                    padding-left: 0;
                }
            }
        </style>
        <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
        <script type="text/javascript">
            window.alert = function() {};
            var defaultCSS = document.getElementById('bootstrap-css');

            function changeCSS(css) {
                if (css) $('head > link').filter(':first').replaceWith('<link rel="stylesheet" href="' + css +
                    '" type="text/css" />');
                else $('head > link').filter(':first').replaceWith(defaultCSS);
            }
            $(document).ready(function() {
                var iframe_height = parseInt($('html').height());
                window.parent.postMessage(iframe_height, 'https://bootsnipp.com');
            });
        </script>
    </head>

    <body>
        <!DOCTYPE html>
        <html>

        <body>
            <div class="container">
                <div class="row">
                    <div class="col-xs-4 item-photo">
                        <img style="max-width:100%;" src="{{ asset('images/product/' . $pro->image) }}" />
                    </div>
                    <div class="col-xs-5" style="border:0px solid gray">
                        <!-- Datos del vendedor y titulo del producto -->
                        <h3>{{ $pro->name }}</h3>
                        <h5 style="color:#337ab7">vendido por <a href="#">Samsung</a> · <small
                                style="color:#337ab7">(5054 ventas)</small></h5>

                        <!-- Precios -->
                        <h6 class="title-price"><small>PRECIO OFERTA</small></h6>
                        <h3 style="margin-top:0px;">{{ number_format("$pro->price")}}</h3>

                        <!-- Detalles especificos del producto -->
                        <div class="section">
                            <h6 class="title-attr" style="margin-top:15px;"><small>COLOR</small></h6>
                            <div>
                                <div class="attr" style="width:25px;background:#5a5a5a;"></div>
                                <div class="attr" style="width:25px;background:white;"></div>
                            </div>
                        </div>
                        <div class="section" style="padding-bottom:5px;">
                            <h6 class="title-attr"><small>CAPACIDAD</small></h6>
                            <div>
                                <div class="attr2">16 GB</div>
                                <div class="attr2">32 GB</div>
                            </div>
                        </div>
                        <div class="section" style="padding-bottom:20px;">
                            <h6 class="title-attr"><small>CANTIDAD</small></h6>
                            <div>
                                <div class="btn-minus"><span class="glyphicon glyphicon-minus"></span></div>
                                <input value="1" />
                                <div class="btn-plus"><span class="glyphicon glyphicon-plus"></span></div>
                            </div>
                        </div>

                        <!-- Botones de compra -->
                        <div class="section" style="padding-bottom:20px;">
                            <button class="btn btn-success"><span style="margin-right:20px"
                                    class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span> Agregar al
                                carro</button>
                            <h6><a href="#"><span class="glyphicon glyphicon-heart-empty"
                                        style="cursor:pointer;"></span> Agregar a lista de deseos</a></h6>
                        </div>
                    </div>

                    <div class="col-xs-9">
                        <ul class="menu-items">
                            <li class="active">Detalle del producto</li>
                            <li>Garantía</li>
                            <li>Vendedor</li>
                            <li>Envío</li>
                        </ul>
                        <div class="col-md-8">
                            <h5 class="title-description">Đặc Điểm Nổi Bật</h5>
                            <p>
                              Acer Nitro 16 2023 sở hữu logo mới với thiết kế hoàn toàn khác
                              biệt so với trước đây khi mặt A được thiết với hoàn toàn mới.
                              Nitro 16 2023 sở hữu thiết kế hoàn toàn mới với logo hình chữ N
                              đổi màu theo góc nhìn và ánh sáng xung quanh, tạo nên những
                              đường nét đa sắc đầy mê hoặc và thu hút. Ngoài ra, từng chi tiết
                              trong thiết kế đều được chăm chút cẩn thận và hài hòa, tạo nên
                              một tác phẩm nghệ thuật hoàn hảo mà vẫn đảm bảo độ chắc chắn và
                              bền bỉ vốn có của dòng Acer Nitro.
                            </p>
                            <ul class="list-check">
                              <li>
                                CPU: Core i5-13500H (12 cores/ 16 threads, 18MB Cache, Turbo
                                boost up to 4.70GHz)
                              </li>
                              <li>RAM: 16GB DDR5 4800MHz</li>
                              <li>Ổ cứng: 512GB M.2 PCIe NVMe SSD</li>
                              <li>
                                Màn hình: 16.0-inch FHD+ (16:10), IPS SlimBezel 165Hz DDS Acer
                                ComfyView, 100% sRGB, 500 nits
                              </li>
                              <li>Pin: 4-Cell, 90Wh</li>
                            </ul>
                            <h5 class="title-description">Kỹ thuật</h5>
                            <table class="table table-bordered">
                              <tr>
                                
                                <th colspan="2">Thông số kỹ thuật</th>
                              </tr>
                              <tr>
                                
                                <td>CPU</td>
                                <td>
                                  Core i5-13500H (12 cores/ 16 threads, 18MB Cache, Turbo
                                  boost up to 4.70GHz)
                                </td>
                              </tr>
                              <tr>
                                
                                <td>RAM</td>
                                <td>16GB DDR5 4800MHz</td>
                              </tr>
                              <tr>
                            
                                <td>Ổ cứng </td>
                                <td>
                                 
                                  <i class="fa fa-check text-success"></i> 512GB M.2 PCIe NVMe
                                  SSD
                                </td>
                              </tr>
              
                              <tr>
                                
                                <td>Card VGA</td>
                                <td>NVIDIA GeForce RTX 4050 6GB GDDR6</td>
                              </tr>
                              <tr>
                               
                                <td>MUX Switch</td>
                                <td>Đang cập nhật...</td>
                              </tr>
                              <tr>
                               
                                <td>Màn hình </td>
                                <td>
                                  16.0-inch FHD+ (16:10), IPS SlimBezel 165Hz DDS Acer
                                  ComfyView, 100% sRGB, 500 nits
                                </td>
                              </tr>
              
                              <tr>
                               
                                <td>Webcam</td>
                                <td>720p HD</td>
                              </tr>
                              <tr>
                                
                                <td>Cổng kết nối</td>
                                <td>
                                  2x USB-A 3.2 Gen 2 1x USB-A 2.0 Gen 2, 2x USB-C Thunderbolt™
                                  4, 1x HDMI 2.1, 1x Jack 3.5mm, 1x RJ45, 1x Micro SD Card, 1x
                                  Cổng nguồn
                                </td>
                              </tr>
              
                              <tr>
                              
                                <td>Trọng lượng</td>
                                <td>2.3 kg </td>
                              </tr>
                              <tr>
                             
                                <td>Pin</td>
                                <td>4-Cell, 90Wh</td>
                              </tr>
                              <tr>
                        
                                <td>Hệ điều hành</td>
                                <td>Windows bản quyền</td>
                              </tr>
                            </table>
                          </div>
                    </div>
                </div>
            </div>
        </body>

        </html>
        <script type="text/javascript">
            $(document).ready(function() {
                //-- Click on detail
                $("ul.menu-items > li").on("click", function() {
                    $("ul.menu-items > li").removeClass("active");
                    $(this).addClass("active");
                })

                $(".attr,.attr2").on("click", function() {
                    var clase = $(this).attr("class");

                    $("." + clase).removeClass("active");
                    $(this).addClass("active");
                })

                //-- Click on QUANTITY
                $(".btn-minus").on("click", function() {
                    var now = $(".section > div > input").val();
                    if ($.isNumeric(now)) {
                        if (parseInt(now) - 1 > 0) {
                            now--;
                        }
                        $(".section > div > input").val(now);
                    } else {
                        $(".section > div > input").val("1");
                    }
                })
                $(".btn-plus").on("click", function() {
                    var now = $(".section > div > input").val();
                    if ($.isNumeric(now)) {
                        $(".section > div > input").val(parseInt(now) + 1);
                    } else {
                        $(".section > div > input").val("1");
                    }
                })
            })
        </script>
    </body>

    </html>
@endsection
