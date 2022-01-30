<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Image\Exceptions\InvalidManipulation;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\Models\Media as MediaLibrary;

class Property extends Model implements HasMedia
{
    use HasMediaTrait;
    use HasFactory;

    protected $table = 'properties';
    protected $fillable = [
        'name',
        'property_type',
        'address',
        'district',
        'state',
        'furnish_type',
        'latitude',
        'longitude',
        'build_up_area',
        'description',
        'facilities',
        'bedroom',
        'bathroom',
        'utility_room',
        'maid_room',
        'maid_bathroom',
        'car_parking_lot',
    ];

    /**
     * @param MediaLibrary|null $media
     * @throws InvalidManipulation
     */
    public function registerMediaConversions(MediaLibrary $media = null)
    {
        $this->addMediaConversion('thumb')
            ->height(800);

        $this->addMediaConversion('icon')
            ->height(180)
            ->width(180);
    }
}
