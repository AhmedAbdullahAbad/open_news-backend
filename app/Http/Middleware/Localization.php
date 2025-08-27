<?php

declare(strict_types=1);

namespace App\Http\Middleware;

use App\Enums\Locale;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

final class Localization
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

        $user = getAuthenticatable();

        if ($user !== null) {
            app()->setLocale(
                $user->locale
            );
        } elseif ($request->has('locale') && in_array(request('locale'), [Locale::ARABIC->value, Locale::ENGLISH->value], true)) {
            app()->setLocale(
                $request->input('locale')
            );
        }

        return $next($request);
    }
}
