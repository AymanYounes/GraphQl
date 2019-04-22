<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Settings extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'settings';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'identify', 'value', 'created_at', 'updated_at'];


    public static function getSettings()
    {
        $settings = self::all();
        $data = [];
        foreach ($settings as $setting) {
            $data[$setting->identify] =$setting;
        }
        return $data;

    }
}
