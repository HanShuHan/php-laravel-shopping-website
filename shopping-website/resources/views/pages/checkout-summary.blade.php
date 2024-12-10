<x-new-layout>

    <x-navbar
        cartItemsCount="{{$cartItemsCount}}"
        :categories="$categories"></x-navbar>

    <div class="container d-flex justify-content-center align-items-center mb-4">

        <form action="/process-order" method="POST" class="mt-5">
            @csrf
            <div>
                <h1 class="green-text">Order Info</h1>
                <table class="table table-striped">
                    <tbody>
                    @foreach($cartItems as $item)
                        <tr>
                            <td>
                                <a href="{{ route('product.index', ['product_id' => $item->product->id, 'url' => request()->getRequestUri() ]) }}">
                                    <img src="{{ '/images/' . $item->product->photo }}" alt="" width="50px"
                                         height="50px" class="mx-2">{{ $item->product->name }}
                                </a>
                            </td>
                            <td>x{{ $item->quantity }}</td>
                            <td>${{ $item->quantity * $item->product->price }}</td>
                        </tr>
                    @endforeach
                    @php
                        $totalBeforeTax = 0;
                        foreach($cartItems as $item) {
                            $totalBeforeTax += $item->quantity * $item->product->price;
                        }
                        $tax = round($totalBeforeTax * 0.13, 2, PHP_ROUND_HALF_UP);
                        $estShipping = ($totalBeforeTax > 80) ? "Free" : "$" . round($totalBeforeTax * 0.2, 2, PHP_ROUND_HALF_DOWN);
                        $orderTotal = ($estShipping == "Free") ? ($totalBeforeTax + $tax) : (round($totalBeforeTax + $tax + round($totalBeforeTax * 0.2, 2, PHP_ROUND_HALF_DOWN), 2, PHP_ROUND_HALF_UP));
                    @endphp


                    </tbody>
                </table>

                <table class="table">
                    <tbody>
                    <tr>
                        <td></td>
                        <td>Item Total:</td>
                        <td>${{ $totalBeforeTax }}</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>Tax:</td>
                        <td> {{ $tax }}</td>
                    </tr>

                    <tr>
                        <td></td>
                        <td>Est Shipping:</td>
                        <td> {{ $estShipping }}</td>
                    </tr>

                    <tr>
                        <td></td>
                        <td><h1>Order Total: </h1></td>
                        <td><h1> ${{ $orderTotal }}</h1></td>
                    </tr>
                    </tbody>
                </table>


            </div>

            <h1 class="green-text mt-5">Shipping Info</h1>
            <div class=" mb-5 border p-1 container justify-content-center">


                @error('first_name')
                <p class="validation-error text-danger">{{$message}}</p>
                @enderror
                <label for="first_name">First Name: </label>
                <input class="my-3 mx-2" type="text" name="first_name" id="first_name"
                       value="{{ auth()->user()->first_name }}">

                @error('last_name')
                <p class="validation-error text-danger">{{$message}}</p>
                @enderror
                <label for="last_name mb-3">Last Name: </label>
                <input class="my-3" type="text" name="last_name" id="last_name" value="{{ auth()->user()->last_name }}">

                <div>
                    @error('email')
                    <p class="validation-error text-danger">{{$message}}</p>
                    @enderror
                    <label for="email">Email: </label>
                    <input class="mx-3 my-2" type="email" name="email" id="email" value="{{ auth()->user()->email }}">
                </div>

                <div>
                    @error('phone')
                    <p class="validation-error text-danger">{{$message}}</p>
                    @enderror
                    <label for="phone">Phone Number: </label>
                    <input class="mx-3 my-2" type="tel" name="phone" id="phone"
                           value="{{ auth()->user()->phone_number }}">
                </div>

                <div>
                    @error('address1')
                    <p class="validation-error text-danger">{{$message}}</p>
                    @enderror
                    <label for="address1">Address Line 1: </label>
                    <input class="mx-3 my-2" type="text" name="address1" id="address1"
                           value="{{ auth()->user()->address_line1 }}">
                </div>

                <div>
                    @error('address2')
                    <p class="validation-error text-danger">{{$message}}</p>
                    @enderror
                    <label for="address2">Address Line 2: </label>
                    <input class="mx-3 my-2" type="text" name="address2" id="address2"
                           value="{{ auth()->user()->address_line2 }}">
                </div>

                <div>
                    @error('city')
                    <p class="validation-error text-danger">{{$message}}</p>
                    @enderror
                    <label for="city">City: </label>
                    <input class="mx-3 my-2" type="text" name="city" id="city" value="{{ auth()->user()->city }}">

                    @error('province')
                    <p class="validation-error text-danger">{{$message}}</p>
                    @enderror
                    <label for="province">Province: </label>
                    <input class="mx-3 my-2" type="text" name="province" id="province"
                           value="{{ auth()->user()->province }}">
                </div>

                @error('postalCode')
                <p class="validation-error text-danger">{{$message}}</p>
                @enderror
                <label for="postalCode">Postal Code: </label>
                <input class="mx-3 my-2" type="text" name="postalCode" id="postalCode"
                       value="{{ auth()->user()->postal_code }}">

            </div>
            <h1 class="green-text">Billing Info:</h1>
            <div class="border p-1 container justify-content-center">

                <p>This is for demonstration purposes, no actual credit card information will be stored.</p>
                <label for="cc">Card Number: </label>
                <input class="mx-3 my-2" type="text" name="cc" id="cc">
                <div>
                    <label for="ed">Expiry Date: </label>
                    <input class="mx-3 my-2" type="date" name="ed" id="ed">

                    <label for="cvc">CVC: </label>
                    <input class="mx-3 my-2" type="text" name="cvc" id="cvc">
                </div>
            </div>

            <div class="mt-5">
                <button type="submit" class="btn btn-dark card-btn mr-3">Pay Now</button>
                <a href="/" class="btn btn-dark card-btn">Continue Shopping</a>
            </div>
        </form>
    </div>
</x-new-layout>
