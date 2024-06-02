@extends('layout.layout')

@section('content')
    <div class="container py-4">
        <div class="row">
            <div class="col-3">
                @include('shared.left_sidebar')
            </div>
            <div class="col-6">
                @include('shared.success_message')

                <div class="mt-3">
                    @include('shared.post_card')
                </div>

            </div>
            <div class="col-3">
                @include('shared.follow_box')
            </div>
        </div>
    </div>
@endsection
