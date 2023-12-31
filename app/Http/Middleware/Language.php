<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\Session;
class Language
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if (Session::has('locale') && array_key_exists(Session::get('locale'), config('locales.languages'))) {

         App::setLocale(Session::get('locale'));

        } else {

            $userLanguages = preg_split('/[,;]/', $request->server('HTTP_ACCEPT_LANGUAGE'));

            foreach ($userLanguages as $userLanguage) {

                if (array_key_exists($userLanguage, config('locales.languages'))) {

                    App::setLocale($userLanguage);

                    setlocale(LC_TIME, config('locales.languages')[$userLanguage]['unicode']);

                    Carbon::setLocale(config('locales.languages')[$userLanguage]['lang']);

                    if (config('locales.languages')[$userLanguage]['rtl_support'] == 'rtl') {

                        session(['lang-rtl' => true]);

                    } else {

                        Session::forget('lang-rtl');
                    }
                    break;
                }
            }
        }
        return $next($request);
    }
    }

