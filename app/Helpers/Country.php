<?php
namespace App\Helpers;


use Symfony\Component\Intl\Countries;

class Country{
    public static function countryCode ($countryCode){
        return Countries::getName($countryCode);
    }
}