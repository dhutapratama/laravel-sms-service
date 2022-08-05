<?php

namespace App\Http\Middleware\Misp;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;

class RoleCheck
{
  /**
   * Handle an incoming request.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
   * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
   */
  public function handle(Request $request, Closure $next, string $role)
  {
    if (!$request->user()->hasRole($role)) {
      return redirect(RouteServiceProvider::HOME)
        ->withErrors(sprintf("You don't have role as %s.", $role));
    }
    return $next($request);
  }
}
