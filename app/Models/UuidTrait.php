<?php

namespace App\Model;

use Ramsey\Uuid\Uuid;

/**
 * Trait UuidTrait
 * @package App\Model
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
