@extends('admin.layout.master')
@section('title', 'Update About Studio')
@section('content_title', 'Update About Studio')
@section('content')
<div class="rounded max-w-lg mx-auto mt-5">
    <form method="POST" action="{{route('admin.about.update', $about->id)}}" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="id" value="{{$about->id}}">
        <div class="mb-6">
            <label for="title" class="inline-block text-lg mb-2">
                Title
            </label>
            <input type="text" class="border border-gray-200 rounded p-2 w-full" name="title" value="{{$about->title}}" />

            @error('title')
            <p class="text-red-500 text-xs mt-1">{{$message}}</p>
            @enderror
        </div>

        <div class="mb-6">
            <label for="image" class="inline-block text-lg mb-2">
                Image
            </label>
            <input type="file" class="border border-gray-200 rounded p-2 w-full" name="image" multiple="multiple" value="{{$about->image}}"/>

            @error('image')
            <p class="text-red-500 text-xs mt-1">{{$message}}</p>
            @enderror
        </div>
        <div class="mb-6">
            <label for="description" class="inline-block text-lg mb-2">
                Description
            </label>
            <textarea type="file" class="border border-gray-200 rounded p-2 w-full ckeditor" name="description" multiple="multiple" value="{{$about->description}}"></textarea>

            @error('description')
            <p class="text-red-500 text-xs mt-1">{{$message}}</p>
            @enderror
        </div>

        <div class="mb-6">
            <button type="submit" class="group relative flex w-full justify-center rounded-md bg-indigo-600 py-2 px-3 text-sm font-semibold text-white hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">

                Create a new product
            </button>
        </div>

    </form>
</div>
@endsection