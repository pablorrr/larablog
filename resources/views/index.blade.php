@extends('welcome')

@section('content')

    <div class="container">
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

                <tr><a href="{{route('blogs.show',$blog->id)}}">{{$blog->title}}</a></td>

                    <td>{{$blog->title}}</td>
                    <td>{{$blog->content}}</td>

                    <td>
                        <a href="{{ route('blogs.edit', $blog->id) }}"
                           class="btn btn-info btn-sm">Edytuj</a>
                    </td>
                    <td>
                        <a href="{{ route('blogs.destroy', $blog->id) }}"
                           class="btn btn-danger btn-sm">Usuń</a>
                    </td>

                </tr>

            @endforeach
            </tbody>


        </table>


    </div>
@endsection

