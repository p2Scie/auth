<?php
namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;


class CommentsTable extends Table {
    public function initialize(array $c) :void{
        parent::initialize($c);

        //précise que le système doit gérer tout seul les colonnes created et modified
        $this->addBehavior('Timestamp');

        $this->belongsTo('Publications', [
            'foreignKey' => 'publication_id',
            'joinType' => 'INNER'
        ]);
    }

    public function validationDefault(Validator $v) : Validator {
        $v->maxLength('author', 50)
            ->notEmptyString('author')

            ->notEmptyString('content');

            return $v;
    }
}