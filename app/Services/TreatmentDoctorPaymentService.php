<?php

namespace App\Services;

use App\Models\TreatmentDoctorPayment;
use App\Http\Resources\TreatmentDoctorPaymentResource;

class TreatmentDoctorPaymentService
{
    public function getTreatmentDoctorPayments(int $perPage): array
    {
        $data = TreatmentDoctorPayment::paginate($perPage);

        return [
            'treatment_doctor_payments' => $data,
            'pagination' => [
                'current_page' => $data->currentPage(),
                'per_page' => $data->perPage(),
                'total' => $data->total(),
            ],
        ];
    }

    public function createDoctorPayment(array $data): TreatmentDoctorPayment
    {
        return TreatmentDoctorPayment::create($data);
    }

    public function updateDoctorPayment(TreatmentDoctorPayment $request, array $data): TreatmentDoctorPayment
    {
        $request->update($data);
        $request->fresh();

        return $request;
    }
}
