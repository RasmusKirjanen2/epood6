<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use Auth;

class CommentController extends Controller
{


    public function store(Request $request, $id)
    {
        request()->validate([                          // siia saab lisada näiteks kui pikk tekst võib olla, või kas formi peab kindlasti teksti sisestama
            'comment_body' => ['required', 'min:2', 'max:1000']
        ]);

        $comment = new Comment();
        $comment->body = request('comment_body');
        $comment->product_id = $id;

        $user_id = Auth::id();
        $comment->user_id = $user_id;

        $comment->save();

        return redirect('/products/' . $id);

    }


}
