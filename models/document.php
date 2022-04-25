<?php

class document extends Model
{
    public function __construct()
    {
        // We define the default table of this model
        $this->table = 'document';

        // We open the connection to the database
        $this->getConnection();
    }
}