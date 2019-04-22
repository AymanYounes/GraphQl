<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\Models\Menus;

class InsertMenusDataV1 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Insert some stuff
        $menu = new Menus();
        $menu = $menu->create(
            array(
                'name' => 'Mohamed Fouad Portfolio',
                'hash' => null,
                'is_clickable' => 0,
                'link' => null,
                'parent_menu_id' => null,
                'order' => 1,
            )
        );
        $parentId = $menu->id;
        $menu->create(
            array(
                'name' => 'Home',
                'hash' => 'home',
                'is_clickable' => 0,
                'link' => null,
                'parent_menu_id' => $parentId,
                'order' => 1,
            )
        );
        $menu->create(
            array(
                'name' => 'About',
                'hash' => 'about',
                'is_clickable' => 1,
                'parent_menu_id' => $parentId,
                'order' => 2,
            )
        );
        $menu->create(
            array(
                'name' => 'Portfolio',
                'hash' => 'portfolio',
                'is_clickable' => 1,
                'parent_menu_id' => $parentId,
                'order' => 3,
            )
        );
        $menu->create(
            array(
                'name' => 'Additional Links',
                'is_clickable' => 0,
                'parent_menu_id' => null,
                'order' => 2,
            )
        );
        $parentAdditionalLinksId = $menu->id;
        $menu->create(
            array(
                'name' => 'Project',
                'is_clickable' => 1,
                'link' => route('projectIndex'),
                'parent_menu_id' => $parentAdditionalLinksId,
                'order' => 1,
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
