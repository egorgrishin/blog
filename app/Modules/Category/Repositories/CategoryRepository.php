<?php

namespace App\Modules\Category\Repositories;

use App\Modules\Category\Models\Category;

class CategoryRepository
{
    /**
     * Category eloquent model
     *
     * @var Category
     */
    private Category $category;

    /**
     * CategoryRepository constructor
     */
    public function __construct()
    {
        $this->category = new Category();
    }
}