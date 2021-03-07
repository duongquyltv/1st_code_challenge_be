<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Contracts\Repository\UserRepository;
use Exception;

class LoginController extends Controller
{

    private $userRepository;

    public function __construct()
    {
        $this->userRepository = app(UserRepository::class);
    }

    public function login(LoginRequest $request)
    {
        try{
            $data = $this->userRepository->login($request->all());
            return response()->json($data, 200);
        }catch(Exception $e){
            return response()->json(['status' => false, 'data' => ['message' => $e->getMessage()]], 200);
        }
    }
}
