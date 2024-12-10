<x-new-layout>
    <x-navbar cartItemsCount="{{$cartItemsCount}}" :categories="$categories"></x-navbar>
    <div class="container rounded bg-white mt-5 mb-5">
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show mt-5 green`" role="alert" style="top: 2rem; position: relative;">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <div class="row">
            <div class="col-md-3 border-right">
                <div class="d-flex flex-column align-items-center text-center p-3 py-5">
                    <img class="rounded-circle mt-5" width="150px" height="150px" src="{{ $user->profile_picture ? 'data:image/png;base64,' . base64_encode($user->profile_picture) : 'https://i.pinimg.com/736x/7f/43/03/7f4303ad3716465ed058ed44a6f64369.jpg' }}" id="profile-picture-preview">
                    <span class="font-weight-bold green-text">{{ $user->user_name }}:</span>
                    <span class="text-black-50">{{ $user->email }}</span>
                    <form action="/profile/update-picture" method="POST" enctype="multipart/form-data" style="display: flex; flex-direction: column; align-items: center; justify-content: center;" class="mt-3">
                        @csrf
                        <input type="file" name="profile_picture" id="profile_picture" class="custom-file-input" accept="image/*" style="display: none;">
                        <label for="profile_picture" class="btn btn-dark card-btn" id="file-label" style="margin-bottom: -0.25em;">Choose File...</label>
                        @error('profile_picture')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                        <button type="submit" class="btn btn-dark mt-3 card-btn">Save Profile Picture</button>
                    </form>
                    <span> </span>
                </div>
            </div>
            <div class="col-md-5 border-right">
                <div class="p-3 py-5">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h4 class="text-right green-text">Profile Settings</h4>
                    </div>
                    <form action="/profile/update" method="POST">
                        @csrf
                        <!-- First Name -->
                        <div class="row mt-2">
                            <div class="col-md-6">
                                <label class="labels">First Name</label>
                                <input type="text" class="form-control" name="first_name" placeholder="First Name" value="{{ $user->first_name }}">
                                @error('first_name')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Last Name -->
                            <div class="col-md-6">
                                <label class="labels">Last name</label>
                                <input type="text" class="form-control" name="last_name" placeholder="Last Name" value="{{ $user->last_name }}">
                                @error('last_name')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <!-- User Name -->
                        <div class="row mt-2">
                            <div class="col-md-12">
                                <label class="labels">User Name</label>
                                <input type="text" class="form-control" name="user_name" placeholder="User Name" value="{{ $user->user_name }}">
                                @error('user_name')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <!-- Email -->
                        <div class="row mt-2">
                            <div class="col-md-12">
                                <label class="labels">Email Address</label>
                                <input type="email" class="form-control" name="email" placeholder="Email Address" value="{{ $user->email }}">
                                @error('email')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <!-- Mobile Number -->
                        <div class="row mt-2">
                            <div class="col-md-12">
                                <label class="labels">Mobile Number</label>
                                <input type="text" class="form-control" name="phone_number" placeholder="Phone Number" value="{{ $user->phone_number }}">
                                @error('phone_number')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <!-- Address Line 1 -->
                        <div class="row mt-2">
                            <div class="col-md-12">
                                <label class="labels">Address Line 1</label>
                                <input type="text" class="form-control" name="address_line1" placeholder="Address Line 1" value="{{ $user->address_line1 }}">
                                @error('address_line1')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <!-- Address Line 2 -->
                        <div class="row mt-2">
                            <div class="col-md-12">
                                <label class="labels">Address Line 2</label>
                                <input type="text" class="form-control" name="address_line2" placeholder="Address Line 2" value="{{ $user->address_line2 }}">
                                @error('address_line2')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <!-- Postal Code -->
                        <div class="row mt-2">
                            <div class="col-md-12">
                                <label class="labels">Postal Code</label>
                                <input type="text" class="form-control" name="postal_code" placeholder="Postal Code" value="{{ $user->postal_code }}">
                                @error('postal_code')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <!-- Province -->
                        <div class="col-md-12">
                            <label class="labels">Province</label>
                            <select name="province" class="form-control">
                                <option value="">Choose your province...</option>
                                <option value="AB" {{ $user->province == 'AB' ? 'selected' : '' }}>Alberta</option>
                                <option value="BC" {{ $user->province == 'BC' ? 'selected' : '' }}>British Columbia</option>
                                <option value="MB" {{ $user->province == 'MB' ? 'selected' : '' }}>Manitoba</option>
                                <option value="NB" {{ $user->province == 'NB' ? 'selected' : '' }}>New Brunswick</option>
                                <option value="NL" {{ $user->province == 'NL' ? 'selected' : '' }}>Newfoundland and Labrador</option>
                                <option value="NS" {{ $user->province == 'NS' ? 'selected' : '' }}>Nova Scotia</option>
                                <option value="NT" {{ $user->province == 'NT' ? 'selected' : '' }}>Northwest Territories</option>
                                <option value="NU" {{ $user->province == 'NU' ? 'selected' : '' }}>Nunavut</option>
                                <option value="ON" {{ $user->province == 'ON' ? 'selected' : '' }}>Ontario</option>
                                <option value="PE" {{ $user->province == 'PE' ? 'selected' : '' }}>Prince Edward Island</option>
                                <option value="QC" {{ $user->province == 'QC' ? 'selected' : '' }}>Quebec</option>
                                <option value="SK" {{ $user->province == 'SK' ? 'selected' : '' }}>Saskatchewan</option>
                                <option value="YT" {{ $user->province == 'YT' ? 'selected' : '' }}>Yukon</option>
                            </select>
                            @error('province')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- City -->
                        <div class="row mt-2">
                            <div class="col-md-12">
                                <label class="labels">City</label>
                                <input type="text" class="form-control" name="city" placeholder="City" value="{{ $user->city }}">
                                @error('city')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="mt-4 d-flex justify-content-between mb-2">
                            <!-- Submit Button -->
                            <button class="btn btn-dark card-btn" type="submit">Save Profile</button>
                        </div>
                    </form>
                    <form action="/logout" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-danger card-btn">Logout</button>
                    </form>
                </div>
                <div>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">Order #</th>
                                <th scope="col">Total ($)</th>
                                <th scope="col">Placed On</th>
                                <th scope="col">Delivery Status</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach($orders as $order)
                                <tr>
                                    <th scope="row" class="green-text">{{ $order->order_number }}</th>
                                    <td>{{ $order->total_cost }}</td>
                                    <td>{{ $order->created_at }}</td>
                                    <td>{{ ($order->delivered) ? "Delivered" : "Out for delivery" }}</td>
                                    <td>
                                        <a href=" {{ "/order/" .$order->id }}" class="btn btn-dark card-btn">View Details</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <script>
        document.getElementById('profile_picture').addEventListener('change', function() {
            var reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById('profile-picture-preview').src = e.target.result;
            };
            reader.readAsDataURL(this.files[0]);
        });
    </script>
</x-new-layout>

