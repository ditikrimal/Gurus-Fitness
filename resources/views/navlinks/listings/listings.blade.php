<x-layout>
    <script src="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/js/splide.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/css/splide.min.css" rel="stylesheet">
    <section class="listings">
        <div class="splide">

            <div class="splide__track">
                <div class="splide__arrows">
                    <button class="splide__arrow splide__arrow--prev">
                        <i class="fa-sharp fa-solid fa-chevron-left"></i>
                    </button>
                    <button class="splide__arrow splide__arrow--next">
                        <i class="fa-sharp fa-solid fa-chevron-right"></i> </button>
                </div>
                <div class="splide__list">
                    <div class="splide__slide">
                        <div class="splide_image">
                            <img alt="" src="{{ asset('images/Slider1.jpg') }}">
                        </div>

                    </div>
                    <div class="splide__slide">
                        <div class="splide_image">
                            <img alt="" src="{{ asset('images/Image-2.jpg') }}">
                        </div>

                    </div>
                    <div class="splide__slide">
                        <div class="splide_image">
                            <img alt="" src="{{ asset('images/Image-3.jpg') }}">
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </section>


    <script>
        var splide = new Splide('.splide', {
            type: 'loop',
            padding: '0rem',
            height: '22rem',
            gap: '2rem',
            snap: true,

        });
        splide.mount();
    </script>
</x-layout>
