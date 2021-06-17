@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit: {{ $post->title }}</h1>

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

    <form action=" {{ route('admin.posts.update', $post->id) }} " method="POST">

            @csrf
            @method('PATCH')

            <div class="mt-3" >
                <label for="title">Title</label>
                <div><input type="text" name="title" id="title" value="{{  $post->title }}"></div>
            </div>
            
            <div class="mt-3">
                <label for="description">Content</label>
                <div><textarea name="content" id="content" cols="50" rows="6">{{  $post->content }}</textarea></div>
            </div>


            <div class="mt-3">
                <button class="btn btn-primary" type="submit">INVIA</button>
            </div>

        </form>

</div>
@endsection