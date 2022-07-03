<?php

namespace App\Modules\Category\Controllers;

use App\Modules\Category\Repositories\CategoryRepository;
use App\Modules\Category\Validators\StoreCategoryValidator;
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

    /**
     * Display a listing of the resource.
     *
     * @return array
     */
    public function index(): array
    {
        return $this->repository->index();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return array
     */
    public function store(Request $request): array
    {
        $data = $request->all();
        $validate = StoreCategoryValidator::run($data);

        if (!$validate['status']) {
            return $validate;
        }

        if ($this->repository->isBusyTitle($data['title'])) return [
            'status'  => false,
            'message' => 'Категория с таким названием уже существует',
        ];

        $this->repository->store($data);
        return [
            'status'  => true,
            'message' => 'Новая категория успешно создана',
        ];
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return array
     */
    public function show(int $id): array
    {
        $category = $this->repository->show($id);
        $status = $category ? true : false;

        $data = ['status' => $status];
        if ($status) $data['category'] = $category;
        else $data['message'] = 'Категория не найдена';

        return $data;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param int $id
     * @return array
     */
    public function update(Request $request, int $id): array
    {
        if (!$this->repository->categoryExist($id)) return [
            'status'  => false,
            'message' => 'Категория не найдена',
        ];

        $data = $request->all();
        $this->repository->update($id, $data);

        return [
            'status'  => true,
            'message' => 'Категория успешно обновлена'
        ];
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return array
     */
    public function destroy(int $id): array
    {
        if (!$this->repository->categoryExist($id)) return [
            'status'  => false,
            'message' => 'Категория не найдена',
        ];

        $this->repository->delete($id);
        return [
            'status'  => true,
            'message' => 'Категория успешно удалена'
        ];
    }
}
