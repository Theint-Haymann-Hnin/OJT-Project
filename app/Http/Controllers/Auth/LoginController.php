<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Models\User;

class LoginController extends Controller
{

    use AuthenticatesUsers;


    protected $redirectTo = '/posts';

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    public function login(Request $request)
    {
        $input = $request->all();

        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (auth()->attempt(array('email' => $input['email'], 'password' => $input['password']))) {
            if (auth()->check()) {
                return redirect('posts');
            }
        } else {
            return redirect()->route('login')
                ->with('error', 'Email-Address And Password Are Wrong.');
        }
    }
    
    // /**
    //  * Login api
    //  *
    //  * @return \Illuminate\Http\Response
    //  */
    // public function apiLogin(Request $request)
    // {   
      
    //     Log::info($request);
    //     if(auth()->attempt(['email' => $request->email, 'password' => $request->password])){ 
    //         $user = User::find(auth()->user()->id);
    //         $success['token'] = $user->createToken('my-app')->accessToken; 
    //         $success['name'] = $user->name;
   
    //         return $this->sendResponse($success, 'User login successfully.');
    //     } 
    //     else{ 
    //         return $this->sendError('Unauthorised.', ['error'=>'Unauthorised']);
    //     } 
    // }

    // /**
    //  * success response method.
    //  *
    //  * @return \Illuminate\Http\Response
    //  */
    // public function sendResponse($result, $message)
    // {
    // 	$response = [
    //         'success' => true,
    //         'data'    => $result,
    //         'message' => $message,
    //     ];


    //     return response()->json($response, 200);
    // }


    // /**
    //  * return error response.
    //  *
    //  * @return \Illuminate\Http\Response
    //  */
    // public function sendError($error, $errorMessages = [], $code = 404)
    // {
    // 	$response = [
    //         'success' => false,
    //         'message' => $error,
    //     ];


    //     if(!empty($errorMessages)){
    //         $response['data'] = $errorMessages;
    //     }


    //     return response()->json($response, $code);
    // }
}
