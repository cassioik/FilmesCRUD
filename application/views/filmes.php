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
            echo form_open('filmes/cadastrar');
            echo '<h3>Cadastrar Filme</h3>';

            echo '<div>';
            echo form_label('Titulo', 'titulo');
            echo '<div>'.form_input(array('name'=>'titulo')).'</div>';
            echo '</div>';
            
            echo '<div>';
            echo form_label('Ano', 'ano');
            echo '<div>'.form_input(array('name'=>'ano')).'</div>';
            echo '</div>';

            echo form_submit('cadastrar', 'Cadastrar');
            echo form_close();
        ?>
    </div>
    
    <hr>
    
    <div>
        <h3>Lista de Filmes:</h3>
        <table border="1">
            <tr><td>Ano</td><td>Título</td><td>Ação</td></tr>
            <?php
                $filmes = $this->filmes_model->get_all()->result();
                foreach ($filmes as $f) {
                    echo "<tr><td>". $f->ano ."</td><td>". $f->titulo ."</td><td>". anchor('/filmes/editar/'.$f->id, 'Editar') ." - ". anchor('/filmes/excluir/'.$f->id, 'Excluir') ."</td></tr>"; 
                }
            ?>
        </table>
    </div>
    
</div>

</body>
</html>