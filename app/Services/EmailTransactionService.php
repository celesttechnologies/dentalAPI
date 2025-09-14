<?php

namespace App\Services;

use App\Models\EmailTransaction;
use App\Http\Resources\EmailTransactionResource;

class EmailTransactionService
{
    /**
     * Get a paginated list of Email Transactions.
     *
     * @param int $perPage
     * @return array
     */
    public function getEmailTransactions(int $perPage, $patient): array
    {
        $data = EmailTransaction::where('PatientID', $patient->id)->paginate($perPage);

        return [
            'transactions' => $data,
            'pagination' => [
                'current_page' => $data->currentPage(),
                'per_page' => $data->perPage(),
                'total' => $data->total(),
            ]
        ];
    }

    /**
     * Create a new Email Transaction record.
     *
     * @param array $data The validated data for creating the email templates tag
     * @return EmailTransaction The newly created email templates tag model
     */
    public function createTransaction(array $data): EmailTransaction
    {
        return EmailTransaction::create($data);
    }

    /**
     * Update an existing Email Transaction record.
     *
     * @param EmailTransaction $emailTemplatesTag The email templates tag model to update
     * @param array $data The validated data for updating the email templates tag
     * @return EmailTransaction The updated email templates tag model
     */
    public function updateTransaction(EmailTransaction $emailTransaction, array $data): EmailTransaction
    {
        $emailTransaction->update($data);

        return $emailTransaction;
    }
}