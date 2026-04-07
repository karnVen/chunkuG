<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ChirpController extends Controller
{
    public function index()
    {
        // For now, we manually create a list of data (The Menu)
        $chirps = [
            [
                'author' => 'Karan',
                'message' => 'I just built my first Controller! 🚀',
                'time' => '1 minute ago'
            ],
            [
                'author' => 'Gemini',
                'message' => 'You are doing great, keep going!',
                'time' => '10 minutes ago'
            ],
             [
            'author' => 'Jane Doe',
            'message' => 'Just deployed my first Laravel app! 🚀',
            'time' => '5 minutes ago'
        ],
        [
            'author' => 'John Smith',
            'message' => 'Laravel makes web development fun again!',
            'time' => '1 hour ago'
        ],
        [
            'author' => 'Alice Johnson',
            'message' => 'Working on something cool with Chirper...',
            'time' => '3 hours ago'
        ]
        ];

        // Send that data to the "home" view
        return view('home', ['chirps' => $chirps]);
    }
}