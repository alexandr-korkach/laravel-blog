<div class="col-lg-12">
    <div class="sidebar-item search">
        <form id="search_form" name="gs" method="GET" action="#">
            <input type="text" name="q" class="searchText" placeholder="пошук" autocomplete="on">
        </form>
    </div>
</div>
<div class="col-lg-12">
    <div class="sidebar-item recent-posts">
        <div class="sidebar-heading">
            <h2>Останні статті</h2>
        </div>
        <div class="content">
            <ul>
                @foreach($articles as $article)
                <li><a href="{{ $article->img }}">
                        <h5>{{ $article->title }}</h5>
                        <span>{{ $article->getFormattedDateString() }}</span>
                    </a></li>
                @endforeach
            </ul>
        </div>
    </div>
</div>
<div class="col-lg-12">
    <div class="sidebar-item categories">
        <div class="sidebar-heading">
            <h2>Категорії</h2>
        </div>
        <div class="content">
            <ul>
                @foreach($categories as $category)
               <li><a href="#">- {{ $category->title }}</a></li>
                @endforeach
              </ul>
        </div>
    </div>
</div>
<div class="col-lg-12">
    <div class="sidebar-item tags">
        <div class="sidebar-heading">
            <h2>Хмара тегів</h2>
        </div>
        <div class="content">
            <ul>
                @foreach($tags as $tag)
                <li><a href="#">{{ $tag->title }}</a></li>
                @endforeach
            </ul>
        </div>
    </div>
</div>
