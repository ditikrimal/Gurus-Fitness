@extends('adminAuth.component.admin-layout')
@section('admin-users')
    <div class="flash-message">
        <p class="flash-message-content " id="flash-message-content"></p>
    </div>
    <section class="admin-users-section">
        <h1 class="admin-section-title">User Management</h1>
        <div class="manage-users-buttons">
            <form action="/admin/admin-manage/users" class="search-form">
                <input class="search-input" name="search" placeholder="Search" type="text" value="{{ old('search') }}">
                <button class="search-button" type="submit"><i class="fa-solid fa-search"></i> </button>
            </form>
            <div>
                <button class="add-user-button" id="add-user-button">Add New User

                </button>
                <button class="delete-selected-button" id="delete-selected-button">Delete
                    Selected</button>
            </div>
        </div>

        <br>
        <div class="users-table">
            <table id="admin-user-table">
                <tr>
                    <th>
                        <input class="select" id="selectAll" name="" type="checkbox">
                    </th>
                    <th>S.N</th>
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
                            <option value="Admin">Admin</option>
                            @if (Auth::guard('admin')->user()->role == 'Super-Admin')
                                <option value="Super-Admin">Super-Admin</option>
                            @endif

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
        document.addEventListener("DOMContentLoaded", function() {
            var route = "/admin/user/delete"; // Set the desired route
            var button = document.getElementById("delete-selected-button");
            var flashMessage = document.getElementById("flash-message-content");

            button.addEventListener("click", function() {
                deleteSelectedRecords(route);
            });
        });
    </script>
@endsection
