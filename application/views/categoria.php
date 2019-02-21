<div class="container-fluid categoria corpo-inicio">
    <div class="container inicio-container">

        <?php
        if ($noticia_categoria) {

            foreach ($noticia_categoria as $data) {
                $categoria = $data->nome_categoria;
            }
            ?>
            <div class="row col-md-12"><h2>Categoria: <?php echo $categoria ?></h2></div>


            <?php
            foreach ($noticia_categoria as $data) {
                $this->load->helper('uteis_helper');
                $titulo = removeAcentos($data->titulo);
                $titulo = str_replace(' ', '-', $titulo);
                $titulo = str_replace(', ', '-', $titulo);
                $titulo = str_replace('/', '-', $titulo);
                $titulo = strtolower($titulo);
                ?>
                <div class="row col-md-12  bloco-noticia-categoria">

                    <div class="row col-md-3 hoverzoom">

                        <img src="<?php echo base_url('assets/imgs/noticias/' . $data->imagem); ?>">
                        <div class="retina">

                            <a href="<?php echo base_url('home/exibirNoticia/') . $titulo . '/' . $data->id_noticia; ?>">Saiba mais</a>
                        </div>
                    </div>
                    <div class="col-md-9 lista-noticia-categoria-titulo">
                        <h4><a href="<?php echo base_url('home/exibirNoticia/') . $titulo . '/' . $data->id_noticia; ?>"><?php echo $data->titulo; ?></a></h4>
                        <div class="col-md-12"><p class="texto-categoria"><?php echo word_limiter($data->texto, 65) ?><br><a class="leia-mais" href="<?php echo base_url('home/exibirNoticia/') . $titulo . '/' . $data->id_noticia; ?>">Leia Mais</a></p></div>
                    </div>

                </div>


            <?php } ?>
            <div class="row col-md-12">
                <?php echo $paginacao; ?>
            </div>
        <?php } else { ?>
            <h1>Ops...Não existem notícias para esta categoria</h1>
        <?php } ?>
    </div>
</div>