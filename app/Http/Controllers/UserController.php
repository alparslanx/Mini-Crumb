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
                //$activationCode = $user->getActivationCode();
                //TODO
                //Kayıt olduktan sonra aktivasyon kodu mail olarak gönderilecek. Şuanlık otomatik aktif oluyor üyeler.
                return redirect()->route('home');
            }
            catch (\Cartalyst\Sentry\Users\LoginRequiredException $e)
            {
                return redirect()->route('register')->with('error', 'E-Mail adresi alanı boş olmamalı.');
            }
            catch (\Cartalyst\Sentry\Users\PasswordRequiredException $e)
            {
                return redirect()->route('register')->with('error', 'Şifre alanı boş olmamalı.');
            }
            catch (\Cartalyst\Sentry\Users\UserExistsException $e)
            {
                return redirect()->route('register')->with('error', 'Böyle bir kullancı sistemde kayıtlı');
            }
        }
        return view('user.register');
    }
    /**
     * Show the form for login a new user.
     *
     * @return Response
     */
    public function login(Request $request)
    {
        if ($request->isMethod('post')) {
            $email = $request->input('email');
            $password = $request->input('password');
            try
            {
                // Login credentials
                $credentials = array(
                    'email'    => $email,
                    'password' => $password,
                );
                // Authenticate the user
                $user = Sentry::authenticate($credentials, false);
                return redirect()->route('home');
            }
            catch (\Cartalyst\Sentry\Users\LoginRequiredException $e)
            {
                return redirect()->route('login')->with('error','E-Mail adresi alanı zorunludur');
            }
            catch (\Cartalyst\Sentry\Users\PasswordRequiredException $e)
            {
                return redirect()->route('login')->with('error','Şifre alanı zorunludur');
            }
            catch (\Cartalyst\Sentry\Users\WrongPasswordException $e)
            {
                return redirect()->route('login')->with('error','Kullancı adınız doğru ancak şifreniz yanlış.');
            }
            catch (\Cartalyst\Sentry\Users\UserNotFoundException $e)
            {
                return redirect()->route('login')->with('error','Böyle bir kullanıcı bulunamadı');
            }
            catch (\Cartalyst\Sentry\Users\UserNotActivatedException $e)
            {
                return redirect()->route('login')->with('error','E-posta adresinize gelen aktivasyon kodu ile üyeliğinizi aktif etmelisniiz.');
            }
        }
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