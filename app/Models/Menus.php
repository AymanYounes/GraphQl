<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Menus extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'menus';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'hash', 'is_clickable', 'link', 'parent_menu_id', 'order', 'created_at', 'updated_at'];


    public $child_menus;
    public $url;

    public function children()
    {
        return $this->hasMany('App\Models\Menus', 'parent_menu_id');
    }

    public static function getMenus($menus = null)
    {
        if (!$menus) {
            $menus = self::getMenusByParentId();
        }

        foreach ($menus as $menu) {
            $children = $menu->children;
            if (count($children)) {
                $menu->child_menus = $children;
                self::getMenus($menu->child_menus);
            }
        }
        return $menus->toArray();
    }

    public static function getMenusByParentId($parentId = null)
    {
        if ($parentId) {
            return Menus::where('parent_menu_id', $parentId)->orderBy('order')->get();

        } else {
            return Menus::whereNull('parent_menu_id')->orderBy('order')->get();
        }
    }

    public function toArray()
    {
        if ($this->hash) {
            $this->url = route('homeIndex').'/#' . $this->hash;
        } elseif ($this->is_clickable) {
            $this->url = $this->link;
        }

        return $this;
    }
}
