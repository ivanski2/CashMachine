<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Transaction</title>
</head>
<body>

<h1>Create Transaction</h1>

<h2>Cash Transaction</h2>
<form action="{{ route('transaction.store', 'cash') }}" method="post">
    @csrf
    <label for="one_dollar">Amount for $1 bills:</label>
    <input type="number" id="one_dollar" name="one_dollar" required><br>

    <!-- Add other banknote fields similar to above here... -->

    <button type="submit">Submit Cash Transaction</button>
</form>

<h2>Credit Card Transaction</h2>
<form action="{{ route('transaction.store', 'credit_card') }}" method="post">
    @csrf
    <label for="card_number">Card Number:</label>
    <input type="text" id="card_number" name="card_number" required pattern="4[0-9]{15}" maxlength="16" placeholder="4123456789123456"><br>

    <label for="expiration_date">Expiration Date (MM/YYYY):</label>
    <input type="text" id="expiration_date" name="expiration_date" required pattern="(0[1-9]|1[0-2])\/[0-9]{4}" placeholder="MM/YYYY"><br>

    <!-- Add other credit card fields similar to above here... -->

    <button type="submit">Submit Credit Card Transaction</button>
</form>

<h2>Bank Transfer Transaction</h2>
<form action="{{ route('transaction.store', 'bank_transfer') }}" method="post">
    @csrf
    <label for="transfer_date">Transfer Date:</label>
    <input type="date" id="transfer_date" name="transfer_date" required><br>

    <!-- Add other bank transfer fields similar to above here... -->

    <button type="submit">Submit Bank Transfer Transaction</button>
</form>

</body>
</html>
