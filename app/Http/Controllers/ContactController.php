<?php

namespace App\Http\Controllers;

use App\Models\ContactMessage;
use App\Models\Module;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function create()
    {
        return view('public.contact', [
            'modules' => Module::active()->orderBy('name')->get(),
            'metaTitle' => 'Contact Tiwi | Business Software Modules',
            'metaDescription' => 'Contact Tiwi to discuss POS, rental, school, itinerary, hotspot, hospital, and manufacturing software modules.',
        ]);
    }

    public function store(Request $request)
    {
        ContactMessage::create($request->validate([
            'name' => ['required', 'string', 'max:120'],
            'email' => ['required', 'email', 'max:180'],
            'phone' => ['nullable', 'string', 'max:40'],
            'company' => ['nullable', 'string', 'max:160'],
            'subject' => ['required', 'string', 'max:180'],
            'message' => ['required', 'string', 'max:4000'],
        ]));

        return back()->with('status', 'Your message has been sent. The Tiwi team will respond shortly.');
    }
}
