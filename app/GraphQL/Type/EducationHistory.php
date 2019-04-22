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

class EducationHistory extends GraphQLType
{
    protected $attributes = [
        'name' => 'EducationHistory',
        'description' => 'Education History modal'
    ];

    public function fields()
    {
        return [
            'id' => [
                'type' => Type::nonNull(Type::int()),
                'description' => 'The id of a education history'
            ],
            'name' => [
                'type' => Type::nonNull(Type::string()),
                'description' => 'The name of a education history'
            ],
            'start_date' => [
                'type' => Type::nonNull(Type::string()),
                'description' => 'The start date of a education history'
            ],
            'end_date' => [
                'type' => Type::nonNull(Type::string()),
                'description' => 'The end date of a education history'
            ],
            'grade' => [
                'type' => Type::string(),
                'description' => 'The grade of a education history'
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