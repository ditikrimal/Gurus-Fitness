@extends('adminAuth.component.admin-layout')
@section('news-and-events')
    <meta content="{{ csrf_token() }}" name="csrf-token">

    <div class="flash-message">
        <p class="flash-message-content " id="flash-message-content"></p>
    </div>
    <section class="news-and-events-section">
        <h1 class="admin-section-title">News and Events Management</h1>
        <div class="manage-users-buttons">
            <form action="/admin/website-content/news-and-events" class="search-form">
                <input class="search-input" name="search" placeholder="Search" type="text" value="{{ old('search') }}">
                <select id="role" name="role">
                    <option value="News">News</option>
                    <option value="Events">Events</option>
                </select>
                <button class="search-button" type="submit"><i class="fa-solid fa-search"></i> </button>
            </form>
            <div>
                <button class="add-user-button" id="add-news-button">Add News</button>
                <button class="add-user-button" id="add-event-button">Add Event</button>
                <button class="delete-selected-button" data-url="{{ route('newsEventsDelete') }}"
                    id="delete-selected-button">Delete
                    Selected</button>
            </div>
        </div>
        <div class="news-events-fetched-content">
            <div class="news-events-box">
                <h2 class="admin-section-subtitle">News</h2>




                @foreach ($news as $news_item)
                    <div class="news-event-container">
                        <input id="token" name="_token" type="hidden" value="{{ csrf_token() }}">
                        <input class="select" data-id="{{ $news_item->id }}" id="selectAllNews" name="record"
                            type="checkbox">
                        <img alt="" src="{{ asset($news_item->news_image) }}">
                        <div class="news-event-container-content">
                            <div class="news-event-container-heading">{{ $news_item->news_title }}</div>
                            <div class="news-event-container-main-content">
                                {{ $news_item->news_body }}
                            </div>
                        </div>

                    </div>
                @endforeach
            </div>

            <div class="news-events-box">
                <h2 class="admin-section-subtitle">Events</h2>
                @foreach ($events as $event_item)
                    <div class="news-event-container">
                        <input id="token" name="_token" type="hidden" value="{{ csrf_token() }}">

                        <input class="select" data-id="{{ $event_item->id }}" id="selectAllEvents" name="record"
                            type="checkbox">

                        <div class="news-event-container-content">
                            <div class="news-event-container-heading">{{ $event_item->events_title }}</div>
                            <div class="news-event-container-main-content">
                                {{ $event_item->events_body }}
                            </div>

                        </div>
                    </div>
                @endforeach

            </div>
        </div>

    </section>
    <section class="new-user-section" id="new-news-section">
        <div class="new-user-box" id="new-news-box" style="width: 50%">
            <div class="new-user-heading">
                <h1>Add News</h1>
                <p id='RepMsg1'></p>
            </div>
            <form class="new-user-form" enctype="multipart/form-data" id="newNewsForm">
                @csrf
                @method('POST')
                <div class="text-inputs" style="grid-template-columns: repeat(1, 1fr);">
                    <div class="input-box-new-user">
                        <input id="news_title" name="news_title" placeholder="News Heading" style="width:100%"
                            type="text">
                    </div>
                    <div class="input-box-new-user">
                        <textarea id="news_body" name="news_body" placeholder="News Content" type="text"></textarea>
                    </div>
                    <div class="input-box-new-user">
                        <input id="news_image" name="news_image" placeholder="Choose News Image" type="file">
                    </div>
                </div>
                <div class="button-inputs">
                    <input type="submit" value="Create">
                    <input id="news-form-cancel-btn" type="button" value="cancel">
                </div>
            </form>
        </div>
    </section>

    <section class="new-user-section" id="new-event-section">
        <div class="new-user-box" id="new-event-box" style="width: 50%">
            <div class="new-user-heading">
                <h1>Add Event</h1>
                <p id='RepMsg2'>
                </p>
            </div>
            <form class="new-user-form" id="newEventForm">
                @csrf
                @method('POST')
                <div class="text-inputs" style="grid-template-columns: repeat(1, 1fr);">
                    <div class="input-box-new-user">

                        <input id="events_title" name="events_title" placeholder="Event Heading" style="width:100%"
                            type="text">
                    </div>
                    <div class="input-box-new-user">
                        <textarea id="events_body" name="events_body" placeholder="Event Content" type="text"></textarea>
                    </div>

                </div>
                <div class="button-inputs">
                    <input type="submit" value="Create">
                    <input id="event-form-cancel-btn" type="button" value="cancel">
                </div>
            </form>
        </div>
    </section>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var route = "/admin/news-and-events/delete-news"; // Set the desired route

            var button = document.getElementById("delete-selected-button");
            var flashMessage = document.getElementById("flash-message-content");

            button.addEventListener("click", function() {
                deleteSelectedRecords(route);
            });
        });
    </script>
@endsection
