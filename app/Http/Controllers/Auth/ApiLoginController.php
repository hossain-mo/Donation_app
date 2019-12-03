<?php
 
namespace App\Http\Controllers\Auth;
 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Repositories\UserRepo;
use App\Http\Controllers\Controller;
use Auth;
class ApiLoginController extends Controller
{

    public function __construct(UserRepo $userRepo){
        $this->userRepo  = $userRepo;
    }

    /**
     * Handles Login Request
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(Request $request){ 
        $user = $this->userRepo->getByName($request->name);
        if ($user) {
            if (Hash::check($request->password, $user->password)) {
                $token = $user->createToken('Laravel Password Grant Client')->accessToken;
                $response ['user']  = $user;
                $response ['token'] = $token;
                return response($response, 200);
            } else {
                $response = "Password Missmatch";
                return response($response, 422);
            }
        } else {
            $response = 'User Does Not Exist';
            return response($response, 422);
        }
    }
    public function logout (Request $request) {
        $token   = $request->user()->token();
        $token->revoke();
        $response = 'You Have Been Succesfully Logged Out!';
        return response($response, 200);
    }
}