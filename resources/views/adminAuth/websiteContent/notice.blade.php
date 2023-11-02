@extends('adminAuth.component.admin-layout')
@section('notice')
    <meta content="{{ csrf_token() }}" name="csrf-token">

    <div class="flash-message">
        <p class="flash-message-content " id="flash-message-content"></p>
    </div>
    <section class="notice-section">
        <h1 class="admin-section-title">Notice Management</h1>
        <div class="manage-users-buttons">
            <form action="/admin/website-content/news-and-events" class="search-form">
                <input class="search-input" name="search" placeholder="Search" type="text" value="{{ old('search') }}">

                <button class="search-button" type="submit"><i class="fa-solid fa-search"></i> </button>
            </form>


            <div>
                <button class="add-user-button" id="add-notice-button">Add New Notice</button>
                <button class="delete-selected-button" data-url="{{ route('newsEventsDelete') }}"
                    id="delete-selected-button">Delete
                    Selected</button>
            </div>

        </div>
        <div class="notice-fetched-content">
            @foreach ($notices as $notice_item)
                <div class="data-fetching-container">
                    <input id="token" name="_token" type="hidden" value="{{ csrf_token() }}">
                    <input class="select" data-id="{{ $notice_item->id }}" id="selectAllNotice" name="record"
                        type="checkbox">
                    <div class="notice-container-content">
                        <div class="notice-container-heading">
                            <p>
                                {{ $notice_item->notice_title }}
                            </p>
                        </div>

                    </div>
                </div>
            @endforeach

        </div>
    </section>
    <script>
        var maxNoticeLimit = 7;

        // Check the number of notices in the database
        var numberOfNotices = {{ count($notices) }};
        var flashMessage = $("#flash-message-content");

        // Disable the "Add New Notice" button if the limit is reached
        if (numberOfNotices >= maxNoticeLimit) {
            $("#add-notice-button").css("background", "gray");
            $("#add-notice-button").css("color", "white");
            $("#add-notice-button").css("cursor", "not-allowed");

            $("#add-notice-button").prop("disabled", true);

            flashMessage.addClass("active");
            flashMessage.css("background", "red");

            // Display the success message
            flashMessage.text("Maximum number of notices reached (7). Delete older to add new.");
        }
    </script>


    <section class="new-user-section" id="new-notice-section">
        <div class="new-user-box" id="new-notice-box" style="width: 50%">
            <div class="new-user-heading">
                <h1>Add Notice</h1>
                <p id='RepMsg3'>
                </p>
            </div>
            <form class="new-user-form" id="newNoticeForm">
                @csrf
                @method('POST')
                <div class="text-inputs" style="grid-template-columns: repeat(1, 1fr);">

                    <div class="input-box-new-user">
                        <textarea class="notice_textarea" id="notice_title" maxlength="255" name="notice_title"
                            placeholder="Notice Content (Maximum characters 255)" type="text"></textarea>
                    </div>

                </div>
                <div class="button-inputs">
                    <input type="submit" value="Add">
                    <input id="notice-form-cancel-btn" type="button" value="cancel">
                </div>
            </form>
        </div>
    </section>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var route = "/admin/notices/delete-notice"; // Set the desired route

            var button = document.getElementById("delete-selected-button");
            var flashMessage = document.getElementById("flash-message-content");

            button.addEventListener("click", function() {
                deleteSelectedRecords(route);
            });
        });
    </script>
@endsection
