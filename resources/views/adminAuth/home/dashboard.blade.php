@extends('adminAuth.component.admin-layout')
@section('dashboard')
    <link
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200"
        rel="stylesheet" />
    <section class="dashboard-section">
        <h1 class="admin-section-title">Welcome to Admin DAshboard</h1>
        <div class="dashboard-box">
            <div class="count-box total-amount" onclick="location.href='/admin/customer-manage/subscriptions'">
                <div class="count-box-title">
                    <h2>Total Revenue</h2>
                    <span class="material-symbols-outlined amount">
                        account_balance </span>
                </div>
                <div class="count-box-fetched-number">
                    <h2 class="count-box-number">Rs. {{ $totalAmount }}</h2>
                </div>

            </div>
            <div class="count-box user-accounts" onclick="location.href='/admin/customer-manage/user-accounts'">
                <div class="count-box-title">
                    <h2>User Accounts</h2>
                    <span class="material-symbols-outlined amount">
                        group </span>
                </div>
                <div class="count-box-fetched-number">
                    <h2 class="count-box-number">{{ $userAccounts }}</h2>
                </div>

            </div>

            <div class="count-box subscriptions">
                <div class="count-box-title">
                    <h2>Subscriptions</h2>
                    <span class="material-symbols-outlined amount">
                        sell </span>
                </div>
                <div class="count-box-fetched-number">
                    <h2 class="count-box-number">{{ $subscriptions }}</h2>
                </div>
            </div>
            <div class="count-box admins">
                <div class="count-box-title">
                    <h2>Admins</h2>
                    <span class="material-symbols-outlined amount">
                        manage_accounts </span>
                </div>
                <div class="count-box-fetched-number">
                    <h2 class="count-box-number">{{ $admins }}</h2>
                </div>
            </div>
            <div class="count-box news">
                <div class="count-box-title">
                    <h2>News</h2>
                    <span class="material-symbols-outlined amount">
                        news </span>
                </div>
                <div class="count-box-fetched-number">
                    <h2 class="count-box-number">{{ $news }}</h2>
                </div>
            </div>

            <div class="count-box events">
                <div class="count-box-title">
                    <h2>Events</h2>
                    <span class="material-symbols-outlined amount">
                        calendar_month </span>
                </div>
                <div class="count-box-fetched-number">
                    <h2 class="count-box-number">{{ $events }}</h2>
                </div>
            </div>
            <div class="count-box notices">
                <div class="count-box-title">
                    <h2>Notices</h2>
                    <span class="material-symbols-outlined amount">
                        error </span>
                </div>
                <div class="count-box-fetched-number">
                    <h2 class="count-box-number">{{ $notices }}</h2>
                </div>
            </div>
            <div class="count-box plans">
                <div class="count-box-title">
                    <h2>Plans</h2>
                    <span class="material-symbols-outlined amount">
                        list </span>
                </div>
                <div class="count-box-fetched-number">
                    <h2 class="count-box-number">{{ $plans }}</h2>
                </div>
            </div>

        </div>

    </section>
@endsection
