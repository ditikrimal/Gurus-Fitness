@extends('adminAuth.component.admin-layout')
@section('users')
    <section class="admin-users-section">
        <h1>User Management</h1>
        <div class="manage-users-buttons">
            <input class="search-input" placeholder="Search" type="text">
            <div>
                <button class="add-user-button" id="add-user-button">Add New User</button>
                <button class="delete-all-button" id="delete-all-button">Delete Selected</button>

            </div>
        </div>
        <div class="users-table">
            <table id="admin-user-table">
                <tr>
                    <th><input class="select" id="selectAll" name="" type="checkbox"></th>
                    <th>ID</th>
                    <th>Full Name</th>
                    <th>Username</th>
                    <th>Created at</th>
                    <th>Created by</th>
                </tr>
                @php
                    $a = 1;
                @endphp

                @foreach ($admins as $admin)
                    <tr class="retrieved-row">
                        <td><input class="select" id="" name="" type="checkbox"></td>
                        <td>

                            {{ $a++ }}

                        </td>
                        <td>{{ $admin->fullName }}</td>
                        <td>{{ $admin->username }}</td>
                        <td>{{ $admin->created_at }}</td>
                        <td>{{ $admin->created_by }}</td>
                    </tr>
                @endforeach
            </table>
        </div>
    </section>
    <section class="new-user-section" id="new-user-section">
        <div class="new-user-box" id="new-user-box">
            <div class="new-user-heading">
                <h1>Add New User</h1>
                <p id='RepMsg1'>

                </p>
            </div>
            <form class="new-user-form" id="newUserForm">
                @csrf
                @method('POST')
                <div class="text-inputs">
                    <div class="input-box-new-user">
                        <input id="fullName" name="fullName" placeholder="Full Name" type="text">
                    </div>

                    <div class="input-box-new-user">
                        <input id="username" name="username" placeholder="Username" type="text">
                    </div>

                    <div class="input-box-new-user">
                        <input id="password" name="password" placeholder="Password" type="password">
                    </div>

                    <div class="input-box-new-user">
                        <input id="confirmPassword" name="password_confirmation" placeholder="Confirm Password"
                            type="password">
                    </div>

                </div>
                <div class="button-inputs">
                    <input type="submit" value="Create">
                    <input id="form-cancel-btn" type="button" value="cancel">
                </div>
            </form>
        </div>
    </section>

    <script type=text/javascript>
        $(document).ready(function() {

            $('#newUserForm').submit(function(event) {

                event.preventDefault();
                // Prevent the form from submitting via the browser
                var formData = $(this).serialize(); // Get the form data
                $.ajax({
                    url: '/admin/create', // The route to handle the request
                    type: 'POST',
                    data: formData,
                    beforeSend: function() {

                    },
                    success: function(response) {

                        alert('Account Created Successfully!');

                    },
                    error: function(response) {
                        // Handle the error here
                        if (response.status == 422) {
                            var errors = response.responseJSON.errors;
                            if (errors.fullName) {
                                $('#RepMsg1').fadeIn();

                                $('#RepMsg1').html(
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
                            if (errors.username) {
                                $('#RepMsg1').fadeIn();

                                $('#RepMsg1').html(
                                    '<i class="fa-solid fa-triangle-exclamation" style="color:red; font-size:11px;"></i> ' +
                                    errors.username[0]
                                );

                                // $('#RepMsg').text(errors.email[0]);
                            }
                            if (errors.password) {
                                $('#RepMsg1').html(
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
@endsection
