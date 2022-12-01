<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function updateUserInfos(Request $request)
    {
        $this->validate($request, [
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
        ]);
        try {
            $user = Auth::user();
            $user->nom = $request->nom;
            $user->prenom = $request->prenom;
            $user->email = $request->email;
            $user->save();
            return redirect()->back()->with('success', 'Informations modifiées avec succès');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }

    }
    public function updatePassword(Request $request)
    {
        $this->validate($request, [
            'old_password' => 'required|string|min:6',
            'password' => 'required|string|min:6|confirmed',
        ]);
        try {
            $user = Auth::user();
            if (Hash::check($request->old_password, $user->password)) {
                $user->password = Hash::make($request->password);
                $user->save();
                return redirect()->back()->with('success', 'Mot de passe modifié avec succès');
            } else {
                return redirect()->back()->with('error', 'Mot de passe incorrect');
            }
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }

    }

    public function resetPassword (Request $request)
    {
        $this->validate($request, [
            'email' => 'required|string|email|max:255',
        ]);
        try {
            $user = User::where('email', $request->email)->first();
            if ($user) {
                $user->password = Hash::make('password');
                $user->save();
                return redirect()->back()->with('success', 'Mot de passe réinitialisé avec succès');
            } else {
                return redirect()->back()->with('error', 'Aucun utilisateur trouvé avec cet email');
            }
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function changePassword(Request $request)
    {
        $this->validate($request, [
            'password' => 'required|string|min:6|confirmed',
        ]);
        try {
            $user = Auth::user();
            $user->password = Hash::make($request->password);
            $user->save();
            return redirect()->back()->with('success', 'Mot de passe modifié avec succès');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function updateAvatar(Request $request)
    {
        $this->validate($request, [
            'avatar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        try {
            $user = Auth::user();
            $file = $request->file('avatar');
            $user->avatar = $file;
            return redirect()->back()->with('success', 'Avatar modifié avec succès');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function profile ()
    {
        return view('pages.admin.user.profile');
    }







}
