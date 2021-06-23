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
                <input class="form-control @error('title') is-invalid @enderror"  type="text" name="title" id="title" value="{{ old('title') }}">
                @error('title')
                    <div class="feedback">{{ $message }}</div>
                @enderror
            </div>
            
            <div class="mt-3">
                <label for="content">Content</label>
                <textarea class="form-control @error('content') is-invalid @enderror"  name="content" id="content" rows="6">{{ old('content') }}</textarea>
                @error('content')
                    <div class="feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mt-3">
                <label for="category_id">Category</label>
                <select class="form-control @error('category_id') is-invalid @enderror" name="category_id" id="category_id">
                    <option value="">-- Select category --</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}"
                            @if($category->id == old('category_id')) selected @endif
                            >{{ $category->name }}</option>
                    @endforeach
                </select>
                @error('category_id')
                    <div class="feedback">{{ $message }}</div>
                @enderror
            </div>

            <h4 class="mb-2 mt-3">Tags</h4>
            <div>
                @foreach ($tags as $tag)
                    <span class="mr-3 d-inline-block">
                        <input type="checkbox" name="tags[]" id="tag{{ $loop->iteration }}" value="{{ $tag->id }}"
                            @if (in_array($tag->id, old('tags', []))) checked @endif
                        >
                        <label for="tag{{ $loop->iteration }}">
                            {{ $tag->name }}
                        </label>
                    </span>               
                @endforeach
                @error('tags')
                    <div>{{ $message }}</div>
                @enderror
            </div>


            <div class="mt-3">
                <button class="btn btn-primary" type="submit">INVIA</button>
            </div>

        </form>

</div>
@endsection