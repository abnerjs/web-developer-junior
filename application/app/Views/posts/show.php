<h2><?= $post->title ?></h2>
<p><?= $post->description ?></p>
<p>Autor: <?= isset($post->user) ? $post->user->name : 'Desconhecido' ?></p>
<a href="/posts/edit/<?= $post->id ?>">Editar</a>
<a href="/posts/delete/<?= $post->id ?>">Excluir</a>
