<div class="container-fluid corpo-inicio">
    <div class="container inicio-container">
        <div class="row col-md-12 fale-conosco">
            <div class="col-md-8 noticia">
                <div class="row col-md-12">
                    <div class="col-md-offset-1 col-xs-12 col-md-12">
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
                  
                                        
                </div>

            </div>

        </div>
    </div>
</div>