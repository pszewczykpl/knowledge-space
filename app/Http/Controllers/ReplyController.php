<?php

namespace App\Http\Controllers;

use App\Models\Reply;
use App\Models\News;

use App\Http\Requests\StoreReply;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class ReplyController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreReply $request)
    {
        $this->authorize('create', Reply::class);
        
        $reply = new Reply($request->all());
        $reply->news()->associate(News::find($request->news_id));
        Auth::user()->replies()->save($reply);

        return redirect()->back()->with('notify_success', 'Nowy odpowiedź została dodana!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Reply  $reply
     * @return \Illuminate\Http\Response
     */
    public function destroy(Reply $reply)
    {
        $this->authorize('delete', $reply);
        $reply->delete();

        return redirect()->back()->with('notify_danger', 'Odpowiedź została usunięta!');
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function restore($id)
    {
        $reply = Reply::withTrashed()->findOrFail($id);

        $this->authorize('restore', $reply);
        
        $reply->restore();

        return redirect()->route('news.index')->with('notify_danger', 'Odpowiedź została przywrócona!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Reply  $reply
     * @return \Illuminate\Http\Response
     */
    public function force_destroy($id)
    {
        $reply = Reply::withTrashed()->findOrFail($id);

        $this->authorize('forceDelete', $reply);
        $reply->forceDelete();

        return redirect()->back()->with('notify_danger', 'Odpowiedź została trwale usunięta!');
    }
}
