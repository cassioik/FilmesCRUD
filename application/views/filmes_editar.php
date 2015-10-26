<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Filmes</title>

</head>
<body>

<div>
    <h1>Filmes</h1>
    
    <div>
        <?php
            echo form_open('filmes/editar');
            echo '<h3>Cadastrar Filme</h3>';

            echo '<div>';
            echo form_label('Titulo', 'titulo');
            echo '<div>'.form_input('titulo', $titulo).'</div>';
            echo '</div>';
            
            echo '<div>';
            echo form_label('Ano', 'ano');
            echo '<div>'.form_input('ano', $ano).'</div>';
            echo '</div>';
            
            echo form_hidden('id', $id);

            echo form_submit('editar', 'Salvar Editação');
            echo form_close();
            
            echo anchor('/', 'Voltar');
        ?>
    </div>
    
</div>

</body>
</html>