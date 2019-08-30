<?php

namespace App\Http\Controllers;

use Validator;
use App\User;
use App\BadgeUser;
use Firebase\JWT\JWT;
use Illuminate\Http\Request;
use Firebase\JWT\ExpiredException;
use Illuminate\Support\Facades\Hash;
use Laravel\Lumen\Routing\Controller as BaseController;

class AuthController extends Controller 
{
    /**
     * The request instance.
     *
     * @var \Illuminate\Http\Request
     */
    private $request;
    /**
     * Create a new controller instance.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return void
     */
    public function __construct(Request $request) {
        $this->request = $request;
        $this->id = 0;
        $this->user = new User();
    }

    /**
     * Create a new token.
     * 
     * @param  \App\User   $user
     * @return string
     */
    protected function jwt(User $user) {
        $payload = [
            'iss' => "lumen-jwt",
            'sub' => $user->id,
            'iat' => time(), 
            'exp' => time() + 60*60
        ];
        
        return JWT::encode($payload, env('JWT_SECRET'));
    }

    /**
     * Authenticate a user and return the token if the provided credentials are correct.
     * 
     * @param  \App\User   $user 
     * @return mixed
     */
    public function authenticate(User $user) {
        $this->validate($this->request, [
            'email'     => 'required|email',
            'password'  => 'required'
        ]);

        $user = User::where('email', $this->request->input('email'))->first();
        if (!$user) {
            return response()->json([
                'error' => 'Email does not exist.'
            ], 400);
        }
        
        if (Hash::check($this->request->input('password'), $user->password)) {

            $data = $user;
            $data->detail->level = $user->detail->level;
            $data->detail->badge = $user->detail->badge;
            $data->token = $this->jwt($user); 

            return $this->toSuccessJSON('Checkin success', $data);

            // return response()->json([
            //     'token' => $this->jwt($user)
            // ], 200);
        }

        return response()->json([
            'error' => 'Email or password is wrong.'
        ], 400);
    }

    public function register(User $user) {

        try {
        
            $rules = array(
                'name'              => 'required',
                'email'             => 'required|email',
                'password'          => 'required',
                'confirm_password'  => 'required|same:password'
            );

            $this->withValidator($this->request->all(), $rules);

            $cek = $this->user->where('email', $this->request->input('email'))->first();
            if($cek) {
                $this->throwException('Email already registered');
            }

            $this->user->email = $this->request->input('email');
            $this->user->name = $this->request->input('name');
            $this->user->password = password_hash($this->request->input('password'), PASSWORD_BCRYPT);
            $this->user->save();

            $user_detail = new BadgeUser();
            $user_detail->user_id = $user->id;
            $user_detail->total_checkin = 0;
            $user_detail->level_id = 1;
            $user_detail->badge_id = 1;

            $this->user->detail()->save($user_detail);

            //$data = [];
            $data = $this->user;
            $data->detail = $this->user->detail;

            $data->detail->level = $this->user->detail->level;
            $data->detail->badge = $this->user->detail->badge;
            
            return $this->toSuccessJSON('Data Saved Successfully', $data);

        } catch (\Exception $e) {
            return $this->toErrorsJSON($e);
        }
    }
}