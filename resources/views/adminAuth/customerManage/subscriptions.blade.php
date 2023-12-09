@extends('adminAuth.component.admin-layout')
@section('subscriptions')
    <section class="user-subscriptions-section">
        <h1 class="admin-section-title">User Subscription</h1>
        <div class="manage-users-buttons">
            <form action="/admin/customer-manage/subscriptions" class="search-form">
                <input class="search-input" name="search" placeholder="Search" type="text" value="{{ old('search') }}">
                <button class="search-button" type="submit"><i class="fa-solid fa-search"></i> </button>
            </form>
            <div>
                <button class="delete-selected-button" id="delete-selected-button">Delete
                    Selected</button>
            </div>
        </div>
        <br>
        @php
            $a = 1;
        @endphp
        <div class="users-table">
            <table id="user-accounts-table">
                <tr>

                    <th>
                        <input class="select" id="selectAll" name="" type="checkbox">
                    </th>
                    <th>S.N</th>
                    <th>Full Name</th>
                    <th>Subscribed Plan</th>
                    <th>Start Date</th>
                    <th>End Date</th>
                    <th>Payment Amount</th>
                    <th>Payment ID</th>
                </tr>
                @foreach ($subscriptions as $subscription)
                    <tr class="retrieved-row">
                        <td data-cell="Checkbox">
                            <input id="token" name="_token" type="hidden" value="{{ csrf_token() }}">
                            <input class="select" data-id="" id="" name="record" type="checkbox">
                        </td>
                        <td data-cell="S.N">
                            {{ $a++ }}
                        </td>
                        <td data-cell="Full Name"> {{ $subscription->user->fullName }} </td>
                        <td data-cell="Subscribed Plan">{{ $subscription->plan->plan_title }}</td>
                        <td data-cell="Start Date">{{ $subscription->start_date }}</td>
                        <td data-cell="End Date">{{ $subscription->end_date }}</td>
                        <td data-cell="Payment Amount">Rs. {{ $subscription->payment_amount }}</td>
                        <td data-cell="Payment ID">{{ $subscription->payment_id }}</td>
                    </tr>
                @endforeach
            </table>
        </div>
    </section>
@endsection
