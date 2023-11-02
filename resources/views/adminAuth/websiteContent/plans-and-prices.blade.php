@extends('adminAuth.component.admin-layout')
@section('plans-and-prices')
    <meta content="{{ csrf_token() }}" name="csrf-token">

    <div class="flash-message">
        <p class="flash-message-content " id="flash-message-content"></p>
    </div>
    <section class="plans-and-prices-section">
        <h1 class="admin-section-title">Plans and Prices Management</h1>
        <div class="manage-users-buttons">
            <form action="/admin/website-content/news-and-events" class="search-form">
                <input class="search-input" name="search" placeholder="Search" type="text" value="{{ old('search') }}">

                <button class="search-button" type="submit"><i class="fa-solid fa-search"></i> </button>
            </form>
            <div> <button class="delete-selected-button" data-url="{{ route('newsEventsDelete') }}"
                    id="delete-selected-button">Delete
                    Selected</button>
                <button class="add-user-button" id="add-plan-button">Add New Plan</button>

            </div>
        </div>
        <div class="plans-and-prices-fetched-content">
            @foreach ($plans as $plan_item)
                <div class="plans-and-prices-box">
                    <input id="token" name="_token" type="hidden" value="{{ csrf_token() }}">
                    <div class="select-div-plan">
                        <input class="select" data-id="{{ $plan_item->id }}" id="selectAllPlan" name="record"
                            type="checkbox">
                        <label for="record">Select</label>

                    </div>
                    <div class="plan-title">
                        <input name="plan_title" placeholder="Plan Title" type="text"
                            value="{{ $plan_item->plan_title }}">
                    </div>
                    <div class="plan-prices">
                        <input name="plan_prices" placeholder="Plan Price" type="text"
                            value="{{ $plan_item->plan_prices }}">
                    </div>
                    <div class="plan-features"> <input name="plan_features"
                            placeholder="Plan Features (Seperated with comma)" type="text "
                            value="{{ $plan_item->plan_features }}">
                    </div>
                    <button>Update</button>

                </div>
            @endforeach

        </div>
    </section>
    <section class="new-user-section" id="new-plan-section">
        <div class="new-user-box" id="new-plan-box" style="width: 50%">
            <div class="new-user-heading">
                <h1>Add Plan</h1>
                <p id='RepMsg4'></p>
            </div>
            <form class="new-user-form" enctype="multipart/form-data" id="newPlanForm">
                @csrf
                @method('POST')
                <div class="text-inputs" style="grid-template-columns: repeat(1, 1fr);">
                    <div class="input-box-new-user">
                        <input name="plan_title" placeholder="Plan Title" type="text">

                    </div>
                    <div class="input-box-new-user">
                        <input name="plan_prices" placeholder="Plan Price" type="text">
                    </div>

                    <div class="input-box-new-user">
                        <input name="plan_features" placeholder="Plan Features (Seperated with comma)" type="text ">
                    </div>
                </div>
                <div class="button-inputs">
                    <input type="submit" value="Add">
                    <input id="plan-form-cancel-btn" type="button" value="cancel">
                </div>
            </form>
        </div>
    </section>
@endsection
