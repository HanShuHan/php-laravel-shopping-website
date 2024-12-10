<x-new-layout>
    <x-navbar cartItemsCount="{{$cartItemsCount}}" :categories="$categories"></x-navbar>

    <div class="container mt-5 pt-5">
        <div class="text-left">
            <h1 class="mt-4 mb-4 green-text">Your Cart</h1>
        </div>

        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show green" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="mt-4">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th scope="col">Product</th>
                    <th scope="col">Price</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach($cartItems as $item)
                    <tr class="{{ $loop->iteration % 2 == 0 ? 'table-secondary' : '' }}">
                        <td>
                            <a href="{{ route('product.index', ['product_id' => $item->product->id, 'url' => request()->getRequestUri() ]) }}">
                                <img src="{{ '/images/' . $item->product->photo }}" alt="" width="50px" height="50px"
                                     class="mx-2">{{ $item->product->name }}
                            </a>
                        </td>
                        <td>{{ $item->product->name }}</td>
                        <td>{{ $item->product->price }}</td>
                        <td>
                            <select class="item-quantity" data-product-id="{{ $item->product->id }}">
                                @for ($i = 1; $i <= 20; $i++)
                                    <option value="{{ $i }}"
                                            @if($i == $item->quantity) selected @endif>{{ $i }}</option>
                                @endfor
                            </select>
                        </td>
                        <td>
                            <form action="/cart/remove/{{$item->id}}" method="POST" class="d-inline">
                                @csrf
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>

        <div class="d-flex justify-content-between mt-3">
            <h4>Total: $<span id="total">{{ $total }}</span></h4>
            <div>
                <a href="/checkout" class="btn btn-success card-btn">Checkout</a>
                <a href="/" class="btn btn-dark me-2 card-btn">Continue Shopping</a>
                <form action="/cart/clear" method="POST" class="d-inline">
                    @csrf
                    <button type="submit" class="btn btn-danger">Clear Cart</button>
                </form>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function () {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $('.item-quantity').on('change', function () {
                const product_id = $(this).data('product-id');
                const new_quantity = $(this).val();

                $.ajax({
                    method: 'POST',
                    url: '/cart/edit/' + product_id,
                    data: {newQuantity: new_quantity},
                    success: function (response) {
                        const cart_count = parseInt($('#cart-items-count').text());
                        const old_quantity = response.oldQuantity;
                        const q_dif = new_quantity - old_quantity;

                        const total_price = parseFloat($('#total').text());
                        const item_price = response.itemPrice;
                        const p_dif = q_dif * item_price

                        $('#cart-items-count').text(cart_count + q_dif);
                        $('#total').text((total_price + p_dif).toFixed(2));
                        $(this).data('product-quantity', new_quantity);
                    },
                    error: function () {
                        // Handle errors
                    }
                });
            });
        });
    </script>

</x-new-layout>

