<x-layout>

    <div class="news-events-heading">
        <h1>News and Events</h1>
    </div>
    <section class="news-events-section">
        <div class="news-top">
            <div class="news-box-parent">

                <div class="news-box">

                    @foreach ($news as $news_item)
                        <div class="news-container"><img alt="" src="../images/Image-1.jpg">
                            <div class="news-container-content">
                                <div class="news-container-heading">{{ $news_item->news_title }}</div>
                                <div class="news-container-main-content">{{ $news_item->news_body }}</div>
                                <div class="news-container-button"><a
                                        href="/news/{{ $news_item->id }}/{{ $news_item->news_title }}">Read
                                        More</a>
                                </div>
                            </div>
                        </div>
                    @endforeach


                </div>


            </div>
            @php
                $a = 1;
            @endphp
            <div class="news-bar-vertical">

                <div class="news-bar-heading">Most viewed stories </div>
                <ul>
                    @foreach ($most_viewed_news as $most_viewed)
                        <li><a href="">
                                {{ $a++ }}.
                                {{ $most_viewed->news_title }}
                            </a>
                        </li>
                    @endforeach

                </ul>
            </div>
        </div> {{ $news->links() }}

        <div class="news-bottom">
            <div class="events-box">
                <div class="events-box-heading">Events from United Limited</div>
                <div class="event-container">This is container</div>
                <div class="event-container">This is container</div>
                <div class="event-container">This is container</div>
                <div class="event-container">This is container</div>
                <div class="event-container">This is container</div>
            </div>
            <div class="top-news">
                <div class="top-news-heading">Important Stories from United Limited</div>
            </div>

        </div>
    </section>
</x-layout>