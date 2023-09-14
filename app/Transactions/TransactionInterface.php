<?php


namespace App\Contracts\Transactions;

interface Transaction
{
    public function validate();

    public function amount();

    public function inputs();
}
