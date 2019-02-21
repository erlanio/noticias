<div class="container pagina">
    <div class="row col-xs-12 col-md-12"><h1>Publicar Notícia</h1></div>
    <div class="row col-xs-12 col-lg-8 col-xs-offset-0">

        <form method="post" id="inserir-noticia" action="<?php echo base_url('admin/noticia/inserirNoticia'); ?>" enctype="multipart/form-data">
            <div class="form-group">
                <label for="titulo" id="titulo-t">Título</label><span id="error-titulo"></span>
                <input type="text" required class="form-control" id="titulo" name="titulo" >                
            </div>

            <div class="form-group">
                <label for="exampleTextarea">Texto</label><span id="error-noticia"></span>
                <textarea class="form-control" id="noticia" name="noticia" rows="50"></textarea>
                  <script>
                    // Replace the <textarea id="editor1"> with a CKEditor
                    // instance, using default configuration.
                    CKEDITOR.replace('noticia');
                </script>
              
            </div>
            
             <div class="row  col-md-12">         
        <div class="form-group">
            <label for="texto">Categoria</label>
            <select class="form-control" id="categoria" name="categoria" required="">
                <?php foreach ($categoria as $data) { ?>
                    <option value="<?php echo $data->id_categoria; ?>"><?php echo $data->nome_categoria ?></option>                
                <?php } ?>
            </select>
        </div>

        <div class="form-group">
            <label for="texto">Status</label>
            <select class="form-control" id="flativo" name="flativo" required="">
                <option value="1">Publicado</option>
                <option value="0">Despublicado</option>
            </select>
        </div>

        <div class="form-group">
            <label for="file">Imagem</label>
            <input type="file" class="form-control-file" id="imagem-noticia" name="imagem-noticia" aria-describedby="fileHelp">

        </div>


       
    </div>
    <div class="row col-xs-12 col-lg-8 col-md-offset-2"><button type="submit" id="enviar" class="btn btn-success col-xs-12 col-md-6">Enviar</button></div>
    

    </div>
    </form>
</div>
