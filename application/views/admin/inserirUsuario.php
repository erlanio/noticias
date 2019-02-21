<div class="container pagina">
    <div class="row col-xs-12 col-md-12 col-xs-offset-0"><h1>Inserir Usuário</h1></div>   
    <div class="row col-xs-12 col-lg-8 col-xs-offset-0">
        <form method="post" id="inserir-noticia" action="<?php echo base_url('admin/pessoa/inserirUsuario'); ?>" enctype="multipart/form-data">
            <div class="form-group">
                <label for="titulo" id="titulo-t">Nome Completo:</label><span id="error-titulo"></span>
                <input type="text" required="" class="form-control" id="nome" name="nome" >
            </div>

            <div class="form-group">
                <label for="titulo" id="titulo-t">Email:</label><span id="error-titulo"></span>
                <input type="text" required="" class="form-control" id="email" name="email" >
            </div>

            <div class="form-group">
                <label for="titulo" id="titulo-t">Senha:</label><span id="error-titulo"></span>
                <input type="text" required="" class="form-control" id="senha" name="senha" >
            </div>


            <div class="form-group">
                <label for="texto">Nível de Usuário</label>
                <select class="form-control" id="nivel_usuario" name="nivel_usuario" required="">                
                    <option value="1">Super Administrador</option>     
                    <option value="2">Administrador</option>     
                    <option value="3">Editor</option>     

                </select>
            </div>

            <div class="form-group">
                <label for="exampleTextarea">Descrição do Usuario</label><span id="error-noticia"></span>
                <textarea class="form-control" id="descricao_usuario" name="descricao_usuario" rows="08"></textarea>
                
            </div>


            <div class="form-group">
                <label for="file">Imagem</label>
                <input type="file" class="form-control-file" id="imagem-usuario" name="imagem-usuario" aria-describedby="fileHelp">
            </div>
            <div class="row col-xs-12 col-lg-8 col-md-offset-2"><button type="submit" id="enviar-usuario" class="btn btn-success col-xs-12 col-md-12">Enviar</button></div>


        </form>
    </div>

</div>