<div class="container pagina">
    <div class="row col-xs-12 col-md-12 col-xs-offset-0"><h1>Administrar Notícias</h1></div>   

    <div class="row  col-xs-10 col-md-12">

        <table class="table table-hover lista">
            <thead class="table table-hover lista-topo">
                <tr>
                    <th>ID</th>
                    <th>Título</th>                        
                    <th>Autor</th>
                    <th>Data</th>
                    <th>Publicado</th>
                    <th>Editar</th>
                    <th>Apagar</th>

                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($noticia as $data) {
                    $date = $data->data_publicacao;
                    $dataconvert = data_br($date);
                    $ativo = $data->flAtivo;
                    ?>

                    <tr>
                        <th><?php echo $data->id_noticia ?></th>
                        <th><?php echo $data->titulo ?></th>                         
                        <th><?php echo $data->nome ?></th>  
                        <th><?php echo $dataconvert ?></th> 
                        <?php
                        if ($ativo == 0) {
                            $ativo = "Desativado";
                            echo "<th class='danger'>$ativo</th>";
                        } else if ($ativo == 1) {
                            $ativo = "Ativo";
                            echo "<th class='success'>$ativo</th>";
                        }
                        ?>

                        <th><a href="<?php echo base_url('admin/noticia/editarNoticia/' . $data->id_noticia); ?>"><i class='glyphicon glyphicon-edit'></i></a></th>
                        <th><a href="#" onclick="apagarNoticia(<?php echo $data->id_noticia; ?>);"><i class="glyphicon glyphicon-remove"></i></a></th>
                    <?php } ?>
            </tbody>
        </table>
        <div class="row col-md-12">
            <?php echo $paginacao; ?>
        </div>

    </div>
</div>
