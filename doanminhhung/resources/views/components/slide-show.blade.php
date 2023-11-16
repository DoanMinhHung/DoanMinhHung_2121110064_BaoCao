<div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel" >
    <div class="carousel-inner">
        @foreach ($slider as $item)
        <div class="carousel-item {{ $item->sort_order == 0 ? 'active' : '' }}">
            <img src="{{ asset('site/images/'.$item->name) }}" class="d-block w-100" alt="...">
        </div>
        @endforeach
        {{-- <div class="carousel-item active">
            <img src="{{ asset('site/images/sl1.jpg') }}" class="d-block w-100" alt="...">
        </div> --}}
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying"
        data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying"
        data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
</button>
                