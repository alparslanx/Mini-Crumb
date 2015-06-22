<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Cartalyst\Sentry\Facades\Laravel\Sentry;
use Cartalyst\Sentry\Users;
use Illuminate\Support\Facades\Redirect;

class UserController extends Controller
{
    /**
     * Show the form for register a new user.
     *
     * @return Response
     */

    public function register(Request $request)
    {

        if ($request->isMethod('post')) {


            $email = $request->input('email');
            $username = $request->input('username');
            $password = $request->input('password');

            try
            {

                $user = Sentry::register(array(
                    'email'    => $email,
                    'username' => $username,
                    'password' => $password,
                    'activated' => 1
                ));


                $activationCode = $user->getActivationCode();
                //TODO
                //Kayıt olduktan sonra aktivasyon kodu mail olarak gönderilecek. Şuanlık otomatik aktif oluyor üyeler.

                return Redirect::to('/');

            }
            catch (\Cartalyst\Sentry\Users\LoginRequiredException $e)
            {
                return redirect('register')->with('error', 'E-Mail adresi alanı boş olmamalı.');
            }
            catch (\Cartalyst\Sentry\Users\PasswordRequiredException $e)
            {
                return redirect('register')->with('error', 'Şifre alanı boş olmamalı.');
            }
            catch (\Cartalyst\Sentry\Users\UserExistsException $e)
            {
                return redirect('register')->with('error', 'Böyle bir kullancı sistemde kayıtlı');
            }


        }
        return view('user.register');
    }

    /**
     * Show the form for login a new user.
     *
     * @return Response
     */

    public function login()
    {
        return view('user.login');
    }



    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
