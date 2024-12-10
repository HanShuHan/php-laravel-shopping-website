<x-new-layout>
    <div class="register content d-flex justify-content-center align-items-center min-vh-100">
        <a href="/" class="position-absolute top-0 start-0 p-4 text-white" style="font-size: 24px;">
            <span class="material-icons-sharp">
                chevron_left
            </span>
        </a>
        <div class="mt-4 mb-4 form-parent col center p-5 rounded" style="max-width: 500px; background-color: white;">
            <form action="/register" method="POST" id="registrationForm" class="text-dark">
                @csrf
                <div class="mb-3">
                    <label for="username_register" class="form-label green-text">Username:</label>
                    <input type="text" placeholder="Username" name="user_name" id="username_register" class="form-control" value="{{old('user_name')}}"/>
                    @error('user_name')
                    <p class="validation-error text-danger">{{$message}}</p>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="email_register" class="form-label green-text">Email: </label>
                    <input type="email" placeholder="Email" name="email" id="email_register" class="form-control" value="{{old('email')}}">
                    @error('email')
                    <p class="validation-error text-danger">{{$message}}</p>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="pass_register" class="form-label green-text">Password: </label>
                    <input type="password" placeholder="Password" name="password" id="pass_register" class="form-control">
                    @error('password')
                    <p class="validation-error text-danger">{{$message}}</p>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="pass_confirm_register" class="form-label green-text">Confirm Password: </label>
                    <input type="password" placeholder="Confirm Password" name="password_confirmation" id="pass_confirm_register" class="form-control">
                    @error('password_confirmation')
                    <p class="validation-error text-danger">{{$message}}</p>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="first_name_register" class="form-label green-text">First Name:</label>
                    <input type="text" name="first_name" placeholder="First Name" id="first_name_register" class="form-control" value="{{old('first_name')}}"/>
                    @error('first_name')
                    <p class="validation-error text-danger">{{$message}}</p>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="last_name_register" class="form-label green-text">Last Name:</label>
                    <input type="text" name="last_name" placeholder="Last Name" id="last_name_register" class="form-control" value="{{old('last_name')}}"/>
                    @error('last_name')
                    <p class="validation-error text-danger">{{$message}}</p>
                    @enderror
                </div>

                <div class="d-grid gap-2">
                    <button type="submit" class="btn btn-outline-dark">Register</button>
                </div>
            </form>

            <section class="form-footer mt-4">
                <p class="text-dark">Already have an account? <a href="/login" class="text-dark">Login here.</a></p>
                <br>
                <!-- <p style="font-size: 12px"><span class="note">PRODUCTION NOTE:</span> THIS IS A TEMPORARY FORM AND WILL BE A MODAL IN FINAL VERSION.</p> -->
            </section>
        </div>
    </div>
</x-new-layout>


