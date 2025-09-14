<?php

namespace App\Services;

use App\Models\WhatsappSMSTransaction;
use App\Http\Resources\WhatsappSMSTransactionResource;

class WhatsappSMSTransactionService
{
    public function getWhatsappSMSTransactions(int $perPage, $patient): array
    {
        $data = WhatsappSMSTransaction::where(['IsDeleted' => 0, 'PatientID' => $patient->id])->paginate($perPage);

        return [
            'data' => $data,
            'pagination' => [
                'current_page' => $data->currentPage(),
                'per_page' => $data->perPage(),
                'total' => $data->total(),
            ]
        ];
    }

    public function createTransaction(array $data): WhatsappSMSTransaction
    {
        return WhatsappSMSTransaction::create($data);
    }

    public function updateTransaction(WhatsappSMSTransaction $request, array $data): WhatsappSMSTransaction
    {
        $request->update($data);
        $request->fresh();

        return $request;
    }
}
