<?php


namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserCollection;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function showRegisterForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        if ($request->isMethod('get')) {
            return $this->showRegisterForm();
        }

        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);

        Auth::login($user);

        if ($request->wantsJson()) {
            $token = $user->createToken('auth_token')->plainTextToken;
            return [
                'user' => $user,
                'token' => $token,
            ];
        }

        return redirect()->route('home');
    }

    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        if ($request->isMethod('get')) {
            return $this->showLoginForm();
        }

        $data = $request->validate([
            'email' => 'required|string|email|max:255',
            'password' => 'required|string|min:8',
        ]);

        if (Auth::attempt($data)) {
            $request->session()->regenerate();

            if ($request->wantsJson()) {
                $user = Auth::user();
                $token = $user->createToken('auth_token')->plainTextToken;
                return [
                    'user' => $user,
                    'token' => $token,
                ];
            }

            return redirect()->intended('home');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }

    public function userprofile()
    {
        $userData = auth()->user();
        return response()->json([
            'status' => true,
            'message' => 'User login profile',
            'data' => $userData,
            'id' => auth()->user()->id
        ], 200);
    }

    public function userResource()
    {
        $userData = new UserResource(User::findOrFail(auth()->user()->id));
        return response()->json([
            'status' => true,
            'message' => 'User Login Profile using API Resource',
            'data' => $userData,
            'id' => auth()->user()->id
        ], 200);
    }

    public function userResourceCollection()
    {
        $userData = UserResource::collection(User::all());
        return response()->json([
            'status' => true,
            'message' => 'User Login Profile using API Resource Collection',
            'data' => $userData,
            'id' => ''
        ], 200);
    }

    public function userCollection()
    {
        $userData = new UserCollection(User::all());
        return response()->json([
            'status' => true,
            'message' => 'User Login Profile using API Resource Collection',
            'data' => $userData,
            'id' => ''
        ], 200);
    }

    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();

        return response()->json(['message' => 'Successfully logged out']);
    }
}
