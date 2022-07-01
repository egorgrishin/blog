<?php

namespace App\Modules\Comment\Repositories;

use App\Modules\Comment\Models\Comment;

class CommentRepository
{
    /**
     * Comment eloquent model
     *
     * @var Comment
     */
    private Comment $comment;

    /**
     * CommentRepository constructor
     */
    public function __construct()
    {
        $this->comment = new Comment();
    }
}