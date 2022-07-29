<div class="main-banner header-text">
    <div class="container-fluid">
        <div class="owl-banner owl-carousel">
            @foreach($bannerItems as $item)
            <div class="item">
                <img src="{{ $item->article->getImage() }}" alt="">
                <div class="item-content">
                    <div class="main-content">
                        <div class="meta-category">
                            <span>{{ $item->article->category->title }}</span>
                        </div>
                        <a href="{{ route('blog.show', $item->article->slug) }}"><h4>{{ $item->article->shortTitle(40) }}</h4></a>
                        <ul class="post-info">
                            <li><a href="{{ route('blog.by-author', $item->article->user->id) }}">{{ $item->article->user->name }}</a></li>
                            <li><a href="{{ route('blog.by-date', $item->article->shortCreatedAt()) }}">{{ $item->article->getFormattedDateString() }}</a></li>
                            <li><a href="{{ route('blog.show', $item->article->slug) }}#comments">{{ $item->article->getFormattedCommentCount() }}</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            @endforeach

        </div>
    </div>
</div>
