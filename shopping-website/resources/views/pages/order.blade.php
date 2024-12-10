<x-new-layout>
    <x-navbar
        cartItemsCount="{{$cartItemsCount}}"
        :categories="$categories"/>
    <a href="/profile" class="btn btn-dark card-btn my-3 mx-3">Back</a>
    <h3 class="mx-3 green-text">Order - #{{ $order->order_number }}</h3>
    <table class="table table-striped mx-3">
        <thead>
            <tr>
                <th colspan="2">Name</th>
                <th>Quantity</th>
                <th>Price</th>
            </tr>
        </thead>
        <tbody>
            @foreach($items as $item)
                <tr>
                    <td><img src="{{ '../../images/' . $item->product->photo }}" alt="" width="50px" height="50px"></td>
                    <td>{{ $item->product->name }}</td>
                    <td>x{{ $item->quantity }}</td>
                    <td>${{ $item->quantity * $item->product->price }}</td>
                </tr>
            @endforeach

            <tr>
                <th colspan="2"></th>
                <th><h3><strong>Price: </strong></h3></th>
                <th>${{ $order->base_total }}</th>
            </tr>

            <tr>
                <th colspan="2"></th>
                <th><strong>Tax: </strong></th>
                <th>${{ $order->tax }}</th>
            </tr>

            <tr>
                <th colspan="2"></th>
                <th><strong>Shipping:</strong></th>
                <th>${{ $order->shipping }}</th>
            </tr>

            <tr>
                <th colspan="2"></th>
                <th>
                    <h2><strong>Total Cost:</strong></h2>
                </th>
                <th><strong>${{ $order->total_cost }}</strong></th>
            </tr>
        </tbody>
    </table>
</x-new-layout>
