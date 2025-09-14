<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

/**
 * Class DWSConfigGalleryAlbumsFile
 * 
 * @property string $AlbumFileID
 * @property string|null $GalleryAlbumID
 * @property string|null $FileName
 * @property Carbon|null $UploadedOn
 * @property string|null $FileUploadedNameAs
 * 
 * @property DWSCofigGalleryAlbum|null $d_w_s_cofig_gallery_album
 *
 * @package App\Models
 */
class DWSConfigGalleryAlbumsFile extends Model
{
	protected $table = 'DWS_Config_GalleryAlbums_Files';
	protected $primaryKey = 'AlbumFileID';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'UploadedOn' => 'datetime'
	];

	protected $fillable = [
		'GalleryAlbumID',
		'FileName',
		'UploadedOn',
		'FileUploadedNameAs'
	];

	protected static function boot()
	{
		parent::boot();
		static::creating(function ($model) {
			if (empty($model->AlbumFileID)) {
				$model->AlbumFileID = (string) Str::uuid(); // Auto-generate UUID
			}
		});
	}

	protected function id(): Attribute
    {
		return Attribute::make(
        	get: fn (mixed $value, array $attributes) => $attributes['AlbumFileID'],
		);
    }

	public function d_w_s_cofig_gallery_album()
	{
		return $this->belongsTo(DWSCofigGalleryAlbum::class, 'GalleryAlbumID');
	}
}
