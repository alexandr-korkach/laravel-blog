@extends('admin.layouts.layout')

@section('content')

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Головна сторінка</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item active"><a href="{{ route('admin.index') }}">Головна</a></li>

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
                    <h3 class="card-title">Баннер</h3>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                            <i class="fas fa-minus"></i></button>
                        <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
                            <i class="fas fa-times"></i></button>
                    </div>
                </div>
                <div class="card-body">
                    @if(count($bannerItems))
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover text-nowrap">
                                <thead>
                                <tr>
                                    <th style="width: 30px">#</th>
                                    <th>Назва</th>
                                    <th>Категорія</th>
                                    <th>Дата баннеру</th>
                                    <th>Автор</th>
                                    <th>Видалити</th>

                                </tr>
                                </thead>
                                <tbody>

                                @foreach($bannerItems as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td><a href="{{ route('blog.show', $item->article->slug) }}">{{ $item->article->title }}</a></td>
                                        <td>{{ $item->article->category->title }}</td>
                                        <td>{{ $item->created_at }}</td>
                                        <td>{{ $item->article->user->name }}</td>
                                        <td>
                                            <form action="{{ route('banner.remove', ['id'=>$item->article_id]) }}" method="POST" class="float-left">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Видалити статтю з головного баннера?')">

                                                        <i class="fas fa-minus"></i>
                                                    </button>
                                                </form>
                                         </td>

                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <p>Баннер поки пустий...</p>
                    @endif
                </div>
                <!-- /.card-body -->
                <div class="card-footer">

                </div>
                <!-- /.card-footer-->
            </div>
            <!-- /.card -->

        </section>
        <!-- /.content -->
    </div>

@endsection
