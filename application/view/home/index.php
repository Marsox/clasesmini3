<?php $this->layout('layouts/layout') ?>

<div class="container">
    <h1>Home</h1>
    <h2>Tu estás en la vista: application/view/home/index.php (everything in the box comes from this file)</h2>
    <p>Esta es la página principal.</p>
    <p><h1>POR FIN HE LLEGADO!!!!!</h1></p>
    <p><?= $titulo ?></p>
</div>

<?php $this->insert('partials/banner', ['dato' => 'Este dato es sólo del banner']) ?>
