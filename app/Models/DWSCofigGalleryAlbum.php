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
 * Class DWSCofigGalleryAlbum
 * 
 * @property string $GalleryAlbumID
 * @property string|null $ClinicWebSiteID
 * @property string|null $AlbumName
 * @property string|null $AlbumDescription
 * @property string|null $AlbumTypeID
 * @property bool|null $IsDeleted
 * @property Carbon|null $CreatedOn
 * @property string|null $CreatedBy
 * @property Carbon|null $LastUpdatedOn
 * @property string|null $LastUpdatedBy
 * 
 * @property DWSConfigWebsite|null $d_w_s_config_website
 * @property Collection|DWSConfigGalleryAlbumsFile[] $d_w_s_config_gallery_albums_files
 *
 * @package App\Models
 */
class DWSCofigGalleryAlbum extends Model
{
	protected $table = 'DWS_Cofig_GalleryAlbums';
	protected $primaryKey = 'GalleryAlbumID';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'IsDeleted' => 'bool',
		'CreatedOn' => 'datetime',
		'LastUpdatedOn' => 'datetime'
	];

	protected $fillable = [
		'ClinicWebSiteID',
		'AlbumName',
		'AlbumDescription',
		'AlbumTypeID',
		'IsDeleted',
		'CreatedOn',
		'CreatedBy',
		'LastUpdatedOn',
		'LastUpdatedBy'
	];

	protected static function boot()
	{
		parent::boot();
		static::creating(function ($model) {
			if (empty($model->GalleryAlbumID)) {
				$model->GalleryAlbumID = (string) Str::uuid(); // Auto-generate UUID
			}
		});
	}

	protected function id(): Attribute
    {
		return Attribute::make(
        	get: fn (mixed $value, array $attributes) => $attributes['GalleryAlbumID'],
		);
    }

	public function d_w_s_config_website()
	{
		return $this->belongsTo(DWSConfigWebsite::class, 'ClinicWebSiteID');
	}

	public function d_w_s_config_gallery_albums_files()
	{
		return $this->hasMany(DWSConfigGalleryAlbumsFile::class, 'GalleryAlbumID');
	}
}
