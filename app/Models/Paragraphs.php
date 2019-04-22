<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Paragraphs extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'paragraphs';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'identify', 'value', 'created_at', 'updated_at'];


    public static function getParagraphs()
    {
        $paragraphs = self::all();
        $data = [];
        foreach ($paragraphs as $paragraph) {
            $data[$paragraph->identify] =$paragraph;
        }
        return $data;

    }
    public static function handleParagraphs($paragraphs)
    {
        $data = [];
        foreach ($paragraphs as $paragraph) {
            $data[$paragraph->identify] =$paragraph;
        }
        return $data;

    }
}
