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

class Paragraphs extends GraphQLType
{
    protected $attributes = [
        'name' => 'Paragraphs',
        'description' => 'Paragraphs modal'
    ];

    public function fields()
    {
        return [
            'id' => [
                'type' => Type::nonNull(Type::int()),
                'description' => 'The id of a Paragraphs'
            ],
            'name' => [
                'type' => Type::nonNull(Type::string()),
                'description' => 'The name of a Paragraphs'
            ],
            'identify' => [
                'type' => Type::nonNull(Type::string()),
                'description' => 'The identify of a Paragraphs'
            ],
            'value' => [
                'type' => Type::nonNull(Type::string()),
                'description' => 'The value of a Paragraphs'
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