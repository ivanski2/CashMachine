<?php

use App\Transactions\Transaction;
use Illuminate\Support\Facades\Validator;

class CashTransaction implements Transaction
{
    private $inputs;
    private $banknotes = [1, 5, 10, 50, 100];

    public function __construct($inputs)
    {
        $this->inputs = $inputs;
    }

    public function validate()
    {
        $validator = Validator::make($this->inputs, [
            '1' => 'integer',
            '5' => 'integer',
            '10' => 'integer',
            '50' => 'integer',
            '100' => 'integer',
            //and other
        ]);

        if ($validator->fails()) {
            throw new Exception($validator->errors());
        }

        $amount = $this->amount();
        if ($amount > 10000) {
            throw new Exception("Cash amount exceeds the limit.");
        }
    }

    public function amount()
    {
        return array_sum(array_map(function ($value, $key) {
            return $value * $key;
        }, $this->inputs, array_keys($this->inputs)));
    }

    public function inputs()
    {
        return $this->inputs;
    }
}
