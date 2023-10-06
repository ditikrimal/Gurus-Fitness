<!DOCTYPE html>
<html lang="en">

<head>


    <div id="bgimg"></div>

    <!-- <Required Scripts> -->


    <meta charset="UTF-8">
    <meta content="IE=edge" http-equiv="X-UA-Compatible">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <script src="https://kit.fontawesome.com/eac1eb5eeb.js"></script>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href='images/icon.ico' rel="icon" type="image/x-icon">

    <!-- </Required Scripts> -->
</head>


<title>United Limited</title>
<x-profile-alert-banner />


<header>

    <div class="logoContainer">
        <a href="/">
            <h1>United <span>Limited</span></h1>
        </a>

    </div>
    <nav>
        <ul class="navBar">
            <a href="/">
                <li><i class="fa-solid fa-home"></i>
                    Home
            </a>
            </li>
            @auth <li>
                    <a href="/listings">
                        <i class="fa-solid fa-list"></i>
                        Our Listings
                    </a>
                </li>

                <li>
                    <a href="/news-and-events">
                        <i class="fa-regular fa-newspaper"></i>
                        News and events
                    </a>
                </li>


                <li>
                    <a href="/reservations">
                        <i class="fa-solid fa-calendar"></i>
                        reservations
                    </a>
                </li>

                <li>
                    <a href="/about-us">
                        <i class="fa-solid fa-circle-exclamation"></i>
                        about us
                    </a>
                </li>
                <li>
                    <a href="/user/profile">
                        <i class="fa-solid fa-user"></i>

                        profile
                    </a>
                </li>
                <li>

                    <form action="/logout" method="POST">
                        @csrf
                        <button class="logoutBtn" style="background-color: transparent; border:none;" type="submit">
                            <a><i class="fa-solid fa-right-to-bracket"></i> Logout</a>
                            <style>
                                .logoutBtn:hover {
                                    cursor: pointer;
                                }
                            </style>
                        </button>

                    </form>

                </li>
            @else
                <li>
                    <a href="/listings">
                        <i class="fa-solid fa-list"></i>
                        Our Listings
                    </a>
                </li>

                <li>
                    <a href="/news-and-events">
                        <i class="fa-regular fa-newspaper"></i>

                        News and events
                    </a>
                </li>


                <li>
                    <a href="/reservations">
                        <i class="fa-solid fa-calendar"></i>
                        reservations
                    </a>
                </li>

                <li>
                    <a href="/user">
                        <i class="fa-solid fa-user-plus"></i>

                        Login / Signup
                    </a>
                </li>

                <li>
                    <a href="/about-us">
                        <i class="fa-solid fa-user-plus"></i>

                        about us
                    </a>
                </li>
            @endauth
        </ul>
    </nav>

    <div class="navBtn" id="navBtn">
        <span id="btn1"></span>
        <span id="btn3"></span>
        <span id="btn2"></span>
    </div>

</header>

<div class="mobile-nav" id="mobileNav">
    <div>
        <ul class="mobile-navbar">

            <li> <a href="/">
                    Home
                </a>
            </li>
            @auth <li>
                    <a href="/login">


                        Our Listings
                    </a>
                </li>
                <li>
                    <a href="/news-and-events">

                        News and events
                    </a>
                </li>


                <li>
                    <a href="/reservations">

                        reservations
                    </a>
                </li>

                <li>
                    <a href="/about-us">

                        about us
                    </a>
                </li>
                <li>
                    <a href="/user/profile">


                        profile
                    </a>
                </li>
                <li>

                    <form action="/logout" method="POST">
                        @csrf
                        <button class="logoutBtn" style="background-color: transparent; border:none;" type="submit">
                            <a> Logout</a>

                        </button>

                    </form>

                </li>
            @else
                <li>
                    <a href="/login">


                        Our Listings
                    </a>
                </li>
                <li>
                    <a href="/news-and-events">


                        News and events
                    </a>
                </li>


                <li>
                    <a href="/reservations">

                        reservations
                    </a>
                </li>

                <li>
                    <a href="/user">


                        Login / Signup
                    </a>
                </li>

                <li>
                    <a href="/about-us">


                        about us
                    </a>
                </li>
            @endauth
        </ul>
    </div>
</div>

<body>
    . <!--<script type="text/javascript" src="https://freehitcounters.org/count/bmth"></script><br>
    <a href='https://drweiglundpartner.de/'>https://DrWeiglundPartner.de</a>
    <script type='text/javascript' src='https://whomania.com/ctr?id=e34e2ac6e1054c2ec89364f73bc4e808fdcb074e'></script>
    -->
    <section class="slotSection">
        {{ $slot }}
    </section>
    <!--Scripts -->

</body>

<script src="{{ asset('script/app.js') }}"></script>

<footer>
    <div class="row">

        <div class="foot-1">
            <h1>United Limited</h1>
            <div class="footDescription">
                Lorem ipsum dolor, sit amet consectetur adipisicing elit. Doloribus dolorum non ipsa dolorem
                molestias,
                nemo qui ipsum ad recusandae ipsam eligendi architecto maxime delectus. Non cupiditate quia sed
                adipisci
                quod.
            </div>
            <div class="socials">
                <i class="fa-brands fa-facebook"></i>
                <i class="fa-brands fa-instagram"></i>
                <i class="fa-brands fa-google"></i>
                <i class="fa-brands fa-tiktok"></i>
            </div>
        </div>
        <hr>
        <div class="foot-2">
            <span><i class="fa-solid fa-phone"></i> +977 9845678109</span>
            <span><i class="fa-solid fa-location-dot"></i> Bharatpur, Chitwan</span>
            <span><i class="fa-solid fa-at"></i> unitedlimited@feedback.com</span>
        </div>
        <hr>
        <div class="foot-3">

            <span>Our Team</span>
            <div class="member">
                <ul>
                    <li>
                        Elon Musk
                    </li>
                    <li> Larry Paige</li>
                    <li>Mark Zuckerburg</li>
                    <li>Bill Gates</li>

                </ul>
            </div>
        </div>
    </div>
    <hr>
    <h1 style="font-size: 15px; font-weight:500;text-align:center;margin-top:17px;">Copyright © United Limited 2023.
        All
        rights reserved.</h1>
</footer>
<script src="{{ asset('//unpkg.com/alpinejs') }}" src="" defer></script>

<x-flashMessage />

</html>
