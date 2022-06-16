<?php

namespace App\Http\Controllers\Admin;

use App\Model\Message;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class MessageController extends Controller
{
    
    public function index()
    {
        $message = Message::where('user_id', Auth::user()->id)->paginate(20);

        return view('admin.messages.index', compact('message'));
    }

    
    public function create()
    {
        //
    }

    
    public function store(Request $request)
    {
        $messageForm = $request->all();

        $message = new Message();
        $message->fill($messageForm);
        $message->save();

        return redirect()->route('apartments.show');
    }

    
    public function show(Message $message)
    {
        //
    }

    
    public function edit(Message $message)
    {
        //
    }

    
    public function update(Request $request, Message $message)
    {
        //
    }

    
    public function destroy(Message $message)
    {
        //
    }
}
