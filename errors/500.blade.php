@extends('errors::minimal')

@section('title', __('Server Error'))
@section('code', '500')
@section('message')
    <div class="text-sm">
       Error Tracking ID:
    </div>
    <div>
{{--        <a href="{{ Flare::sentReports()->latestUrl() }}">--}}
            {{ Flare::sentReports()->latestUuid() }}
{{--        </a>--}}
    </div>
    @if($user = auth()->user())
        @if(\App\Models\Airline\AirlineStaff::whereUserId($user->id)->exists())
            <div class="text-sm">
                <a href="https://vision.vamsys.dev/bugs?action=create" target="_blank">Please click on me and log it in Vision</a>
            </div>
        @else
            <div class="text-sm">
                Share the code above, not an image, with your support team.
            </div>
        @endif
    @else
        <div class="text-sm">
            Share the code above, not an image, with your support team.
        </div>
    @endif


@endsection
