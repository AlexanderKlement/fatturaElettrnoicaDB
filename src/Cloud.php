<?php

namespace FattEleDB;

use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;
use Doctrine\ODM\MongoDB\PersistentCollection;
use RuntimeException;

/** @ODM\Document */
class Cloud
{
    /** @ODM\Id */
    private string $id;

    /** @ODM\Field(type="string") */
    private string $url;

    /** @ODM\Field(type="string") */
    private string $p_iva;

    /** @ODM\Field(type="string") */
    private string $codice_destinatario;

    /** @ODM\Field(type="string") */
    private string $name;

    /** @ODM\ReferenceMany(targetDocument=Fattura::class, mappedBy="cloud") */
    private PersistentCollection $fatturas;

    //TODO: add users here

    /**
     * @return string
     */
    public function getUrl(): string
    {
        return $this->url;
    }

    /**
     * @param string $url
     */
    public function setUrl(string $url): void
    {
        $this->url = $url;
    }

    /**
     * @return string
     */
    public function getPIva(): string
    {
        return $this->p_iva;
    }

    /**
     * @param string $p_iva
     */
    public function setPIva(string $p_iva): void
    {
        $this->p_iva = $p_iva;
    }

    /**
     * @return string
     */
    public function getCodiceDestinatario(): string
    {
        return $this->codice_destinatario;
    }

    /**
     * @param string $codice_destinatario
     */
    public function setCodiceDestinatario(string $codice_destinatario): void
    {
        $this->codice_destinatario = $codice_destinatario;
    }

    public static function getByPIva(string $piva){
        global $dm;
        $temp = $dm->getRepository(Cloud::class)->findOneBy(["p_iva" => $piva]);
        if($temp == NULL)
        {
            $temp = new Cloud();
            $temp->setPIva($piva);
            $temp->setUrl("");
            $dm->persist($temp);
        }
        if($temp instanceof Cloud)
            return $temp;
        throw new RuntimeException('This is not an instance of Value');
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
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function validate() {
        return strlen($this->getUrl()) > 0;
    }




}