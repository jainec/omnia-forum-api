<?php

namespace App\Http\Controllers;

use App\Models\Like;
use App\Models\Reply;
use Illuminate\Http\Request;

class LikeController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function likeIt(Reply $reply, Request $request)
    {
        $like = $reply->likes()->create($request->all());

        return response()->json([
            'message' => 'Like created!',
            'reply' => $like,
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Like  $like
     * @return \Illuminate\Http\Response
     */
    public function unlikeIt(Like $like)
    {        
        $like->delete();
        return response()->json('Like deleted', 200);
    }
}
