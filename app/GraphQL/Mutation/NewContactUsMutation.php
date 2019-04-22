<?php

namespace App\GraphQL\Mutation;

use App\Models\Contact;
use GraphQL;
use GraphQL\Type\Definition\Type;
use Folklore\GraphQL\Support\Mutation;
use Illuminate\Support\Facades\Mail;

class NewContactUsMutation extends Mutation
{
    protected $attributes = [
        'name' => 'newContactUs'
    ];

    public function type()
    {
        return Type::string();
    }

    public function args()
    {
        return [
            'name' => [
                'name' => 'name',
                'type' => Type::nonNull(Type::string()),
                'rules' => ['required'],
            ],
            'email' => [
                'name' => 'email',
                'type' => Type::nonNull(Type::string()),
                'rules' => ['required'],
            ],
            'budget' => [
                'name' => 'budget',
                'type' => Type::nonNull(Type::int()),
                'rules' => ['required'],
            ],
            'message' => [
                'name' => 'message',
                'type' => Type::nonNull(Type::string()),
                'rules' => ['required'],
            ],
            'g-recaptcha-response' => [
                'name' => 'g-recaptcha-response',
                'type' => Type::string(),
            ]
        ];
    }

    public function authenticated($root, $args, $currentUser)
    {
        return !!$currentUser;
    }

    public function resolve($root, $args)
    {
        $contact = new Contact();

        $contact->name = $args['name'];
        $contact->email = $args['email'];
        $contact->budget = $args['budget'];
        $contact->message = $args['message'];

        $contact->save();

        Mail::send(['text' => 'partials.contact-us-email'], compact('contact'), function ($message) {
            $message->to('contact@mbfouad.com', 'Contact Me')->subject
            ('New Contact message');
            $message->from('contact@mbfouad.com', 'Contact Me');
        });

        return 'success';
    }
}