<!DOCTYPE html>
<html lang="en">

<head>


    <div id="bgimg"></div>

    <!-- <Required Scripts> -->


    <title> Gurus Fitness</title>
    <link href="{{ asset('images/GurusFitnessLogo.png') }}" rel="shortcut icon" type="image/png" />

    <meta charset="UTF-8">
    <meta content="IE=edge" http-equiv="X-UA-Compatible">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <script src="https://kit.fontawesome.com/eac1eb5eeb.js"></script>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href='images/icon.ico' rel="icon" type="image/x-icon">

    <!-- </Required Scripts> -->
</head>



<x-profile-alert-banner />


<header>



    <div class="logoContainer">
        <a href="/">
            <h1>Gurus <span>Fitness</span></h1>
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
                    <a href="/user/my-subscriptions">
                        <i class="fa-solid fa-list"></i>
                        My Subscriptions
                    </a>
                </li>

                <li>
                    <a href="/news-and-events">
                        <i class="fa-regular fa-newspaper"></i>
                        News and events
                    </a>
                </li>




                <li>
                    <a href="/about-us">
                        <i class="fa-solid fa-circle-info"></i> about us
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
                    <a href="/user/my-subscriptions">
                        <i class="fa-solid fa-list"></i>
                        My Subscriptions </a>
                </li>

                <li>
                    <a href="/news-and-events">
                        <i class="fa-regular fa-newspaper"></i>

                        News and events
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
                        <i class="fa-solid fa-circle-info"></i>
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
                            Logout

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

<footer>
    <div class="footer-top">
        <div class="footer-top-left">
            <div class="get-in-touch">
                <div class="get-in-touch-heading">
                    <h2>Get in touch</h2>
                </div>
                <div class="get-in-touch-content">
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Laboriosam, at sint placeat cumque
                        quisquam quaerat impedit qui minima fugit itaque in omnis quas, laudantium eligendi unde facere
                        architecto distinctio nostrum?</p>
                </div>
            </div>
            <div class="get-in-touch-socials">
                <div class="contact-social mail"><i
                        class="fa-solid fa-envelope"></i><span>gurusfitness.feedback@gmail.com</span>
                </div>
                <div class="contact-social phone"><i class="fa-solid fa-phone"></i>
                    <span>+977 9751423169</span>
                </div>
                <div class="contact-social location"><i class="fa-solid fa-location-dot"></i><span>Bharatpur-12,
                        Chitwan</span></div>
            </div>
        </div>
        <div class="footer-top-right">
            <div class="contact-form-div">
                <h1>Say Something</h1>
                <form action="" class="contact-form">
                    <div class="contact-form-inputs">
                        <input id="" name="" placeholder="Your Name" type="text">
                        <input id="" name="" placeholder="Your Email" type="text">
                        <textarea cols="30" id="message" name="" placeholder="Message" rows="10"></textarea>
                        <input id="" name="" type="submit" value="SEND">
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="footer-bottom">
        <div class="footer-bottom-left">
            <h1>Gurus <span>Fitness</span></h1>
            <p> Your dream body with gurus fitness </p>
        </div>
        <div class="footer-bottom-center">
            <h2>We are also in </h2>
            <div class="footer-socials">
                <a href=""><i class="fa-brands fa-facebook"></i></a>
                <a href=""><i class="fa-brands fa-instagram"></i></a>
                <a href=""><i class="fa-brands fa-square-x-twitter"></i></a>
                <a href=""><i class="fa-brands fa-tiktok"></i></a>
            </div>
        </div>
        <div class="footer-bottom-right">
            <div class="footer-bottom-right-content">
                <h2>Legals</h2>
                <ul>
                    <li><a href="">Privacy Policy</a></li>
                    <li><a href="">Terms and Conditions</a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="footer-last">
        <hr>

        <div class="copyright-footer">&copy; Copyright Gurus Fitness 2023</div>
        <div class="dev-description"><span>Developed by <a href="https:/www.ditikrimal.com.np" target="_blank"> Ditik
                    Rimal</a></span></div>
    </div>
</footer>
<script src="{{ asset('script/app.js') }}"></script>
<script src="{{ asset('//unpkg.com/alpinejs') }}" defer></script>

<x-flashMessage />

</html>
