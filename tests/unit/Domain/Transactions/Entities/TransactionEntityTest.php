<?php

namespace Tests\Unit\Domain\Transactions\Entities;

use App\Entities\Transactions\TransactionEntity;
use Tests\TestCase;

/**
 * Class TransactionEntityTest
 * @package Tests\unit\Domain\Transactions\Entities
 * @author Rafael Neris <rafaelnerisdj@gmail.com>
 */
class TransactionEntityTest extends TestCase
{
    /** @var \App\Entities\Transactions\TransactionEntity|\Illuminate\Contracts\Foundation\Application|mixed */
    private TransactionEntity $entity;

    public function setUp(): void
    {
        parent::setUp();
        $this->entity = app(TransactionEntity::class);
    }

    public function testSetAndGetId()
    {
        $uuId = '4b44bd98-fffa-4dcc-aef2-3f62180f9069';
        $this->entity
            ->setId($uuId);
        $this->assertEquals($uuId, $this->entity->getId());
    }

    public function testSetAndGetPayer()
    {
        $uuId = '4b44bd98-fffa-4dcc-aef2-3f62180f90333';
        $this->entity
            ->setPayer($uuId);
        $this->assertEquals($uuId, $this->entity->getPayer());
    }

    public function testSetAndGetPayee()
    {
        $uuId = '4b44bd98-fffa-4dcc-aef3-3f62180f90333';
        $this->entity
            ->setPayee($uuId);
        $this->assertEquals($uuId, $this->entity->getPayee());
    }

    public function testSetAndGetValue()
    {
        $uuId = 10.33;
        $this->entity
            ->setValue($uuId);
        $this->assertEquals($uuId, $this->entity->getValue());
    }
}
