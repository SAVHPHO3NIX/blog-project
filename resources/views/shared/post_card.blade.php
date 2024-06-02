<div class="card">
    <div class="px-3 pt-4 pb-2">
        <div class="d-flex align-items-center justify-content-between">
            <div class="d-flex align-items-center">
                <img style="width:50px" class="me-2 avatar-sm rounded-circle"
                    src="{{ $post->user->getImageURL() }}"
                    alt="{{ $post->user->name }}">
                <div>
                    <h5 class="card-title mb-0"><a href="{{ route('users.show',$post->user->id) }}"> {{ $post->user->name }}
                        </a></h5>
                </div>
            </div>
            <div>
                <form method="POST" action="{{ route('posts.destroy',$post->id) }}">
                    @csrf
                    @method('delete')
                    <a class="mx-2" href="{{ route('posts.edit',$post->id) }}"> Edit </a>
                    <a href="{{ route('posts.show',$post->id) }}"> View </a>
                    <button class="ms-1 btn btn-danger btn-sm"> Delete </button>
                </form>
            </div>
        </div>
    </div>
    <div class="card-body">
        @if ($editing ?? false)
        <form action="{{ route('posts.update',$post->id) }}" method="post">
            @csrf
            @method('put')
            <div class="mb-3">
                <textarea name="content" class="form-control" id="content" rows="3">{{ $post->content }}</textarea>
                @error('content')
                    <span class="d-block fs-6 text-danger mt-2"> {{ $message }} </span>
                @enderror
            </div>
            <div class="">
                <button type="submit" class="btn btn-dark mb-2 btn-sm"> Update </button>
            </div>
            </form>
        @else
        <p class="fs-6 fw-light text-muted">
            {{ $post->content }}
        </p>
        @endif
        <div class="d-flex justify-content-between">
            <div>
                <a href="#" class="fw-light nav-link fs-6"> <span class="fas fa-heart me-1">
                    </span> {{ $post->likes }} </a>
            </div>
            <div>
                <span class="fs-6 fw-light text-muted"> <span class="fas fa-clock"> </span>
                    {{ $post->created_at }} </span>
            </div>
        </div>
        @include('shared.comments_box')
    </div>
</div>
