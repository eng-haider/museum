<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Carbon\Carbon;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\Session;

class LocaleController extends Controller
{

    protected $previousRequest;
    protected $locale;

    public function switch($locale)
    {

        $this->previousRequest = $this->getPreviousRequest();
        $segments = $this->previousRequest->segments();

        try {
            if (array_key_exists($locale, config('locales.languages'))) {
                App::setLocale($locale);
                Lang::setLocale($locale);
                setlocale(LC_TIME, config('locales.languages')[$locale]['unicode']);
                Carbon::setLocale(config('locales.languages')[$locale]['lang']);
                Session::put('locale', $locale);
                if (config('locales.languages')[$locale]['rtl_support'] == 'rtl') {
                    Session::put('lang-rtl', true);
                } else {
                    Session::forget('lang-rtl');
                }

                return redirect()->back();

            }

            return redirect()->back();

        } catch (\Exception $exception) {
            return redirect()->back();
        }
    }

    protected function getPreviousRequest()
    {
        return request()->create(url()->previous());
    }


}
