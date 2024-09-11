<div>
    @if($this->airlineStaff)
    @if(!$airline->subscribed() && $airline->billable)
        @if($airline->onTrial())
            <div class="flex items-center p-3.5 text-primary bg-primary-light dark:bg-primary-dark-light">
                <span class="ltr:pr-2 rtl:pl-2">
                    <strong class="ltr:mr-1 rtl:ml-1">Trial Version</strong>
                    We hope you are giving vAMSYS a good try to see if it meets your needs. Trial ends on {{ $airline->trialEndsAt()->toFormattedDateString() }}.
                </span>
            </div>
        @else
            @if($airline->hasIncompletePayment() && $airline->billable)
                <a href="{{ route('orwell.billing') }}">
                    <div class="flex items-center p-3.5 text-danger bg-danger-light dark:bg-danger-dark-light">
                        <span class="ltr:pr-2 rtl:pl-2">
                            <strong class="ltr:mr-1 rtl:ml-1">Subscription Overdue</strong>
                            Latest payment could not be collected. Please click here.
                        </span>
                    </div>
                </a>
            @elseif(!$airline->hasDefaultPaymentMethod() && $airline->billable)
                <a href="{{ route('orwell.billing') }}">
                    <div class="flex items-center p-3.5 text-warning bg-warning-light dark:bg-warning-dark-light">
                        <span class="ltr:pr-2 rtl:pl-2">
                            <strong class="ltr:mr-1 rtl:ml-1">Default Payment Method is Missing</strong>
                            Without a default payment method, the subscription will not be able to renew.
                        </span>
                    </div>
                </a>
            @elseif($airline->billable)
                <a href="{{ route('orwell.billing') }}">
                    <div class="flex items-center p-3.5 text-danger bg-danger-light dark:bg-danger-dark-light">
                        <span class="ltr:pr-2 rtl:pl-2">
                            <strong class="ltr:mr-1 rtl:ml-1">Subscription is Missing</strong>
                            You do not have a valid subscription. Please click here.
                        </span>
                    </div>
                </a>
            @endif
        @endif
    @endif
    @endif
</div>
