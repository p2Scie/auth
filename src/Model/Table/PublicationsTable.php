<?php
namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;


class PublicationsTable extends Table {
    public function initialize(array $c) :void{
        parent::initialize($c);

        //précise que le système doit gérer tout seul les colonnes created et modified
        $this->addBehavior('Timestamp');

        $this->hasMany('Comments', [
            'foreignKey' => 'publication_id',
            'joinType' => 'INNER'
        ]);
    }

    public function validationDefault(Validator $v) : Validator {
        $v->maxLength('title', 100)
            ->notEmptyString('title')

            ->maxLength('author', 50)
            ->notEmptyString('author')

            ->notEmptyString('content');

            return $v;
    }
}