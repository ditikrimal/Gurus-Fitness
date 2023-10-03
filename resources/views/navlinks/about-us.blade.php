<x-layout>
    <section class="about-us-section">
        <div class="about-us-heading">
            <div class="abt-heading-main">Bringing your dream house to reality with United Limited</div>

            <div class="abt-heading-sub">
                <span>One of the top most real state company in the nation
                </span>
                <br><br>
                <span style="font-style:italic">"Trusted by <strong style="color: #007bff">50000+</strong> family"</span>
            </div>
        </div>
        <div class="about-us-content">
            <div class="about-us-float">
                <div class="float-1">
                    <div class="float-icons">
                        <i class="fa-solid fa-building" style="color: #292e38;"></i>
                        <h1>Professional builds</h1>
                    </div>
                    <div class="float-content">Prebuilt professional builds for your easy pick. Choose from the
                        already created listings.
                    </div>
                </div>
                <div class="float-2">
                    <div class="float-icons">
                        <i class="fa-solid fa-book" style="color: #292e38;"></i>
                        <h1>Reservations and visits</h1>
                    </div>
                    <div class="float-content">Reserve your choice of house or visit the location by applying for visit
                        date to get a better
                        idea of the builds.
                    </div>
                </div>
                <div class="float-3">
                    <div class="float-icons">
                        <i class="fa-solid fa-pen-to-square" style="color: #292e38;" style="padding: 10px 11px"></i>
                        <h1>Customization options</h1>
                    </div>
                    <div class="float-content">Customize the builds according to your liking. Choose from a variety of
                        options to make your house your home.
                    </div>
                </div>

            </div>

        </div>
        <section class="about-us-main-content-section">
            <div class="about-us-main">
                @foreach ($aboutData as $aboutData)
                    <div class="about-us">
                        @if ($aboutData->id % 2 == 0)
                            <div class='about-us-main-image'>
                                <img alt="" src="{{ $aboutData->about_image }}" srcset="">
                            </div>
                        @endif
                        <div class="about-us-main-parent">
                            <div class="about-us-main-heading">
                                <h1>{{ $aboutData->about_title }}</h1>

                            </div>
                            <div class="about-us-main-content">
                                <p>{{ $aboutData->about_description }}
                                </p>
                            </div>
                        </div>

                        @if ($aboutData->id % 2 == 1)
                            <div class='about-us-main-image'>
                                <img alt="" src="{{ $aboutData->about_image }}" srcset="">
                            </div>
                        @endif

                    </div>
                    <br>
                    <br>
                @endforeach
            </div>

            </div>
        </section>
        <section class="why-us-section">
            <div class="why-us-heading">
                <h1>Why us? </h1>
            </div>
            <div class="why-us-content">
                <ul>
                    <li><strong>Professional Excellence:</strong> United Limited is synonymous with professional
                        excellence. Our team of
                        experts, from architects to real estate agents, is dedicated to delivering top-notch quality in
                        every project we undertake.

                    </li>
                    <li><strong>Prebuilt Convenience:</strong>
                        </strong>
                        </strong>
                        </strong>
                        </strong>
                        </strong> We understand that time is precious. That's why we offer prebuilt
                        professional builds that are ready for your easy selection. Choose from a variety of listings
                        designed to meet your specific requirements.

                    </li>
                    <li><strong>Personalized Customization:</strong>
                        </strong>
                        </strong>
                        </strong>
                        </strong>
                        </strong> Your home should be a reflection of your unique taste and style. At
                        United Limited, we provide extensive customization options to ensure your house truly becomes
                        your home. Select from a wide range of options to tailor your living space to your liking.

                    </li>
                    <li><strong>Transparent Process:</strong>
                        </strong>
                        </strong>
                        </strong>
                        </strong>
                        </strong> We believe in transparency at every step of the real estate journey. From
                        the initial reservation to the final walkthrough, we keep you informed and involved, making the
                        process as smooth as possible.

                    </li>
                    <li><strong>Customer-Centric Approach:</strong>
                        </strong>
                        </strong>
                        </strong>
                        </strong>
                        </strong> Our customers are at the heart of everything we do. We prioritize
                        your needs and preferences, striving to exceed your expectations with every interaction.

                    </li>
                    <li><strong>Innovation and Sustainability:</strong>
                        </strong>
                        </strong>
                        </strong>
                        </strong>
                        </strong> United Limited is committed to adopting innovative technologies
                        and sustainable practices in our projects. We aim to create homes that are not only beautiful
                        but also environmentally friendly.

                    </li>
                    <li><strong>Community Building: </strong>
                        </strong>
                        </strong>
                        </strong>
                        </strong>
                        </strong>Beyond bricks and mortar, we focus on building vibrant and inclusive
                        communities. We believe in fostering connections and creating spaces where families can thrive.

                    </li>


                </ul>
            </div>
        </section>
    </section>
</x-layout>
