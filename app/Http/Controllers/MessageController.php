<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{

    // navigate to send-message
    public function index() {
        return view('components.send-message');
    }


    public function store(Request $request) {

        $formFields = $request->validate([
            'subject' => 'required',
            'information' => 'required'
        ]);

        $formFields['user_id'] = auth()->id();
        $formFields['email'] = auth()->user()->email;

        Message::create($formFields);

        return redirect('/')->with('message', 'Message Sent Successfully!');
    }

    public function show() {
        
        return view('message.message', [
            "messages" => Message::all()
        ]);
    }

    public function showadmin() {
        return view('admin.user-message', [
            "messages" => Message::all()
        ]);
    }
}
