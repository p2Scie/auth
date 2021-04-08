<?php
namespace App\Controller;

class CommentsController extends AppController {


    public function new () {
    
        $new = $this->Comments->newEmptyEntity();

        if($this->request->is('post')) {

            $new = $this->Comments->patchEntity($new, $this->request->getData());
            //on essaie de le sauvegarder
            if($this->Comments->save($new)) {
                //confirmation
                $this->Flash->success('Commentaire enregistré !');
            } 
            
            //erreur
            $this->Flash->error("Impossible d'enregistrer le commentaire");
            
        } 

        //redirige vers la publication
        return $this->redirect(['controller' => 'Publications', 'action' => 'show', $new->publication_id]);



    }


}