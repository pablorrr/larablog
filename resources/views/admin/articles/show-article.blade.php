@extends('admin.layout')

@section('title', 'article admin')

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="card shadow mb-4">
            <!-- todo: dodoacprzycisk edycji!!!usera , doddac rowniez pole rolei rowniez  dac do edycji-->

            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">show article</h6>
            </div>
            <div class="card-body">
                <table class="table table-striped">
                    <thead class="thead-dark">
                    <tr>
                        <th scope="col">author</th>
                        <th scope="col">title</th>
                        <th scope="col">content</th>
                        <th scope="col">image</th>

                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td scope="row">{{$article->user->name}}</td>
                        <td>{{$article->title}}</td>
                        <td>{{$article->content}}</td>
                        <td>
                            @if ($article->photos->count())
                                <a href="{{ asset('upload/articles/' . $article->firstPhoto()->photo) }}"
                                   target="_blank">
                                    <img src="{{ asset('upload/articles/' . $article->firstPhoto()->photo) }}">
                                </a>
                            @endif
                        </td>

                    </tr>
                    </tbody>
                </table>
            </div>

        </div>
    </div>
    <!-- /.container-fluid -->
@endsection
