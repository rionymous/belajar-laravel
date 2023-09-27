<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * The list of the inputs that are never flashed to the session on validation exceptions.
     *
     * @var array<int, string>
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     */
    public function register(): void
    {
        $this->reportable(function (Throwable $e) {
            //
        });
    }

    public function render($request, Throwable $exception)
{
    if ($exception instanceof \Symfony\Component\HttpKernel\Exception\NotFoundHttpException) {
        // Menangani error model not found dengan tampilan kustom
        return response()->view('errors.error_404', ['title' => 'Halaman Tidak Ditemukan'], 404);
    }

    if ($exception instanceof \Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException) {
        return response()->view('errors.error_403', ['title' => 'Akses Dilarang'], 403);
    }

    return parent::render($request, $exception);
}
}
