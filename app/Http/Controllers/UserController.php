<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;


class UserController extends Controller
{
    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        $feeds = $user->feeds()->paginate(5);

        return view('users.show', compact('user', 'feeds'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        $categories = Category::all();
        $editing = true;
        $feeds = $user->feeds()->paginate(5);

        return view('users.edit', compact('user', 'editing', 'feeds', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(User $user)
    {
        $validated = request()->validate([
            'name' => 'required|min:3|max:40',
            'bio' => 'nullable|min:1|max:255',
            'image' => 'image',
        ]);

        // # Upload image

        if (request()->has('image')) {
            $imagePath = request()->file('image')->store('profile', 'public');
            $validated['image'] = $imagePath;

            // Delete the old image if it exists
            if ($user->image) {
                Storage::disk('public')->delete($user->image);
            }
        }
        $user->update($validated);

        return redirect()->route('profile');
    }

    public function profile()
    {
        // Get the authenticated user
        $user = Auth::user();

        // Check if the user is authenticated and is an instance of the User model
        if ($user instanceof User) {
            return $this->show($user);
        }

        // If no user is authenticated, redirect to the login page
        return redirect()->route('login');
    }
}
