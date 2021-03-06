<?php

namespace App\Http\Controllers;

use App\Http\Requests\ReplyRequest;
use App\Http\Resources\ReplyResource;
use App\Models\Question;
use App\Models\Reply;
use App\Notifications\NewReplyNotification;
use Illuminate\Http\Request;

class ReplyController extends Controller
{

    public function __construct()
    {
        $this->middleware('JWT', ['except' => ['index', 'show']]);
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Question $question)
    {
        return  ReplyResource::collection($question->replies);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
   
    public function store(Question $question, ReplyRequest $request)
    {
        $reply = $question->replies()->create($request->all());
        $user = $question->user;
        if($reply->user_id != $question->user_id)
            $user->notify(new NewReplyNotification($reply));

        return response()->json([
            'message' => 'Reply created!',
            'reply' => new ReplyResource($reply),
        ], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Reply  $reply
     * @return \Illuminate\Http\Response
     */
    public function show(Question $question, Reply $reply)
    {
        return new ReplyResource($reply);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Reply  $reply
     * @return \Illuminate\Http\Response
     */
    public function update(Question $question, ReplyRequest $request, Reply $reply)
    {
        $reply->update($request->all());

        return response()->json([
            'message' => 'Reply updated!',
            'reply' => new ReplyResource($reply),
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Reply  $reply
     * @return \Illuminate\Http\Response
     */
    public function destroy(Question $question, Reply $reply)
    {
        $reply->delete();

        return response()->json('Reply deleted!', 200);
    }
}
