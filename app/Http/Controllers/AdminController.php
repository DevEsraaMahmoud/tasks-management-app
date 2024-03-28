<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function search(Request $request)
    {
        $admins = Admin::where('name', 'like', '%' . $request->input('term', '') . '%')->limit(10)->get();
        $results = [];
        foreach ($admins as $admin) {
            $results[] = [
                'id' => $admin->id,
                'text' => $admin->name
            ];
        }
        return response()->json($results);
    }
}
