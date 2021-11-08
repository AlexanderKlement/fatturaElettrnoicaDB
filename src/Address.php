<?php

namespace FattEleDB;

use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;
use Exception;
use RuntimeException;

/** @ODM\Document */
class Address
{
    /** @ODM\Id */
    private ?string $id = NULL;

    /** @ODM\Field(type="string") */
    private ?string $street = NULL;

    /** @ODM\Field(type="string") */
    private ?string $houseNumber = NULL;

    /** @ODM\Field(type="string") */
    private ?string $cap = NULL;

    /** @ODM\Field(type="string") */
    private ?string $city = NULL;

    /** @ODM\Field(type="string") */
    private ?string $region = NULL;

    /** @ODM\Field(type="string") */
    private ?string $nation = NULL;

    /**
     * @return string
     */
    public function getStreet(): string
    {
        return $this->street;
    }

    /**
     * @param string $street
     */
    public function setStreet(string $street): void
    {
        $this->street = $street;
    }

    /**
     * @return string|null
     */
    public function getHouseNumber(): ?string
    {
        return $this->houseNumber;
    }

    /**
     * @param string|null $houseNumber
     */
    public function setHouseNumber(?string $houseNumber): void
    {
        $this->houseNumber = $houseNumber;
    }

    /**
     * @return string
     */
    public function getCap(): string
    {
        return $this->cap;
    }

    /**
     * @param string $cap
     */
    public function setCap(string $cap): void
    {
        $this->cap = $cap;
    }

    /**
     * @return string
     */
    public function getCity(): string
    {
        return $this->city;
    }

    /**
     * @param string $city
     */
    public function setCity(string $city): void
    {
        $this->city = $city;
    }

    /**
     * @return string|null
     */
    public function getRegion(): ?string
    {
        return $this->region;
    }

    /**
     * @param string|null $region
     */
    public function setRegion(?string $region): void
    {
        $this->region = $region;
    }

    /**
     * @return string
     */
    public function getNation(): string
    {
        return $this->nation;
    }

    /**
     * @param string $nation
     */
    public function setNation(string $nation): void
    {
        $this->nation = $nation;
    }

}