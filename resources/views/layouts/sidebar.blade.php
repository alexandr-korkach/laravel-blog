<div class="col-lg-12">
    <div class="sidebar-item search">
        <form id="search_form"  method="GET" action="{{ route('blog.search') }}">
            @csrf
            <input type="text" name="q" class="searchText @error('q') is-invalid @enderror"

                   placeholder="@if($errors->any()){{$errors->first('q')}}
                    @elseпошук...@endif" autocomplete="on">
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
                <li><a href="{{ route('blog.show', $article->slug) }}">
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
               <li><a href="{{ route('blog.by-category', $category->slug) }}">- {{ $category->title }}</a></li>
                @endforeach
              </ul>
        </div>
    </div>
</div>
<div class="col-lg-12">
    <div class="sidebar-item tags">
        <div class="sidebar-heading">
            <h2>Теги</h2>
        </div>
        <div class="content">
            <ul>
                @foreach($tags as $tag)
                <li><a href="{{ route('blog.by-tag', $tag->slug) }}">{{ $tag->title }}</a></li>
                @endforeach
            </ul>
        </div>
    </div>
</div>
