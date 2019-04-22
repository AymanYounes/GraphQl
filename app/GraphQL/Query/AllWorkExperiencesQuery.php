<?php

namespace App\GraphQL\Query;

use GraphQL;
use App\Models\WorkExperiences;
use GraphQL\Type\Definition\Type;
use Folklore\GraphQL\Support\Query;
use GraphQL\Type\Definition\ResolveInfo;


class AllWorkExperiencesQuery extends Query
{

    protected $attributes = [
        'name' => 'allWorkExperiences'
    ];

    public function type()
    {
        return Type::listOf(GraphQL::type('WorkExperiences'));
    }

    public function args()
    {
        return [
            'first' => [
                'name' => 'first',
                'type' => Type::int(),
            ],
        ];
    }

    public function resolve($root, $args, $context, ResolveInfo $info)
    {
        $fields = $info->getFieldSelection();

        $workExperiences = WorkExperiences::query();

//        foreach ($fields as $field => $keys) {
//            if ($field === 'user') {
//                $projects->with('user');
//            }
//
//            if ($field === 'replies') {
//                $projects->with('replies');
//            }
//
//            if ($field === 'likes_count') {
//                $projects->with('likes');
//            }
//        }
        // select first number of rows
        if (isset($args['first'])) {
            $workExperiences->take($args['first']);
        }
        $workExperiences = $workExperiences->get();
        return $workExperiences;
    }
}
