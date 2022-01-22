@extends('public.layout')

@section('title', 'articles')

@section('content')


    <div class="container">

        <table class="table table-striped">
            <thead class="thead-dark">
            <tr>
                <th scope="col">author name</th>
                <th scope="col">title</th>
                <th scope="col">content</th>

            </tr>
            </thead>
            <tbody>


            @foreach($articles as $article)
                <tr>
                    <td scope="row">{{$article->user->name}}</td>
                    <td>{{$article->title}}</td>
                    <td>{{$article->content}}</td>

                    {{--  <td><a href="{{route('admin.book.rent',[$singleBook->id,auth()->user()->id])}}"
                              class="btn btn-primary btn-sm">{{$singleBook->status}}</a>
                       </td>--}}

                </tr>
            @endforeach
            </tbody>

        </table>
        <div class="row">
            <div class="col-12">
                {{--<p class="d-flex justify-content-center">Books count : {{$booksCount}} </p>--}}
            </div>
        </div>
    </div>
@endsection
