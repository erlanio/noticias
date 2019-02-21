<div class="navbar-wrapper">
    <div class="container-fluid">        
        <nav class="navbar navbar-fixed-top menu">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="<?php echo base_url('home'); ?>">Inicio</a>
                </div>
                <div id="navbar" class="navbar-collapse collapse">
                    <ul class="nav navbar-nav">
                        <!--
                         <li class=" dropdown">
                             <a href="#" class="dropdown-toggle " data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Administrar Notícias<span class="caret"></span></a>
                             <ul class="dropdown-menu">
                                 <li class="dropdown">
                                     <a href=""><i class="glyphicon glyphicon-plus"></i> Nova Notícia</a>
                                 </li>
                                 <li class="dropdown"><a href=""><i class="glyphicon glyphicon-pencil"></i> Editar/Alterar/Excluir</a></li>
                             </ul>
                         </li>  
                        -->

                        <?php
                        foreach ($categoria as $data) {
                            $nome_categoria = $data->nome_categoria;
                            ?>
                            <li><a href="<?php echo base_url('categoria/noticias/') . $nome_categoria; ?>"><?php echo $data->nome_categoria ?></a></li>

                            <?php
                        }
                        ?>                    
                    </ul>

                    <ul class="nav navbar-nav pull-right">
                       
                        <li class=" dropdown"><a href="#" class="dropdown-toggle active" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Sobre<span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="<?php echo base_url('home/quem_somos'); ?>" class="menu-ancora"><i class="glyphicon glyphicon-question-sign"></i> Quem somos?</a></li>
                                 <li class=""><a href="<?php echo base_url('home/equipe'); ?>"><i class="glyphicon glyphicon-user"></i> Equipe</a></li>
                                <li class=""><a href="<?php echo base_url('home/fale_conosco'); ?>"><i class="glyphicon glyphicon-phone"></i> Entre em Contato</a></li>
                            </ul>
                        </li>


                    </ul>

                </div>
            </div>
        </nav>
    </div>
</div>
