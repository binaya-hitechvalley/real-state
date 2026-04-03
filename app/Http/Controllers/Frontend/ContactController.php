<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\ContactMessage;
use App\Models\SiteSetting;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * Show the contact page.
     */
    public function index()
    {
        $settings = SiteSetting::getGroup('contact');
        return view('frontend.contact', compact('settings'));
    }

    /**
     * Store a new contact message.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:20',
            'subject' => 'required|string|max:255',
            'message' => 'required|string|max:5000',
        ]);

        ContactMessage::create($validated);

        return redirect()->route('frontend.contact')->with('success', 'Thank you for your message! Our team will get back to you shortly.');
    }
}
