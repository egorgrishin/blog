<?php

namespace App\Modules\Tag\Repositories;

use App\Modules\Tag\Models\Tag;

class TagRepository
{
    /**
     * Tag eloquent model
     *
     * @var Tag
     */
    private Tag $tag;

    /**
     * TagRepository constructor
     */
    public function __construct()
    {
        $this->tag = new Tag();
    }
}