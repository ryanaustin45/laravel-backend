<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Tymon\JWTAuth\Facades\JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use Illuminate\Support\Facades\Http;


/**
 * @extends \Illuminate\Routing\Controller
 */

class AuthController extends Controller
{
    //
    /**
     * Create a new AuthController instance.
     *
     * @return void
     */
    /**
     * @property \Illuminate\Routing\Controller $this
     */
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login']]);
    }

    public function register()
    {
        $validator = Validator::make(request()->all(), [
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json($validator->messages());
        }

        $user = User::create([
            'name' => request('name'),
            'email' => request('email'),
            'password' => Hash::make(request('password')),
        ]);
        if ($user) {
            return response()->json(['message' => 'Register Success']);
        } else {
            return response()->json(['message' => 'Register Faill']);
        }
    }
    /**
     * Get a JWT via given credentials.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function login()
    {
        $credentials = request(['email', 'password']);

        if (! $token = auth()->attempt($credentials)) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        return $this->respondWithToken($token);
    }

    /**
     * Get the authenticated User.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function me()
    {
        return response()->json(auth()->user());
    }
    public function nama()
    {
        $response = Http::get('https://ogienurdiana.com/career/ecc694ce4e7f6e45a5a7912cde9fe131');

        if ($response->successful()) {
            $body = $response->body();
            $json = json_decode($body, true);

            if (!isset($json['DATA'])) {
                return response()->json(['error' => 'Invalid data format'], 500);
            }

            $lines = explode("\n", trim($json['DATA']));
            $headers = explode('|', array_shift($lines));

            $parsedData = [];

            foreach ($lines as $line) {
                $values = explode('|', $line);
                if (count($headers) === count($values)) {
                    $parsedData[] = array_combine($headers, $values);
                }
            }
            $searchName = 'Turner Mia';

            $filtered = array_filter($parsedData, function ($item) use ($searchName) {
                return isset($item['NAMA']) && stripos($item['NAMA'], $searchName) !== false;
            });

            return response()->json(array_values($filtered));
        }

        return response()->json(['error' => 'Failed to fetch external data'], 500);
    }

    public function nim()
    {
        $response = Http::get('https://ogienurdiana.com/career/ecc694ce4e7f6e45a5a7912cde9fe131');

        if ($response->successful()) {
            $body = $response->body();
            $json = json_decode($body, true);

            if (!isset($json['DATA'])) {
                return response()->json(['error' => 'Invalid data format'], 500);
            }

            $lines = explode("\n", trim($json['DATA']));
            $headers = explode('|', array_shift($lines));

            $parsedData = [];

            foreach ($lines as $line) {
                $values = explode('|', $line);
                if (count($headers) === count($values)) {
                    $parsedData[] = array_combine($headers, $values);
                }
            }
            $searchName = '9352078461';

            $filtered = array_filter($parsedData, function ($item) use ($searchName) {
                return isset($item['NIM']) && stripos($item['NIM'], $searchName) !== false;
            });

            return response()->json(array_values($filtered));
        }

        return response()->json(['error' => 'Failed to fetch external data'], 500);
    }

    public function ymd()
    {
        $response = Http::get('https://ogienurdiana.com/career/ecc694ce4e7f6e45a5a7912cde9fe131');

        if ($response->successful()) {
            $body = $response->body();
            $json = json_decode($body, true);

            if (!isset($json['DATA'])) {
                return response()->json(['error' => 'Invalid data format'], 500);
            }

            $lines = explode("\n", trim($json['DATA']));
            $headers = explode('|', array_shift($lines));

            $parsedData = [];

            foreach ($lines as $line) {
                $values = explode('|', $line);
                if (count($headers) === count($values)) {
                    $parsedData[] = array_combine($headers, $values);
                }
            }
            $searchName = '20230405';

            $filtered = array_filter($parsedData, function ($item) use ($searchName) {
                return isset($item['YMD']) && stripos($item['YMD'], $searchName) !== false;
            });

            return response()->json(array_values($filtered));
        }

        return response()->json(['error' => 'Failed to fetch external data'], 500);
    }

    /**
     * Log the user out (Invalidate the token).
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout()
    {
        auth()->logout();

        return response()->json(['message' => 'Successfully logged out']);
    }

    /**
     * Refresh a token.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function refresh()
    {
        return $this->respondWithToken(auth()->refresh());
    }

    /**
     * Get the token array structure.
     *
     * @param  string $token
     *
     * @return \Illuminate\Http\JsonResponse
     */
    protected function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth()->factory()->getTTL() * 60
        ]);
    }
}
