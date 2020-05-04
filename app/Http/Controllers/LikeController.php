<?php

namespace App\Http\Controllers;

use App\Events\LikeEvent;
use App\Models\Like;
use App\Models\Reply;
use Illuminate\Http\Request;

class LikeController extends Controller
{
    public function __construct()
    {
        $this->middleware('JWT');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function likeIt(Reply $reply, Request $request)
    {
        $like = $reply->likes()->create($request->all());

        broadcast(new LikeEvent($reply->id, 1))->toOthers();

        return response()->json([
            'message' => 'Like created!',
            'like' => $like,
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Like  $like
     * @return \Illuminate\Http\Response
     */
    public function unlikeIt(Reply $reply, Request $request)
    {        
        $reply->likes()->delete($request->all());

        broadcast(new LikeEvent($reply->id, 0))->toOthers();

        return response()->json('Like deleted', 200);
    }
}
