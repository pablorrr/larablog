@extends('admin.layout')

@section('title', 'user admin')

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="card shadow mb-4">
            <!-- todo: dodoacprzycisk edycji!!!usera , doddac rowniez pole rolei rowniez  dac do edycji-->

            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">User</h6>
            </div>
            <div class="card-body">
                <table class="table table-striped">
                    <thead class="thead-dark">
                    <tr>
                        <th scope="col">id</th>
                        <th scope="col">Name</th>
                        <th scope="col">E-mail</th>
                        <th scope="col">role</th>
                        <th scope="col">added date</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <th scope="row">{{$user->id}}</th>
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>
                        <td>{{$user->role}}</td>
                        <td>{{$user->created_at}}</td>


                        <td>
                            <a href="{{ route('admin.user.edit', $user->id) }}"
                               class="btn btn-info btn-sm">Edytuj</a>
                        </td>


                       {{-- if(Auth::check())
                            @if( auth()->user()->id !=$user->id)
                            <td>
                                <a href="{{ route('admin.user.destroy', $user->id) }}"
                                   class="btn btn-danger btn-sm">Usuń</a>
                            </td>
                            @endif
                        @endif --}}

                    </tr>

                    </tbody>
                </table>
            </div>

        </div>
    </div>
    <!-- /.container-fluid -->
@endsection
