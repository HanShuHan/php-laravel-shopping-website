<div class="col-md-3 mb-4">
    <div class="card h-100 d-flex flex-column">
        <img class="card-img-top" src="{{ '/images/' . $photo }}" alt="{{ $name }}" width="50px" height="180px">
        <div class="card-body flex-grow-1">
            <h5 class="card-title">{{ html_entity_decode($name) }}</h5>
            <p class="card-text mb-3" style="font-size: 0.6em;">{{ html_entity_decode($description) }}</p>
        </div>
        <div class="card-footer bg-white mt-auto">
            @if($onSale)
                <p class="price mb-1"><del>Price: ${{ $price }}</del> <em>15% OFF! ${{$price - round($price * 0.15, 2, PHP_ROUND_HALF_UP)}}</em></p>
            @else
                <p class="price mb-1">Price: ${{ $price }}</p>
            @endif
            <div class="card-text mb-3 d-flex justify-content-start">
                @for ($i = 1; $i <= 5; $i++)
                    @if ($i <= $rating)
                        <span class="material-icons-sharp card-star">star</span>
                    @else
                        <span class="material-icons-sharp text-muted">
                                star_border
                            </span>
                    @endif
                @endfor
                <p><em>({{$ratingCount}})</em></p>
            </div>
            <div class="d-flex justify-content-start">
                <a href="{{ route('product.index', ['product_id' => $id, 'searching_category' => Str::afterLast(request()->url(), '/'), 'page' => $page, 'url' => request()->getRequestUri() ]) }}" class="btn btn-dark card-btn mb-2 me-2">More Info</a>
                @auth
                    <form action="/cart/add/{{$id}}" method="POST" class="d-inline-block mb-2">
                        @csrf
                        <button type="submit" class="btn btn-dark d-flex align-items-center card-btn">
                            <span class="material-icons-sharp text-white me-2">shopping_cart</span><strong>+</strong>
                        </button>
                    </form>
                @endauth
            </div>
        </div>
    </div>
</div>
