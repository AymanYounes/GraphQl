<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\Models\EducationHistory;

class InsertEducationHistoryData extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $education_history = new EducationHistory();
        $education_history->create(
            array(
                'name' => 'High School:Gamal Abd El-Naser',
                'start_date' => '2005-01-01',
                'end_date' => '2008-01-01',
                'grade' => '',
            )
        );
        $education_history->create(
            array(
                'name' => 'College: Computer and Information Science',
                'start_date' => '2008-01-01',
                'end_date' => '2012-01-01',
                'grade' => '',
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
