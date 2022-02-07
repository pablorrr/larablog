
<form action="{{route('blogs.store')}}" method="POST">
    @csrf

    <label for="title">Title</label>
    <input type="text" name="title" class="form-control" id="title" value="{{ old('title') }}">

    @if ($errors->has('title'))
        <span class="text-danger">{{ $errors->first('title') }}</span>
    @endif

    <label for="content">Content</label>
    <textarea name="content">{{ old('content') }}</textarea>

    @if ($errors->has('content'))
        <span class="text-danger">{{ $errors->first('content') }}</span>
    @endif
    <input type="submit" value="Zapisz">
</form>
