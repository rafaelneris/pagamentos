<?php

namespace App\Entities\Users;

use App\Contracts\Users\Entities\UserEntityInterface;
use App\Domain\Shared\ValueObjects\Document;
use App\Domain\Shared\ValueObjects\Email;

/**
 * Class UserEntity
 * @package App\Entities
 * @author Rafael Neris <rafaelnerisdj@gmail.com>
 */
class UserEntity implements UserEntityInterface
{
    /** @var string|null */
    private ?string $id = null;

    /** @var string */
    private ?string $name = null;

    /** @var \App\Domain\Shared\ValueObjects\Document  */
    private ?Document $document = null;

    /** @var \App\Domain\Shared\ValueObjects\Email  */
    private ?Email $email = null;

    /** @var string  */
    private ?string $type = null;

    /**
     * @return string|null
     */
    public function getId(): ?string
    {
        return $this->id;
    }

    /**
     * @param string|null $id
     * @return UserEntity
     */
    public function setId(?string $id): UserEntity
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return UserEntity
     */
    public function setName(string $name): UserEntity
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return string
     */
    public function getDocument(): string
    {
        return $this->document->getNumber();
    }

    /**
     * @param string $document
     * @return \App\Entities\Users\UserEntity
     * @throws \App\Exceptions\InvalidDocumentException
     */
    public function setDocument(string $document): UserEntity
    {
        $this->document = new Document($document);
        return $this;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email->getValue();
    }

    /**
     * @param string $email
     * @return \App\Entities\Users\UserEntity
     * @throws \App\Exceptions\InvalidEmailException
     */
    public function setEmail(string $email): UserEntity
    {
        $this->email = new Email($email);
        return $this;
    }

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @param string $type
     * @return UserEntity
     */
    public function setType(string $type): UserEntity
    {
        $this->type = $type;
        return $this;
    }
}
