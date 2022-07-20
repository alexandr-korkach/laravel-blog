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
                        <a href="#"><h4>{{ $item->article->shortTitle(40) }}</h4></a>
                        <ul class="post-info">
                            <li><a href="#">{{ $item->article->user->name }}</a></li>
                            <li>{{ $item->article->created_at }}</li>
                            <li><a href="#">{{ $item->article->comments->count() }} Comments</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            @endforeach

        </div>
    </div>
</div>
