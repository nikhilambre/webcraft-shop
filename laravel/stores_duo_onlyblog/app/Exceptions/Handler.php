<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;


class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that should not be reported.
     *
     * @var array
     */
    protected $dontReport = [
        \Illuminate\Auth\AuthenticationException::class,
        \Illuminate\Auth\Access\AuthorizationException::class,
        \Symfony\Component\HttpKernel\Exception\HttpException::class,
        \Illuminate\Database\Eloquent\ModelNotFoundException::class,
        \Illuminate\Session\TokenMismatchException::class,
        \Illuminate\Validation\ValidationException::class,
    ];

    /**
     * Report or log an exception.
     *
     * This is a great spot to send exceptions to Sentry, Bugsnag, etc.
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

        if($this->isHttpException($exception))
        {
            switch ($exception->getStatusCode()) 
            {
                // not found
                case 404:
                return redirect()->route('errors.404');
                break;

                // internal error
                case '500':
                return redirect()->route('errors.404');
                break;

                // internal error
                case '405':
                return redirect()->route('errors.404');
                break;

                // internal error
                case '503':
                return redirect()->route('errors.maintenance');
                break;

                default:
                    return $this->renderHttpException($exception);
                break;
            }
        }
        elseif($exception instanceof NotFoundHttpException)
        {
            return redirect()->route('errors.404');
        }
        else
        {
            return parent::render($request, $exception);
        }
        //return parent::render($request, $exception);
    }

    /**
     * Convert an authentication exception into an unauthenticated response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Illuminate\Auth\AuthenticationException  $exception
     * @return \Illuminate\Http\Response
     */
    protected function unauthenticated($request, AuthenticationException $exception)
    {
        if ($request->expectsJson()) {
            return response()->json(['error' => 'Unauthenticated.'], 401);
        }

        //  Added to add customer session based user
        $guard = array_get($exception->guards(), 0);

        switch ($guard) {
            case 'customer':
                $login = 'customer.login';
                break;

            case 'pageupdator':
                $login = 'pageupdator.login';
                break;
            
            default:
                $login = 'login';
                break;
        }

        return redirect()->guest(route($login));
    }

}
