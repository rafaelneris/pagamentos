<?php

namespace App\Infrastructure\Models;

use Ramsey\Uuid\Uuid;

/**
 * Trait UuidTrait
 * @package App\Infrastructure\Models
 * @author Rafael Neris
 */
trait UuidTrait
{
    public static function bootUuid()
    {
        static::creating(function ($model) {
            $model->uuid = Uuid::uuid4();
        });
    }
}
