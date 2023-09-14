<?php
namespace App\Transactions;

use App\Transactions\Transaction;
use App\Models\Transaction as TransactionModel;  // assuming you have a model named Transaction

class CashMachine
{
    public function store(Transaction $transaction)
    {
        if (!$transaction->validate()) {
            throw new \Exception("Validation failed.");
        }

        $totalAmount = TransactionModel::sum('amount');
        if ($totalAmount + $transaction->amount() > 20000) {
            throw new \Exception("Amount limit exceeded.");
        }

        TransactionModel::create([
            'type' => get_class($transaction),
            'amount' => $transaction->amount(),
            'inputs' => json_encode($transaction->inputs())
        ]);
    }
}
