<x-new-layout>
  <x-navbar cartItemsCount="{{$cartItemsCount}}" :categories="$categories"></x-navbar>
    @if (session('success'))
        <div class="container d-flex justify-content-center align-items-center mt-5">
            <div class="alert alert-success alert-dismissible fade show mt-5" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        </div>
    @endif
    <x-carousel></x-carousel>

    @foreach ([['title' => 'Under $20', 'products' => $under20],
              ['title' => 'Highest Rated', 'products' => $highestRated],
              ['title' => 'Newest in Cookies', 'products' => $latestDryGoods],
              ['title' => 'Newest Soups', 'products' => $latestSupplies]]
              as $section)
        <div class="product-home-container container my-5">
            <h1 class="mb-4">{{ $section['title'] }}</h1>
            <div id="{{ $section['title'] }}" class="product-container row">
                @for($i = 0; $i < 6; $i++)
                    <x-home-products
                        itemPrice="{{$section['products'][$i]->price}}"
                        itemName="{{$section['products'][$i]->name}}"
                        itemDescription="{{$section['products'][$i]->description}}"
                        itemId="{{$section['products'][$i]->id}}"
                        itemRating="{{$section['products'][$i]->rating}}"
                        itemRatingCount="{{$section['products'][$i]->rating_count}}"
                        itemPhoto="{{$section['products'][$i]->photo}}"
                        itemOnSale="{{$section['products'][$i]->is_on_sale}}"
                        itemTag="{{'/#' . $section['title'] }}"

                    ></x-home-products>
                @endfor

            </div>
        </div>
    @endforeach
</x-new-layout>
