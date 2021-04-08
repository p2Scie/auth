<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

class Publication extends Entity {
    #precise quelles colonnes de la base peuvent être modifiées
    protected $_accessible = [
        '*' => true,
        'id' => false
    ];
}