<?php

namespace App\Http\Controllers\Admin;

use App\Model\Message;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Model\Apartment;

class MessageController extends Controller
{
    
    public function index()
    {
        $userApart = Apartment::where('user_id', Auth::user()->id)->get();

        $idcorretto = $_GET['apart_id'];

       $messagges = Message::where('apartment_id', $idcorretto)->paginate(20);
       

        return view('admin.messages.index', compact('messagges', 'userApart'));
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

        return redirect()->route('apartments.show', $request->apartment_id)->with('inviato', 'Il tuo messaggio è stato inviato');
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
