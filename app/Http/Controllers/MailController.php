<?php

namespace App\Http\Controllers;

use App\Mail\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller {
    public function send(Request $request){
        $request->validate([
            'email' => 'required|email',
            'message' => 'required|string',
        ]);

        try {
            Mail::to('dsandr123@gmail.com')->send(
            new Message($request->email, $request->message)
            );

            return redirect()->back()->with('success', 'Сообщение успешно отправлено!');
        } catch (\Exception $e) {
            return back()->withErrors(["error" => "Error" . $e->getMessage()]);
        }
    }
}