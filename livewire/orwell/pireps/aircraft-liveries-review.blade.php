<div>
    <div class="large-alert alert-primary">
        <div class="text-center pb-0 flex flex-col sm:flex-row space-x-4">
            <div class="mb-4 sm:mb-0 flex justify-center items-center">
                <x-icon name="light.circle-info" class="large-alert-icon fill-primary"/>
            </div>
            <div class="my-auto grow text-left">
                <p>
                    <strong class="ltr:mr-1 rtl:ml-1">Livery Review Actions:</strong><br/>
                    <strong>Accept</strong> - Marks livery as accepted. Will not trigger livery review when flown next time. Pending PIREPs with this Livery will be approved if that is the only reason they are pending review.<br/>
                    <strong>Reject Livery Only</strong> - Marks livery as rejected. AutoReject rules will determine what happens when this livery is flown next time. No action taken with PIREPs pending review.<br/>
                    <strong>Reject with PIREPs</strong> - Marks livery as rejected. AutoReject rules will determine what happens when this livery is flown next time. Pending PIREPs with this Livery will be rejected if that is the only reason they are pending review.<br/>
                    <strong>Reject and Invalidate</strong> - Marks livery as rejected. AutoReject rules will determine what happens when this livery is flown next time. Pending PIREPs with this Livery will be invalidated if that is the only reason they are pending review.<br/>
                    <strong>Ignore Livery</strong> - Marks livery as ignored. You will not be asked to review the livery again and all future PIREPs will trigger PIREP review if this livery is used. No action taken with PIREPs pending review.
                </p>
            </div>
        </div>
    </div>

    {{ $this->table }}
</div>
