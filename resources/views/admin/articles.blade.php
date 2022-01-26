@extends('admin.layout')

@section('title', 'articles admin')

@section('content')

    @if (session('status'))
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="alert alert-{{ session('status')['type'] }}">
                        {{ session('status')['content'] }}
                    </div>
                </div>
            </div>
        </div>
    @endif
    <div class="container">
        <table class="table table-striped">
            <thead class="thead-dark">
            <tr>
                <th scope="col">author name</th>
                <th scope="col">title</th>
                <th scope="col">content</th>
                <th></th>
                <th></th>

            </tr>
            </thead>
            <tbody>
            @foreach($articles as $article)
                <tr>
                    <td>
                        <a href="{{route('admin.user.show',$article->user->id)}}">{{$article->user->name}}</a>
                    </td>
                    <td>{{$article->title}}</td>
                    <td>{{$article->content}}</td>
                    <td>
                        <a href="{{ route('admin.articles.edit', $article->id) }}"
                           class="btn btn-info btn-sm">Edytuj</a>
                    </td>
                    <td>
                        <a href="{{ route('admin.articles.destroy', $article->id) }}"
                           class="btn btn-danger btn-sm">Usuń</a>
                    </td>


                    {{--  <td><a href="{{route('admin.book.rent',[$singleBook->id,auth()->user()->id])}}"
                              class="btn btn-primary btn-sm">{{$singleBook->status}}</a>
                       </td>--}}

                </tr>
            @endforeach
            </tbody>


        </table>
        <div class="row">

        </div>
        <div class="row">
            <div class="col-12">
                {{--<p class="d-flex justify-content-center">Books count : {{$booksCount}} </p>--}}
            </div>
        </div>
    </div>
@endsection
