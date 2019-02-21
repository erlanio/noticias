<div class="container pagina">
    <h1>Estátisticas</h1>
    <div class="row">       
        <div class="row col-xs-offset-0 col-xs-12 col-md-6 ">

            <table class="table table-condensed table-bordered lista">
                <h3>Últimas Notícias Publicadas</h3>
                <thead class="lista-topo">
                    <tr>
                        <th>Título</th>                        

                        <th class="col-xs-3">Data</th>
                        <th >Acessos</th>

                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($noticia as $data) {
                        $date = $data->data_publicacao;
                        $dataconvert = data_br($date);
                        $data->data_publicacao = date('y-m-d', strtotime(str_replace('/', '-', $data->data_publicacao))); //sobrescrevendo a variável
                        ?>

                        <tr>
                            <th><?php echo $data->titulo; ?></th>                         
                            <th><?php echo $dataconvert; ?></th>
                            <th><?php echo $data->num_acessos; ?></th>

                        <?php } ?>
                </tbody>
            </table>

            <table class="table table-condensed table-bordered lista">
                <h3>Top Acessos</h3>
                <thead class="lista-topo">
                    <tr>

                        <th>Título</th> 
                        <th>Data da Publicação</th> 
                        <th>Acessos</th> 
                    </tr>
                </thead>                             
                <?php
                foreach ($topAcessos as $data) {
                    $date = $data->data_publicacao;
                    $dataconvert = data_br($date);
                    $data->data_publicacao = date('y-m-d', strtotime(str_replace('/', '-', $data->data_publicacao))); //sobrescrevendo a variável
                    ?>                   
                    <tbody>  

                    <th><?php echo $data->titulo; ?></th>
                    <th class="col-md-3"><?php echo $dataconvert; ?></th>
                    <th><?php echo $data->num_acessos; ?></th>

                    </tbody>
                <?php } ?>
            </table>

        </div>


        <div class="row col-xs-offset-0 col-xs-12 col-md-6">

            <table class="table table-condensed table-bordered lista">
                <h3>Total de Acessos: </h3>
                <thead class="lista-topo">
                    <tr>
                        <th>Total de Acessos</th>                        
                        <th >Acessos de Hoje</th>

                    </tr>

                </thead>
                <tbody>
                    <?php
                    foreach ($num_acessos_dia as $data) {
                        $acessosDia = $data->num_acessos;
                    }
                    ?>

                    <?php
                    foreach ($num_acessos_total as $data) {
                        $total_acessos = $data->num_acessos;
                    }
                    ?>

                <th><?php echo $total_acessos; ?></th>
                <th><?php echo $acessosDia; ?></th>

                </tbody>
            </table>

            <table class="table table-condensed table-bordered lista">
                <thead class="lista-topo">
                    <tr>
                        <th>Total de Notícias Publicadas</th>                                               
                    </tr>

                </thead>
                <tbody>                
                <th><?php echo $totalNoticiasPublicadas; ?></th>
                </tbody>
            </table>

            <table class="table table-condensed table-bordered lista">
                <thead class="lista-topo">
                    <tr>
                        <th>Categorias</th> 
                    </tr>
                </thead>                             
                <?php foreach ($totalNoticiasCategoria as $data) { ?>                   
                    <tbody>                
                    <th><?php echo $data->nome_categoria; ?></th>

                    </tbody>
                <?php } ?>
            </table>

            <table class="table table-condensed table-bordered lista">
                <thead class="lista-topo">
                    <tr>
                        <th>Nome</th>
                        <th>Assunto</th> 
                        <th>Ver Mensagem</th>
                    </tr>
                </thead>                             
                <?php foreach ($mensagem as $data) {                    
                    ?>                   
                    <tbody>  
                    
                    <th><?php echo $data->nome; ?></th>
                    <th><?php echo $data->assunto; ?></th>
                    <th> <a href="#"><i class="glyphicon glyphicon-check"></a></i></th>
                    </tbody>
<?php } ?>
            </table>



        </div>
    </div>
</div>