@extends('admin.layouts.layout')

@section('content')


    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Редагувати тег</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Головна</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('tags.index') }}">Теги</a></li>
                        <li class="breadcrumb-item active">Редагувати тег</li>
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
                <h3 class="card-title">Тег "{{ $tag->title }}"</h3>

            </div>


            <form action="{{ route('tags.update', ['tag'=>$tag->id]) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="card-body">
                    <div class="form-group">
                        <label for="exampleInput">Назва тегу</label>
                        <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" id="exampleInput" value="{{ $tag->title }}">
                    </div>


                </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Зберегти</button>
                </div>
            </form>



            <!-- /.card-body -->

            <!-- /.card-footer-->
        </div>
        <!-- /.card -->

    </section>
    <!-- /.content -->


@endsection









