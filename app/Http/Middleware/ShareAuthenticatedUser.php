<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Contracts\View\Factory;

class ShareAuthenticatedUser
{
    /**
     * The View Factory.
     *
     * @var \Illuminate\Contracts\View\Factory
     */
    protected $factory;

    /**
     * The Authenticated user, if any.
     *
     * @var \Illuminate\Contracts\Auth\Authenticatable|null
     */
    protected $user;

    /**
     * Create a new Share Authenticated User instance.
     *
     * @param \Illuminate\Contracts\View\Factory $factory
     * @param \Illuminate\Contracts\Auth\Authenticatable|null $user
     */
    public function __construct( Factory $factory, Authenticatable $user = NULL )
    {
        $this->factory = $factory;
        $this->user = $user;
    }

    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle( $request, Closure $next )
    {
        $this->factory->share('user', $this->user);

        return $next($request);
    }
}