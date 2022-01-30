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

            <tr>
                <td scope="row">{{$article->user->name}}</td>
                <td>{{$article->title}}</td>
                <td>{{$article->content}}</td>
            </tr>

            </tbody>

        </table>
        <div class="row">
            <div class="col-12">

            </div>
        </div>
    </div>
@endsection


