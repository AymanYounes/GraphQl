<?php
/**
 * Created by PhpStorm.
 * User: mfouad
 * Date: 17/04/19
 * Time: 11:22
 */

namespace App\GraphQL\Type;

use GraphQL;
use GraphQL\Type\Definition\Type;
use Folklore\GraphQL\Support\Type as GraphQLType;

class Projects extends GraphQLType
{
    protected $attributes = [
        'name' => 'Projects',
        'description' => 'Projects modal'
    ];

    public function fields()
    {
        return [
            'id' => [
                'type' => Type::nonNull(Type::int()),
                'description' => 'The id of a Projects'
            ],
            'name' => [
                'type' => Type::nonNull(Type::string()),
                'description' => 'The name of a Projects'
            ],
            'company_name' => [
                'type' => Type::nonNull(Type::string()),
                'description' => 'The company name of a Projects'
            ],
            'start_date' => [
                'type' => Type::nonNull(Type::string()),
                'description' => 'The start date of a Projects'
            ],
            'end_date' => [
                'type' => Type::string(),
                'description' => 'The end date of a Projects'
            ],
            'url' => [
                'type' => Type::nonNull(Type::string()),
                'description' => 'The url of a Projects'
            ],
            'description' => [
                'type' => Type::nonNull(Type::string()),
                'description' => 'The description of a Projects'
            ],
            'image' => [
                'type' => Type::nonNull(Type::string()),
                'description' => 'The image of a Projects'
            ],
            'sort' => [
                'type' => Type::nonNull(Type::int()),
                'description' => 'The sort order of a Projects'
            ],
            'created_at' => [
                'type' => Type::string(),
                'description' => 'Date a was created'
            ],
            'updated_at' => [
                'type' => Type::string(),
                'description' => 'Date a was updated'
            ],
        ];
    }

    protected function resolveCreatedAtField($root, $args)
    {
        return (string)$root->created_at;
    }

    protected function resolveUpdatedAtField($root, $args)
    {
        return (string)$root->updated_at;
    }
}