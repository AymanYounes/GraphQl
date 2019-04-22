<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\EducationHistory;
use App\Models\Projects;
use App\Models\WorkExperiences;
use App\Rules\ValidRecaptcha;
use Illuminate\Http\Request;
use App\Models\Paragraphs;
use Illuminate\Support\Facades\Mail;
use Validator;
use Illuminate\Support\Facades\Redirect;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        return view('home.index');
    }
}
