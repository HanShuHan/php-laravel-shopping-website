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

    <div class="container d-flex justify-content-center align-items-center min-vh-100">
        <div class="row my-auto">
            <div class="col-md-6 text-center">
                <img src="{{ '../images/' . $product->photo }}" class="img-fluid" alt="{{$product->name}}">
            </div>

            <div class="col-md-6">
                <h1 class="green-text">{{html_entity_decode($product->name)}}</h1>
                <p class="lead">${{$product->price}}</p>
                <div class="mb-3 d-flex align-items-center">
                    @for($i = 1; $i <= 5; $i++)
                        <span class="material-icons-sharp {{ $product->rating >= $i ? 'card-star' : '' }}">
                            {{ $product->rating >= $i ? 'star' : 'star_border' }}
                        </span>
                    @endfor
                    <span class="ms-2"><em>({{$product->rating_count}})</em></span>
                </div>

                <p>{{$category}}</p>
                <p class="mt-3">{{html_entity_decode($product->description)}}</p>

                @auth
                    <form action="/cart/add/{{$product->id}}" method="POST" class="d-inline-block">
                        @csrf
                        <button type="submit" class="btn btn-dark card-btn d-flex justify-content-center align-items-center"
                                style="width: 200px;">
                            <span class="material-icons-sharp text-white me-2">
                                shopping_cart
                            </span>
                            Add To Cart
                        </button>
                    </form>
                @else
                    <a href="/login" class="btn btn-dark d-flex align-items-center justify-content-center"
                       style="width: 200px;">
                        <span class="material-icons-sharp text-white me-2">
                            shopping_cart
                        </span>
                        Login To Add
                    </a>
                @endauth
            </div>
        </div>
    </div>

    <a href="{{url($backURL)}}" class="position-absolute top-0 start-0 mt-5 ms-4 text-dark" style="transition: color 0.3s;">
        <span class="material-icons-sharp mt-5 fs-1 green-text">
            chevron_left
        </span>
    </a>
</x-new-layout>
