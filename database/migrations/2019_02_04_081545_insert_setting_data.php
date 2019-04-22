<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\Models\Settings;

class InsertSettingData extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Insert some stuff
        $setting = new Settings();
        $setting->create(
            array(
                'name' => 'Website Name',
                'identify' => 'website-name',
                'value' => 'Mohamed Bahaa El-Dien Fouad',
            )
        );
        $setting->create(
            array(
                'name' => 'Website Logo',
                'identify' => 'website-logo',
                'value' => 'MBFouad',
            )
        );
        $setting->create(
            array(
                'name' => 'Main Image',
                'identify' => 'main-image',
                'value' => 'slider_01.jpeg',
            )
        );
        $setting->create(
            array(
                'name' => 'First Hash Tag',
                'identify' => 'first-hash-tag',
                'value' => '#fullstack',
            )
        );
        $setting->create(
            array(
                'name' => 'Second Hash Tag',
                'identify' => 'second-hash-tag',
                'value' => '#php',
            )
        );
        $setting->create(
            array(
                'name' => 'Slider Main Title',
                'identify' => 'slider-main-title',
                'value' => 'Hello fellas, I’m a freelance',
            )
        );
        $setting->create(
            array(
                'name' => 'Address',
                'identify' => 'contact-us-address',
                'value' => 'Cairo,Egypt',
            )
        );
        $setting->create(
            array(
                'name' => 'Phone',
                'identify' => 'contact-us-phone',
                'value' => '+20 1093252758',
            )
        );
        $setting->create(
            array(
                'name' => 'Email',
                'identify' => 'contact-us-email',
                'value' => 'contact@mbfouad.com',
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
