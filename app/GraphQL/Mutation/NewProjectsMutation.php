<?php

namespace App\GraphQL\Mutation;

use GraphQL;
use App\Models\Projects;
use GraphQL\Type\Definition\Type;
use Folklore\GraphQL\Support\Mutation;

class NewProjectsMutation extends Mutation
{
    protected $attributes = [
        'name' => 'newProject'
    ];

    public function type()
    {
        return GraphQL::type('Projects');
    }
    public function args()
    {
        return [
            'name' => [
                'name' => 'name',
                'type' => Type::nonNull(Type::string()),
                'rules' => ['required'],
            ],
            'company_name' => [
                'name' => 'company_name',
                'type' => Type::nonNull(Type::string()),
                'rules' => ['required'],
            ],
            'start_date' => [
                'name' => 'start_date',
                'type' => Type::nonNull(Type::string()),
                'rules' => ['required'],
            ],
            'end_date' => [
                'name' => 'end_date',
                'type' => Type::nonNull(Type::string()),
            ],
            'url' => [
                'name' => 'url',
                'type' => Type::nonNull(Type::string()),
                'rules' => ['required'],
            ],
            'description' => [
                'name' => 'description',
                'type' => Type::nonNull(Type::string()),
                'rules' => ['required'],
            ],
            'image' => [
                'name' => 'image',
                'type' => Type::nonNull(Type::string()),
                'rules' => ['required'],
            ],
            'sort' => [
                'name' => 'description',
                'type' => Type::nonNull(Type::int()),
                'rules' => ['required'],
            ],
        ];
    }

    public function authenticated($root, $args, $currentUser)
    {
        return !!$currentUser;
    }

    public function resolve($root, $args)
    {
        $project = new Projects();

        $project->name = $args['name'];
        $project->company_name = $args['company_name'];
        $project->start_date = $args['start_date'];
        $project->end_date = $args['end_date'];
        $project->url = $args['url'];
        $project->description = $args['description'];
        $project->image = $args['image'];
        $project->sort = $args['sort'];
        $project->save();

        return $project;
    }
}