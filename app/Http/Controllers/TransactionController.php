<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $transaction = Transaction::when(request()->status, function($q) {
            $q->where('status', request()->status);
        })->with(['drug', 'user'])->paginate(10)
        // ->editColumn('create_at', function($row){
        //     return date("d-m-Y", ($row->create_at /1000));
        // })
        
        ;

        // $transaction = Transaction::when(request()->status, function($q) {
        //     $q->where('status', request()->status);
        // })->editColumn('create_at', function($row){
        //     return date("d-m-Y", ($row->create_at /1000));
        // })
        // ;
        


        // $transaction = Transaction::with(['drug', 'user'])->paginate(10);

        // if (request()->status) {
        //     $transactions = Transaction::with(['user', 'drug'])->where('status', request()->status)->orderBy('created_at', 'DESC')->paginate(10);
        // } else {
        //     $transactions = Transaction::with(['user', 'drug'])->orderBy('created_at', 'DESC')->paginate(10);
        // }
        $transaction = Transaction::when(request()->status, function ($q) {
            $q->where('status', request()->status);
        })->with(['drug', 'user'])->paginate(20);


        return view('transactions.index', [
            'transactions' => $transaction
        ]);


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Transaction $transaction)
    {
        return view('transactions.detail', [
            'item' => $transaction
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function destroy(Transaction $transaction)
    {
        $transaction->delete();

        return redirect()->route('transactions.index');
    }

    public function changeStatus(Request $request, $id, $status)
    {
        $transaction = Transaction::findOrFail($id);

        $transaction->status = $status;
        $transaction->save();

        return redirect()->route('transactions.show', $id);
    }
}
