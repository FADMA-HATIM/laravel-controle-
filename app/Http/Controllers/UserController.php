<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{

    public function __construct()
    {
        $this->authorizeResource(User::class, 'user');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();
        return view('backend.users.index', ['users' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.users.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8',
            'role' => 'required|string|in:admin,frontend_dev,backend_dev,designer',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role,
        ]);

        return redirect()->route('users.index')->with('success', 'Utilisateur créé avec succès.');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        return view('backend.users.show', ['user' => $user]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        return view('backend.users.edit', ['user' => $user]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'nullable|string|email|max:255|unique:users,email,' . $user->id,
            'password' => 'nullable|string|min:8',
            'role' => 'required|string|in:admin,frontend_dev,backend_dev,designer',
        ]);

        $user->name = $request->name;
        if (!empty($request->email)) {
            $user->email = $request->email;
        }
        if (!empty($request->password)) {
            $user->password = Hash::make($request->password);
        }
        $user->role = $request->role;
        $user->save();

        return redirect()->route('users.index')->with('success', 'Utilisateur mis à jour avec succès.');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        if ($user->role !== 'admin') {
            $user->delete();
            return redirect()->route('users.index')->with('success', 'Utilisateur supprimé avec succès.');
        } else {
            return redirect()->route('users.index')->with('error', 'Vous ne pouvez pas supprimer un administrateur.');
        }
    }

    public function profile(string $id)
    {
        $user = User::findOrFail($id);
        return view('backend.users.profile', ['user' => $user]);
    }


    public function updateProfile(Request $request)
    {
        $user = Auth::user();
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'profile_img' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        if ($request->file('profile_img')) {
            if ($user->profile_photo_path) {
                Storage::delete($user->profile_photo_path);
            }
            $imagePath = $request->file('profile_img')->store('profile_images', 'public');
            $user->profile_photo_path =  $imagePath;
        }
        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();
        return redirect()->route('profile', $user->id)->with('success', 'Profile mis a jour');
    }


    public function updatePassword(Request $request)
    {
        $hashedPassword = Auth::user()->password;
        if (Hash::check($request->currentpassword, $hashedPassword)) {
            $user = User::find(Auth::id());
            $user->password = bcrypt($request->newpassword);
            $user->save();

            return redirect()->route('profile')->with(['success' => "Admin password mis a jour"]);
        } else {
            return redirect()->route('profile')->withErrors(['oldpassword' => 'mot de passe incorrect']);
        }
    }
}