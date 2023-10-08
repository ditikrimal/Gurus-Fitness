<x-layout>
    <main class="hero">
        <div class="hero-container">
            <div class="hero-text">
                <p>Find Your Dream
                    <br> Home Today
                </p>
                <div class="hero-sub-text">
                    Browse through our wide selection of real estate properties and find your perfect home.
                </div>
                <div class="hero-btn"> <a href="/listings">View Listings</a>
                </div>
            </div>
            <div class="hero-image">
                <img alt="hero image" src="{{ asset('/images/Image-1.jpg') }}">
            </div>
        </div>
    </main>
    <section class="index-bar">
        <div class="index-bar-content">
            <p>Helping you find the perfect property to call home. </p>
        </div>
        <div class="index-bar-features">

            <span><i class="fa-solid fa-heart"></i>
                <p>Convenient Reservation Process </p>
            </span>
            <span><i class="fa-solid fa-star"></i>
                <p>Browse Properties</p>
            </span>
        </div>

    </section>
    <section class="index-containers">
        <div class="index-box">
            <div class="index-box-image">
                <img alt="hero image" src="{{ asset('/images/Image-1.jpg') }}">
            </div>
            <div class="index-box-text">
                <h2>Quick and Easy Reservation Process </h2>
                <div class="index-box-sub-text">
                    Reserve your preferred property in just a few simple steps. No hassle, no stress. </div>
                <div class="index-box-btn"> <a href="/listings">Reserve Now</a>
                </div>
            </div>
        </div>

        <div class="index-box explore-box">
            <div class="index-box-text">
                <h2>Explore Our Featured Properties </h2>
                <div class="index-box-sub-text">
                    Discover our handpicked selection of top-notch properties with exceptional features and amenities.
                    <div class="index-box-btn"> <a href="/listings">View More</a>
                    </div>
                </div>

            </div>
            <div class="index-box-image">
                <img alt="hero image" src="{{ asset('/images/Image-2.jpg') }}">
            </div>
        </div>
        <div class="index-box">
            <div class="index-box-image">
                <img alt="hero image" src="{{ asset('/images/Image-3.jpg') }}">
            </div>
            <div class="index-box-text">
                <h2>Why Choose Us </h2>
                <div class="index-box-sub-text">
                    We are committed to providing the best customer service and ensuring a seamless reservation
                    experience for our clients. <div class="index-box-btn"> <a href="/listings">Contact Us</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-layout>
