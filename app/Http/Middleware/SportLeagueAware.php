<?php

namespace App\Http\Middleware;

use App\Exceptions\SportLeagueNotFoundException;
use Closure;
use HipsterJazzbo\Landlord\Facades\Landlord as Tenancy;
use Illuminate\Database\Eloquent\Model;

class SportLeagueAware
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure                 $next
     *
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $league = $this->league($request);

        if ($league && ! Tenancy::hasTenant('sport_league')) {
            // Reboot because in the application life cycle
            // the model is started first before the middleware
            Model::clearBootedModels();

            Tenancy::addTenant('sport_league', $league);
        }

        return $next($request);
    }

    /**
     * Get current sport league in request.
     *
     * @return string
     */
    protected function league($request)
    {
        // Once "sport_league" not found in request get
        // the one in the Header "X-Sport-League" as default
        $default = $request->header('X-Sport-League');

        // Get "sport_league" based on priority
        $league = $request->get('sport_league', $default);

        if (!$league) {
            abort(404, 'Sport league not found.');
        }

        return $league;
    }
}
