@extends('errors::minimal')

@section('title', __('Too Many Requests'))
@section('code', '429')

@section('message')
    <div class="text-sm">
        Too many requests
    </div>
    <div class="text-sm">
        You are making more than 100 requests per minute - check your browser and extensions.
    </div>

@endsection
