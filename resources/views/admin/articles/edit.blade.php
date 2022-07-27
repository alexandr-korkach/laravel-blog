@extends('admin.layouts.layout')

@section('content')


    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Редагування статті</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Головна</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('articles.index') }}">Статті</a></li>
                        <li class="breadcrumb-item active">Редагування статті</li>
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
                <h3 class="card-title">Стаття "{{ $article->title }}"</h3>

            </div>


            <form action="{{ route('articles.update', ['article'=>$article->id]) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="card-body">
                    <div class="form-group">
                        <label for="exampleInput">Назва статті</label>
                        <input value="{{ $article->title }}" type="text" class="form-control @error('title') is-invalid @enderror" name="title" id="exampleInput">
                    </div>

                    <div class="form-group">
                        <label for="descriptionField">Опис статті</label>
                        <textarea  name="description" class="form-control @error('description') is-invalid @enderror" id="descriptionField"
                                   rows="3">{{ $article->description }}</textarea>

                    </div>

                    <div class="form-group">
                        <label for="contentField">Текст статті</label>
                        <textarea  name="body" class="form-control @error('content') is-invalid @enderror" id="contentField"
                                   rows="7">{{ $article->body }}</textarea>

                    </div>

                    <div class="form-group">
                        <label for="category_id">Категорія</label>
                        <select id="category_id" name="category_id" class="form-control @error('category_id') is-invalid @enderror">
                            @foreach($categories as $id => $title)
                                <option @if($id==$article->category_id)selected @endif value="{{ $id }}">{{ $title }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="tags">Теги</label>
                        <select id="tags" name="tags[]" class="select2" multiple="multiple" data-placeholder="Вибір тегів" style="width: 100%;">
                            @foreach($tags as $id => $title)
                                <option @if(in_array($id, $article->tags->pluck('id')->all()))selected @endif value="{{ $id }}">{{ $title }}</option>
                            @endforeach
                        </select>
                    </div>


                    <div class="form-group">
                        <label for="exampleInputFile">Зображення</label>
                        <div class="input-group">
                            <div class="custom-file">
                                <input name="img" type="file" class="custom-file-input @error('img') is-invalid @enderror" id="exampleInputFile">
                                <label class="custom-file-label" for="exampleInputFile">Виберіть файл</label>
                            </div>

                        </div>
                        <div><img class="img-thumbnail mt-2 " style="max-width: 150px" src="{{ $article->getImage() }}" alt=""></div>
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


@section('editor-scripts')
    @include('admin.layouts.editor-scripts')
@endsection






