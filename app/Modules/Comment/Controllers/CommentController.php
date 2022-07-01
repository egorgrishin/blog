<?php

namespace App\Modules\Comment\Controllers;

use App\Modules\Comment\Repositories\CommentRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CommentController extends Controller
{
    /**
     * @var CommentRepository
     */
    private CommentRepository $repository;

    /**
     * CommentController constructor
     */
    public function __construct()
    {
        $this->repository = new CommentRepository();
    }
}
