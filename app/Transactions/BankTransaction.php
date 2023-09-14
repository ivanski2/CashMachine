<?php
namespace App\Transactions;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class BankTransaction implements Transaction
{
    private $inputs;

    public function __construct($inputs)
    {
        $this->inputs = $inputs;
    }

    /**
     * @throws ValidationException
     */
    public function validate()
    {
        $validator = Validator::make($this->inputs, [
            'transfer_date' => 'required|date|before_or_equal:today',
            'customer_name' => 'required|string',
            'account_number' => 'required|alpha_num|size:6',
            'amount' => 'required|numeric'
        ]);

        if ($validator->fails()) {
            throw new ValidationException($validator);
        }
    }

    public function amount()
    {
        return $this->inputs['amount'];
    }

    public function inputs()
    {
        return $this->inputs;
    }
}
