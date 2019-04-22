<?php

namespace App\GraphQL\Query;

use GraphQL;
use App\Models\Projects;
use GraphQL\Type\Definition\Type;
use Folklore\GraphQL\Support\Query;
use GraphQL\Type\Definition\ResolveInfo;
use App\Factories\ProjectFactory;


class AllProjectsQuery extends Query
{
    use ProjectFactory;

    protected $attributes = [
        'name' => 'allProjects'
    ];

    public function type()
    {
        return Type::listOf(GraphQL::type('Projects'));
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

        $projects = Projects::query();

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
            $projects->take($args['first']);
        }
        $projects = $projects->orderBy('sort')->get();
        $projects = $this->handleProjectImage($projects);
        return $projects;
    }
}
