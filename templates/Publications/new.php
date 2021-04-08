<?php 

echo $this->Form->create($new);
echo '<h1>Créer une nouvelle publication</h1>';

echo $this->Form->control('title', ['label' => 'Titre de la publication'], ['placeholder' => 'Ex: le super titre']);
echo $this->Form->control('content', ['label' => 'Contenu']);
echo $this->Form->control('author', ['label' => "Nom de l'auteur"]);
echo $this->Form->button('Ajouter');