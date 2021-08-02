<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\ForumRepositoryEloquent;
use App\Http\Requests\CreateForumRequest;
use App\Services\ForumService;
use App\Http\Resources\ForumResource;
use App\Http\Requests\UpdateForumRequest;

class ForumController extends Controller
{
    protected $forumRepository;

    public function __construct(ForumRepositoryEloquent $forumRepository)
    {
        $this->forumRepository = $forumRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        if ($request->has('topic')) {
            $topic = $this->forumRepository->findWhere(['topic' => $request->topic]);
        } else {
            $topic = $this->forumRepository->all();
        }
        return $this->ok(ForumResource::collection($topic), 'Data Category');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateForumRequest $request, ForumService $forumService)
    {
        $data   = $forumService->create($request);
        $forum  = $this->forumRepository->create($data);
        return $this->ok(new ForumResource($forum), 'Data Sudah Di Tambahkan') ;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $forum = $this->forumRepository->find($id);
        return $this->ok(new ForumResource($forum), 'Data Category id ' . $id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateForumRequest $request, $id, ForumService $forumService)
    {
        $data   = $forumService->update($request);
        $forum  = $this->forumRepository->update($data, $id);
        return $this->ok(new ForumResource($forum), 'Data id ' . $id . ' Sudah Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->forumRepository->delete($id);
        return response()->json('Data id ' . $id . ' Sudah Dihapus');
    }
}
