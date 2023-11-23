<x-layout>
    <section class="my-subscription-section">
        <div class="subscription-table-container">
            <h1 class="greeting-title">
                Welcome, {{ auth()->user()->fullName }}
            </h1>
            <h2 class="subscription-table-title">
                Your Subscriptions
            </h2>
            <div class="my-subscription-table">
                <div class="my-subscription-table-heading">

                    <div class="table-heading-item">
                        <p>Plan</p>
                    </div>
                    <div class="table-heading-item">
                        <p>Start Date</p>
                    </div>
                    <div class="table-heading-item">
                        <p>End Date</p>
                    </div>
                    <div class="table-heading-item">
                        <p>Payment Amount</p>
                    </div>
                    <div class="table-heading-item">
                        <p>Payment ID</p>
                    </div>
                    <div class="table-heading-item">
                        <p>Action</p>
                    </div>
                </div>
                @if ($subscriptions->count() > 0)

                    @foreach ($subscriptions as $subscription)
                        <div class="my-subscription-table-row">
                            <div class="table-row-item">
                                <p>{{ $subscription->plan->plan_title }}</p>
                            </div>
                            <div class="table-row-item">
                                <p>{{ $subscription->start_date }}</p>
                            </div>
                            <div class="table-row-item">
                                <p>{{ $subscription->end_date }}</p>
                            </div>
                            <div class="table-row-item">
                                <p>Rs. {{ $subscription->payment_amount }}</p>
                            </div>
                            <div class="table-row-item">
                                <p>{{ $subscription->payment_id }}</p>
                            </div>
                            <div class="table-row-item">
                                <p class="cancel-plan-button">Request Cancel</p>
                            </div>
                        </div>
                    @endforeach
                @else
                    <div class="subscription-alert" role="alert">

                        <p><i class="fa-solid fa-x fa-xs" style="color: #ee2b2b;"></i> You have not subscribed to any
                            plans
                            yet.</p>
                        <div class="subscription-alert-btn">
                            <button class="btn btn-primary" onclick="window.location.href='/#plans';">Subscribe
                                Now</button>
                        </div>
                    </div>
                @endif

            </div>

            <p>
                Note: You can cancel your subscription anytime. However, Only the remaining month will be
                refunded
                excluding current month.
            </p>
        </div>
    </section>
    <section class="private-trainer-section">


    </section>
</x-layout>
<style>

</style>
