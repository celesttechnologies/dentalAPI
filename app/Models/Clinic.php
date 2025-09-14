<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

/**
 * Class Clinic
 * 
 * @property string $ClinicID
 * @property string $Name
 * @property string|null $Address1
 * @property string $Address2
 * @property string|null $City
 * @property string|null $State
 * @property int $CountryID
 * @property string|null $Phone
 * @property string|null $Fax
 * @property string|null $Email
 * @property string|null $Description
 * @property string|null $AuthenticationKey
 * @property Carbon|null $LastUpdatedOn
 * @property string|null $LastUpdatedBy
 * @property string|null $FTPBackupServer
 * @property string|null $FTPPassword
 * @property string|null $FTPUserID
 * @property string|null $EmailHost
 * @property string|null $EmailPassword
 * @property string|null $EmailPort
 * @property string|null $EmailUserid
 * @property Carbon|null $CreatedOn
 * @property string|null $CreatedBy
 * @property string|null $AuthenticationKeyGuid
 * @property int|null $LicenseTypeID
 * @property Carbon|null $LicenseValidTill
 * @property string|null $ClinicCode
 * @property string|null $ClinicLetterHeadHeader
 * @property string|null $ClinicLogo
 * @property string|null $rowguid
 * @property string|null $PatientKioskTabAccess
 * 
 * @property Collection|ClinicTVNewsTicker[] $clinic_t_v_news_tickers
 * @property Collection|ClinicCommunicationConfig[] $clinic_communication_configs
 * @property Collection|ClinicLabSupplier[] $clinic_lab_suppliers
 * @property Collection|ClinicLabWork[] $clinic_lab_works
 * @property Collection|ClinicLabWorkComponent[] $clinic_lab_work_components
 *
 * @package App\Models
 */
class Clinic extends Model
{
	protected $table = 'Clinic';
	protected $primaryKey = 'ClinicID';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'CountryID' => 'int',
		'LastUpdatedOn' => 'datetime',
		'CreatedOn' => 'datetime',
		'LicenseTypeID' => 'int',
		'LicenseValidTill' => 'datetime'
	];

	protected $fillable = [
		'Name',
		'Address1',
		'Address2',
		'City',
		'State',
		'CountryID',
		'Phone',
		'Fax',
		'Email',
		'Description',
		'AuthenticationKey',
		'LastUpdatedOn',
		'LastUpdatedBy',
		'FTPBackupServer',
		'FTPPassword',
		'FTPUserID',
		'EmailHost',
		'EmailPassword',
		'EmailPort',
		'EmailUserid',
		'CreatedOn',
		'CreatedBy',
		'AuthenticationKeyGuid',
		'LicenseTypeID',
		'LicenseValidTill',
		'ClinicCode',
		'ClinicLetterHeadHeader',
		'ClinicLogo',
		'rowguid',
		'PatientKioskTabAccess'
	];

protected static function boot()
{
	parent::boot();
	static::creating(function ($model) {
		if (empty($model->ClinicID)) {
			$model->ClinicID = (string) Str::uuid(); // Auto-generate UUID
		}
	});
}

	protected function id(): Attribute
	{
		return Attribute::make(
			get: fn (mixed $value, array $attributes) => $attributes['ClinicID'],
		);
	}

	public function clinic_t_v_news_tickers()
	{
		return $this->hasMany(ClinicTVNewsTicker::class, 'ClinicID');
	}

	public function clinic_communication_configs()
	{
		return $this->hasMany(ClinicCommunicationConfig::class, 'ClinicID');
	}

	public function clinic_lab_suppliers()
	{
		return $this->hasMany(ClinicLabSupplier::class, 'ClinicID');
	}

	public function clinic_lab_works()
	{
		return $this->hasMany(ClinicLabWork::class, 'ClinicID');
	}

	public function clinic_lab_work_components()
	{
		return $this->hasMany(ClinicLabWorkComponent::class, 'ClinicID');
	}
}
