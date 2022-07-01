<?php

namespace App\Modules\Tag\Controllers;

use App\Modules\Tag\Repositories\TagRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TagController extends Controller
{
    /**
     * @var TagRepository
     */
    private TagRepository $repository;

    /**
     * TagController constructor
     */
    public function __construct()
    {
        $this->repository = new TagRepository();
    }
}
