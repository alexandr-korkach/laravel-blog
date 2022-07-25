<div class="blog-post">
    <div class="blog-thumb">
        <img src="{{ $article->img }}" alt="">
    </div>
    <div class="down-content">
        <span>{{ $article->category->title }}</span>
        <a href="{{ route('blog.show', $article->slug) }}"><h4>{{ $article->title }}</h4></a>
        <ul class="post-info">
            <li><a href="#">{{ $article->user->name }}</a></li>
            <li><a href="#">{{ $article->getFormattedDateString() }}</a></li>
            <li><a href="{{ route('blog.show', $article->slug) }}#comments">{{ $article->getFormattedCommentCount() }}</a></li>
        </ul>
        <p>{{ $article->description }}</p>
        <div class="post-options">
            <div class="row">
                <div class="col-6">
                    <ul class="post-tags">
                        <li><i class="fa fa-tags"></i></li>
                        @foreach($article->tags as $tag)
                            @if(!$loop->last)
                                <li><a href="{{ route('blog.by-tag', $tag->slug) }}">{{ $tag->title }}</a>,</li>
                            @else
                                <li><a href="{{ route('blog.by-tag', $tag->slug) }}">{{ $tag->title }}</a></li>
                            @endif
                        @endforeach
                    </ul>
                </div>
                <div class="col-6">
                    <ul class="post-share">
                        <li><i class="fa fa-share-alt"></i></li>
                        <li><a href="#">Facebook</a>,</li>
                        <li><a href="#"> Twitter</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
