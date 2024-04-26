<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use App\Mail\MailNewComment;
use App\Models\Article;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $comments = DB::table('comments')
            ->join('users', 'users.id', '=', 'comments.user_id')
            ->join('articles', 'articles.id', '=', 'comments.article_id')
            ->select('comments.*', 'users.name',
             'articles.name as article_name', 'articles.id as article_id')
            ->get();
        //Log::alert($comments);
       return view('comment.index', ['comments'=> $comments]);
    }

    public function accept(Comment $comment) {
        $comment->accept = 'true';
        $comment->save();
        return redirect()->route('comment.index');
    }

    public function reject(Comment $comment) {
        $comment->accept = 'false';
        $comment->save();
        return redirect()->route('comment.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title'=>'required',
            'text'=>'required'
        ]);
        // $article = Article::where('id', request('article_id'))->get();
        $article = Article::findOrFail(request('article_id'));
        $comment = new Comment;
        $comment->title = request('title');
        $comment->text = request('text');
        $comment->user_id = Auth::id();
        $comment->article_id = request('article_id');
        $res = $comment->save();
        if ($res) Mail::to('danrom2003@mail.ru')->send(new MailNewComment($article));
        return redirect()->route('article.show', ['article'=>request('article_id')])->with(['res'=>$res]);        
    }

    /**
     * Display the specified resource.
     */
    public function show(Comment $comment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Comment $comment)
    {
        return view('comment.edit', ['comment'=>$comment]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Comment $comment)
    {
        $request->validate([
            'title'=>'required',
            'text'=>'required'
        ]);

        $comment->title = request('title');
        $comment->text = request('text');
        $comment->save();
        //return redirect()->route('article.show', ['article'=>request('article_id')]);  
        $article = $comment->article_id;
        return redirect()->route('article.show', ['article'=> $article]);
        return redirect()->route('article.index');      
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Comment $comment)
    {
        $comment->delete();
        $article = $comment->article_id;
        return redirect()->route('article.show', ['article'=> $article]);
    }
}
