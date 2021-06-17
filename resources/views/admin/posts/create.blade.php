@extends('layouts.app')

@section('content')
<div class="container">
    <h1>New post</h1>

    {{-- validation message --}}
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action=" {{ route('admin.posts.store') }} " method="POST">

            @csrf
            @method('POST')

            <div class="mt-3" >
                <label for="title">Title</label>
                <input type="text" name="title" id="title" value="{{ old('title') }}">
            </div>
            
            <div class="mt-3">
                <label for="description">Content</label>
                <textarea name="content" id="content" rows="6">{{ old('content') }}</textarea>
            </div>


            <div class="mt-3">
                <button class="btn btn-primary" type="submit">INVIA</button>
            </div>

        </form>

</div>
@endsection