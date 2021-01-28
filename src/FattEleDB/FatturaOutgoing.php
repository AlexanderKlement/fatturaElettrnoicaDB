<?php

namespace FattEleDB;

use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;
use RuntimeException;

/** @ODM\Document */
class FatturaOutgoing extends Fattura
{
    public static function getOneBySdiId($id): ?FatturaOutgoing
    {
        global $dm;
        $temp =  $dm->getRepository(FatturaOutgoing::class)->findOneBy(["id_sdi" => $id]);
        if($temp instanceof FatturaOutgoing || $temp == null){
            return $temp;
        }
        throw new RuntimeException("Expected OutgoingFattura, but got something else");
    }
}