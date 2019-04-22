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

class Settings extends GraphQLType
{
    protected $attributes = [
        'name' => 'Settings',
        'description' => 'Settings modal'
    ];

    public function fields()
    {
        return [
            'id' => [
                'type' => Type::nonNull(Type::int()),
                'description' => 'The id of a Settings'
            ],
            'name' => [
                'type' => Type::nonNull(Type::string()),
                'description' => 'The name of a Settings'
            ],
            'identify' => [
                'type' => Type::nonNull(Type::string()),
                'description' => 'The identify of a Settings'
            ],
            'value' => [
                'type' => Type::nonNull(Type::string()),
                'description' => 'The value of a Settings'
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