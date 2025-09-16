<?php
namespace App\Helpers ;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\language ;
use App\Models\Information ;
use Stichoza\GoogleTranslate\GoogleTranslate;

class langHelper {

    public static function getLanguages() {
        return language::where('status', true)->get() ;
    }
    public static function settings() {
        return Information::first();
    }
    public static function translate($text, $targetLang="fr"){
        return (new GoogleTranslate($targetLang))->translate($text);
    }
    // public static function translate($text, $lang){
    //     $translator = new GoogleTranslate($lang); // تعيين اللغة المستهدفة إلى العربية
    //     $translatedText = $translator->translate($text);
    //     return $translatedText ;
    //     // return response()->json(['translated_text' => $translatedText]);
    // }


}
