<?php

namespace App\Http\Controllers;

use App\Models\EducationHistory;
use App\Models\Projects;
use App\Models\WorkExperiences;
use Illuminate\Http\Request;
use App\Models\Menus;
use App\Models\Paragraphs;


class ProjectController extends Controller
{
    public function index(Request $request)
    {
        return view('project.index');

    }
}
