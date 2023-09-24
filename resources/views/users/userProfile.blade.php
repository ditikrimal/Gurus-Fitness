<x-layout>

    <section class="profileSection">
        <div class="profileMain">
            <div class="profileHeading">
                <i class="fa-regular fa-circle-user"></i>
                <h1>Hello, {{ $user->fullName }}</h1>

                <p id='RepMsg2' style="float: right"></p>


            </div>
            <div class="actionsDiv">
                <div class="profileOptions">
                    <div id="infoBtn"> <i class="fa-solid fa-circle-info"></i> <span>User info</span></div>

                    <div id="securityBtn"><i class="fa-solid fa-lock"></i><span>Security </span></div>

                </div>
                <div class="optionContent">
                    <div class="infoFormDiv" id="userInfoForm">
                        <form class="profileForm" id="infoForm">
                            @csrf
                            @method('post')
                            <div class="formContents">

                                <div><span>Full Name</span><input name="fullName" placeholder='Missing' type="text"
                                        value="{{ $user->fullName }}"></div>
                                <div><span>Email</span><input disabled name="email" placeholder='Missing'
                                        style="border: solid 0.001rem red" type="text" value="{{ $user->email }}">
                                </div>
                                <div><span>Phone</span><input name="phone" placeholder='Missing' type="text"
                                        value="{{ $user->phone }}"></div>
                                <div><span>Address</span><input name="address" placeholder='Missing' type="text"
                                        value="{{ $user->address }}"></div>
                                <div><span>City</span><input name="city" placeholder='Missing' type="text"
                                        value="{{ $user->city }}"></div>
                                <div><span>Country</span><input name="country" placeholder='Missing' type="text"
                                        value="{{ $user->country }}"></div>

                            </div>
                            <div class="profileFormBtns">

                                <input type="submit" value="UPDATE">
                            </div>
                        </form>
                    </div>

                    <div class="securityFormDiv" id="userSecurityForm">
                        <form class="profileForm" id="passwordForm">

                            @csrf
                            @method('post')
                            <div class="formContents">
                                <div><span>Email</span><input disabled style="border: solid 0.001rem red" type="text"
                                        value="{{ $user->email }}"></div>
                                <div><span>Current Password</span><input name="current_password" type="password"></div>
                                <div><span>New Password</span><input name="password" type="password"></div>
                                <div><span>Confirm New Password</span><input name="password_confirmation"
                                        type="password"></div>


                            </div>

                            @if (Auth::check())
                                @php
                                    $email = Auth::user()->email;
                                    $user = \App\Models\User::where('email', $email)->first();
                                    $account_type = $user->account_type;
                                @endphp
                                <div class="profileFormBtns">

                                    <input type="submit" value="UPDATE">


                                </div>
                        </form>


                        @if ($account_type == 'googleSignup')
                            <style>
                                #userSecurityForm input[type='submit'] {
                                    background-color: rgb(133, 133, 133);
                                    cursor: not-allowed;
                                    color: rgb(61, 61, 61);
                                    pointer-events: none;
                                    border: solid 0.001rem red;

                                }

                                #userSecurityForm input[type='password'] {
                                    background-color: rgb(133, 133, 133);
                                    cursor: not-allowed;
                                    color: rgb(61, 61, 61);
                                    pointer-events: none;
                                    border: solid 0.001rem red;

                                }
                            </style>
                            <h1 style="text-align:center;margin-top:20px;font-weight:500;font-size:14px;color:red;"
                                style="float: right">
                                <i class="fa-solid fa-triangle-exclamation"></i> You are logged in through google.
                                <br>
                                <span style="font-size:11px; color:white;">You can't change your password.</span>
                            </h1>
                        @endif
                        @endif
                    </div>
                </div>

            </div>
        </div>
    </section>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

    <script type=text/javascript>
        $(document).ready(function() {
            var timer; // Declare a variable to store the timer ID

            $('#infoForm').submit(function(event) {
                clearTimeout(timer);

                event.preventDefault();
                var formData = $(this).serialize(); // Get the form data
                $.ajax({
                    url: '/user/update/profile', // The route to handle the request
                    type: 'POST',
                    data: formData,
                    beforeSend: function() {

                    },
                    success: function(response) {

                        $('#RepMsg2').fadeIn().html(
                            '<i class="fa-solid fa-check" style="color:lime; font-size:15px;"></i> <span style="font-size:17px; color:lime;">Profile updated successfully</span>'
                        );

                        timer = setTimeout(function() {
                            $('#RepMsg2').fadeOut();
                        }, 3000);
                    },
                    error: function(response) {
                        if (response.status == 404) {

                            $('#RepMsg2').fadeIn().html(
                                '<i class="fa-solid fa-times" style="color:red; font-size:15px;"></i> <span style="font-size:17px; color:red;">One or more fields are empty.</span>'
                            );
                        } else {
                            $('#RepMsg2').fadeIn().html(
                                '<i class="fa-solid fa-times" style="color:red; font-size:15px;"></i> <span style="font-size:17px; color:red;">Failed to update profile</span>'
                            );
                        }
                        setTimeout(function() {
                            $('#RepMsg2').fadeOut();
                        }, 3000);
                    }
                });
            });
        });

        $(document).ready(function() {
            $('#passwordForm').submit(function(event) {
                clearTimeout(timer);
                event.preventDefault();
                var formData = $(this).serialize(); // Get the form data
                $.ajax({
                    url: '/user/updatepassword/profile',
                    type: 'POST',
                    data: formData,
                    beforeSend: function() {
                        // You can add loading or processing indicators here if needed.
                    },
                    success: function(response) {
                        // Check if the response contains a 'message' key (successful response)
                        if (response.message) {
                            $('#RepMsg2').html(
                                '<i class="fa-solid fa-check" style="color:lime; font-size:15px;"></i> <span style="font-size:17px; color:lime;">' +
                                response.message + '</span>'
                            );
                        }
                        setTimeout(function() {
                            $('#RepMsg2').fadeOut();
                        }, 3000);
                    },
                    error: function(response) {
                        // Check if the response contains an 'error' key (error response)
                        if (response.responseJSON.errors) {
                            $('#RepMsg2').fadeIn().html(
                                '<i class="fa-solid fa-times" style="color:red; font-size:15px;"></i> <span style="font-size:17px; color:red;">' +
                                response.responseJSON.errors[Object.keys(response
                                    .responseJSON.errors)[0]] +
                                '</span>'
                            );
                        } else if (response.responseJSON) {
                            $('#RepMsg2').fadeIn().html(
                                '<i class="fa-solid fa-times" style="color:red; font-size:15px;"></i> <span style="font-size:17px; color:red;">' +
                                response.responseJSON.error + '</span>'
                            );

                        } else {
                            // Handle other error cases here
                            $('#RepMsg2').fadeIn().html(
                                '<i class="fa-solid fa-times" style="color:red; font-size:15px;"></i> <span style="font-size:17px; color:red;">Failed to change password</span>'
                            );
                        }
                        setTimeout(function() {
                            $('#RepMsg2').fadeOut();
                        }, 3000);
                    }
                });
            });
        });
    </script>
</x-layout>
