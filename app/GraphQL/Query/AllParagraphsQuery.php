<?php

namespace App\GraphQL\Query;

use GraphQL;
use App\Models\Paragraphs;
use GraphQL\Type\Definition\Type;
use Folklore\GraphQL\Support\Query;
use GraphQL\Type\Definition\ResolveInfo;

class AllParagraphsQuery extends Query
{

    protected $attributes = [
        'name' => 'allParagraphs'
    ];

    public function type()
    {
        return Type::listOf(GraphQL::type('Paragraphs'));
    }

    public function args()
    {
        return [
            'identify' => [
                'name' => 'identify',
                'type' => Type::string(),
            ],
            'identifyArr' => [
                'name' => 'identifyArr',
                'type' => Type::listOf(Type::string()),
            ],
            'first' => [
                'name' => 'first',
                'type' => Type::int(),
            ],
            'op' => [
                'name' => 'op',
                'type' => Type::string(),
            ],
        ];
    }

    public function resolve($root, $args, $context, ResolveInfo $info)
    {

        $fields = $info->getFieldSelection();

        $paragraphs = Paragraphs::query();

        // filter by single identify
        if (isset($args['identify'])) {
            $paragraphs->where('identify', 'like', '%' . $args['identify'] . '%');
        }

        // filter by list of identify
        if (isset($args['identifyArr'])) {
            $paragraphs->where(function ($query) use ($args) {
                foreach ($args['identifyArr'] as $identify) {
                    $query->orWhere('identify', 'LIKE', '%' . $identify . '%');
                }

            });
        }

        // select first number of rows
        if (isset($args['first'])) {
            $paragraphs->take($args['first']);
        }

        $paragraphs = $paragraphs->get();
//        $paragraphs = Paragraphs::handleParagraphs($paragraphs);
        return $paragraphs;
    }
}
