<div class="container pagina">
    <div class="row col-xs-12 col-md-8"><h1>Administrar Vídeos</h1></div>
    <div class="row col-xs-12 col-md-12">
        <div class="col-md-6">
            <h3 class="col-md-12">Vídeo 01</h3>

            <?php foreach ($videos01 as $data) {
                ?>               

                <div class="embed-responsive embed-responsive-16by9 col-md-12">
                    <iframe class="embed-responsive-item" src="https://youtube.com/embed/<?php echo $data->link_video; ?>" frameborder="0" allowfullscreen></iframe>             
                </div>

            <?php } ?>
            <form method="post" id="atualizarVideo" name="atualizarVideo" action="<?php echo base_url('admin/video/atualizarVideo'); ?>" enctype="multipart/form-data">
                <div class="form-group col-md-12 link_video">
                    <label for="titulo" id="titulo-t">Link:</label><span id="error-titulo"></span>
                    <input type="hidden" required="" class="form-control" id="what" value="1" name="what" >
                    <input type="text" required="" class="form-control" id="video01" name="video01" >
                </div>     
                <button type="submit" id="enviar-video"  name="enviar-video" class="btn btn-success col-md-offset-3 col-xs-offset-3 col-md-6">Alterar Video</button>
            </form>
        </div>

        <div class="col-md-6">
            <h3 class="col-md-12">Vídeo 02</h3>
            <?php foreach ($videos02 as $data) {
                ?>               

                <div class="embed-responsive embed-responsive-16by9 col-md-12">
                    <iframe class="embed-responsive-item" src="https://youtube.com/embed/<?php echo $data->link_video; ?>" frameborder="0" allowfullscreen></iframe>             
                </div>

            <?php } ?>
            <form method="post" id="atualizarVideo" name="atualizarVideo" action="<?php echo base_url('admin/video/atualizarVideo'); ?>" enctype="multipart/form-data">
                <div class="form-group col-md-12 link_video">
                    <label for="titulo" id="titulo-t">Link:</label><span id="error-titulo"></span>
                    <input type="hidden" required="" class="form-control" id="what" value="2" name="what" >
                    <input type="text" required="" class="form-control" id="video01" name="video01" >
                </div>     
                <button type="submit" id="enviar-categoria"  name="enviar-categoria" class="btn btn-success col-md-offset-3 col-xs-offset-3 col-md-6">Alterar Video</button>
            </form>
        </div>

    </div>
</div>


