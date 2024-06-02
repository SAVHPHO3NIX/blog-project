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
                    @include('shared.user_card')
                </div>
                <hr>

                @forelse ($posts as $post)
                    <div class="mt-3">
                        @include('shared.post_card')
                    </div>
                    @empty
                    <p class="text-center mt-4">No Results Found</p>
                    @endforelse

                <div class="mt-3">
                {{ $posts-> withQueryString()->links() }}
                </div>

            </div>
            <div class="col-3">
                @include('shared.search_bar')
                @include('shared.follow_box')
            </div>
        </div>
    </div>
@endsection
