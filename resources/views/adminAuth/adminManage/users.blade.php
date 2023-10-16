@extends('adminAuth.component.admin-layout')
@section('users')
    <div class="flash-message">
        <p class="flash-message-content " id="flash-message-content"></p>
    </div>
    <section class="admin-users-section">
        <h1>User Management</h1>
        <div class="manage-users-buttons">
            <form action="/admin/admin-manage/users" class="search-form">
                <input class="search-input" name="search" placeholder="Search" type="text" value="{{ old('search') }}">
                <button class="search-button" type="submit"><i class="fa-solid fa-search"></i> </button>
            </form>
            <div>
                <button class="add-user-button" id="add-user-button">Add New User

                </button>
                <button class="delete-selected-button" data-url="{{ route('adminDelete') }}"
                    id="delete-selected-button">Delete
                    Selected</button>
            </div>
        </div>
        <div class="users-table">
            <table id="admin-user-table">
                <tr>
                    <th>
                        <input class="select" id="selectAll" name="" type="checkbox">
                    </th>
                    <th>ID</th>
                    <th>Full Name</th>
                    <th>Username</th>
                    <th>Created at</th>
                    <th>Created by</th>
                    <th>Role</th>
                </tr>
                @php
                    $a = 1;
                @endphp

                @foreach ($admins as $admin)
                    <tr class="retrieved-row">

                        <td>
                            <input id="token" name="_token" type="hidden" value="{{ csrf_token() }}">

                            <input class="select" data-id="{{ $admin->id }}" id="" name="record"
                                type="checkbox">
                        </td>
                        <td>

                            {{ $a++ }}

                        </td>
                        <td>{{ $admin->fullName }}</td>
                        <td>{{ $admin->username }}</td>
                        <td>{{ $admin->created_at }}</td>
                        <td>{{ $admin->created_by }}</td>
                        <td>{{ $admin->role }}</td>
                    </tr>
                @endforeach
            </table>{{ $admins->links() }}
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
                    <div class="input-box-new-user">
                        <select id="role" name="role">
                            @if (Auth::guard('admin')->user()->role == 'Super-Admin')
                                <option value="Super-Admin">Super-Admin</option>
                            @endif
                            <option value="Admin">Admin</option>
                        </select>
                    </div>

                    <input name="created_by" type="hidden" value="{{ Auth::guard('admin')->user()->username }}">

                </div>
                <div class="button-inputs">
                    <input type="submit" value="Create">
                    <input id="form-cancel-btn" type="button" value="cancel">
                </div>
            </form>
        </div>
    </section>
    <script>
        // Get the button element by id
        var button = document.getElementById("delete-selected-button");
        var flashMessage = document.getElementById("flash-message-content");

        // Add a click event listener to the button
        button.addEventListener("click", function() {
            // Get the url from the data-url attribute
            var url = button.getAttribute("data-url");

            // Get the CSRF token from the hidden input field
            var token = document.getElementById("token").value;

            // Get all the checkboxes in the table rows
            var checkboxes = document.querySelectorAll("input[name='record']");

            // Create an empty array to store the ids of checked checkboxes
            var ids = [];

            // Loop through the checkboxes and check if they are checked
            for (var i = 0; i < checkboxes.length; i++) {
                if (checkboxes[i].checked) {
                    // Get the id from the data-id attribute and push it to the array
                    var id = checkboxes[i].getAttribute("data-id");
                    ids.push(id);
                }
            }

            // Create a new XMLHttpRequest object
            var xhr = new XMLHttpRequest();

            // Open a DELETE request to the url
            xhr.open("delete", url);

            // Set the request header with the CSRF token and content type
            xhr.setRequestHeader("X-CSRF-TOKEN", token);
            xhr.setRequestHeader("Content-Type", "application/json");

            // Send the request with the JSON stringified array of ids as data
            xhr.send(JSON.stringify({
                ids: ids
            }));

            // Handle the response
            xhr.onload = function() {
                if (xhr.status == 200) {
                    // Parse the JSON response
                    var response = JSON.parse(xhr.responseText);
                    flashMessage.classList.add("active");
                    flashMessage.style.background = "lime";

                    // Display the success message
                    flashMessage.innerHTML = response.message;

                    // Hide the flash message after 2 seconds
                    setTimeout(function() {
                        flashMessage.classList.remove("active");
                    }, 3000);

                    // Reload the page after 2 seconds
                    setTimeout(function() {
                        location.reload();
                    }, 2000);
                } else {
                    flashMessage.classList.add("active");
                    // Display the success message
                    flashMessage.innerHTML = "Something went wrong. Please try again.";
                    flashMessage.style.background = "crimson";

                    // Hide the flash message after 2 seconds
                    setTimeout(function() {
                        flashMessage.classList.remove("active");
                    }, 3000);

                    // Reload the page after 2 seconds
                    setTimeout(function() {
                        location.reload();
                    }, 2000);
                }
            };
        });
    </script>
@endsection
