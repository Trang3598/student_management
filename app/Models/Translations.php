<?php

namespace App\Models;

use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model as Eloquent;

class Translations extends Eloquent
{
    public $timestamps = false;
    protected $fillable = ['name'];

    use Translatable;

    public $translationModel = 'app\Models\CountryAwesomeTranslation';
}
