@extends('admin.layouts.layout')

@section('content')


        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Статті</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Головна</a></li>
                            <li class="breadcrumb-item active">Статті</li>
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
                    <h3 class="card-title">Список статей</h3>

                </div>
                <div class="card-body">
                    <a href="{{ route('articles.create') }}" class="btn btn-primary mb-3">Додати статтю</a>
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

                        </tr>
                        </thead>
                        <tbody>

                        @foreach($articles as $article)
                        <tr>
                            <td>{{ $article->id }}</td>
                            <td>{{ $article->title }}</td>
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
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                    </div>
                    @else
                        <p>Статей поки немає...</p>
                    @endif
                </div>
                <!-- /.card-body -->
                <div class="card-footer">

                    {{ $articles->links('pagination::bootstrap-4') }}
                </div>
                <!-- /.card-footer-->
            </div>
            <!-- /.card -->

        </section>
        <!-- /.content -->


@endsection
