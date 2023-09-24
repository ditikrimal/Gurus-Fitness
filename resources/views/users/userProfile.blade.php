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
                                        type="text" value="{{ $user->email }}"></div>
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
                        <form action="" class="profileForm">
                            <div class="formContents">
                                <div><span>Email</span><input disabled type="text" value="{{ $user->email }}"></div>
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

    <script type=text/javascript>
        $(document).ready(function() {
            $('#infoForm').submit(function(event) {
                event.preventDefault();
                var formData = $(this).serialize(); // Get the form data
                $.ajax({
                    url: '/user/update/profile', // The route to handle the request
                    type: 'POST',
                    data: formData,
                    beforeSend: function() {

                    },
                    success: function(response) {

                        $('#RepMsg2').html(
                            '<i class="fa-solid fa-check" style="color:lime; font-size:15px;"></i> <span style="font-size:17px; color:lime;">Profile updated successfully</span>'
                        );

                        setTimeout(function() {
                            $('#RepMsg2').fadeOut('slow');
                        }, 4000);
                    },
                    error: function(response) {
                        if (response.status == 404) {

                            $('#RepMsg2').html(
                                '<i class="fa-solid fa-times" style="color:red; font-size:15px;"></i> <span style="font-size:17px; color:red;">One or more fields are empty.</span>'
                            );
                        } else {
                            // Handle the error from the server
                            $('#RepMsg2').html(
                                '<i class="fa-solid fa-times" style="color:red; font-size:15px;"></i> <span style="font-size:17px; color:red;">Failed to update profile</span>'
                            );
                        }
                        setTimeout(function() {
                            $('#RepMsg2').fadeOut('slow');
                        }, 4000);
                    }
                });
            });
        });
    </script>
</x-layout>
