<?php
include_once 'model/Products.php';

class Categories extends Products
{
    protected $categorie_id;


    /**
     * Get the value of categorie_id
     */
    public function getCategorie_id()
    {
        return $this->categorie_id;
    }

    /**
     * Set the value of categorie_id
     *
     * @return  self
     */
    public function setCategorie_id($categorie_id)
    {
        $this->categorie_id = $categorie_id;

        return $this;
    }
}
