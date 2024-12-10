<div class="product-card-small col-md-4 mb-5">
    <div class="card h-100 shadow-sm">
        <a href="{{ route('product.index', ['product_id' => $itemId, 'url' => $itemTag ]) }}">
            <img src="{{ 'images/' . $itemPhoto }}" class="card-img-top my-img" alt="{{ $itemName }}" style="max-height: 150px;object-fit: cover;">
        </a>
        <div class="card-body d-flex flex-column">
            <div class="card-title flex-grow-1">
                <h6><a href="/product/{{$itemId}}" class="product-link text-decoration-none text-dark">{{ html_entity_decode($itemName) }}</a></h6>
            </div>
            <div class="card-text small mb-1">
                @if($itemOnSale)
                    <p><del>${{ $itemPrice }}</del> <em>15% OFF!</em> ${{$itemPrice - round($itemPrice * 0.15, 2, PHP_ROUND_HALF_UP)}}</p>
                @else
                    <p>${{ $itemPrice }}</p>
                @endif

            </div>
            <div class="card-text small mb-1 d-flex align-items-center">
                @for ($i = 1; $i <= 5; $i++)
                    @if ($i <= $itemRating)
                        <span class="material-icons-sharp card-star" style="font-size: 1rem;">
                star
            </span>
                    @else
                        <span class="material-icons-sharp text-muted" style="font-size: 1rem;">
                star_border
            </span>
                    @endif
                @endfor
                <span class="ms-2"><em>({{$itemRatingCount}})</em></span>
            </div>

        </div>
    </div>
</div>




