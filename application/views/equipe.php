<div class="container-fluid corpo-inicio">
    <div class="container inicio-container">
        <div class="row col-md-12">
            <div class="col-md-12 noticia">
                <h2>Conheça nossa equipe</h2>  
                <?php foreach ($equipe as $data) { ?>

                    <div class="col-md-12 equipe">
                        <div class="col-md-4">
                            <img src="<?php echo base_url('assets/imgs/usuarios/' . $data->imagem); ?>" class="img-responsive">
                        </div>
                        <div class="col-md-8">
                            <strong><h4><?php echo $data->nome; ?></h4></strong>
                            <strong><p>Email: </strong><?php echo $data->email; ?></p>
                            <p><?php echo $data->descricao_usuario; ?></p>
                            <p></p>

                        </div>
                    </div>
                <?php } ?>
            </div>

        </div>

    </div>
</div>