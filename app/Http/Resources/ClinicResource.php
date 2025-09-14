<?php
namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ClinicResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'clinic_id' => $this->ClinicID,
            'name' => $this->Name,
            'address1' => $this->Address1,
            'address2' => $this->Address2,
            'city' => $this->City,
            'state' => $this->State,
            'country_id' => $this->CountryID,
            'phone' => $this->Phone,
            'fax' => $this->Fax,
            'email' => $this->Email,
            'description' => $this->Description,
            'authentication_key' => $this->AuthenticationKey,
            'last_updated_on' => $this->LastUpdatedOn,
            'last_updated_by' => $this->LastUpdatedBy,
            'ftp_backup_server' => $this->FTPBackupServer,
            'ftp_password' => $this->FTPPassword,
            'ftp_user_id' => $this->FTPUserID,
            'email_host' => $this->EmailHost,
            'email_password' => $this->EmailPassword,
            'email_port' => $this->EmailPort,
            'email_userid' => $this->EmailUserid,
            'created_on' => $this->CreatedOn,
            'created_by' => $this->CreatedBy,
            'authentication_key_guid' => $this->AuthenticationKeyGuid,
            'license_type_id' => $this->LicenseTypeID,
            'license_valid_till' => $this->LicenseValidTill,
            'clinic_code' => $this->ClinicCode,
            'clinic_letterhead_header' => base64_encode($this->ClinicLetterHeadHeader ?? ''), // Encode binary data
            'clinic_logo' => base64_encode($this->ClinicLogo ?? ''), // Encode binary data
            'rowguid' => $this->rowguid,
            'patient_kiosk_tab_access' => $this->PatientKioskTabAccess,
        ];
    }
}
