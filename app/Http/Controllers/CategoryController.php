<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\CategoryRepositoryEloquent;
use App\Http\Requests\CreateCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Http\Resources\CategoryResource;
use App\Services\CategoryService;

class CategoryController extends Controller
{
    protected $categoryRepository;

    public function __construct(CategoryRepositoryEloquent $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->has('type')) {
            $category = $this->categoryRepository->findWhere(['type' => $request->type]);
        } else {
            $category = $this->categoryRepository->all();
        }
        return $this->ok(CategoryResource::collection($category), 'Data Kategori');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateCategoryRequest $request, CategoryService $categoryService)
    {
        $data               = $categoryService->create($request);
        $category           = $this->categoryRepository->create($data);
        $categoryResource   = new CategoryResource($category);
        return $this->created($categoryResource, 'Berhasil Menambahkan Kategory');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $category           = $this->categoryRepository->find($id);
        $categoryResource   = new CategoryResource($category);
        return $this->ok($categoryResource, 'Detail Category');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCategoryRequest $request, $id, CategoryService $categoryService)
    {
        $data               = $categoryService->update($request);
        $category           = $this->categoryRepository->update($data, $id);
        $categoryResource   = new CategoryResource($category);
        return $this->accepted($categoryResource, 'Berhasil Mengubah Kategory');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->categoryRepository->delete($id);
    }
}
