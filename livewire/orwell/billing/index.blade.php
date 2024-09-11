<div>
    <div class="grid gap-6 grid-cols-3">
        <div class="panel h-full">
            <div class="-m-5 mb-5 flex items-start border-b border-[#e0e6ed] p-5 dark:border-[#1b2e4b]">
                <div class="text-lg font-semibold">
                    <h6>Why a recurring subscription?</h6>
                </div>
            </div>
            <div>
                <div class="text-justify text-white-dark">
                    Our infrastructure - servers the vAMSYS runs on and the databases where we store all the delicious PIREPs does not come to us free of charge.<br/>
                    Similar applies to all the other things we need to keep vAMSYS running - that's domains, development tools and some professional and legal fees.<br/>
                    Our costs are ongoing and your subscription pays for it, allowing vAMSYS to remain online.
                </div>
            </div>
        </div>
        <div class="panel h-full">
            <div class="-m-5 mb-5 flex items-start border-b border-[#e0e6ed] p-5 dark:border-[#1b2e4b]">
                <div class="text-lg font-semibold">
                    <h6>How and when will I be charged?</h6>
                </div>
            </div>
            <div>
                <div class="text-justify text-white-dark">
                    @if(!$airline->subscribed())
                        You currently do not have a subscription. Once you enter your card details, the billing
                        period will begin immediately and your card will be charged monthly on the day subscription started or, when that day of the month does not exist - on the last day of the month. <br>
                        If you are on trial period, it will end and your VA will be opened to registrations using the register link you have set in Settings.
                    @else
                        Your subscription started on {{ $airline->subscription()->created_at }} and will be billed
                        @if($airline->subscribedToPrice('price_1I0UuFF9Ym5ZDQAIN8KpjFHE') || $airline->subscribedToPrice('price_1GyLNoF9Ym5ZDQAIcWcYqfMy'))
                            every month
                        @else
                            every year
                        @endif
                        on the card provided on the day of the anniversary of the subscription or on the last day of the month.
                    @endif
                </div>
            </div>
        </div>
        <div class="panel h-full">
            <div class="-m-5 mb-5 flex items-start border-b border-[#e0e6ed] p-5 dark:border-[#1b2e4b]">
                <div class="text-lg font-semibold">
                    <h6>Can I cancel?</h6>
                </div>
            </div>
            <div>
                <div class="text-justify text-white-dark">
                    We are sorry to hear you are thinking of leaving - yes - you can cancel your subscription in the Manage Subscription page. Your VA will then be removed at the end of billing period.<br/>
                    Should you wish the subscription to be terminated sooner, please get in touch with us by opening a ticket. Do note that no refund for the remaining period will be issued.
                </div>
            </div>
        </div>

        <div class="panel h-full">
            <div class="-m-5 mb-5 flex items-start border-b border-[#e0e6ed] p-5 dark:border-[#1b2e4b]">
                <div class="text-lg font-semibold">
                    <h6>Are my card details safe?</h6>
                </div>
            </div>
            <div>
                <div class="text-justify text-white-dark">
                    Absolutely. <br/>
                    Your card details do not enter or touch vAMSYS servers at all. All payment method storage and processing are done within your browser or by Stripe, our payment processor.<br/>
                    <a href="/legal" target="_blank">See our Privacy Policy for more details.</a>
                </div>
            </div>
        </div>

        <div class="panel h-full">
            <div class="-m-5 mb-5 flex items-start border-b border-[#e0e6ed] p-5 dark:border-[#1b2e4b]">
                <div class="text-lg font-semibold">
                    <h6>Can I change my plan from monthly to yearly?</h6>
                </div>
            </div>
            <div>
                <div class="text-justify text-white-dark">
                    Yes - head to Manage Subscription page where you can make the change. Moving from monthly to yearly subscription will result in a pro-rated charge to extend your current billing period to a year, whereas change from yearly to monthly will give you credit and you will not be charged until it is exhausted.
                </div>
            </div>
        </div>

        <div class="panel h-full">
            <div class="-m-5 mb-5 flex items-start border-b border-[#e0e6ed] p-5 dark:border-[#1b2e4b]">
                <div class="text-lg font-semibold">
                    <h6>What payment methods are accepted?</h6>
                </div>
            </div>
            <div>
                <div class="text-justify text-white-dark">
                    All major credit and debit cards are accepted - this includes Visa, Mastercard, American Express, Discover & Diners and UnionPay.<br/>
                    We politely ask you to use Visa or Mastercard where possible, due to more favorable card processing fees.
                </div>
            </div>
        </div>
    </div>

    @if($airline->subscribed())
        <div class="flex justify-around mt-8 pb-12 mt-12">
            <div class="max-w-[40rem] w-full bg-white shadow-[4px_6px_10px_-3px_#bfc9d4] rounded border border-[#e0e6ed] dark:border-[#1b2e4b] dark:bg-[#191e3a] dark:shadow-none p-5">
                <div class="flex justify-between mb-5">
                    <span class="badge bg-primary/10 text-primary py-1.5 dark:bg-primary dark:text-white">YOUR SUBSCRIPTION</span>
                </div>
                <div class="flex items-baseline justify-start -space-x-3 rtl:space-x-reverse mb-5 text-6xl font-extrabold">
                    @if($airline->subscribedToPrice('price_1I0UuFF9Ym5ZDQAIN8KpjFHE'))
                        £20
                    @elseif($airline->subscribedToPrice('price_1I3TQ7F9Ym5ZDQAIKD3Qpm0n'))
                        £240
                    @elseif($airline->subscribedToPrice('price_1GyLNoF9Ym5ZDQAIcWcYqfMy'))
                        £10
                    @elseif($airline->subscribedToPrice('price_1I5sh2F9Ym5ZDQAIKRJ4kW7y'))
                        £120
                    @endif
                    <span class="text-2xl ml-2 font-medium">
                        @if($airline->subscribedToPrice('price_1I0UuFF9Ym5ZDQAIN8KpjFHE') || $airline->subscribedToPrice('price_1GyLNoF9Ym5ZDQAIcWcYqfMy'))
                            per month
                        @else
                            per year
                        @endif
                        </span>
                </div>
                <p class="text-[15px] ">Your next payment will be collected on {{ \Carbon\Carbon::parse($airline->subscription()->asStripeSubscription()->current_period_end)->toFormattedDateString() }}.</p>
                <div class="text-justify mt-4">
                    <div class="w-full">
                        @if(\Carbon\Carbon::now()->lte($airline->created_at->addDays(4)))
                            Subscription can be started {{ $airline->created_at->addDays(4)->diffForHumans() }}. <br/>This cannot be changed by us and is there to allow you plenty of time to setup your VA and decide if vAMSYS is right for you.
                        @else
                            <a href="/billing" class="btn btn-primary w-full">Manage Subscription</a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    @elseif($airline->hasIncompletePayment())
        <div class="flex justify-around mt-8 pb-12 mt-12">
            <div class="max-w-[40rem] w-full bg-white shadow-[4px_6px_10px_-3px_#bfc9d4] rounded border border-[#e0e6ed] dark:border-[#1b2e4b] dark:bg-[#191e3a] dark:shadow-none p-5">
                <div class="flex justify-between mb-5">
                    <span class="badge bg-danger">YOUR SUBSCRIPTION HAS INCOMPLETE PAYMENT</span>
                </div>
                <div class="text-justify mt-4">
                    <div class="w-full">
                        @if(\Carbon\Carbon::now()->lte($airline->created_at->addDays(4)))
                            Subscription can be started {{ $airline->created_at->addDays(4)->diffForHumans() }}. <br/>This cannot be changed by us and is there to allow you plenty of time to setup your VA and decide if vAMSYS is right for you.
                        @else
                            <a href="/billing" class="btn btn-danger w-full">Manage Subscription</a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    @else
        <div class="flex justify-around mt-8 pb-12 mt-12">
            <div class="max-w-[24rem] w-full bg-white shadow-[4px_6px_10px_-3px_#bfc9d4] rounded border border-[#e0e6ed] dark:border-[#1b2e4b] dark:bg-[#191e3a] dark:shadow-none p-5">
                <div class="flex justify-between mb-5">
                    <h6 class="text-[#0e1726] font-semibold text-base dark:text-white-light"></h6>
                    <span class="badge bg-primary/10 text-primary py-1.5 dark:bg-primary dark:text-white">MONTHLY SUBSCRIPTION</span>
                </div>
                <div class="flex items-baseline justify-start -space-x-3 rtl:space-x-reverse mb-5 text-6xl font-extrabold">
                    £20<span class="text-2xl font-medium">/month</span>
                </div>
                <div class="text-justify">
                    <div class="w-full">
                        @if(\Carbon\Carbon::now()->lte($airline->created_at->addDays(4)))
                            Subscription can be started {{ $airline->created_at->addDays(4)->diffForHumans() }}. <br/>This cannot be changed by us and is there to allow you plenty of time to setup your VA and decide if vAMSYS is right for you.
                        @else
                            <a href="/billing" class="btn btn-primary w-full">Subscribe</a>
                        @endif
                    </div>
                </div>
            </div>

            <div class="max-w-[24rem] w-full bg-white shadow-[4px_6px_10px_-3px_#bfc9d4] rounded border border-[#e0e6ed] dark:border-[#1b2e4b] dark:bg-[#191e3a] dark:shadow-none p-5">
                <div class="flex justify-between mb-5">
                    <h6 class="text-[#0e1726] font-semibold text-base dark:text-white-light"></h6>
                    <span class="badge bg-primary/10 text-primary py-1.5 dark:bg-primary dark:text-white">YEARLY SUBSCRIPTION</span>
                </div>
                <div class="flex items-baseline justify-start -space-x-3 rtl:space-x-reverse mb-5 text-6xl font-extrabold">
                    £240<span class="text-2xl font-medium">/year</span>
                </div>
                <div class="text-justify">
                    <div class="w-full">
                        @if(\Carbon\Carbon::now()->lte($airline->created_at->addDays(4)))
                            Subscription can be started {{ $airline->created_at->addDays(4)->diffForHumans() }}. <br/>This cannot be changed by us and is there to allow you plenty of time to setup your VA and decide if vAMSYS is right for you.
                        @else
                            <a href="/billing" class="btn btn-primary w-full">Subscribe</a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    @endif

    @if($airline->trial_ends_at)
        <div class="w-full">
            {{ $this->deleteAction }}
        </div>

        <x-filament-actions::modals />
    @endif

</div>
