<x-layout>
    <section class="listing">
        <h1 style="text-align: center">{{ $listing->title }}</h1>

        @php
            $tags = explode(',', "$listing->tags");
        @endphp

        <div class="listBox">
            <div class="boxContent">
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


                <div class="description">
                    <p>
                        {{ $listing->description }}
                    </p>
                </div>
            </div>
        </div>


    </section>
</x-layout>
