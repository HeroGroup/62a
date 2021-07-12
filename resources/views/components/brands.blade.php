    <section class="brands bg-light">
        <div class="container">
            <div class="row align-items-center brand-list">
            @foreach($brands as $brand)
                <div class="brand-list__item col-lg-4 col-md-4 col-sm-4">
                    <img src="{{$brand->photo_url}}" alt="{{$brand->brand_name}}">
                </div>
            @endforeach
            </div>
        </div>
    </section>
