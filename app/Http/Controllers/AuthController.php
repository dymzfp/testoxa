<?php
namespace App\Http\Controllers;
use Validator;
use App\User;
use Firebase\JWT\JWT;
use Illuminate\Http\Request;
use Firebase\JWT\ExpiredException;
use Illuminate\Support\Facades\Hash;
use Laravel\Lumen\Routing\Controller as BaseController;
class AuthController extends BaseController 
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
            return response()->json([
                'token' => $this->jwt($user)
            ], 200);
        }

        return response()->json([
            'error' => 'Email or password is wrong.'
        ], 400);
    }

    public function register(User $user) {

            $this->validate($this->request, [
                'name'              => 'required',
                'email'             => 'required|email',
                'password'          => 'required',
                'confirm_password'  => 'required|same:password'
            ]);

            $cek = User::where('email', $this->request->input('email'))->first();
            if($cek) {
                return response()->json([
                    'error' => 'Email sudah ada.'
                ], 400);
            }

            $insert = [];

            $insert['email'] = $this->request->input('email');
            $insert['name'] = $this->request->input('name');
            $insert['password'] = password_hash($this->request->input('password'), PASSWORD_BCRYPT);

            $data = User::create($insert);
            
            return response()->json([
                'data' => $data
            ]);
    }
}