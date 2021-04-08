<?php ?>

<article>

        <article>
            <h1><?= $pub->title ?></h1>
            <p class="infos">Ecrit par <?= $pub->author ?>, le <?= $pub->created ?></p>
            <p><?= $pub->content ?></p>
            <?= $this->Html->link('Modifier', ['action' => 'update', $pub->id]) ?>
        </article>

        <aside>
            <h1>Commentaires (<?= count($pub->comments) ?>)</h1>
            <?php foreach ($pub->comments as $c): ?>
                <article style="border: 1px solid; border-radius: 4px; padding: 20px; margin-bottom: 20px">
                    <p class="infos">Ecrit par <?= $c->author ?>, le <?= $c->created ?>
                    </p>
                    <p><?= $c->content ?></p>
                </article>
            <?php endforeach ?>

            <?= $this->Form->create($newComm, ['url' => ['controller' => 'Comments', 'action' => 'new']]) ?>
                <h1>Ajouter un commentaire</h1>
                <?= $this->Form->hidden('publication_id', ['value' => $pub->id]) ?>
                <?= $this->Form->control('content', ['label' => 'Votre commenaitre']) ?>
                <?= $this->Form->control('author', ['label' => 'Votre nom']) ?>
                <?= $this->Form->button('Ajouter') ?>
            <?= $this->Form->end() ?>
        </aside>



    
</article>