<div class="thanh  mt-3">
    <div class="col-3 bg-primary">
        <h3 class="text-white text-center">{{ $category->name }}</h3>
    </div>
    <div class="col">
        <ul class="d-flex ">
            <li class="mt-2 me-3"><strong style="color: black;">Mức giá: </strong></li>
            <li class="mt-2 me-4">5 TRIỆU - 10 TRIỆU </li>
            <li class="mt-2 me-4">10 TRIỆU - 20 TRIỆU </li>
            <li class="mt-2 me-4">20 TRIỆU - 30 TRIỆU </li>
            <li class="mt-2 me-4">30 TRIỆU - 40 TRIỆU </li>
            <li class="mt-2 me-4">TRÊN 40 TRIỆU </li>
        </ul>
    </div>

</div>

<div class="row clearfix border-top">
    <div class="meunu5 ">
        <div class="container">
            <div class="row row-cols-1 row-cols-md-4 g-4 mt-1">
               @foreach ($list_product as $productitem)
                    <x-productitem :productitem="$productitem" /> 
                @endforeach

            </div>
        </div>
    </div>

    {{-- <div class="thanh  mt-3">
        <div class="col-3 bg-primary">
            <h3 class="text-white text-center">LapTop Đồ Họa</h3>
        </div>
        <div class="col">
            <ul class="d-flex ">
                <li class="mt-2 me-3"><strong style="color: black;">Mức giá: </strong></li>
                <li class="mt-2 me-4">5 TRIỆU - 10 TRIỆU </li>
                <li class="mt-2 me-4">10 TRIỆU - 20 TRIỆU </li>
                <li class="mt-2 me-4">20 TRIỆU - 30 TRIỆU </li>
                <li class="mt-2 me-4">30 TRIỆU - 40 TRIỆU </li>
                <li class="mt-2 me-4">TRÊN 40 TRIỆU </li>
            </ul>
        </div>

    </div>

    <div class="row clearfix border-top">
        <div class="meunu5 ">
            <div class="container">
                <div class="row row-cols-1 row-cols-md-4 g-4 mt-1">
                    <div class="col">
                        <div class="card">
                            <a class="csw-media" href="#">
                                <img src={{ asset('site/images/dohoa.jpg') }} width="265px" alt="">
                            </a>
                            <div class="card-body">
                                <h5 class="card-title text-center">[Mới 100%] Acer Gaming Predator Helios
                                    300
                                    2022</h5>
                                <h6 class="card-title text-center">(Core i7-12700H, 16GB, 512GB, RTX 3060,
                                    15.6'' QHD 165Hz)</h6>
                                <p class="card-text text-danger text-center">Giá: 43.490.000đ</p>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card">
                            <a class="csw-media" href="#">
                                <img src={{ asset('site/images/dohoa1.jpg') }} width="265px" alt="">
                            </a>
                            <div class="card-body">
                                <h5 class="card-title text-center">[Mới 100%] Laptop Lenovo ThinkPad P1
                                </h5>
                                <h6 class="card-title text-center">Core i7-10750H, 8GB, 256GB, NVIDIA®
                                    Quadro
                                    T1000 4GB</h6>
                                <p class="card-text text-danger text-center">Giá: 37.490.000đ</p>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card">
                            <a class="csw-media" href="#">
                                <img src={{ asset('site/images/dohoa4.jpg') }} width="265px" alt="">
                            </a>
                            <div class="card-body">
                                <h5 class="card-title text-center">[Mới 100%] Acer Nitro 5 Tiger 2022
                                    AN515-58
                                </h5>
                                <h6 class="card-title text-center">(Core i5 - 12500H, 8GB, 512GB, RTX 3060,
                                    15.6" FHD IPS 144Hz)</h6>
                                <p class="card-text text-danger text-center">Giá: 23.990.000đ</p>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card">
                            <a class="csw-media" href="#">
                                <img src={{ asset('site/images/dohoa3.jpg') }} width="265px" alt="">
                            </a>
                            <div class="card-body">
                                <h5 class="card-title text-center">[Mới 100%] Laptop Gaming HP Victus</h5>
                                <h6 class="card-title text-center">(AMD Ryzen 5-5600H, 8GB, 512GB, RTX
                                    3050Ti
                                    4GB)</h6>
                                <p class="card-text text-danger text-center">Giá: 31.690.000đ</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="thanh  mt-3">
            <div class="col-3 bg-primary">
                <h3 class="text-white text-center">Học Tập - Văn Phòng</h3>
            </div>
            <div class="col">
                <ul class="d-flex ">
                    <li class="mt-2 me-3"><strong style="color: black;">Mức giá: </strong></li>
                    <li class="mt-2 me-4">5 TRIỆU - 10 TRIỆU </li>
                    <li class="mt-2 me-4">10 TRIỆU - 20 TRIỆU </li>
                    <li class="mt-2 me-4">20 TRIỆU - 30 TRIỆU </li>
                    <li class="mt-2 me-4">30 TRIỆU - 40 TRIỆU </li>
                    <li class="mt-2 me-4">TRÊN 40 TRIỆU </li>
                </ul>
            </div>

        </div>

        <div class="row clearfix border-top">
            <div class="meunu5 ">
                <div class="container">
                    <div class="row row-cols-1 row-cols-md-4 g-4 mt-1">
                        <div class="col">
                            <div class="card">
                                <a class="csw-media" href="#">
                                    <img src={{ asset('site/images/hoctap.jpg') }} width="260px" alt="">
                                </a>
                                <div class="card-body">
                                    <h5 class="card-title text-center">[Mới 100%] Asus Zenbook 14 Q408UG
                                    </h5>
                                    <h6 class="card-title text-center">(Ryzen 5-5500U, 8GB, 256GB, MX450,
                                        14.0''
                                        FHD IPS)</h6>
                                    <p class="card-text text-danger text-center">Giá: 15.890.000đ</p>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card">
                                <a class="csw-media" href="#">
                                    <img src={{ asset('site/images/hoctap1.jpg') }} width="260px" alt="">
                                </a>
                                <div class="card-body">
                                    <h5 class="card-title text-center">[Mới 100%] Dell XPS 13 9315 2022
                                    </h5>
                                    <h6 class="card-title text-center">(Core i5-1230U, 8GB, 512GB, Iris Xe
                                        Graphics, 13.4'' FHD+)</h6>
                                    <p class="card-text text-danger text-center">Giá: 25.890.000đ</p>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card">
                                <a class="csw-media" href="#">
                                    <img src={{ asset('site/images/hoctap2.jpg') }} width="260px" alt="">
                                </a>
                                <div class="card-body">
                                    <h5 class="card-title text-center">[Mới 100%] Dell Inspiron 16 5620
                                    </h5>
                                    <h6 class="card-title text-center">(Core i5-1240P, 16GB, 512GB, Iris Xe
                                        Graphics)</h6>
                                    <p class="card-text text-danger text-center">Giá: 19.890.000đ</p>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card">
                                <a class="csw-media" href="#">
                                    <img src={{ asset('site/images/hoctap3.jpg') }} width="260px" alt="">
                                </a>
                                <div class="card-body">
                                    <h5 class="card-title text-center">[REF] Acer Swift 3 SF314-512-52MZ
                                    </h5>
                                    <h6 class="card-title text-center">(Core i5-1240P, Ram 16GB, SSD 512GB,
                                        14'
                                        FHD IPS)</h6>
                                    <p class="card-text text-danger text-center">Giá: 15.890.000đ</p>
                                </div>
                            </div>
                        </div>
                        <li class="mt-4"></li>
                    </div>
                </div>
            </div>
            </a>
        </div>
    </div> --}}
</div>
