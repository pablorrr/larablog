@extends('admin.layout')

@section('title', 'users admin')

@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Edit user</h1>
    </div>

    <div class="row mb-3">
        <div class="col-5">
            <div class="card">
                <div class="card-body">
                    <form action="{{route('admin.user.update', $user->id)}}" method="POST">

                        @csrf
                        <input type="hidden" name="_method" value="PUT">

                        <div class="form-group">
                            <label for="name">user name</label>
                            <input type="text" name="name" class="form-control" id="name" placeholder="nazwisko"
                                   value="{{ $user->name }}">
                            @if ($errors->has('name'))
                                <span class="text-danger">{{ $errors->first('name') }}</span>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="email">email</label>
                            <input type="text" name="email" class="form-control" id="email" placeholder="email"
                                   value="{{ $user->email }}">
                            @if ($errors->has('email'))
                                <span class="text-danger">{{ $errors->first('email') }}</span>
                            @endif
                        </div>

                        <label for="role">role</label>
                        <div class="form-group">
                            <select name="role" class="form-control" id="role">
                                @foreach($usersRole as $item)
                                    <option value="{{ $item->role }}" {{ old('role') == $item->role ? 'selected' : ''}} >{{ $item->role }}</option>
                                @endforeach

                            </select>
                            @if ($errors->has('role'))
                                <span class="text-danger">{{ $errors->first('role') }}</span>
                            @endif
                        </div>

                        <button type="submit" class="btn btn-primary">Zapisz zmiany</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
