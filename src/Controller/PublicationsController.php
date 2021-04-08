<?php
namespace App\Controller;

class PublicationsController extends AppController {
    public function index() {
        //recupérer toutes les lignes de la tables
        $t = $this->Publications->find('all', ['contain'
        => ['Comments']]);

        //transmettre la variables à la vue
        $this->set(compact('t'));

        // $autreVariable = 42;

        // $this->set('z', $autreVariable);
    }

    public function byauthor($a = null) {
        if(empty($a)){
            return $this->redirect(['action' => 'index']);
        }

        $t = $this->Publications->findByAuthor($a)->contain(['Comments']);

        $this->set(compact(['a', 't']));
    }

    public function show($id = null) {
    

        if(empty($id)) {
            return $this->redirect(['action' => 'index']);
        }
        
        
        //find donne un ensemble de résultat
        //pour avoir le premier résultat, on applique la methode first()
        $pub = $this->Publications->findById($id)->contain(['Comments']);

        //le ->isEmpty() ne s'applique que sur les objects Query (fund())
        if($pub->isEmpty()){
            $this->Flash->error('Cette publication n\'existe pas.');
            return $this->redirect(['action' => 'index']);
        }

        $pub = $pub->first();

        $this->set(compact('pub'));

        //on charge le model de commentaire pour pouvoir lui créer une entité
        $this->loadModel('Comments');
        $newComm = $this->Comments->newEmptyEntity();
        $this->set(compact('newComm'));
    }

    public function new () {
        $new = $this->Publications->newEmptyEntity();

        //si on a recup le formulaire
        if($this->request->is('post')) {
            //on prend les données du formulaire et on les place dans l'entity
            $new = $this->Publications->patchEntity($new, $this->request->getData());
            //on tente la sauvegarde
            if($this->Publications->save($new)){
                //message de confirmation
                $this->Flash->success('Annonce sauvegardé !');

                //on redirige vers l apage d'accueil
                return $this->redirect(['action' => 'index']);
            } //fin test sauvegarde

            //message d'erreur
            $this->Flash->error('Sauvegarde impossible, essaie encore');

        }// fin recup form

         $this->set(compact('new'));
    }

    public function update($id = null) {
        if(empty($id)) {
            return $this->redirect(['action' => 'index']);
        }

        $pub = $this->Publications->findById($id);

        if($pub->isEmpty()) {
            $this->Flash->error('Cette publication nexiste pas');
            return $this->redirect(['action' => 'index']);
        }

        $pub = $pub->first();

        //si on est en post
        if($this->request->is(['post', 'put', 'patch'])) {
            $this->Publications->patchEntity($pub,
            $this->request->getData());


            if($this->Publications->save($pub)){
                $this->Flash->success('Modifié');
                return $this->redirect(['action' => 'show', $id]);
            }
            $this->Flash->error('Impossible de modifier');
        }

        $this->set(compact('pub'));
    }

}