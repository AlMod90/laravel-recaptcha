<?php
/**
 * Created by PhpStorm.
 * User: AlMod
 * Date: 13.10.2018
 * Time: 21:40
 */

namespace almod90\Recaptcha\Facades;

use Illuminate\Support\Facades\Facade;

class Recaptcha extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'recaptcha';
    }
}