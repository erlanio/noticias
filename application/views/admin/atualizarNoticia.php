<?php
$titulo;
$texto;
$imagem;

foreach ($noticia as $data) {
    $titulo = $data->titulo;
    $texto = $data->texto;
    $imagem = $data->imagem;
}
?>
<div class="container pagina">
    <div class="row col-xs-12 col-md-12 col-xs-offset-0"><h1>Atualizar Notícia</h1></div>
    <div class="row col-xs-12 col-lg-8 col-xs-offset-0">

        <form method="post" id="inserir-noticia" action="<?php echo base_url('admin/noticia/atualizarNoticia'); ?>" enctype="multipart/form-data">
            <div class="form-group">
                <label for="titulo" id="titulo-t">Título</label><span id="error-titulo"></span>
                <input type="text" required="" class="form-control" value="<?php echo $titulo; ?>" id="titulo" name="titulo" >

            </div>

            <div class="form-group">
                <label for="exampleTextarea">Texto</label><span id="error-noticia"></span>
                <textarea class="form-control formNoticia" id="noticia" name="noticia" rows="40"><?php echo $texto; ?></textarea>
                <script>
                    // Replace the <textarea id="editor1"> with a CKEditor
                    // instance, using default configuration.
                    CKEDITOR.replace('noticia');
                </script>
            </div>   
             <div class="row col-md-12">
        <div class="form-group">
            <label for="texto">Categoria</label>
            <select class="form-control" id="categoria" name="categoria" required="">
                <?php
                foreach ($resultado as $cat) {
                    echo "<option value=" . $cat->id_categoria . ">$cat->nome_categoria</option>";
                }
                ?>
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
            <img src="<?php echo base_url('assets/imgs/noticias/' . $imagem); ?>" class="col-xs-12 alterar-noticia">            
            <input type="hidden" value="<?php echo $imagem; ?>" id="imagem-original" name="imagem-original">
            <input type="hidden" value="<?php echo $data->id_noticia; ?>" id="id_noticia" name="id_noticia" aria-describedby="fileHelp">
            <input type="file" class="form-control-file" id="imagem-noticia" name="imagem-noticia" aria-describedby="fileHelp">

        </div>       


    </div>
    <div class="row col-xs-12 col-lg-8 col-md-offset-2"><button type="submit" id="enviar" class="btn btn-success col-xs-12 col-md-6">Enviar</button></div>

            
            
    </div>
   </form>
</div>