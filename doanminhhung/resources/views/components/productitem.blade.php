<style>
    .card-text{
        color: #a29c9cd7;
    }
    .align-right{
        padding-left: 20px;
    }
</style>
<div class="col">
    <div class="card">
        <a class="csw-media" href={{ $product->slug }}>
            {{-- <img src="{{ asset('site/images/gaming1.jpg') }}" width="270px" alt=""> --}}
            <img src="{{ asset('images/product/' .$product->image) }}" width="270px" alt="">
        </a>
        <div class="card-body">
            <h5 class="card-title text-center">{{ $product->name }}
            </h5>
            <h6 class="card-title text-center">{{ $product->description }}</h6>
            <div class="row">
                <div class="col-7"><p class="card-text text-danger text-bold align-right">{{ $product->price_sale }}0.000</p></p></div>
                <div class="col-5"><p class="card-text  card_price_after_sale text-decoration-line-through">{{ $product->price }}0.000</p></div>
            </div>
        </div>
    </div>
</div>