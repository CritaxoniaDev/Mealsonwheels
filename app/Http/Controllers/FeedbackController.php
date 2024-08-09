<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Feedback;
use Illuminate\Http\Request;

class FeedbackController extends Controller
{
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'order_id' => 'required|exists:orders,id',
            'rating' => 'required|integer|min:1|max:5',
            'comment' => 'required|string|max:1000',
        ]);

        $feedback = Feedback::create([
            'user_id' => Auth::id(),
            'order_id' => $validatedData['order_id'],
            'rating' => $validatedData['rating'],
            'comment' => $validatedData['comment']
        ]);

        return redirect()->route('member#index')->with('success', 'Thank you for your feedback!');
    }
}
