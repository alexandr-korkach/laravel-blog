<div class="main-banner header-text">
    <div class="container-fluid">
        <div class="owl-banner owl-carousel">
            @foreach($bannerItems as $item)
            <div class="item">
                <img src="{{ $item->article->img }}" alt="">
                <div class="item-content">
                    <div class="main-content">
                        <div class="meta-category">
                            <span>{{ $item->article->category->title }}</span>
                        </div>
                        <a href="{{ route('blog.show', $item->article->slug) }}"><h4>{{ $item->article->shortTitle(40) }}</h4></a>
                        <ul class="post-info">
                            <li>{{ $item->article->user->name }}</li>
                            <li>{{ $item->article->getFormattedDateString() }}</li>
                            <li><a href="{{ route('blog.show', $item->article->slug) }}#comments">{{ $item->article->getFormattedCommentCount() }}</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            @endforeach

        </div>
    </div>
</div>
