<div class="container pagina">
    <div class="row col-xs-12 col-md-12 col-xs-offset-0"><h1>Usuários</h1></div>
    <div class="row col-xs-8 col-xs-offset-2">
        <table class="table lista">
            <thead class="lista-topo">
                <tr>
                    <th>ID</th>
                    <th>Nome</th>                        
                    <th>Email</th>
                    <th>Nível de Usuário</th>
                    <th>Ativo</th>
                    <th>Editar</th>
                    <th>Excluir</th>

                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($usuario as $data) {
                    $nivel = $data->nivel_usuario;
                    $ativo = $data->flativo;
                    if ($nivel == 1) {
                        $nivel = "Super Administrador";
                    } else if ($nivel == 2) {
                        $nivel = "Administrador";
                    } else if ($nivel == 3) {
                        $nivel = "Editor";
                    }
                    ?>



                    <tr>
                        <th><?php echo $data->id_usuario ?></th>
                        <th><?php echo $data->nome ?></th>                                                     
                        <th><?php echo $data->email ?></th>
                        <th><?php echo $nivel ?></th>
                        <?php
                        if ($ativo == 0) {
                            $ativo = "Desativado";
                            echo "<th class='danger'>$ativo</th>";
                        } else if ($ativo == 1) {
                            $ativo = "Ativo";
                            echo "<th class='success'>$ativo</th>";
                        }
                        ?>


                        <th class="info"><a href="<?php echo base_url('admin/pessoa/atualizarUsuarioForm/' . $data->id_usuario. '/editar/'); ?>"><i class='glyphicon glyphicon-edit'></i></a></th>
                        <th class="danger"><a href="#" onclick="apagarUsuario(<?php echo $data->id_usuario; ?>);"><i class="glyphicon glyphicon-remove"></i></a></th>
                            <?php } ?>
            </tbody>
        </table>

    </div>

</div>

