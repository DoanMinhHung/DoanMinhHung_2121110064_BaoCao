@extends('layouts.site')

@section('content')
    <div class="my-10 ">
        <div>
            <div class="text-white fs-1" style="position: absolute;top: 50%;left: 50%;transform: translate(-50%) ">
                Tìm kiếm: <span class="text-danger lt">{{ $search }}</span>
            </div>
        </div>
    </div>
    @if (count($list_product) > 0)
        <div class="row row-cols-1 row-cols-md-5 g-4 xa">

            @foreach ($list_product as $productitem)
                <x-product-item :productitem="$productitem" />
            @endforeach


        </div>
    @else
        <h1 class="py-10 text-center">sản phẩm không tồn tại</h1>
    @endif
@endsection