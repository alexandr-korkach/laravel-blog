@extends('admin.layouts.layout')

@section('content')


        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Результати пошуку</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Головна</a></li>
                            <li class="breadcrumb-item active"><a href="{{ route('articles.index') }}">Статті</a></li>
                            <li class="breadcrumb-item active">Результати пошуку</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">

            <!-- Default box -->
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">"{{ $q }}"</h3>

                </div>
                <div class="card-body">

                @if(count($articles))
                    <div class="table-responsive">
                    <table class="table table-bordered table-hover text-nowrap">
                        <thead>
                        <tr>
                            <th style="width: 30px">#</th>
                            <th>Назва</th>
                            <th>Категорія</th>
                            <th>Теги</th>
                            <th>Дата</th>
                            <th>Дії</th>
                            <th>Баннер</th>

                        </tr>
                        </thead>
                        <tbody>

                        @foreach($articles as $article)
                        <tr>
                            <td>{{ $article->id }}</td>
                            <td><a href="{{ route('blog.show', $article->slug) }}">{{ $article->title }}</a></td>
                            <td>{{ $article->category->title }}</td>
                            <td>{{ $article->tags->pluck('title')->join(', ') }}</td>
                            <td>{{ $article->created_at }}</td>
                            <td>
                                <a href="{{ route('articles.edit', ['article'=>$article->id]) }}" class="btn btn-info btn-sm float-left mr-1">
                                    <i class="fas fa-pencil-alt"></i>
                                </a>
                                <form action="{{ route('articles.destroy', ['article'=>$article->id]) }}" method="POST" class="float-left">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Дійсно бажаєте видалити статтю?')">

                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                </form>
                               </td>
                            <td>
                                @if(!in_array($article->id, $banner))
                                <form action="{{ route('banner.add', ['id'=>$article->id]) }}" method="POST" class="float-left">
                                    @csrf

                                    <button type="submit" class="btn btn-success btn-sm" onclick="return confirm('Додати статтю на головний баннер?')">

                                        <i class="fas fa-plus"></i>
                                    </button>
                                </form>
                                @else
                                <form action="{{ route('banner.remove', ['id'=>$article->id]) }}" method="POST" class="float-left">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Видалити статтю з головного баннера?')">

                                        <i class="fas fa-minus"></i>
                                    </button>
                                </form>
                                @endif

                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                    </div>
                    @else
                        <p>Нічого не знайдено...</p>
                    @endif
                </div>
                <!-- /.card-body -->
                <div class="card-footer">

                    {{ $articles->onEachSide(1)->appends(['q'=>request()->q])->links('pagination::bootstrap-4') }}
                </div>
                <!-- /.card-footer-->
            </div>
            <!-- /.card -->

        </section>
        <!-- /.content -->


@endsection
