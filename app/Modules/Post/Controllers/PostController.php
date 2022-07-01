<?php

namespace App\Modules\Post\Controllers;

use App\Modules\Post\Repositories\PostRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PostController extends Controller
{
    /**
     * @var PostRepository
     */
    private PostRepository $repository;

    /**
     * PostController constructor
     */
    public function __construct()
    {
        $this->repository = new PostRepository();
    }
}
