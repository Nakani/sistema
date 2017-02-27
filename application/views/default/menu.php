                <!-- page sidebar -->
                <div class="dev-page-sidebar">
                    
                    <ul class="dev-page-navigation">
                        <li class="title">Menu</li>
                        <li class="active">
                            <a href="<?php echo base_url('dashboard')?>"><i class="fa fa-desktop"></i> <span>Dashboard</span></a>
                        </li>                        
                        <li>
                            <a href="#"><i class="fa fa-calendar"></i> <span>Gerenciar Salas</span></a>
                            <ul>
                            <?php if($this->session->usuario['nivel']=='1'){ ?>
                                <li><a href="<?php echo base_url('sala/adicionar')?>">Adicionar Sala</a></li>
                            <?php } ?>
                                <li><a href="<?php echo base_url('sala/listar')?>">Listar Salas</a></li>
                                <li><a href="<?php echo base_url('agenda/reserva')?>">Reservar salas</a></li>
                                <li><a href="<?php echo base_url('agenda')?>">Visualizar Agenda</a></li>
                            </ul>
                        </li>
                        <?php if($this->session->usuario['nivel']=='1'){ ?>
                        <li>
                            <a href="#"><i class="fa fa-users"></i> <span>Gerenciar Usuários</span></a>
                            <ul>
                                <li><a href="<?php echo base_url('usuario/adicionar')?>">Adicionar Usuário</a></li>
                                <li><a href="<?php echo base_url('usuario/listar')?>">Listar Usuários</a></li>
                            </ul>
                        </li>                          
                        <?php } ?>
                    </ul>                    
                </div>
                <!-- ./page sidebar -->