<?php

namespace App\Services;

use App\Http\Resources\BankAccountResource; // Assuming you have a resource for this model
use App\Models\BankAccount;

class BankAccountService
{
    public function getBankAccounts($perPage = 50)
    {
        // Fetch bank accounts with pagination
        $bankAccounts = BankAccount::paginate($perPage);

        return [
            'bankAccounts' => $bankAccounts, // Format the response using the resource
            'pagination' => [
                'currentPage' => $bankAccounts->currentPage(),
                'perPage' => $bankAccounts->perPage(),
                'total' => $bankAccounts->total(),
            ]
        ];
    }

    /**
     * Create a new bank account record.
     *
     * @param array $data The validated data for creating the bank account
     * @return BankAccount The newly created bank account model
     */
    public function createBankAccount(array $data): BankAccount
    {
        return BankAccount::create($data);
    }

    /**
     * Update an existing bank account record.
     *
     * @param BankAccount $bankAccount The bank account model to update
     * @param array $data The validated data for updating the bank account
     * @return BankAccount The updated bank account model
     */
    public function updateBankAccount(BankAccount $bankAccount, array $data): BankAccount
    {
        $bankAccount->update($data);
        return $bankAccount;
    }
}
