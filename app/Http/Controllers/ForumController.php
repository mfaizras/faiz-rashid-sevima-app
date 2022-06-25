<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Forum;
use App\Models\ForumComment;

class ForumController extends Controller
{
    public function index()
    {
        // dd(Forum::all());
        return view('forum.index', [
            'datas' => Forum::all()
        ]);
    }

    public function show(Forum $forum)
    {
        $commentDatas = ForumComment::all()->where('comment_id', $forum->id);
        return view('forum.detail', [
            'datas' => $forum,
            'comments' => $commentDatas->all()
        ]);
    }

    public function addComment(Request $request)
    {
        $validatedData = $request->validate([
            'comment_content' => 'required'
        ]);
        $validatedData['comment_type'] = 'toForum';
        $validatedData['user_id'] = auth()->user()->id;
        $validatedData['comment_id'] = $request['comment_id'];

        ForumComment::create($validatedData);

        return redirect('/forum/detail/' . $validatedData['comment_id']);
    }

    public function create()
    {
        return view('forum.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required',
            'forum_content' => 'required'
        ]);
        $validatedData['user_id'] = auth()->user()->id;

        Forum::create($validatedData);

        return redirect('/forum');
    }
}
