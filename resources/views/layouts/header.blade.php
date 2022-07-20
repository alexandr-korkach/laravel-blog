<nav class="navbar navbar-expand-lg">
    <div class="container">
        <a class="navbar-brand" href="{{ route('home') }}"><h2>Stand Blog<em>.</em></h2></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item {{ $mainLink }}">
                    <a class="nav-link" href="{{ route('home') }}">Головна

                    </a>
                </li>

                <li class="nav-item {{ $blogLink }}">
                    <a class="nav-link" href="{{ route('blog.index') }}">Блог
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="post-details.html">Реєстрація</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="contact.html">Contact Us</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
