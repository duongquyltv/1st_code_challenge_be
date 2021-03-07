<?php
namespace App\Traits;

trait Uuid
{
    /**
     * Boot function from laravel.
     */
    protected static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            $id = hexdec(uniqid());
            $model->{$model->getKeyName()} = $id;
        });
    }
}
