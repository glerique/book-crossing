<?php

namespace App\Lib;

class Pagination
{
    private $total;
    private $perPage;
    private $currentPage;

    public function __construct($total, $currentPage)

    {

        $this->total = $total;
        $this->perPage = 50;
        $this->currentPage = $currentPage;
    }

    public function getPerPage()
    {

        return $this->perPage;
    }

    public function getCurrentPage()
    {

        return $this->currentPage;
    }

    public function getPages()
    {

        $pages = ceil($this->total / $this->perPage);

        return $pages;
    }
}
