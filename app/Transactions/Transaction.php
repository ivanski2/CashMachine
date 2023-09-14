<?php
namespace App\Transactions;

interface Transaction
{
    public function validate();
    public function amount();
    public function inputs();
}
