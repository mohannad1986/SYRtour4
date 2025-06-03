<?php

namespace App\Http\Controllers\API;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use App\Models\Tourist;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class TownController extends Controller
{
    use ApiResponseTrait;
    //    لاداعي لاستيراد التريت فوق لانك بنفس المسار حاطو

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6',
        ]);

        $Tourist = Tourist::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return response()->json([
            'message' => 'Tourist created successfully',
            'user' => $Tourist
        ]);
    }



}
