<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Pokemon extends Model
{
    use HasFactory;

    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'id',
        'name',
        'species',
        'primary_type' ,
        'weight',
        'height',
        'hp',
        'attack',
        'defense',
        'is_legendary',
        'photo'
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            if (empty($model->id)) {
                $latest = Pokemon::latest('id')->first();
                $nextId = $latest ? ((int)substr($latest->id, -4) + 1) : 1;
                $model->id = 'PR' . date('ymd') . str_pad($nextId, 4, '0', STR_PAD_LEFT);

                $model->updated_at = null;
            }
        });
    }

    protected $append = [
        'photo',
    ];

    public function getPhotoUrlAttribute()
    {
        //Console::info();
        if (filter_var($this->photo, FILTER_VALIDATE_URL)) {
            return $this->photo;
        }

        return $this->photo ? Storage::url($this->photo) : null;


    }
}
