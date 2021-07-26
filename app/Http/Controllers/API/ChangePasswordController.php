<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Rules\MatchOldPassword;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\Log;

class ChangePasswordController extends Controller
{
    public function store(Request $request)
    {
        Log::info($request);
        User::find($request->login_user_id)->update(['password' => Hash::make($request->new_password)]);
        return response()->json('success');
    }
}
