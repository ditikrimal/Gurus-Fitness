<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="ie=edge" http-equiv="X-UA-Compatible">
    <script src="https://kit.fontawesome.com/eac1eb5eeb.js"></script>
    <link href="{{ asset('css/adminapp.css') }}" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
        crossorigin="anonymous"></script>
    <title>Document</title>
</head>

<body>
    <section class="admin-app">
        <div class="sidebar" id="adminSidebar">
            <div class="sidebar-logocontainer">

                <p>Fitness <span>Guru</span></p>

                <svg class="sidebar-ham" fill="none" height="64px" id="sideBarHamBtn" viewBox="0 -0.5 25 25"
                    width="64px" xmlns="http://www.w3.org/2000/svg">
                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                    <g id="SVGRepo_tracrimsonerCarrier" stroke-linecrimsonap="round" stroke-linejoin="round"></g>
                    <g id="SVGRepo_icrimsononCarrier">
                        <path
                            d="M6.96967 16.4697C6.67678 16.7626 6.67678 17.2374 6.96967 17.5303C7.26256 17.8232 7.73744 17.8232 8.03033 17.5303L6.96967 16.4697ZM13.0303 12.5303C13.3232 12.2374 13.3232 11.7626 13.0303 11.4697C12.7374 11.1768 12.2626 11.1768 11.9697 11.4697L13.0303 12.5303ZM11.9697 11.4697C11.6768 11.7626 11.6768 12.2374 11.9697 12.5303C12.2626 12.8232 12.7374 12.8232 13.0303 12.5303L11.9697 11.4697ZM18.0303 7.53033C18.3232 7.23744 18.3232 6.76256 18.0303 6.46967C17.7374 6.17678 17.2626 6.17678 16.9697 6.46967L18.0303 7.53033ZM13.0303 11.4697C12.7374 11.1768 12.2626 11.1768 11.9697 11.4697C11.6768 11.7626 11.6768 12.2374 11.9697 12.5303L13.0303 11.4697ZM16.9697 17.5303C17.2626 17.8232 17.7374 17.8232 18.0303 17.5303C18.3232 17.2374 18.3232 16.7626 18.0303 16.4697L16.9697 17.5303ZM11.9697 12.5303C12.2626 12.8232 12.7374 12.8232 13.0303 12.5303C13.3232 12.2374 13.3232 11.7626 13.0303 11.4697L11.9697 12.5303ZM8.03033 6.46967C7.73744 6.17678 7.26256 6.17678 6.96967 6.46967C6.67678 6.76256 6.67678 7.23744 6.96967 7.53033L8.03033 6.46967ZM8.03033 17.5303L13.0303 12.5303L11.9697 11.4697L6.96967 16.4697L8.03033 17.5303ZM13.0303 12.5303L18.0303 7.53033L16.9697 6.46967L11.9697 11.4697L13.0303 12.5303ZM11.9697 12.5303L16.9697 17.5303L18.0303 16.4697L13.0303 11.4697L11.9697 12.5303ZM13.0303 11.4697L8.03033 6.46967L6.96967 7.53033L11.9697 12.5303L13.0303 11.4697Z"
                            fill="crimson"></path>
                    </g>
                </svg>

            </div>
            <div class="sidebar-links">
                <ul class="sideBarUl">
                    <li class="sideBarLinks title">Home</li>

                    <li class="sideBarLinks ">
                        <a href="/admin/home/dashboard"> <i class="fa-solid fa-gauge"></i>Dashboard</a>
                    </li>
                    <li class="sideBarLinks" style="margin-top: 0.5rem">
                        <a href="/admin/home/my-profile">
                            <i class="fa-solid fa-user-gear"></i>My Profile</a>
                    </li>


                    <li class="sideBarLinks title">Website Content Manage</li>

                    <li class="sideBarLinks">
                        <a href="/admin/website-content/news-and-events"><i class="fa-regular fa-newspaper"></i> News
                            and
                            Events</a>
                    </li>
                    <li class="sideBarLinks">
                        <a href="/admin/website-content/plans-and-prices"> <i class="fa-solid fa-list"></i>
                            Plans And Prices</a>
                    </li>
                    <li class="sideBarLinks">
                        <a href="/admin/website-content/about-us"> <i class="fa-solid fa-circle-exclamation"></i>
                            About Us</a>
                    </li>

                    <li class="sideBarLinks title">Customer Manage</li>

                    <li class="sideBarLinks">
                        <a href="/admin/customer-manage/user-accounts"><i class="fa-solid fa-user"></i>
                            User Accounts</a>
                    </li>
                    <li class="sideBarLinks">
                        <a href="/admin/customer-manage/subscriptions"><i class="fa-solid fa-tag"></i>Subscriptions </a>
                    </li>


                    <li class="sideBarLinks title">Admin Manage</li>

                    <li class="sideBarLinks">
                        <a href="/admin/admin-manage/users"><i class="fa-solid fa-users"></i>Users</a>
                    </li>
                    <li class="sideBarLinks" style="width:100%;">

                        <i class="fa-solid fa-right-to-bracket"></i>
                        <form action="/admin/logout" method="POST" style="width:100%;">
                            @csrf
                            <button style="width:100%; background-color: transparent; border:none;" type="submit">
                                <a style="width:100%; "> Logout</a>

                            </button>

                        </form>

                    </li>
                </ul>
            </div>
        </div>
        </div>
        <div class="admin-app-main" id="adminAppMain">

            <div class="admin-navbar">
                <div class="ham-burger">
                    <svg id="hamBurgerBtn">
                        <rect class="line top" height="3" rx="2" width="30" x="10" y="25">
                        </rect>
                        <rect class="line middle" height="3" rx="2" width="30" x="10" y="33">
                        </rect>
                        <rect class="line bottom" height="3" rx="2" width="30" x="10" y="41">
                        </rect>
                    </svg>
                </div>

                <div class="navbar-profile">
                    <div class="profile-img">
                        <img alt="profile-img" src="{{ asset('images/Image-1.jpg') }}">
                    </div>
                    <div class="profile-name">

                        <p><span>Hi,</span> <strong style="color: #2386f0;">
                                {{ Auth::guard('admin')->user()->fullName }}
                            </strong></p>
                    </div>
                </div>
            </div>
            <div class="admin-app-content">
                @yield('dashboard')
                @yield('my-profile')
                @yield('news-and-events')
                @yield('plans-and-prices')
                @yield('about-us')
                @yield('user-accounts')
                @yield('subscriptions')
                @yield('users')


            </div>
        </div>
    </section>
    <script src="{{ asset('script/adminApp.js') }}"></script>

</body>
<script></script>



</html>
