@extends('layout.layout')

@section('title', 'Articles')

@section('content')
    <div id="wrapper">
        <div id="page" class="container">
            <div class="content">
                <div class="article m-b-20">
                @foreach($articles as $article)
                <div class="title">
                    <h2><a href="/articles/{{ $article->id ?? '' }}">{{ $article->title }}</a></h2>
                </div>
                <p>
                    <img src="{{ asset('/images/banner.jpg') }} " alt="" class="image image-full" />
                </p>
                <p>
                    {{ $article->excerpt }}
                </p>
            </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
