<?php

namespace FattEleDB;

class Response
{
    /** @ODM\Id */
    private string $id;

    /** @ODM\Field(type="string") */
    private string $response_id_sdi;

    /** @ODM\Field(type="string") */
    private string $date;

    /** @ODM\Field(type="string") */
    private string $path;

    /** @ODM\Field(type="string") */
    private string $type;
}