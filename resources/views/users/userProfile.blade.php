<x-layout>
    <section class="profileSection">
        <div class="profileMain">
            <div class="profileHeading">
                <i class="fa-regular fa-circle-user"></i>
                <h1>Hello User</h1>
            </div>
            <div class="actionsDiv">
                <div class="profileOptions">
                    <div id="infoBtn"> <i class="fa-solid fa-circle-info"></i> <span>User info</span></div>

                    <div id="securityBtn"><i class="fa-solid fa-lock"></i><span>Security </span></div>

                </div>
                <div class="optionContent">
                    <div id="userInfoForm" class="infoFormDiv">
                        <p id='RepMsg2'></p>
                        <p id="validationSpan"></p>
                        <form action="" id="infoForm" class="profileForm">
                            @csrf
                            <div class="formContents">

                                <div><span>Full Name</span><input value="{{ $user->fullName }}" type="text"
                                        placeholder='Missing' required></div>
                                <div><span>Email</span><input value="{{ $user->email }}" type="text"
                                        placeholder='Missing' required></div>
                                <div><span>Address</span><input type="text" placeholder='Missing' required></div>
                                <div><span>City</span><input type="text" placeholder='Missing' required></div>
                                <div><span>Country</span><input type="text" placeholder='Missing' required></div>
                                <div><span>Phone</span><input type="text" placeholder='Missing' required></div>

                            </div>
                            <div class="profileFormBtns">
                                <input type="submit" value="UPDATE">
                                <input type="button" value="CANCEL">

                            </div>
                        </form>
                    </div>
                    <div id="userSecurityForm" class="securityFormDiv">
                        <form action="" class="profileForm">
                            <div class="formContents">
                                <div><span>Email</span><input type="text"></div>
                                <div><span>Current Password</span><input type="text"></div>
                                <div><span>New Password</span><input type="text"></div>
                                <div><span>Confirm New Password</span><input type="text"></div>


                            </div>
                            <div class="profileFormBtns">
                                <input type="button" value="UPDATE">
                                <input type="button" value="CANCEL">

                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <script type=text/javascript>
        $(document).ready(function() {

            $('#infoForm').submit(function(event) {

                event.preventDefault();
                // Prevent the form from submitting via the browser
                var formData = $(this).serialize(); // Get the form data
                $.ajax({
                    url: '/user/profile/update', // The route to handle the request
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
</x-layout>
