<?php

namespace App\Http\Controllers;

use App\Models\Reply;
use App\Models\News;

use App\Http\Requests\StoreReply;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
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
        $this->authorizeResource(Reply::class, 'reply');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreReply $request
     * @return RedirectResponse
     */
    public function store(StoreReply $request): RedirectResponse
    {
        $reply = new Reply($request->all());
        
        $reply->news()->associate(News::find($request->news_id));
        Auth::user()->replies()->save($reply);

        return redirect()
            ->back()
            ->with('notify_success', 'Nowy odpowiedź została dodana!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Reply $reply
     * @return RedirectResponse
     */
    public function destroy(Reply $reply): RedirectResponse
    {
        $reply->delete();

        return redirect()
            ->back()
            ->with('notify_danger', 'Odpowiedź została usunięta!');
    }
}
