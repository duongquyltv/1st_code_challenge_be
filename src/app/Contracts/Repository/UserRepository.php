<?php

namespace App\Contracts\Repository;
use Illuminate\Http\Request;

interface UserRepository {

    /**
     * @author DuongMinhQuy <duongquy.ltv@gmail.com>
     * Get list all user
     */
    public function getListUser (array $filters);

    /**
     * @author DuongMinhQuy <duongquy.ltv@gmail.com>
     * Handle Login
     */
    public function login (array $data);

}
