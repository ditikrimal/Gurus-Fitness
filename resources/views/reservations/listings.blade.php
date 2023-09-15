<x-layout>

    @unless (count($listings) == 0)



        <section class="listings">
            <h1 style="text-align: center">Listings</h1>
            @include('partials._search')
            <div class="container">

                @foreach ($listings as $listing)
                    @php
                        $tags = explode(',', "$listing->tags");
                    @endphp
                    <div class="box">
                        <a href="/listings/{{ $listing->id }}">
                            <h1>{{ $listing->title }}</h1>
                        </a>
                        <div class="listImg">
                            <img class="listImg"
                                src="{{ $listing->logo ? asset('storage/' . $listing->logo) : asset('/images/NoImage.jpg') }}"
                                alt="" />
                        </div>
                        <div class="row">
                            <span style="font-size: 17px; font-weight:520;">{{ $listing->companyName }}</span><br>
                            <span style="font-size: 15px; color:rgb(70, 69, 69)"><i class="fa-solid fa-location-dot"></i>
                                {{ $listing->location }}</span>

                        </div>
                        <div class="tags">
                            @foreach ($tags as $tag)
                                <span> <a style="color: white" href="listings/?tag={{ $tag }}">
                                        {{ $tag }}</a></span>
                            @endforeach

                        </div>



                    </div>
                @endforeach
            @else
                <h1 style="color:red;font-size:25px;text-align:center;padding:15vh 2vh 45vh">No Listings Found !</h1>
            @endunless
        </div>
        <div class="pageControl">
            {{ $listings->links() }}
        </div>
    </section>

</x-layout>
