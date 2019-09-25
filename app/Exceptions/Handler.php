<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Auth\AuthenticationException;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = [
        'password',
        'password_confirmation',
    ];

    /**
     * Report or log an exception.
     *
     * @param  \Exception  $exception
     * @return void
     */
    public function report(Exception $exception)
    {
        parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Exception  $exception
     * @return \Illuminate\Http\Response
     */
    public function render($request, Exception $exception)
    {
        /**
         * when you run "Authenticate middleware" and youre not 
         * authenticated it throws an exeption to redirect you to login page
         * and it is handeled here,so we can edit the code here instead of meesing with in inside
         * the "config" folder,there is just a problem ,in previous versions of "laravel" we could 
         * actully see an "Authentication Exeption Model" inside a method called"unauthenticated"
         * but in this version there is no such thing so we should make clear that it is an instance of
         * the  "Authentication Exeption Model",we will do it inide of an "if" like below and dont 
         * forget the fucking (use Illuminate\Auth\AuthenticationException;)
         */

        if ($exception instanceof AuthenticationException)
        {
            /**
             *we should extract the guard from the $exception that is a collection
                *but we need the first item that is guard.
                */
            $guard = array_get($exception->guards(),0);

            //switchcase on guard for the admin and default as the normal user.
            switch ($guard)
            {
                case 'admin':
                    $login = 'admin.login';
                    break;
                default:
                    $login = 'login';
                    break;
            }//end"switch
            return redirect()->guest(route($login));
        }//end"ifstatment

        return parent::render($request, $exception);
    }
}
