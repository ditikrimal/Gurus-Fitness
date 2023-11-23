<x-layout>

    <section class="userSection">
        <div class="circle-elements">
            <div class="user-circle1"></div>
            <div class="user-circle2"></div>
            <div class="user-circle3"></div>
            <div class="user-circle4"></div>
        </div>
        <main class="loginMain">

            <section class="user-content">

                <div class="user-content-image">

                    <img alt="" src="./images/Equipments.jpg">
                    <div class="user-content-box">
                        <div class="user-content-box">

                            <h2>Welcome to Gurus Fitness!</h2>
                            <p>Unlock a world of fitness and wellness with Gurus Fitness. Join our community to achieve
                                your fitness goals and stay healthy.</p>
                            <ul>
                                <li>Access personalized workout plans</li>
                                <li>Track your progress and achievements</li>
                                <li>Connect with fitness enthusiasts</li>
                                <li>Stay updated with the latest fitness trends</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </section>
            <div class="box">
                <div class="inner-box">
                    <div class="forms-wrap">
                        <form action="/users/login" autocomplete="off" class="sign-in-form" id="myForm1"
                            method="POST">
                            @csrf

                            <div class="logo">
                                <h2>Gurus <span>Fitness </span></h2>
                            </div>
                            <div class="heading">
                                <h4>Login to Continue</h4>
                            </div>
                            @if ($errors->any())
                                <p id='RepMsg1'><i class="fa-solid fa-triangle-exclamation"> </i>
                                    {{ $errors->first() }}
                                </p>
                            @endif
                            <div class="actual-form">
                                <div class="input-wrap">
                                    <input autocomplete="off" class="input-field" name="email" type="email"
                                        value="{{ old('email') }}">

                                    <label><i class="fa-solid fa-envelope fa-xs"></i> Email</label>
                                </div>
                                <div class="input-wrap">
                                    <input autocomplete="off" class="input-field" name="password" type="password" />

                                    <label><i class="fa-solid fa-lock fa-xs"></i> Password</label>
                                </div>
                                <p class="text">
                                    <a href="#"> Forgot Password ?</a>
                                </p>
                                <button class="loginButton" id="loginButton" name="loginButton" type="submit">Log
                                    In</button>
                                <h6>Don't Have an Account ?</h6>
                                <a class="toggle" href="#">Sign up Here</a>
                                <div class="social">
                                    <span>OR</span>
                                    <br>
                                    <div class="socialLinks">
                                        <i class="fab fa-google" style="width:100%;"><a
                                                href="{{ URL::to('googleLogin') }}"
                                                style="text-decoration: none; color: black;margin-left:10px; ">Continue
                                                with Google</a></i>

                                    </div>
                                </div>
                            </div>
                        </form>

                        <form autocomplete="off" class="sign-up-form" id="myForm">
                            @csrf

                            <div class="logo">
                                <h2>Gurus <span>Fitness </span></h2>
                            </div>
                            <div class="heading">
                                <h4>Get Started</h4>
                            </div>


                            <p id='RepMsg2'> </p>
                            <p id="validationSpan"></p>
                            <div class="actual-form">
                                <div class="input-wrap">
                                    <input autocomplete="off" class="input-field" id="fullName" name="fullName"
                                        type="text" />
                                    <label> <i class="fa-solid fa-user fa-xs"></i> Name</label>

                                </div>

                                <div class="input-wrap">
                                    <input autocomplete="off" class="input-field" name="email" type="email" />

                                    <label><i class="fa-solid fa-envelope fa-xs"></i> Email</label>

                                </div>

                                <div class="input-wrap">
                                    <input autocomplete="off" class="input-field" id="id_password" minlength="8"
                                        name="password" type="password" />

                                    <label><i class="fa-solid fa-lock fa-xs"></i> Password</label>

                                </div>

                                <div class="input-wrap">
                                    <input autocomplete="off" class="input-field" id="id_conPassword" minlength="8"
                                        name="password_confirmation" type="password" />

                                    <label><i class="fa-solid fa-lock fa-xs"></i> Confirm Password</label>

                                </div>

                                <button class="loginButton" id="regBtn" name="submitBtn" type="submit">Sign Up
                                </button>
                                <h6>Already have an Account ?</h6>
                                <a class="toggle" href="#">Sign In Here</a>
                                <div class="social">
                                    <span>OR</span>
                                    <br>
                                    <div class="socialLinks">
                                        <i class="fab fa-google" style="width:100%;"><a
                                                href="{{ URL::to('googleLogin') }}"
                                                style="text-decoration: none; color: black;margin-left:10px; ">Continue
                                                with Google</a></i>

                                    </div>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>

        </main>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

        <script type=text/javascript>
            $(document).ready(function() {

                $('#myForm').submit(function(event) {

                    event.preventDefault();
                    // Prevent the form from submitting via the browser
                    var formData = $(this).serialize(); // Get the form data
                    $.ajax({
                        url: '/users/signup', // The route to handle the request
                        type: 'POST',
                        data: formData,
                        beforeSend: function() {
                            $('#RepMsg2').fadeIn();

                            $('#RepMsg2').html(
                                '<i class="fa-solid fa-check" style="color:green; font-size:11px;"></i> <span style="color:green;">Sending OTP...</span>'
                            );
                        },
                        success: function(response) {


                            $('#bgimg').addClass("bgimg-active");
                            $('#otpVerify').addClass('active');

                        },
                        error: function(response) {
                            // Handle the error here
                            if (response.status === 422) {
                                var errors = response.responseJSON.errors;
                                if (errors.fullName) {
                                    $('#RepMsg2').fadeIn();

                                    $('#RepMsg2').html(
                                        '<i class="fa-solid fa-triangle-exclamation" style="color:red; font-size:11px;"></i> ' +
                                        errors.fullName[0]
                                    );
                                    // $('#RepMsg').text(errors.fullName[0]);
                                    // $('#errorIcon').html(errorMessage).css({
                                    //     'color': 'blue',
                                    //     'font-weight': 'bold',
                                    //     'diplay': 'block'
                                    // });



                                }
                                if (errors.email) {
                                    $('#RepMsg2').fadeIn();

                                    $('#RepMsg2').html(
                                        '<i class="fa-solid fa-triangle-exclamation" style="color:red; font-size:11px;"></i> ' +
                                        errors.email[0]
                                    );

                                    // $('#RepMsg').text(errors.email[0]);
                                }
                                if (errors.password) {
                                    $('#RepMsg2').html(
                                        '<i class="fa-solid fa-triangle-exclamation" style="color:red; font-size:11px;"></i> ' +
                                        errors.password[0]
                                    );

                                    // $('#RepMsg').text(errors.password[0]);
                                }
                            } else {
                                // Handle other errors here
                            }
                        }
                    });
                });
            });
        </script>
        <section class="otpSEC" id="otpVerify">
            <div class="OTPbox">
                <meta charset="UTF-8" />
                <meta content="IE=edge" http-equiv="X-UA-Compatible" />
                <meta content="width=device-width, initial-scale=1.0" name="viewport" />
                <form class="OTPForm" id="otpForm">
                    @csrf
                    @method('post')
                    <div class="OTPheading">Gurus <span>Fitness</span></div>
                    <div class="OTPcontent">
                        An OTP has been sent to your Email.
                        <p>Please check your<span style="color:red;"> inbox.</span></p>
                    </div>


                    <p id='RepMsg3'>
                    </p>

                    <input maxlength="6" minlenght="6" name="otp" placeholder="OTP" type="number">
                    <div class="Btns">
                        <button class="verifyBtn" id="verifyBtn" type="submit">Verify</button>
                    </div>
                    <div class="Btns">

                        <button class="resendBtn" id="resendBtn" onclick="otpTimer()"; value="resendOTP">Resend
                            OTP</button>

                    </div>
                    <p id="otpTimer" style="font-weight:400"> Resend OTP in <span id="countdowntimer"
                            style="color:red;font-weight:700 !important;">60 </span> Seconds</p>
                </form>
            </div>
        </section>
        <script type=text/javascript>
            $(document).ready(function() {
                $('#otpForm').submit(function(event) {
                    event.preventDefault();
                    var formData = $(this).serialize();
                    $.ajax({
                        url: '/verifyotp',
                        type: 'POST',
                        data: formData,
                        beforeSend: function() {
                            $('#RepMsg3').fadeIn();
                            $('#RepMsg3').html(
                                '<i class="fa-solid fa-check" style="color:green; font-size:11px;"></i> <span style="color:green;"> Verifying OTP...</span>'
                            );
                        },
                        success: function(response) {
                            $('#doneSEC').addClass('active');
                            $('#otpVeriyf').removeClass('active');
                            setTimeout(function() {
                                window.location.replace('/');
                            }, 6000);
                        },
                        error: function(response) {
                            if (response.status === 422) {
                                var errors = response.responseJSON.errors;
                                if (errors.otp) {
                                    $('#RepMsg3').fadeIn();
                                    $('#RepMsg3').html(
                                        '<i class="fa-solid fa-triangle-exclamation" style="color:red; font-size:11px;"></i> ' +
                                        errors.otp[0]);
                                }
                            } else if (response.status === 400) {
                                var message = response.responseJSON.message;
                                $('#RepMsg3').fadeIn();
                                $('#RepMsg3').html(
                                    '<i class="fa-solid fa-triangle-exclamation" style="color:red; font-size:11px;"></i> ' +
                                    message);
                            } else {
                                // Handle other errors here
                            }
                        }
                    });
                });
            });
        </script>
        <section class="doneSEC" id="doneSEC">
            <div class="doneBox">
                <h1>Congratulations </h1>
                <span>Your account has been created!</span>

                <h2>You wil be redirected shortly.</h2>
                <h3>OR</h3>
                <a href="/">Proceed to Login</a>
            </div>
        </section>
    </section>

</x-layout>
