<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
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
}
