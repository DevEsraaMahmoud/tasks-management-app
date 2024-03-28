<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function search(Request $request)
    {
        $users = User::where('name', 'like', '%' . $request->input('term', '') . '%')->limit(10)->get();
        $results = [];
        foreach ($users as $user) {
            $results[] = [
                'id' => $user->id,
                'text' => $user->name
            ];
        }
        return response()->json($results);
    }
}
