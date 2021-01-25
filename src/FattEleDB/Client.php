<?php

namespace FattEleDB;

use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;
use Exception;
use Sentry;
use RuntimeException;

/** @ODM\Document  */
class Client
{

    /** @ODM\Id */
    private string $id;

    /** @ODM\Field(type="string") */
    private string $name;

    /** @ODM\Field(type="string") */
    private string $lastname;

    /** @ODM\ReferenceOne(targetDocument=Address::class, cascade={"all"}) */
    private Address $address;

    /** @ODM\Field(type="string") */
    private string $p_iva;

    /** @ODM\Field(type="string") */
    private string $codex;

    /** @ODM\Field(type="string") */
    private string $email;

    /** @ODM\Field(type="string") */
    private string $codice_fiscale;

    /** @ODM\Field(type="string") */
    private string $client_pec;

    /** @ODM\Field(type="string") */
    private string $regime_fiscale;

    /** @ODM\Field(type="int") */
    private int $payment_type;

    /** @ODM\ReferenceMany(targetDocument=Fattura::class, mappedBy="client") */
    private array $fatturas;

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

    /**
     * @return string
     */
    public function getLastname(): string
    {
        return $this->lastname;
    }

    /**
     * @param string $lastname
     */
    public function setLastname(string $lastname): void
    {
        $this->lastname = $lastname;
    }



    /**
     * @return Address
     */
    public function getAddress(): Address
    {
        return $this->address;
    }

    /**
     * @param Address $address
     */
    public function setAddress(Address $address): void
    {
        $this->address = $address;
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
    public function getCodex(): string
    {
        return $this->codex;
    }

    /**
     * @param string $codex
     */
    public function setCodex(string $codex): void
    {
        $this->codex = $codex;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @param string $email
     */
    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    /**
     * @return string
     */
    public function getCodiceFiscale(): string
    {
        return $this->codice_fiscale;
    }

    /**
     * @param string $codice_fiscale
     */
    public function setCodiceFiscale(string $codice_fiscale): void
    {
        $this->codice_fiscale = $codice_fiscale;
    }

    /**
     * @return string
     */
    public function getClientPec(): string
    {
        return $this->client_pec;
    }

    /**
     * @param string $client_pec
     */
    public function setClientPec(string $client_pec): void
    {
        $this->client_pec = $client_pec;
    }

    /**
     * @return string
     */
    public function getRegimeFiscale(): string
    {
        return $this->regime_fiscale;
    }

    /**
     * @param string $regime_fiscale
     */
    public function setRegimeFiscale(string $regime_fiscale): void
    {
        $this->regime_fiscale = $regime_fiscale;
    }

    /**
     * @return int
     */
    public function getPaymentType(): int
    {
        return $this->payment_type;
    }

    /**
     * @param int $payment_type
     */
    public function setPaymentType(int $payment_type): void
    {
        $this->payment_type = $payment_type;
    }

    public static function getByIva(string $iva):?Client
    {
        global $dm;
        $temp =  $dm->getRepository(Client::class)->findOneBy(["p_iva" => $iva]);
        if($temp instanceof Client ||$temp == null){
            return $temp;
        } else{
            Sentry\captureMessage("Unable to get Client from ClientRepository");
            throw new RuntimeException("Unable to get Client from ClientRepository");
        }
    }
}