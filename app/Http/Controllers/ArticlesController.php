<?php

namespace App\Http\Controllers;

use App\Article;
use App\Tag;
use Illuminate\Http\Request;

class ArticlesController extends Controller
{
    public function index()
    {
        if(request('tags')){
            $articles = Tag::where('name', request('tags'))->firstOrFail()->articles;
        }else{
            $articles = Article::take(5)->latest('updated_at')->get();
        }
        return view('articles.index', [
            'articles' => $articles
        ]);
    }

    public function create()
    {
        $tags = Tag::all();
        return view('articles.create', compact('tags'));
    }

    public function validatedData()
    {
        return request()->validate([
            'title' => 'required',
            'excerpt' => 'required',
            'body' => 'required',
            'tags'=>'exists:tags,id'
        ],[
            'title.required'=>'how coud u miss thiss',
            'tags.exists'=>'how did u find this 1?'
        ]);
    }

    public function store()
    {
//        $article  =new Article();
//        $article->title = request('title');
//        $article->excerpt = request('excerpt');
//        $article->body = request('body');
//        $article->save();

//        request()->validate([
//           'title' => 'required',
//            'excerpt' => 'required',
//            'body' => 'required',
//
//        ]);
//        Article::create(
//            'title' => \request('title'),
//            'excerpt' => \request('excerpt'),
//            'body' => \request('body'),
//            $this->validatedData()
//        );
        $article = new Article($this->validatedData());
        $article->user_id = 1;
        $article->save();

        $article->tags()->attach(request('tags'));
        return redirect('/articles');
    }

    public function edit(article $article)
    {
        return view('articles.edit', compact('article'));
    }

    public function update(article $article)
    {
//        $article  = article::findorFail($id);
//        $article->title = request('title');
//        $article->excerpt = request('excerpt');
//        $article->body = request('body');
        $article->update($this->validatedData());
        return redirect('/articles/' . $article->id);
    }

    public function indexHome()
    {
        $articles = Article::take(3)->latest('updated_at')->get();
        return view('welcome', [
            'articles' => $articles
        ]);
    }

    public function show(article $article)
    {
//        $article = article::findOrFail($id);
        return view('articles.article', [
            'article' => $article
        ]);
    }
}
