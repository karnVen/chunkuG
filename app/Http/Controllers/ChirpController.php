<?php

namespace App\Http\Controllers;

use App\Models\Chirp;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests; // Add this for security checks
use Carbon\Carbon;

class ChirpController extends Controller
{
    use AuthorizesRequests; // This allows the $this->authorize() calls to work

    public function index()
    {
        $chirps = Chirp::with('user')
            ->latest()
            ->take(50)
            ->get();

        return view('home', ['chirps' => $chirps]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'message' => 'required|string|max:255',
        ], [
            'message.required' => 'Please write something to chirp!',
            'message.max' => 'Chirps must be 255 characters or less.',
        ]);

        // CHANGE HERE: Link the chirp to the logged-in user automatically
        auth()->user()->chirps()->create($validated);

        return redirect('/')->with('success', 'Your chirp has been posted!');
    }

    public function edit(Chirp $chirp)
    {
        // CHANGE HERE: Security check - can this user edit this chirp?
        $this->authorize('update', $chirp);

        return view('chirps.edit', compact('chirp'));
    }

    public function update(Request $request, Chirp $chirp)
    {
        // Security check
        $this->authorize('update', $chirp);

        $validated = $request->validate([
            'message' => 'required|string|max:255',
        ]);

        $chirp->update($validated);

        return redirect('/')->with('success', 'Chirp updated!');
    }

    public function destroy(Chirp $chirp)
    {
        // CHANGE HERE: Security check - can this user delete this chirp?
        $this->authorize('delete', $chirp);

        $chirp->delete();

        return redirect('/')->with('success', 'Chirp deleted!');
    }

    public function test()
    {
        return view('test');
    }

    public function calculateAge(Request $request)
    {
        $request->validate([
            'dat' => 'required|date|before:today',
        ]);

        $birthDate = Carbon::parse($request->dat);
        $now = Carbon::now();

        $years = $birthDate->diffInYears($now);
        $months = $birthDate->diffInMonths($now) % 12;

        return view('test', compact('years', 'months'));
    }
}