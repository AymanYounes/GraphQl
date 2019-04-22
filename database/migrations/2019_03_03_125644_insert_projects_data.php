<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\Models\Projects;

class InsertProjectsData extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $project = new Projects();
        $project->create(
            array(
                'name' => 'KARMA GROUP TRADE',
                'company_name' => 'freelance',
                'start_date' => '2016-10-01',
                'end_date' => '2016-10-10',
                'url' => 'http://karmagrouptrade.com/',
                'image' => 'karma-group-trade.png',
                'sort' => 1
            )
        );
        $project->create(
            array(
                'name' => 'TRAVELWARE',
                'company_name' => 'Travel Robotic',
                'start_date' => '2013-09-10',
                'url' => 'http://office.travware.info',
                'image' => 'traveloffice.png',
                'sort' => 2
            )
        );
        $project->create(
            array(
                'name' => 'GHAYA MANAGEMNT TRAINING',
                'company_name' => 'freelance',
                'start_date' => '2018-03-10',
                'end_date' => '2018-06-10',
                'url' => 'http://ghaya.emangqa.com/',
                'image' => 'ghaya.png',
                'sort' => 3
            )
        );
        $project->create(
            array(
                'name' => 'NEGOS',
                'company_name' => 'freelance',
                'start_date' => '2015-01-10',
                'end_date' => '2015-01-30',
                'url' => 'http://negos.de/',
                'image' => 'negos.jpg',
                'sort' => 4
            )
        );
        $project->create(
            array(
                'name' => 'JOB EVALUATION TOOL',
                'company_name' => 'JobMaster Group',
                'start_date' => '2016-4-10',
                'end_date' => '2016-7-20',
                'url' => 'http://jet.jobmastergroup.com/',
                'image' => 'jet-jobmaster.png',
                'sort' => 5
            )
        );
        $project->create(
            array(
                'name' => 'JOBMASTER GROUP',
                'company_name' => 'JobMaster Group',
                'start_date' => '2016-4-10',
                'end_date' => '2016-7-20',
                'url' => 'http://jobmastergroup.com/',
                'image' => 'jobmaster.png',
                'sort' => 6
            )
        );
        $project->create(
            array(
                'name' => 'CONSULTANCY',
                'company_name' => 'JobMaster Group',
                'start_date' => '2016-4-10',
                'end_date' => '2016-7-20',
                'url' => 'http://benefits.jobmastergroup.com/',
                'image' => 'benefits-jobmaster.png',
                'sort' => 7
            )
        );
        $project->create(
            array(
                'name' => 'ASSESSMENT',
                'company_name' => 'JobMaster Group',
                'start_date' => '2016-4-10',
                'end_date' => '2016-7-20',
                'url' => 'http://assessment2.jobmastergroup.com/',
                'image' => 'assessment-jobmaster.png',
                'sort' => 8
            )
        );
        $project->create(
            array(
                'name' => 'CENTER OF EXCELLENCE',
                'company_name' => 'JobMaster Group',
                'start_date' => '2016-4-10',
                'end_date' => '2016-7-20',
                'url' => 'http://coe.jobmastergroup.com',
                'image' => 'center-of-excellence.png',
                'sort' => 9
            )
        );
        $project->create(
            array(
                'name' => 'JOBMASTER EVENT',
                'company_name' => 'JobMaster Group',
                'start_date' => '2016-4-10',
                'end_date' => '2016-7-20',
                'url' => 'http://event.jobmastergroup.com',
                'image' => 'jobmaster-event.png',
                'sort' => 10
            )
        );
        $project->create(
            array(
                'name' => 'BOOK2TRIP',
                'company_name' => 'Book2trip',
                'start_date' => '2018-03-04',
                'url' => 'https://www.book2trip.com',
                'image' => 'book2trip.png',
                'sort' => 11
            )
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
