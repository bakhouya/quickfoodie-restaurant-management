<?php
namespace App\Helpers ;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\language ;
use App\Models\Information ;
use Stichoza\GoogleTranslate\GoogleTranslate;

class helpHelper {

    public static function status($status) {
        if ($status == true) {
            return '<div class="text text_small success_color">active</div>' ;
        } else {
           return '<div class="text text_small danger_color">désactive</div>' ;
        }

    }
    
    public static function translate($text, $targetLang="fr"){
        return (new GoogleTranslate($targetLang))->translate($text);
    }



}
