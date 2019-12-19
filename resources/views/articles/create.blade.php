@extends('layout.layout')

@section('additional-header')
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
@endsection

@section('content')
    <div id="wrapper">
        <div id="page" class="container">
            <h1 class="title">
                New Article
            </h1>
            {{--@if($errors->any())--}}
            {{--<div class="has-text-danger">--}}
            {{--<ul>--}}
            {{--@foreach($errors->all() as $error)--}}
            {{--<li>--}}
            {{--{{$error}}--}}
            {{--</li>--}}
            {{--@endforeach--}}
            {{--</ul>--}}
            {{--</div>--}}
            {{--@endif--}}
            <form action="/articles" method="POST">
                @csrf
                <div class="field">
                    <label for="title" class="label">
                        Enter Title
                    </label>
                    <div class="control">
                        <input type="text" class="input {{$errors->has('title')?'is-danger' : ''}}" placeholder="Enter Title" name = "title" id = "title" value="{{old('title')}}">
                        @if($errors->has('title'))
                            <p class="help is-danger">{{$errors->first('title')}}</p>
                        @endif
                    </div>

                    <div class="field">
                        <label for="tag" class="label">Tags</label>
                        <div class="control select is-multiple is-block">
                            <select name="tags[]" id="tags" multiple class="is-block">
                                @foreach($tags as $tag)
                                    <option value="{{ $tag->id }}">{{$tag->name}}</option>
                                @endforeach
                            </select>
                            @error('tags')
                            <p class="help is-danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                </div>
                <div class="field">
                    <label for="excerpt" class="label">
                        Enter Excerpt
                    </label>
                    <div class="control">
                        <textarea type="text" class="input {{$errors->has('excerpt')?'is-danger' : ''}}" placeholder="Enter Excerpt" name = "excerpt" id = "excerpt" rows = "5" cols="30"  value="{{old('excerpt')}}"></textarea>
                        @error('excerpt')
                            <p class="help is-danger">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div class="field">
                    <label for="body" class="label">
                        Enter Body
                    </label>
                    <div class="control">
                        <textarea type="text" class="input {{$errors->has('body')?'is-danger' : ''}}" placeholder="Enter Body" name = "body" id="body" rows = "5" cols="30"  value="{{old('body')}}"></textarea>
                        @if($errors->has('body'))
                            <p class="help is-danger">{{$errors->first('body')}}</p>
                        @endif
                    </div>
                </div>
                <div class="field is-grouped">
                    <div class="control">
                        <button class="button is-link" type="submit">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

@endsection
