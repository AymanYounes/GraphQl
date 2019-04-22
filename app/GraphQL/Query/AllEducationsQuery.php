<?php

namespace App\GraphQL\Query;

use GraphQL;
use App\Models\EducationHistory;
use GraphQL\Type\Definition\Type;
use Folklore\GraphQL\Support\Query;
use GraphQL\Type\Definition\ResolveInfo;


class AllEducationsQuery extends Query
{

    protected $attributes = [
        'name' => 'allEducations'
    ];

    public function type()
    {
        return Type::listOf(GraphQL::type('EducationHistory'));
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

        $educations = EducationHistory::query();

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
            $educations->take($args['first']);
        }
        $educations = $educations->get();
        return $educations;
    }
}
