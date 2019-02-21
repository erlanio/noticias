<?php
foreach ($usuario as $data) {
    $id = $data->id_usuario;
    $nome = $data->nome;
    $email = $data->email;
    $senha = $data->senha;
    $nivelUsuario = $data->nivel_usuario;
    $imagem = $data->imagem;
    $ativo = $data->flativo;
    $editar = $this->uri->segment(5);
    $descricao = $data->descricao_usuario;
    $idUsuarioLogado = $this->session->userdata('usuario')->id_usuario;
}

if ($id == $idUsuarioLogado || $editar == "editar") {
    ?>
    <div class = "container pagina">
        <div class = "row col-xs-12 col-md-12 col-xs-offset-0"><h1>Atualizar Usuário</h1></div>
        <div class = "row col-xs-12 col-xs-offset-1">

            <form method = "post" id = "inserir-noticia" action = "<?php echo base_url('admin/pessoa/atualizarUsuario'); ?>" enctype = "multipart/form-data">
                <div class = "form-group col-xs-10">
                    <label for = "titulo" id = "titulo-t">Nome:</label><span id = "error-titulo"></span>
                    <input type = "text" required = "" value = "<?php echo $nome; ?>" class = "form-control" id = "nome" name = "nome" >
                </div>

                <div class = "form-group col-xs-10">
                    <label for = "titulo" id = "titulo-t">Email:</label><span id = "error-titulo"></span>
                    <input type = "text" required = "" value = "<?php echo $email; ?>" class = "form-control" id = "email" name = "email" >
                </div>

                <div class = "form-group col-xs-10">
                    <label for = "titulo" id = "titulo-t">Senha: </label><span id="error-titulo"></span>
                    <input type="password"  value="" placeholder="********" class="form-control" id="senha" name="senha" >
                </div>

    <?php if ($nivelUsuario == 1 || $editar == "editar") { ?>

                    <div class="form-group col-xs-10">
                        <label for="texto">Nível de Usuário</label>
                        <select class="form-control" id="nivel_usuario" name="nivel_usuario" required="">

                            <?php
                            if ($nivelUsuario == 1) {
                                echo '<option value="1">Super Administrador</option>  ';
                                echo '<option value="2">Administrador</option>     ';
                                echo '<option value="3">Editor</option>';
                            } else if ($nivelUsuario == 2) {
                                echo '<option value="2">Administrador</option>  ';
                                echo '<option value="1">Super Administrador</option>  ';
                                echo '<option value="3">Editor</option>';
                            } else if ($nivelUsuario == 3) {
                                echo '<option value="3">Editor</option>  ';
                                echo '<option value="2">Administrador</option>  ';
                                echo '<option value="1">Super Administrador</option>  ';
                            } else {
                                echo 'Erro Contate o Administrador';
                            }
                            ?>                  
                        </select>
                    </div>
    <?php } ?>


                <div class="form-group col-xs-10">
                    <label for="texto"><?php
                        if ($ativo == 0) {
                            echo "Usuário Desativado";
                        } elseif ($ativo == 1) {
                            echo "Usuário Ativo";
                        }
                        ?></label>
                    <select class="form-control" id="flativo" name="flativo" required="">     


    <?php if ($ativo == 0) { ?>                        
                            <option value="0">Desativado</option>                             
                            <option value="1">Ativado</option>       
    <?php } else if ($ativo == 1) { ?>
                            <option value="1">Ativado</option> 
                            <option value="0">Desativado</option>                             


    <?php } ?>

                    </select>
                </div>




                <div class="form-group col-xs-10">
                    <label for="file">Imagem</label>
                    <img src="<?php echo base_url('assets/imgs/usuarios/' . $imagem); ?>" class="col-xs-2 alterar-noticia">
                    <input type="hidden" id="id_usuario" name="id_usuario" value="<?php echo $id; ?>" aria-describedby="fileHelp">
                    <input type="hidden" id="imagem-usuario_original" value="<?php echo $imagem; ?>" name="imagem-usuario_original" aria-describedby="fileHelp">
                    <input type="file" class="form-control-file" id="imagem-usuario" name="imagem-usuario" aria-describedby="fileHelp">
                </div>

                <div class="form-group col-md-10">
                <label for="exampleTextarea">Descrição do Usuario</label><span id="error-noticia"></span>
                <textarea class="form-control" id="descricao_usuario" name="descricao_usuario" rows="08"><?php echo $descricao; ?></textarea>
                
            </div>


                <button type="submit" id="alterar-usuario" class="btn btn-success col-xs-offset-2 col-xs-6">Alterar</button>
            </form>
        </div>

    </div>
<?php
} else {

    echo "<script>"
    . "window.location.href = '"
    . base_url('admin/noticia/inicioAdmin')
    . "';"
    . "alert('Você não tem permissão!');"
    . "</script>";
}
?>

