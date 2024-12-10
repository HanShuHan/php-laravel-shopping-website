{{--WRITTEN BY DAVID CURREY--}}
<x-new-layout>
    <x-navbar cartItemsCount="{{ $cartItemsCount }}" :categories="$categories"></x-navbar>
    <div class="container-fluid mt-5 pt-5 search-results">
        @if($onSale)

        @else
            <h3 class="green-text mb-5">Results for {{ strtolower($query) }}</h3>
        @endif

        <div class="row">
            <!-- Product container -->
            <div class="col-md-9">
                <div class="row">
                    @forelse ($products as $product)
                        <x-product-card
                            id="{{ $product->id }}"
                            name="{{ $product->name }}"
                            description="{{ $product->description }}"
                            rating="{{ $product->rating }}"
                            ratingCount="{{ $product->rating_count }}"
                            price="{{ $product->price }}"
                            photo="{{ $product->photo }}"
                            page="{{ $products->currentPage() }}"
                            onSale="{{ $product->is_on_sale }}">
                        </x-product-card>
                    @empty
                        <div class="col-12">
                            <p>No results.</p>
                        </div>
                    @endforelse

                    <!-- Add pagination -->
                    <div class="d-flex justify-content-center mt-4">
                        {{ $products->links('vendor.pagination.pagination') }}
                    </div>

                </div>
            </div>
        </div>
</x-new-layout>
