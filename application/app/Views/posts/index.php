<h2>Posts</h2>
<ul>
<?php foreach ($posts as $post): ?>
    <li>
        <strong><?= $post->title ?></strong><br>
        <?= $post->description ?><br>
        <a href="/posts/show/<?= $post->id ?>">Ver</a> |
        <a href="/posts/edit/<?= $post->id ?>">Editar</a> |
        <a href="/posts/delete/<?= $post->id ?>">Excluir</a>
    </li>
<?php endforeach; ?>
</ul>
<a href="/posts/create">Novo Post</a>
