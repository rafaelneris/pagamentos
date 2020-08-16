<?php

namespace App\Domain\Shared\ValueObjects;

use App\Application\Exceptions\InvalidDocumentException;

/**
 * Class Document
 * @package App\Domain\Shared\ValueObjects
 */
final class Document
{
    public const TYPE_CPF = 'cpf';
    public const TYPE_CNPJ = 'cnpj';

    protected string $number;
    protected string $type;

    /**
     * Document constructor.
     * @param string $number
     * @throws \App\Application\Exceptions\InvalidDocumentException
     */
    public function __construct(string $number)
    {
        $this->setNumber($number);

        if (self::isValidCpf($number)) {
            $this->setTypeCpf();

            return;
        }

        if (self::isValidCnpj($number)) {
            $this->setTypeCnpj();

            return;
        }

        throw new InvalidDocumentException($number);
    }

    /**
     * @return string
     */
    public function getNumber(): string
    {
        return $this->number;
    }

    /**
     * @return string
     */
    public function getNumberMasked(): string
    {
        if ($this->isTypeCpf()) {
            return sprintf(
                '%s.%s.%s-%s',
                substr($this->getNumber(), 0, 3),
                substr($this->getNumber(), 3, 3),
                substr($this->getNumber(), 6, 3),
                substr($this->getNumber(), 9, 2)
            );
        }

        return sprintf(
            '%s.%s.%s/%s-%s',
            substr($this->getNumber(), 0, 2),
            substr($this->getNumber(), 2, 3),
            substr($this->getNumber(), 5, 3),
            substr($this->getNumber(), 8, 4),
            substr($this->getNumber(), 12, 2)
        );
    }

    /**
     * @param string $number
     */
    private function setNumber(string $number): void
    {
        $this->number = $number;
    }

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    private function setTypeCpf(): void
    {
        $this->type = self::TYPE_CPF;
    }

    /**
     * @return void
     */
    private function setTypeCnpj(): void
    {
        $this->type = self::TYPE_CNPJ;
    }

    /**
     * @return bool
     */
    public function isTypeCpf(): bool
    {
        return self::TYPE_CPF === $this->getType();
    }

    /**
     * @return bool
     */
    public function isTypeCnpj(): bool
    {
        return self::TYPE_CNPJ === $this->getType();
    }

    /**
     * @param string|null $number
     * @return bool
     * @throws \App\Application\Exceptions\InvalidDocumentException
     */
    public static function isValidCpf(?string $number): bool
    {
        self::verifyIsNull($number);

        $number = self::filterNumbers($number);

        if (strlen($number) != 11) {
            return false;
        }

        if (filter_var($number, FILTER_VALIDATE_REGEXP, ['options' => ['regexp' => '/(\d)\1{10}/']]) !== false) {
            return false;
        }

        $sum = [];
        for ($i = 0, $j = 10; $i < 9; $i++, $j--) {
            $sum[] = $number[$i] * $j;
        }

        $rest = array_sum($sum) % 11;
        $digit1 = $rest < 2 ? 0 : 11 - $rest;

        if ($number[9] != $digit1) {
            return false;
        }

        $sum = [];
        for ($i = 0, $j = 11; $i < 10; $i++, $j--) {
            $sum[] = $number[$i] * $j;
        }

        $rest = array_sum($sum) % 11;
        $digit2 = $rest < 2 ? 0 : 11 - $rest;

        return $number[10] == $digit2;
    }

    /**
     * @param string|null $number
     * @return bool
     * @throws \App\Application\Exceptions\InvalidDocumentException
     */
    public static function isValidCnpj(?string $number): bool
    {
        self::verifyIsNull($number);

        $number = preg_replace("/[^0-9]/", "", $number);

        if (strlen($number) != 14) {
            return false;
        }

        if (filter_var($number, FILTER_VALIDATE_REGEXP, ['options' => ['regexp' => '/(\d)\1{13}/']]) !== false) {
            return false;
        }

        for ($i = 0, $j = 5, $sum = 0; $i < 12; $i++) {
            $sum += $number[$i] * $j;
            $j = ($j == 2) ? 9 : $j - 1;
        }

        $rest = $sum % 11;

        if ($number[12] != ($rest < 2 ? 0 : 11 - $rest)) {
            return false;
        }

        for ($i = 0, $j = 6, $sum = 0; $i < 13; $i++) {
            $sum += $number[$i] * $j;
            $j = ($j == 2) ? 9 : $j - 1;
        }

        $rest = $sum % 11;

        return $number[13] == ($rest < 2 ? 0 : 11 - $rest);
    }

    /**
     * @param string $number
     * @throws \App\Application\Exceptions\InvalidDocumentException
     */
    private static function verifyIsNull($number) {
        if (is_null($number)) {
            throw new InvalidDocumentException();
        }
    }

    /**
     * @param string $document
     * @return string|string[]|null
     */
    private static function filterNumbers($document)
    {
        return preg_replace("/[^0-9]/", "", $document);
    }
}
