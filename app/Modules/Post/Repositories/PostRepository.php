<?php

namespace App\Modules\Post\Repositories;

use App\Modules\Post\Models\Post;

class PostRepository
{
    /**
     * Post eloquent model
     *
     * @var Post
     */
    private Post $post;

    /**
     * PostRepository constructor
     */
    public function __construct()
    {
        $this->post = new Post();
    }
}