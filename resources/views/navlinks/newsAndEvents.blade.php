<x-layout>

    <div class="news-events-heading">
        <h1>News and Events</h1>
    </div>
    <section class="news-events-section">
        <div class="news-top">
            <div class="news-box-parent">

                <div class="news-box">

                    @foreach ($news as $news_item)
                        <div class="news-container"><img alt="" src="{{ asset($news_item->news_image) }}">
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
                        <li><a href="/news/{{ $most_viewed->id }}/{{ $most_viewed->news_title }}">
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
                <div class="events-box-heading">Events from Gurus Fitness</div>
                @foreach ($events as $event)
                    <div class="event-container">
                        <div class="event-container-content">
                            <div class="event-container-heading">
                                <h1>{{ $event->events_title }}</h1>
                            </div>
                            <div class="event-container-main-content">{{ $event->events_body }}</div>
                        </div>
                        <div class="event-container-button"><a href="">Show<br>More</a></div>

                    </div>
                @endforeach
                <div class="view-events-button">
                    <a href="">View All</a>
                </div>
            </div>
            <div class="notice-box">
                <div class="notice-box-heading">
                    <h1>Important Notice from Gurus Fitness</h1>
                </div>

                <div class="notice-box-content">
                    <div>
                        @foreach ($notice as $notice_item)
                            <li>{{ $notice_item->notice_title }}</li>
                        @endforeach

                    </div>
                </div>
            </div>

        </div>
    </section>
</x-layout>
