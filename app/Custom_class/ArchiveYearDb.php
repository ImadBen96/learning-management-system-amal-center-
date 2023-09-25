<?php


namespace App\Custom_class;


class ArchiveYearDb
{
    public $thus = 0;
    public $year = ["currentYear" => 1 ] ;

    /**
     * @return int
     */
    public  function incrementYear(): int
    {
        $this->thus++ ;
        return $this->thus ;
    }
}
