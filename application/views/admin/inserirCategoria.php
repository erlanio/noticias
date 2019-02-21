<div class="container pagina">
    <div class="row col-xs-12 col-md-8"><h1>Categorias</h1></div>
    <div class="row col-xs-12 col-md-offset-1 col-md-12">
        <form method="post" id="inserir-categoria" name="inserir-categoria" action="<?php echo base_url('admin/categoria/inserirCategoria'); ?>" enctype="multipart/form-data">
            <div class="form-group col-xs-12 col-md-offset-2 col-md-6">
                <label for="titulo" id="titulo-t">Categoria:</label><span id="error-titulo"></span>
                <input type="hidden" required="" class="form-control" id="id_categoria" name="id_categoria" >
                <input type="text" required="" class="form-control" id="categoria" name="categoria" >

            </div>     
            <button type="submit" id="enviar-categoria"  name="enviar-categoria" class="btn btn-success col-xs-offset-3 col-md-offset-3 col-md-4 col-xs-7 col-xs-offset-2">Add Categoria</button>
        </form>
    </div>
</div>
