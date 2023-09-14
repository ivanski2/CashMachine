<?php
namespace App\Transactions;

use App\Transactions\BankTransaction;
use App\Transactions\CardTransaction;
use App\Transactions\CashTransaction;


class TransactionFactory
{
    /**
     * @throws \Exception
     */
    public static function make($type, $data)
    {
        return match ($type) {
            'cash' => new CashTransaction($data),
            'credit_card' => new CardTransaction($data),
            'bank_transfer' => new BankTransaction($data),
            default => throw new \Exception("Invalid transaction type."),
        };
    }
}
