<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Mail\ContactMessage;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function show() { return view('contact'); }

    public function send(Request $request)
    {
        $data = $request->validate([
            'name'=>'required|string',
            'email'=>'required|email',
            'message'=>'required|string',
        ]);
        Mail::to('contact@pdos.com')->send(new ContactMessage($data));
        return back()->with('success','Message envoyé !');
    }
}
