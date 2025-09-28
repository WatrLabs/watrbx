<?php

namespace watrlabs;

class pagination {

    // TODO

    private $limit;
    private $currentpage;
    private $table;
    private $query;
    private $count;
    private $pagecount;

    public function setLimit(int $limit){
        $this->limit = $limit;
    }

    public function setTable(string $table){
        global $db;

        $this->table = $table;
        $this->query = $db->table($table);
        $this->count = $this->query->count();

        return $this->query;
    }

    public function setPage(int $page){
        $this->currentpage = $page;
    }

    public function getQuery(){
        return $this->query;
    }

    public function setQuery($query){
        $this->query = $query;
    }

    public function getAllPages(){   
        $allpages = ceil($this->count / $this->limit);

        return $allpages;
    }

    public function setCount(){
        $this->count = $this->query->count();
    }

    public function getOffset(){   
        $tempage = $this->currentpage - 1;
        $offset = $temppage * $this->limit;

        return $offset;
    }

    public function getResult(){
        $temppage = $this->currentpage - 1;
   
        $allpages = ceil($this->count / $this->limit);
        $offset = $temppage * $this->limit;

        $this->pagecount = $allpages;

        $this->query->limit($this->limit);
        $this->query->offset($offset);

        return $this->query->get();
    }


}