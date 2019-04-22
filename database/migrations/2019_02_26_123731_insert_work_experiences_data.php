<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\Models\WorkExperiences;

class InsertWorkExperiencesData extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $work_experiences = new WorkExperiences();
        $work_experiences->create(
            array(
                'name' => 'Travel Robotic',
                'start_date' => '2013-09-10',
                'end_date' => '2015-12-10',
                'location' => 'Sheraton-Cairo',
                'description' => 'Travel Robotic is a Cairo-based software developmentcompany, focused on workfloworiented ERP software for travel industry. The software automates the complex workflows in travel industry and helps enterprises to streamline their internal processes, increase their revenue and manage their business from holiday booking to accountancy.',
            )
        );
        $work_experiences->create(
            array(
                'name' => 'JobMaster Group',
                'start_date' => '2016-01-01',
                'end_date' => '2018-02-01',
                'location' => '(New Maadi',
                'description' => 'JobMaster Group is multinational company and one of biggest human resource and recruitment in
Egypt and Middle east we Gaining rapid acclaim throughout the years, from our enhanced knowledge
and accumulated practical experience in the Human Resource field, in addition to our diversified
exposure, JOBMASTER accelerated its growth into becoming one of the leading Human Capital
Solutions providers in Egypt.',
            )
        );
        $work_experiences->create(
            array(
                'name' => 'Book2trip',
                'start_date' => '2018-03-01',
                'location' => 'Sheraton-Cairo',
                'description' => 'Book2trip company is a vacation rental platform, built for people to list, discover, and book unique
accommodations worldwide for free.
Book2trip has been created and run by a bunch of avid travel- lovers. Assuming we know what it is
you’re thinking of when planning a trip or vacation,
we decided to embark on an exciting adventure of our own.',
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
