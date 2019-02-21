<div class="container-fluid rodape">  
    <div class="container rodape-conteudo">
        <div class="row col-md-12 formContato">
            <div class="col-md-offset-1 col-md-4">
                <h3>Contato:</h3>
                <form method="post" id="form-contato" name="form-contato" action="<?php echo base_url('admin/contato/inserirContato'); ?>" enctype="multipart/form-data">

                    <div class="form-group">
                        <label for="titulo">Nome:</label><span id="error-titulo"></span>
                        <input type="text" required="" class="form-control" id="nomeFormContato" name="nomeFormContato" >                    
                    </div> 

                    <div class="form-group">
                        <label for="titulo">Assunto:</label><span id="error-titulo"></span>
                        <input type="text" required="" class="form-control" id="assuntoFormContato" name="assuntoFormContato" >                    
                    </div>

                    <div class="form-group">
                        <label for="titulo">Email:</label><span id="error-titulo"></span>
                        <input type="email" required="" class="form-control" id="emailFormContato" name="emailFormContato" >                    
                    </div> 

                    <div class="form-group">
                        <label for="titulo" id="titulo-t">Texto:</label><span id="error-titulo"></span>
                        <textarea class="form-control" id="MensagemFormContato" name="mensagemFormContato" rows="5"></textarea>
                        <script>
                        </script>                  
                    </div> 

                    <button type="submit" id="enviar-categoria"  name="enviar-categoria" class="btn btn-success col-md-4">Enviar</button>

                </form>
            </div>

            <div class="col-md-offset-1 col-md-3 col-xs-12">
                <h3>Categorias:</h3>
                <?php
                foreach ($categoria as $data) {
                    ?>
                    <p class="categorias-rodape"><a href="<?php echo base_url('categoria/noticias/') . $data->nome_categoria; ?>"><?php echo $data->nome_categoria; ?></a></p>
                <?php } ?>
            </div>

            <div class="col-md-3">
                <h3>Redes Sociais:</h3>
                <div class="col-md-12 redes-sociais">
                    <a href="https://www.facebook.com/Portal-Aurora-Noticias-854905287893280/" target="_blank"><img src="<?php echo base_url('assets/imgs/ico-facebook.png'); ?>" class="img-responsive col-md-4 col-xs-4"></a>
                    <a href="https://chat.whatsapp.com/Cs8ehIOFBaF2Qf8yFbCPOg" target="_blank"><img src="<?php echo base_url('assets/imgs/whatsapp.png'); ?>" class="img-responsive col-md-4  col-xs-4 col-xs-offset-2"></a>
                    
                </div>
                <h3>Equipe:</h3>
                <p class="categorias-rodape"><a href="https://www.facebook.com/erlanio.freire.92">Erlânio Freire</a></p>
                <p class="categorias-rodape"><a href="https://www.facebook.com/henrique.lopes.5036">Henrique Macedo</a></p>

                <h3>Aurora Notícias</h3>
                <p>Informação com Imparcialidade</p>

            </div>                      
        </div>
        <div class="col-md-12 developed">
            <p><strgon>Developed by: Erlânio Freire</strgon></p> 
        </div>
    </div>
</div>
</body>
</html>
