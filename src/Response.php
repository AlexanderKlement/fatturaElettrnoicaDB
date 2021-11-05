<?php

namespace FattEleDB;

use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;

/** @ODM\Document */
class Response
{
    /** @ODM\Id */
    private ?string $id = null;

    /** @ODM\Field(type="string") */
    private string $date;

    /** @ODM\Field(type="string") */
    private string $path;

    /** @ODM\Field(type="string") */
    private string $type;

    /** @ODM\ReferenceOne(targetDocument=Fattura::class, inversedBy="responses") */
    private Fattura $fattura;

    /**
     * @return string
     */
    public function getDate(): string
    {
        return $this->date;
    }

    /**
     * @param string $date
     */
    public function setDate(string $date): void
    {
        $this->date = $date;
    }

    /**
     * @return string
     */
    public function getPath(): string
    {
        return $this->path;
    }

    /**
     * @param string $path
     */
    public function setPath(string $path): void
    {
        $this->path = $path;
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
     */
    public function setType(string $type): void
    {
        $this->type = $type;
    }

    /**
     * @return Fattura
     */
    public function getFattura(): Fattura
    {
        return $this->fattura;
    }

    /**
     * @param Fattura $fattura
     */
    public function setFattura(Fattura $fattura): void
    {
        $this->fattura = $fattura;
    }

}