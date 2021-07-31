<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\ArticleRepositoryEloquent;
use App\Http\Requests\CreateArticleRequest;
use App\Http\Requests\UpdateArticleRequest;
use App\Http\Resources\ArticleResource;
use App\Services\ArticleService;
use App\Repositories\ArticleRepository;

class ArticleController extends Controller
{
    protected $articleRepository;

    public function __construct(ArticleRepositoryEloquent $articleRepository)
    {
        $this->articleRepository = $articleRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $conditions = [];
        if ($request->has('title')) {
            $conditions[] = ['title', 'LIKE', "%{$request->title}%"];
            $article = $this->articleRepository->findWhere($conditions);
        } elseif ($request->has('category_id')) {
            $article = $this->articleRepository->findWhere(['category_id' => $request->category_id]);
        } elseif ($request->has('active')) {
            $article = $this->articleRepository->findWhere(['active' => $request->active]);
        } else {
            $article = $this->articleRepository->all();
        }
        return ArticleResource::collection($article);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateArticleRequest $request, ArticleService $articleService)
    {

        $data    = $articleService->create($request);
        $article = $this->articleRepository->create($data);
        return new ArticleResource($article);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $article = $this->articleRepository->find($id);
        return new ArticleResource($article);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function update(UpdateArticleRequest $request, $id, ArticleService $articleService)
    {

        $data    = $articleService->create($request);
        $article = $this->articleRepository->update($data, $id);
        return new ArticleResource($article);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return $this->articleRepository->delete($id);
    }
}
