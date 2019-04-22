<?php

namespace App\GraphQL\Query;

use GraphQL;
use App\Models\Projects;
use GraphQL\Type\Definition\Type;
use Folklore\GraphQL\Support\Query;

class ProjectByIdQuery extends Query
{
    protected $attributes = [
        'name' => 'projectById'
    ];

    public function type()
    {
        return GraphQL::type('Projects');
    }

    public function args()
    {
        return [
            'id' => [
                'name' => 'id',
                'type' => Type::nonNull(Type::int()),
                'rules' => ['required']
            ],
        ];
    }

    public function resolve($root, $args)
    {
        if (!$project = Projects::find($args['id'])) {
            throw new \Exception('Project not found');
        }

        return $project;
    }
}