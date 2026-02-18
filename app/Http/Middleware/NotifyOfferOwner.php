<?php

namespace App\Http\Middleware;

use App\Models\Offer;
use App\Models\User;
use App\Notifications\OfferRequested;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class NotifyOfferOwner
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next)
    {

        // $offerId = $request->route('id');
        // $offer = Offer::find($offerId);

        // if ($offer && auth()->check()) {
        //     $offer->user->notify(new OfferRequested($offer, auth()->user()));
        // }
        $offer = $request->route('offer'); // بما إن الراوت عندك /pay/{offer}

        // لو عندك Route Model Binding رح يكون $offer موديل جاهز
        // لو لا، اعمل:
        // $offer = Offer::find($request->route('offer'));

        if ($offer && auth()->check()) {

            $firstUser = User::orderBy('id', 'asc')->first();

            if ($firstUser) {
                $firstUser->notify(new OfferRequested($offer, auth()->user()));
            }
        }

        return $next($request);
    }
}
