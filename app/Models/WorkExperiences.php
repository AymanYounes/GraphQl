<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WorkExperiences extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'work_experiences';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'start_date', 'end_date', 'description', 'created_at', 'updated_at'];


}
