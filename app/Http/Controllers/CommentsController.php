<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;
use App\Http\Requests;

class CommentsController extends Controller
{
    public function store(Request $request, $post_id)
    {

        //dd($request);

        $this->validate($request, [
            'title' => 'required|max:255',
        ]);

        Comment::create(['post_id'=>$post_id, 'title' => $request->title, $request->all()]);
        //return redirect()->route('posts.show',$post_id);
        return redirect('/posts/'.$post_id);
    }

    /**
     * 移除給定的評論。
     *
     * @param  Request  $request
     * @param  Task  $task
     * @return Response
     */
    public function destroy($post_id, $comment_id)
    {
        //$this->authorize('destroy', $comment);

        //$comment->delete();

        Comment::destroy($comment_id);
        return redirect()->route('posts.show',$post_id);
    }
}
