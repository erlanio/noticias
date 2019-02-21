<div class="navbar-wrapper">
    <div class="container-fluid">
        <nav class="navbar navbar-fixed-top navbar-inverse">
            <div class="container menu menu-topo">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="<?php echo base_url('admin/noticia/inicioAdmin'); ?>"><i class="glyphicon glyphicon-home"></i> Inicio</a>
                </div>
                <div id="navbar" class="navbar-collapse collapse">
                    <ul class="nav navbar-nav">                        
                        <li class=" dropdown">
                            <a href="#" class="dropdown-toggle " data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Administrar Notícias<span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li class="dropdown">
                                    <a href="<?php echo base_url('admin/noticia/inserirNoticia'); ?>"><i class="glyphicon glyphicon-plus"></i> Nova Notícia</a>
                                </li>
                                <li class="dropdown"><a href="<?php echo base_url('admin/noticia/listarNoticias'); ?>"><i class="glyphicon glyphicon-pencil"></i> Editar/Alterar/Excluir</a></li>
                            </ul>
                        </li>  
                        <li><a href="<?php echo base_url('admin/categoria'); ?>">Categorias</a></li>
                        <li><a href="<?php echo base_url('admin/contato/listarMensagens'); ?>">Mensagens</a></li> 
                        <li><a href="<?php echo base_url('admin/video'); ?>">Vídeos</a></li>
                        <?php if($this->session->userdata('usuario')->nivel_usuario == 1) { ?> 
                        
                        <li class=" dropdown">
                            <a href="#" class="dropdown-toggle " data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Administrar Usuários<span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li class="dropdown">
                                    <a href="<?php echo base_url('admin/pessoa'); ?>"><i class="glyphicon glyphicon-plus"></i> Novo Usuário</a>
                                </li>
                                <li class="dropdown"><a href="<?php echo base_url('admin/pessoa/listarUsuario'); ?>"><i class="glyphicon glyphicon-pencil"></i> Editar/Alterar/Excluir</a></li>
                            </ul>
                        </li> 

                      <?php  } ?>




                    </ul>

                    <ul class="nav navbar-nav pull-right">
                        <li><a href="<?php echo base_url('admin/pessoa/atualizarUsuarioForm/' . $this->session->userdata('usuario')->id_usuario); ?>">Olá seja bem-vindo:<strong> <?php echo $this->session->userdata('usuario')->nome; ?></strong></a></li>
                        <li class=" dropdown"><a href="#" class="dropdown-toggle active" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Perfil<span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="<?php echo base_url('admin/pessoa/atualizarUsuarioForm/' . $this->session->userdata('usuario')->id_usuario); ?>"><i class="glyphicon glyphicon-edit"></i> Editar Perfil</a></li>
                                <li class=""><a href="<?php echo base_url('admin/login/logout'); ?>"><i class="glyphicon glyphicon-off"></i> Logout</a></li>
                            </ul>
                        </li>


                    </ul>
                </div>
            </div>
        </nav>
    </div>
</div>
