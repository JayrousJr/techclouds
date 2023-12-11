<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MessageJetController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $messages = Message::orderBy('id', 'desc')->where('user_id', Auth::user()->id)->paginate(10);
        $count = Message::where('user_id', Auth::user()->id)->count();
        return view('site/messages/mymessages', ['count' => $count], compact('messages'));
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
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $message = Message::findOrFail($id);

        return view('site/messages/singlemessage', compact('message'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Message $message, Request $request)
    {
        $message->delete();

        $request->session()->flash('flash.banner', 'The invoice has been deleted');
        $request->session()->flash('flash.Style', 'success');

        return redirect()->route('mymesages.index');
    }
}
