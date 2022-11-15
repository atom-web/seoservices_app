<?php

namespace App\Http\Controllers\v1\auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class RegistrationController extends Controller{
    public function registration(Request $request){
        $result = [];
        if (!$request['user_name'] || !$request['user_email'] || !$request['user_password']){
            $result['status'] = 'error';
            $result['message'] = 'Не все обязательные поля переданы в запросе';
            return response(json_encode($result))->header('Content-Type', 'application/json');
        }
        // Проверка на наличие пользователя
        if (User::where('email', '=', $request['user_email'])->count() > 0){
            $result['status'] = 'error';
            $result['message'] = 'Пользователь с такой почтой уже зарегистрирован';
            return response(json_encode($result))->header('Content-Type', 'application/json');
        }



        $user = User::create([
            'email' => $request['user_email'],
            'password' => $request['user_password'],
            'name' => $request['user_name'],
        ]);
        if ($user){
            $result['status'] = 'success';
            $result['user'] = $user;
        }


        return response(json_encode($result))->header('Content-Type', 'application/json');
    }
}
