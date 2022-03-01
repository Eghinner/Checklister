<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\Models\Media;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;

class Task extends Model implements HasMedia
{
    use HasFactory, SoftDeletes, HasMediaTrait;

    protected $fillable = ['checklist_id', 'name', 'description', 'position'];

    public function registerMediaConversions(Media $media = null): void
    {
       $this->addMediaConversion('thumb')
          ->width(600);
    }
}
