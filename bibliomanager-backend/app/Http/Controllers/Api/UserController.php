<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;


class UserController extends Controller
{
    public function index()
    {
        $users = User::with('books')->inRandomOrder()->get();
        return response()->json([
            'success' => true,
            'result' => $users
        ]);
    }

    public function show($slug)
    {
        $user = User::with('books')->where('slug', $slug)->first();
        if ($user) {
            return response()->json([
                'success' => true,
                'result' => $user
            ]);
        } else {
            return response()->json([
                'success' => false,
                'result' => 'Ops! Pagina non trovata'
            ]);
        }
    }
}
