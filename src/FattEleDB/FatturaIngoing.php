<?php



namespace FattEleDB;

use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;
use RuntimeException;

/**
 * @ODM\Document
 */
class FatturaIngoing extends Fattura
{

    public function __construct(){
        $this->allegati = [];
    }

    /** @ODM\Field(type="hash") */
    private array $allegati;

    /**
     * @return array
     */
    public function getAllegati(): array
    {
        return $this->allegati;
    }

    /**
     * @param array $allegati
     */
    public function setAllegati(array $allegati): void
    {
        $this->allegati = $allegati;
    }

    public static function getOneBySdiId($id): ?FatturaIngoing
    {
        global $dm;
        $temp =  $dm->getRepository(FatturaIngoing::class)->findOneBy(["id_sdi" => $id]);
        if($temp instanceof FatturaIngoing || $temp == null){
            return $temp;
        }
        throw new RuntimeException("Expected IngoingFattura, but got something else");
    }

}