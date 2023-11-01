<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;


class UsuerController extends Controller
{
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => ['required'],
            'email' => ['required', 'email'],
            'password' => ['required'],
        ], [
            'name.required' => 'O campo nome é obrigatório',
            'email.required' => 'O campo email é obrigatório!',
            'password.required' => 'O campo senha é obrigatório!',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        } else {
            $user = new User;
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = bcrypt($request->password);


            $user->save();

            return "<script>alert('Usuário cadastrado com sucesso!')</script>" . redirect('/');
        }
    }

    public function validate(Request $request, array $rules, $messages = ['Campos obrigatórios!'], $customAttributes = []){
        $rules['name'] = 'required|string|max:50';
        $rules['email'] = 'required';
        $rules['password'] = 'required|min:8';
    }


}
