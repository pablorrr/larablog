@extends('admin.layout')

@section('title', 'articles admin')

@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Artykuł</h1>
    </div>

    <div class="row mb-3">
        <div class="col-5">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('admin.articles.update', $article->id) }}" method="POST">
                        @csrf
                        <input type="hidden" name="_method" value="PUT">

                        <div class="form-group">
                            <label for="name">Tytuł</label>
                            <input type="text" name="title" class="form-control" id="tile" placeholder="Tytuł"
                                   value="{{ $article->title }}">
                            @if ($errors->has('title'))
                                <span class="text-danger">{{ $errors->first('title') }}</span>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="name">Content</label>
                            <textarea name="content" id="content">{{  $article->content }}) </textarea>

                            @if ($errors->has('content'))
                                <span class="text-danger">{{ $errors->first('content') }}</span>
                            @endif
                        </div>

                        <button type="submit" class="btn btn-primary">Zapisz zmiany</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
