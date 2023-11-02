<x-layout>
    <section class="single-news-section">
        <div class="single-news-top">
            <div class="single-news-heading-content">
                <div class="news-heading">
                    <h1>{{ $news->news_title }}</h1>
                </div>
                <div class="news-image"><img alt="" src="{{ asset($news->news_image) }}"></div>
            </div>
            <div class="news-bar-vertical latest-post">
                @php
                    $a = 1;
                @endphp
                <div class="news-bar-heading ">Latest Stories</div>
                <ul>
                    @foreach ($latest_posts as $latest_post)
                        <li><a href="/news/{{ $latest_post->id }}/{{ $latest_post->news_title }}">
                                {{ $a++ }}.
                                {{ $latest_post->news_title }}
                            </a>
                        </li>
                    @endforeach


                </ul>
            </div>
        </div>
        <div class="single-news-bottom">
            <div class="single-news-main-content">{{ $news->news_body }}</div>
        </div>

    </section>
</x-layout>
