<?php

namespace App\Services;

use App\Http\Resources\BankDepositResource; // Assuming you have a resource for this model
use App\Models\BankDeposit;

class BankDepositService
{
    public function getBankDeposits($perPage = 50)
    {
        // Fetch bank deposits with pagination
        $bankDeposits = BankDeposit::paginate($perPage);

        return [
            'bankDeposits' => $bankDeposits, // Format the response using the resource
            'pagination' => [
                'currentPage' => $bankDeposits->currentPage(),
                'perPage' => $bankDeposits->perPage(),
                'total' => $bankDeposits->total(),
            ]
        ];
    }

    /**
     * Create a new bank deposit record.
     *
     * @param array $data The validated data for creating the bank deposit
     * @return BankDeposit The newly created bank deposit model
     */
    public function createBankDeposit(array $data): BankDeposit
    {
        return BankDeposit::create($data);
    }

    /**
     * Update an existing bank deposit record.
     *
     * @param BankDeposit $bankDeposit The bank deposit model to update
     * @param array $data The validated data for updating the bank deposit
     * @return BankDeposit The updated bank deposit model
     */
    public function updateBankDeposit(BankDeposit $bankDeposit, array $data): BankDeposit
    {
        $bankDeposit->update($data);
        $bankDeposit->fresh();
        return $bankDeposit;
    }
}