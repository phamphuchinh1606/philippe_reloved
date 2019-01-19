<?php

namespace App\Http\Controllers\Api;

use App\Common\Constant;
use Illuminate\Http\Request;
use Validator;
use JWTAuthException;
use JWTAuth;

class UserController extends Controller
{
    private function userToJson($user){
        $userInfo = new \StdClass();
        $userInfo->user_id  = $user->id;
        $userInfo->full_name = $user->full_name;
        $userInfo->city = $user->city;
        $userInfo->avatar = (isset($user->user->avatar)) ? ImageCommon::showImage($user->avatar) : asset('images/no_image_available.jpg');
        return $userInfo;
    }

    private function createToken($user){
        $token = null;
        try {
            if (!$token = JWTAuth::fromUser($user)) {
                return response()->json([
                    'status'=> false,
                    'message'=> 'invalid email or password'
                ]);
            }
        } catch (JWTAuthException $e) {
            return response()->json([
                'status'=> false,
                'message'=> 'failed to create token'
            ]);
        }
        return $token;
    }

    public function checkTokenFacebook(Request $request){
        $rules = array(
            'access_token' => 'required',
        );
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails())
        {
            return $this->jsonError($validator->errors(), $validator->errors()->first());
        }
        $access_token = $request->access_token;
        $response = $this->facebookService->getUserInfo($access_token);
        if(is_string($response)){
            return $this->jsonError(array('token' => $response), $response);
        }
        $providerUserId = $response["id"];
        $provider = Constant::$PROVIDER_SOCIAL_FACEBOOK;
        $userInfo = new \StdClass();
        $userInfo->name = isset($response["name"])?$response["name"]:'';
        $userInfo->first_name = isset($response["first_name"]) ? $response["first_name"] : '';
        $userInfo->last_name = isset($response["last_name"]) ? $response["last_name"] : '';
        $userInfo->email = isset($response["email"]) ? $response["email"] : '';

        //Check first Login
        $user = $this->userService->findSocialAccount($provider,$providerUserId);
        if(!isset($user) && isset($userInfo->email)) {
            $user = $this->userService->findUserByEmail($userInfo->email);
        }
        if(isset($user)){
            $userInfo = $this->userToJson($user);
            return response()->json([
                'first_login'=> false,
                'token'=> $this->createToken($user),
                'message'=>'Login success! ',
                'user_id' =>  $user->id,
                'user' => $userInfo
            ]);
        }
        return response()->json([
            'first_login'=> true,
            'provider_user_id'=> $providerUserId,
            'provider' =>  $provider,
            'user' => $userInfo
        ]);
    }

    public function createLoginSocial(Request $request){
        $rules = array(
            'provider' => 'required',
            'provider_user_id' => 'required',
            'full_name' => 'required',
            'email'=>'required|email',
            'city'=>'required'
        );
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails())
        {
            return $this->jsonError($validator->errors(), $validator->errors()->first());
        }
        //Check email exit
        $user = $this->userService->findUserByEmail($request->email);
        if(isset($user)){
            return response()->json([
                'status'=> false,
                'message'=> 'Email address already exists'
            ]);
        }
        $user = $this->userService->createUserFromSocial($request);
        $userInfo = $this->userToJson($user);
        return response()->json([
            'status'=> 0,
            'token'=> $this->createToken($user),
            'message'=>'Create success! ',
            'user_id' =>  $user->id,
            'user' => $userInfo
        ]);
    }
}
