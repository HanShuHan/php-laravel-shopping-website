{{--WRITTEN BY DAVID CURREY, MODIFIED FOR LARAVEL BY MICHAEL BOISVENU-LANDRY--}}
<x-new-layout>
    <x-navbar cartItemsCount="{{$cartItemsCount}}" :categories="$categories"></x-navbar>


    @if (session('success'))
        <div class="container d-flex justify-content-center align-items-center mt-5">
            <div class="alert alert-success alert-dismissible fade show mt-5 green" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        </div>
    @endif
    <div class="container-fluid mt-5 pt-5">

        <div class="row">
            <!-- Sidebar with product categories -->
            <div class="col-md-3">
                <div class="list-group">
                    <h2 class="menu-header">Categories</h2>
                    <a href="{{ route('product.listItems', 'all') }}"
                       class="list-group-item list-group-item-action category-link {{ request()->segment(2) == 'all' ? 'active-category' : '' }}">All
                        Products</a>
                    @foreach($categories as $category)
                        <a href="{{ route('product.listItems', $category->name) }}"
                           class="list-group-item list-group-item-action category-link {{ request()->segment(2) == $category->name ? 'active-category' : '' }}">{{ $category->name }}</a>
                    @endforeach
                </div>
            </div>

            <!-- Product container -->
            <div class="col-md-9">
                <div class="row">
                    @foreach($products as $product)
                        <x-product-card
                            id="{{ $product->id }}"
                            name="{{ $product->name }}"
                            description="{{ $product->description }}"
                            rating="{{ $product->rating }}"
                            ratingCount="{{ $product->rating_count }}"
                            price="{{ $product->price }}"
                            photo="{{ $product->photo }}"
                            onSale="{{ $product->is_on_sale }}"
                            page="{{ $products->currentPage() }}">
                        </x-product-card>
                    @endforeach


                </div>

                <!-- Add pagination -->
                <div class="d-flex justify-content-center mt-4">
                    {{ $products->links('vendor.pagination.pagination') }}
                </div>
            </div>
        </div>
    </div>
</x-new-layout>




