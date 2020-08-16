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
    /**
     * @return void
     */
    public static function bootUuid(): void
    {
        static::creating(function ($model) {
            $model->uuid = Uuid::uuid4();
        });
    }
}
