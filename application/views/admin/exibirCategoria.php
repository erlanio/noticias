<div class="container lista-categoria">
    <div class="row">       
        <div class="row col-xs-offset-0 col-xs-12 col-md-12">
            <table class="table lista">
                <thead class="lista-topo">
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>                        
                        <th>Editar</th>
                        <th>Apagar</th>

                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($categoria as $data) { ?>

                        <tr>
                            <th><?php echo $data->id_categoria ?></th>
                            <th><?php echo $data->nome_categoria ?></th>                         
                            <th><a href="#" onclick="editarCategoria('<?php echo $data->id_categoria; ?>', '<?php echo $data->nome_categoria ?>');"><i class='glyphicon glyphicon-edit'></i></a></th>
                            <th><a href="#" onclick="apagarCategoria(<?php echo $data->id_categoria; ?>);"><i class="glyphicon glyphicon-trash"></i></a></th>
                                <?php } ?>
                </tbody>
            </table>

        </div>
    </div>

</div>
