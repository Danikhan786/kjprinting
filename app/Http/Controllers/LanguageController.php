<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\App;

class LanguageController extends Controller
{
    public function switchLang($lang)
    {
        // Validate the language
        if (in_array($lang, ['en', 'sv', 'it'])) {
            Session::put('locale', $lang);
            App::setLocale($lang);
        }
        return redirect()->back();
    }
} 