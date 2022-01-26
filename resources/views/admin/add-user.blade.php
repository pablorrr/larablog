@extends('admin.layout')

@section('title', 'articles admin')

@section('content')

    <form action="{{route('admin.user.store')}}" method="POST">
        @csrf

        <label for="user-name">Name</label>
        <input type="text" name="user-name" class="form-control" id="user-name" value="{{ $user->name }}">

        @if ($errors->has('user-name'))
            <span class="text-danger">{{ $errors->first('user-name') }}</span>
        @endif

        <label for="email">Title</label>
        <input type="email" name="email" class="form-control" id="email" value="{{ old('email') }}">

        @if ($errors->has('email'))
            <span class="text-danger">{{ $errors->first('email') }}</span>
        @endif


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
        <input type="submit" value="Zapisz">
    </form>
@endsection
