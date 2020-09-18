<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;

class LocalizationController extends Controller
{
    public function index($lang)
    {
        $language = config ('app.locate');
        switch ($lang) {
            case config ('localization.en'):
                $language = config ('localization.en');
                break;
            default :
                $language = config ('localization.vi');
                break;
        }
        Session::put('lang', $language);

        return redirect()->back();
    }

}
