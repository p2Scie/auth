<?php  ?>
<p> <?= $a ?> a publiés <?= $t->count() ?> annonce<?= ($t->count() > 1) ? 's' : ''  ?></p>

<section>
    <?php foreach ($t as $pub): ?>
        <article>
            <h1><?= $this->Html->link($pub->title, ['
            controller' => 'Publications', 'action' => 'show', $pub->id]) ?></h1>
            <p class="infos">Ecrit par <?= $pub->author ?>, le <?= $pub->created ?>
            <?= (count($pub->comments) == 0) ? 'Aucun commentaire' : '('.count($pub->comments).' commentaires'.')'; ?>
            </p>
            <p><?= $pub->content ?></p>
        </article>

    <?php endforeach ?>

</section>