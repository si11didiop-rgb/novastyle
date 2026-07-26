<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function index()
    {
        return view('contact');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'subject' => 'required|string|max:255',
            'message' => 'required|string|min:10',
        ]);

        Mail::raw(
            "Nom : {$data['name']}\nEmail : {$data['email']}\n\nMessage :\n{$data['message']}",
            function ($m) use ($data) {
                $m->to(config('mail.from.address'))
                  ->subject('[NovaStyle Contact] '.$data['subject'])
                  ->replyTo($data['email'], $data['name']);
            }
        );

        return back()->with('success', 'Ton message a bien été envoyé. Nous te répondrons rapidement.');
    }
}