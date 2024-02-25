<div class="mb-4 shadow-sm card">
    <img src="{{ $post->image }}" class="card-img-top" alt="{{ $post->title }}">
    <div class="card-body">
        <h5 class="card-title">{{ $post->title }}</h5>
        <p class="card-text">{{ Str::limit($post->excerpt, 100) }}</p>
        <div class="d-flex justify-content-between align-items-center">
            <small class="text-muted">{{ $post->published_at->diffForHumans() }}</small>
            <div class="btn-group">
                <a href="{{ route('news.article', $post->slug) }}" class="btn btn-sm btn-outline-secondary">Leer
                    más</a>
            </div>
        </div>
    </div>
    <div class="card-footer text-muted">
        Publicado por {{ $post->author->name }}
    </div>
</div>
