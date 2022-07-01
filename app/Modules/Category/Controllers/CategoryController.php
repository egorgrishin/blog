<?php

namespace App\Modules\Category\Controllers;

use App\Modules\Category\Repositories\CategoryRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    /**
     * @var CategoryRepository
     */
    private CategoryRepository $repository;

    /**
     * CategoryController constructor
     */
    public function __construct()
    {
        $this->repository = new CategoryRepository();
    }
}
