@extends('adminAuth.component.admin-layout')
@section('user-accounts')
    <section class="user-accounts-section">
        <h1 class="admin-section-title">User Accounts</h1>

        <div class="manage-users-buttons">
            <form action="/admin/admin-manage/users" class="search-form">
                <input class="search-input" name="search" placeholder="Search" type="text" value="{{ old('search') }}">
                <button class="search-button" type="submit"><i class="fa-solid fa-search"></i> </button>
            </form>
            <div>

                </button>
                <button class="delete-selected-button" id="delete-selected-button">Delete
                    Selected</button>
            </div>
        </div>
        <br>
        <div class="users-table">
            <table id="user-accounts-table">
                <tr>
                    <th>
                        <input class="select" id="selectAll" name="" type="checkbox">
                    </th>
                    <th>S.N</th>
                    <th>Full Name</th>
                    <th>Email</th>
                    <th>Address</th>
                    <th>City</th>
                    <th>Phone Number</th>
                </tr>
                @php
                    $a = 1;
                @endphp
                @foreach ($users as $user)
                    <tr class="retrieved-row">
                        <td data-cell="Checkbox">
                            <input id="token" name="_token" type="hidden" value="{{ csrf_token() }}">
                            <input class="select" data-id="{{ $user->id }}" id="" name="record"
                                type="checkbox">
                        </td>
                        <td data-cell="S.N">
                            {{ $a++ }}
                        </td>
                        <td data-cell="Full Name">{{ $user->fullName }}</td>
                        <td data-cell="Email">{{ $user->email }}</td>
                        <td data-cell="Address">{{ $user->address }}</td>
                        <td data-cell="City">{{ $user->city }}</td>
                        <td data-cell="Phone Number">{{ $user->phone }}</td>
                    </tr>
                @endforeach


            </table>


    </section>
@endsection
