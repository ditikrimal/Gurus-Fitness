<x-layout>
    <main class="hero">
        <div class="hero-container">
            <div class="hero-text">
                <p>Start your fitness journey with us
                    <br> today

                </p>
                <div class="hero-sub-text">
                    Get started with a free trial and experience the benefits of our gym and fitness classes with
                    reasonable prices.
                </div>

                <div class="hero-btn">
                    @auth

                        <a href="/#plans">Browse Plans</a>
                    @endauth
                    @guest
                        <a href="/user">Login to Continue</a>
                    @endguest

                </div>
            </div>
            <div class="hero-image">
                <img alt="hero image" src="{{ asset('/images/Image-1.jpg') }}">
            </div>
        </div>
    </main>
    <section class="index-bar">
        <div class="index-bar-content">
            <p>Helping you be healthy and fit with proper guidance </p>
        </div>
        <div class="index-bar-features">

            <span><i class="fa-solid fa-heart"></i>
                <p>Convenient Process </p>
            </span>
            <span><i class="fa-solid fa-star"></i>
                <p>Browse Subscriptions</p>
            </span>
        </div>

    </section>
    <section class="index-containers">
        <div class="index-box trainers-box">
            <div class="index-box-image">
                <img alt="hero image" src="{{ asset('/images/Equipments.jpg') }}">
            </div>
            <div class="index-box-text">
                <h2>Professional Trainers and <br>State-of-the-Art Equipment </h2>
                <div class="index-box-sub-text">
                    Our gym is equipped with state-of-the-art fitness equipment and our team of professional trainers
                    are dedicated to helping you achieve your fitness goals. Whether you're a beginner or a seasoned
                    athlete, we have the resources and expertise to guide you on your fitness journey. <div
                        class="index-box-btn"> <a href="/listings">View More</a>
                    </div>
                </div>

            </div>

        </div>
        <div class="index-box registration-box">

            <div class="index-box-text">
                <h2>Diverse Range of Fitness Classes </h2>
                <div class="index-box-sub-text">
                    We offer a diverse range of fitness classes to suit every individual's preferences and fitness
                    levels. From high-intensity interval training to yoga and Pilates, our classes are designed to
                    challenge and inspire you. Join our fitness community and discover the joy of working out together.
                </div>
                <div class="index-box-btn"> <a href="/listings">Reserve Now</a>
                </div>
            </div>
            <div class="index-box-image">
                <img alt="hero image" src="{{ asset('/images/GymClasses.jpg') }}">
            </div>
        </div>


        <div class="index-box">
            <div class="index-box-image">
                <img alt="hero image" src="{{ asset('/images/TrainerImage.webp') }}">
            </div>
            <div class="index-box-text">
                <h2>Why Choose Us </h2>
                <div class="index-box-sub-text">
                    We are committed to providing the best customer service and ensuring a seamless gym and fitness
                    experience for our clients.
                    <div class="index-box-btn">
                        <a href="/listings">Contact Us</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="plans-and-prices" id="plans">
        <div class="plans-and-prices-heading">
            <h1>Choose the perfect plan for you</h1>
            <p>We offer a range of affordable and flexible subscription plans to help you achieve your fitness goals.
            </p>
        </div>

        <div class="plans-prices-parent">
            @foreach ($plans_prices as $plan)
                @php
                    $plan_feature = explode(',', "$plan->plan_features");
                @endphp
                <div class="plans-prices-box">
                    <div class="plans-prices-container">
                        <div class="plan-title">
                            {{ $plan->plan_title }}
                        </div>
                        <div class="price-heading">Rs. {{ $plan->plan_prices }}
                        </div>
                        <div class="plans-prices-content">
                            <p>Join Now</p>
                            <hr>

                            <ul>
                                @foreach ($plan_feature as $feature)
                                    <li>
                                        {{ $feature }}
                                    </li>
                                @endforeach

                            </ul>
                        </div>
                    </div>
                    <div class="plan-prices-button">
                        <a href="/user/{{ $plan->id }}/subscription">
                            Get Started
                        </a>
                    </div>
                </div>
            @endforeach


        </div>
    </section>
</x-layout>
