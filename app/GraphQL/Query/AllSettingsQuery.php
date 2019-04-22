<?php

namespace App\GraphQL\Query;

use GraphQL;
use App\Models\Settings;
use GraphQL\Type\Definition\Type;
use Folklore\GraphQL\Support\Query;
use GraphQL\Type\Definition\ResolveInfo;
use Illuminate\Support\Facades\File;


class AllSettingsQuery extends Query
{

    protected $attributes = [
        'name' => 'allSettings'
    ];

    public function type()
    {
        return Type::listOf(GraphQL::type('Settings'));
    }

    public function resolve($root, $args, $context, ResolveInfo $info)
    {
        $fields = $info->getFieldSelection();

        //get setting
        $settings = Settings::getSettings();
        //check if main image exists
        if (File::exists('uploads/slider/' . $settings['main-image']->value)) {
            $settings['main-image']->value = 'uploads/slider/' . $settings['main-image']->value;
        } else {
            $settings['main-image']->value = '/images/shadow-img.png';

        }
        return $settings;
    }
}
