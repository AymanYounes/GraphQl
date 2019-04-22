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

class Contact extends GraphQLType
{
    protected $attributes = [
        'name' => 'Contact',
        'description' => 'Contact modal'
    ];

    public function fields()
    {
        return [
            'id' => [
                'type' => Type::nonNull(Type::int()),
                'description' => 'The id of a contact us'
            ],
            'name' => [
                'type' => Type::nonNull(Type::string()),
                'description' => 'The name of a contact us'
            ],
            'email' => [
                'type' => Type::nonNull(Type::string()),
                'description' => 'The email of a contact us'
            ],
            'budget' => [
                'type' => Type::nonNull(Type::int()),
                'description' => 'The budget of a contact us'
            ],
            'message' => [
                'type' => Type::nonNull(Type::string()),
                'description' => 'The message of a contact us'
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