<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Entity
 *
 * @author Micka
 */
abstract class Entity {

    protected $erreur = [];

    protected function __construct($data = NULL) {
        if (is_array($data)) {
            $this->hydrate($data);
        }
    }
    
    public function addErreur($erreur){
        $this->erreur = $erreur;
    }

    protected function hydrate(array $data) {
        foreach ($data as $key => $value) {
            $method = 'set' . ucfirst($key);
            if (method_exists($this, $method)) {
                $this->$method($value);
            }
        }
    }

}
