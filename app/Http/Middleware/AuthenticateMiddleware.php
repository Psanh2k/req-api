<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;
use App\Http\Traits\ResponseJson;

class AuthenticateMiddleware extends Middleware
{
    use ResponseJson;

    /**
     * Get the path the user should be redirected to when they are not authenticated.
     */
    protected function redirectTo(Request $request) : mixed
    {
        if ($request->expectsJson() || $request->is('api*')) {
            return $this->handleUnauthenticated();
        }

        return match (true) {
            $request->is('api*') => $this->handleUnauthenticated(),
        };
    }

    private function handleUnauthenticated()
    {
        return $this->errorResponse('unauthenticated', 401);
    }
}
