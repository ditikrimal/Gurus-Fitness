<x-layout>
    <section class="about-us-section">
        <div class="about-us-heading">
            <div class="abt-heading-main">Bringing your dream body to reality with Gurus Fitness</div>

            <div class="abt-heading-sub">
                <span>One of the top most fitness institute in the nation
                </span>
                <br><br>
                <span style="font-style:italic">"Trusted by <strong style="color: #007bff">80,000+</strong>
                    people"</span>
            </div>
        </div>
        <div class="about-us-content">
            <div class="about-us-float">
                <div class="float-1">
                    <div class="float-icons">
                        <i class="fa-solid fa-building" style="color: #292e38;"></i>
                        <h1>Professional equipments</h1>
                    </div>
                    <div class="float-content">We provide professional equipments for your fitness journey. Choose from
                        a variety of equipments to make your workout more effective.
                    </div>
                </div>
                <div class="float-2">
                    <div class="float-icons">
                        <i class="fa-solid fa-book" style="color: #292e38;"></i>
                        <h1>Variety of Subscriptions</h1>
                    </div>
                    <div class="float-content">We provide a variety of subscriptions for your fitness journey. Choose
                        from a variety of subscriptions to make your workout more effective.
                    </div>
                </div>
                <div class="float-3">
                    <div class="float-icons">
                        <i class="fa-solid fa-pen-to-square" style="color: #292e38;" style="padding: 10px 11px"></i>
                        <h1>Private Instructors</h1>
                    </div>
                    <div class="float-content">Hire your own private instructor to help you with your fitness journey.
                        Choose from a variety of instructors to make your workout more effective.
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
                                <img alt="" src="{{ asset($aboutData->about_image) }}" srcset="">
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
                    <li><strong>Passionate Expertise:</strong> At Gurus Fitness, we embody a spirit of passionate
                        expertise. Our team, comprised of seasoned fitness professionals, is devoted to delivering
                        unparalleled excellence in every aspect of your fitness journey.</li>

                    <li><strong>Tailored Programs:</strong> We recognize the value of your time and wellness goals.
                        That's why we offer meticulously crafted fitness programs that cater to your specific needs.
                        Choose from a diverse range of options designed to align with your fitness aspirations.</li>

                    <li><strong>Individualized Approach:</strong> Your fitness journey is personal, and we understand
                        the importance of customization. At Gurus Fitness, we provide extensive options for
                        personalization, ensuring that your workout routine reflects your unique preferences and
                        objectives.</li>

                    <li><strong>Transparent Guidance:</strong> Transparency is the foundation of our approach. From the
                        initial assessment to reaching your fitness milestones, we keep you informed and engaged
                        throughout the process, fostering a clear and supportive fitness journey.</li>

                    <li><strong>Client-Centric Philosophy:</strong> You, our valued client, are at the center of
                        everything we do. Your fitness goals and well-being take precedence, and we are dedicated to
                        surpassing your expectations with every interaction, creating an unparalleled client experience.
                    </li>

                    <li><strong>Cutting-Edge Fitness Solutions:</strong> Gurus Fitness is committed to integrating
                        cutting-edge technologies and sustainable practices into your fitness regimen. We strive not
                        only to enhance your physical well-being but also to contribute to a healthier planet.</li>

                    <li><strong>Community Wellness:</strong> Beyond just workouts, we are passionate about fostering a
                        sense of community and inclusivity. Gurus Fitness is dedicated to building connections and
                        creating an environment where individuals can thrive in their pursuit of a healthier lifestyle.
                    </li>
                </ul>
            </div>
        </section>
    </section>
</x-layout>
