<?php
namespace App\Transactions;

class CardTransaction implements Transaction
{
    private $inputs;

    public function __construct($inputs)
    {
        $this->inputs = $inputs;
    }

    public function validate()
    {
        $currentDate = now();
        $expDate = Carbon\Carbon::createFromFormat('m/Y', $this->inputs['expiration_date']);

        $validator = Validator::make($this->inputs, [
            'card_number' => ['required', 'regex:/^4\d{15}$/'],
            'expiration_date' => 'required|date_format:m/Y',
            'cardholder' => 'required|string',
            'cvv' => 'required|digits:3',
            'amount' => 'required|numeric'
        ]);

        if ($validator->fails() || $currentDate->diffInMonths($expDate) < 2) {
            throw new Exception("Invalid card details.");
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
