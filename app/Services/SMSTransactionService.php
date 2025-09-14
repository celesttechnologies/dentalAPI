<?php

namespace App\Services;

use App\Models\SMSTransaction;
use App\Http\Resources\SMSTransactionResource;

class SMSTransactionService
{
    /**
     * Get a paginated list of SMS Transactions.
     *
     * @param int $perPage
     * @return array
     */
    public function getSMSTransactions(int $perPage, $patient): array
    {
        $data = SMSTransaction::where('PatientID', $patient->id)->paginate($perPage);

        return [
            'sms_transactions' => $data,
            'pagination' => [
                'current_page' => $data->currentPage(),
                'per_page' => $data->perPage(),
                'total' => $data->total(),
            ]
        ];
    }

    public function createSMSTransaction(array $data): SMSTransaction
    {
        return SMSTransaction::create($data);
    }

    public function updateSMSTransaction(SMSTransaction $smsTransaction, array $data): SMSTransaction
    {
        $smsTransaction->update($data);
        $smsTransaction->fresh();

        return $smsTransaction;
    }
}

