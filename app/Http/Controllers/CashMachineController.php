<?php

namespace App\Http\Controllers;

use App\Transactions\CashMachine;
use Illuminate\Http\Request;

use App\Transactions\TransactionFactory;


class CashMachineController extends Controller
{
    public function create()
    {
        return view('transaction.create');
    }

    public function store(Request $request, $type)
    {
        // IF you want to see submitted data -> Dump and stop the execution to view the submitted data
        //dd($request->all());

        $transaction = TransactionFactory::make($type, $request->all());

        try {
            (new CashMachine())->store($transaction);
            return redirect()->route('transaction.success');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors([$e->getMessage()]);
        }

    }

}
