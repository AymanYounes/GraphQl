<?php

namespace App\Factories;

/**
 * Created by PhpStorm.
 * User: mfouad
 * Date: 10/04/19
 * Time: 19:08
 */
use Illuminate\Support\Facades\File;

trait ProjectFactory
{
    public function handleProjectImage($projects)
    {
        foreach ($projects as $project) {
            if (File::exists('uploads/project/' . $project->image)) {
                $project->image = 'uploads/project/' . $project->image;
            } else {
                $project->image = '/images/clogo1.png';

            }
        }
        return $projects;
    }
}