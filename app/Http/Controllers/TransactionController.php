<?php

namespace App\Http\Controllers;

use App\Http\Requests\TransactionRequest;
use App\Http\Resources\TransactionResource;
use App\Repositories\TransactionRepositoryEloquent;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    protected $transactionRepository;

    public function __construct(TransactionRepositoryEloquent $transactionRepository)
    {
        $this->transactionRepository = $transactionRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $transactions = $this->transactionRepository->all();
        return TransactionResource::collection($transactions);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TransactionRequest $request)
    {
        $request['user_id'] = auth()->user()->id;
        $transaction = $this->transactionRepository->create($request->all());
        return new TransactionResource($transaction);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $transaction = $this->transactionRepository->find($id);
        return new TransactionResource($transaction);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TransactionRequest $request, $id)
    {
        $transaction = $this->transactionRepository->update($request->all(), $id);
        return new TransactionResource($transaction);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return $this->transactionRepository->delete($id);
    }
}
