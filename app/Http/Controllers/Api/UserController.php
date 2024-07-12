<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\UserResource;
use App\Models\User;

class UserController extends Controller
{
    public function userResource()
    {
        $user = Auth::user();

        if (!$user instanceof User) {
            return response()->json(['error' => 'User not authenticated or not a valid user instance'], 404);
        }

        $user->load('posts');

        return new UserResource($user);
    }
}