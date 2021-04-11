<?php

namespace App\Http\Controllers;

use App\Models\Attachment;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\File;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class AttachmentController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->except(['show']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
//        $this->authorize('create', Attachment::class);

        $path = $request->attachment->store('attachments');

        $attachment = new Attachment($request->all());
        $attachment->path = $path;
        $attachment->name = $request->file('attachment')->getClientOriginalName();
        $attachment->extension = $request->file('attachment')->extension();
        $attachment->attachmentable()->associate(Post::find($request->post_id));
        Auth::user()->attachments()->save($attachment);

        // $attachment->posts()->attach($request->post_id);

        return redirect()->route('files.index')->with('notify_success', 'Nowy załącznik został dodany!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Attachment  $attachment
     * @return \Illuminate\Http\Response
     */
    public function show(Attachment $attachment)
    {
        return Storage::download($attachment->path, $attachment->name . '.' . $attachment->extension);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Attachment  $attachment
     * @return \Illuminate\Http\Response
     */
    public function edit(Attachment $attachment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Attachment  $attachment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Attachment $attachment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Attachment  $attachment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Attachment $attachment)
    {
        //$this->authorize('delete', $attachment);

        Storage::move($attachment->path, 'trash/' . $attachment->path);
        $attachment->delete();

        return redirect()->back()->with('notify_danger', 'Załącznik został usunięty!');
    }
}
