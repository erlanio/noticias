<div class="container pagina">
    <div class="row col-xs-12 col-md-12 col-xs-offset-0"><h1>Administrar Mensagens</h1></div>
    <div class="row col-xs-12">
        <table class="table lista">
            <thead class="lista-topo">
                <tr>
                    <th>Nome</th>
                    <th>Email</th>                        
                    <th>Data</th>
                    <th>Assunto</th>
                    <th>Visualizar Mensagem</th>                   
                    <th>Apagar</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($mensagem as $data) {
                     $date = $data->data_envio;
                    $dataconvert = data_br($date);
                    ?>
                    <tr>
                        <th><?php echo $data->nome ?></th>
                        <th><?php echo $data->email ?></th>                                                     
                        <th><?php echo $dataconvert ?></th>
                        <th><?php echo $data->assunto ?></th>
                        <th class="info col-md-2"><a href="#" onclick="abrirModal('<?php echo $data->id_mensagem; ?>', '<?php echo $data->nome ?>',  '<?php echo $data->assunto ?>', '<?php echo $data->email ?>','<?php echo $data->mensagem ?>');"><i class="glyphicon glyphicon-eye-open"></i></a></th>                       
                        <th class="danger"><a href="#" onclick="apagarMensagem(<?php echo $data->id_mensagem; ?>);"><i class="glyphicon glyphicon-remove"></i></a></th>
                    <?php } ?>
            </tbody>
        </table>
        <div class="col-md-12">
            <div id="mensagem" class="mensagem success col-md-12"><p></p></div>
        </div>
    </div>

</div>


