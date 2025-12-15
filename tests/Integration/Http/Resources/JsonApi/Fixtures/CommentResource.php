<?php

namespace Illuminate\Tests\Integration\Http\Resources\JsonApi\Fixtures;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\JsonApi\JsonApiResource;

class CommentResource extends JsonApiResource
{
    /**
     * The resource's attributes.
     */
    public $attributes = [
        'content',
    ];

    #[\Override]
    public function toRelationships(Request $request)
    {
        return [
            'posts' => fn ($comment) => $comment->posts()->take(5)->toResourceCollection(),
            'commenter' => UserApiResource::class,
        ];
    }
}
