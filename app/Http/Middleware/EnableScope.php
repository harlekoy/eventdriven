<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Database\Eloquent\Model;

class EnableScope
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $model = app(Model::class);

        $model::addGlobalScope('enable', function($builder) {
            $builder->where('enable', 1);
        });

        return $next($request);
    }
}
