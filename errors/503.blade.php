@extends('errors::minimal')

@section('title', __('Service Unavailable'))
@section('code', '503')
@section('message')
    <div class="text-sm">
        Error Tracking ID:
    </div>
    <div>
        {{--        <a href="{{ Flare::sentReports()->latestUrl() }}">--}}
        {{ Flare::sentReports()->latestUuid() }}
        {{--        </a>--}}
    </div>
    <div class="text-sm">
        Share the code above, not an image, with your support team.
    </div>
@endsection
