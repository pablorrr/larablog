@extends('welcome')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <table class="table table-striped">
                    <thead class="thead-dark">
                    <tr>

                        <th scope="col">title</th>
                        <th scope="col">content</th>
                        <th></th>
                        <th></th>

                    </tr>
                    </thead>
                    <tbody>
                    @foreach($blogs as $blog)
                        {{--  <tr>

                                   <a href="{{route('admin.articles.show',$blog->id)}}">{{$blog->title}}</a>
                               </td> --}}

                        <td>{{$blog->title}}</td>
                        <td>{{$blog->content}}</td>

                        {{--     <td>
                            <a href="{{ route('admin.articles.edit', $blog->id) }}"
                               class="btn btn-info btn-sm">Edytuj</a>
                        </td>
                        <td>
                            <a href="{{ route('admin.articles.destroy', blog->id) }}"
                               class="btn btn-danger btn-sm">Usuń</a>
                        </td>  --}}

                        </tr>
                    @endforeach
                    </tbody>


                </table>
            </div>
        </div>
    </div>
@endsection

