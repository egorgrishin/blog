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

    public function index(): array
    {
        return $this->category->get()->toArray();
    }

    public function show(int $id): array
    {
        $this->category->find($id)->toArray();
    }

    public function store(array $data): void
    {
        $this->category->create($data);
    }

    public function update(int $id, array $data): void
    {
        $this->category->where('id', $id)->update($data);
    }

    public function delete(int $id): void
    {
        $this->category->where('id', $id)->delete();
    }

    public function isBusyTitle(string $title): bool
    {
        return $this->category->where('title', $title)
            ->count() > 0;
    }

    public function categoryExist(int $id): bool
    {
        return $this->category->where('id', $id)
            ->count() > 0;
    }
}