<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contracts\Repository\UserRepository;
use App\Http\Requests\UsersRequest;

class UserController extends Controller
{
    private $userRepository;

    public function __construct()
    {
        $this->userRepository = app(UserRepository::class);
    }

    public function listUser(Request $request){
        $data = $this->userRepository->getListUser($request->all());
        return response()->json($data, 200);
    }
}
