                        <!-- basic form elements -->
                        <div class="wrapper">
                            <div class="page-subtitle">
                                <h3>Visualizar Evento</h3>
                            </div> 
   
                                <div class="row">
                                    <div class="col-md-12">                        
                                        <div class="form-group">
                                            <H3>Sala <strong><?php echo $reserva->sala ?></strong> já Reservada por <?php echo $reserva->nome; ?></H3>
                                            <?php 
                                                $data_ini = $reserva->data_ini;
                                                $dataIni = date('d/m/Y H:m:s', strtotime($data_ini));
                                                $data_fim = $reserva->data_ini;
                                                $dataFim = date('d/m/Y H:m:s', strtotime($data_fim));
                                            ?>
                                            <h4>dia <?php echo $dataIni?> até <?php echo $dataFim ?></h4>
                                        </div>                        
                                    </div>
                                </div>


                            <div class="row">
                                <div class="col-md-12">
                                    <?php 
                                        if(!$this->session->userdata("usuario")) {
                                            redirect(base_url().'login/index', 'refresh');
                                        }else{
                                    ?>
                                    <a href="<?php echo base_url('agenda/editar').'/'.$reserva->id ?>"><button class="btn btn-success">Atualizar</button></a>
                                    <?php } ?>
                                    <a href="<?php echo base_url('agenda/')?>"><button class="btn btn-default">Voltar</button></a>
                                </div>
                            </div>

                        <!-- basic table -->
                        <div class="wrapper wrapper-white">
                            <div class="page-subtitle">
                                <h3>Lista de reservas</h3>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                            <?php if(isset($_SESSION['message_ok'])){?>
                            <div class="alert alert-success alert-dismissible" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <strong><?php echo $_SESSION['message_ok'] ?></strong> 
                            </div>
                            <?php }
                            if(isset($_SESSION['message_fail'])){ ?>
                            <div class="alert alert-danger alert-dismissible" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <strong><?php echo $_SESSION['message_fail'] ?></strong> 
                            </div>
                            <?php }
                            ?>
                                </div>
                            </div>
                            
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Nome</th>
                                            <th>sala</th>
                                            <th>Data</th>
                                            <th>Horário Início</th>
                                            <th>Horário Fim</th>
                                            <?php if($this->session->usuario['nivel']=='1'){ ?>
                                            <th>Ação</th>
                                            <?php } ?>
                                        </tr>
                                    </thead>
                                    <tbody>

                                    <?php 
                                    foreach($eventos as $evento){ 
                                        ?>
                                        <tr>
                                            <td><?php echo $evento->nome; ?></td>
                                            <td><?php echo $evento->sala; ?></td>
                                            <td><?php echo date('d/m/Y', strtotime($evento->data_ini)); ?></td>
                                            <?php 
                                                $hora_ini = explode(' ',$evento->data_ini ); 
                                                $hora_fim = explode(' ',$evento->data_fim ); 
                                            ?>
                                            <td><?php echo $hora_ini[1]; ?></td>
                                            <td><?php echo $hora_fim[1]; ?></td>


                                            <?php if($this->session->usuario['nivel']=='1'){ ?>
                                                <td class="acao">
                                                    <a href="<?php echo base_url('agenda/editar').'/'.$evento->id;?>">
                                                        <i class="fa fa-pencil"></i>
                                                    </a>
                                                    <a href="<?php echo base_url('agenda/apagar').'/'.$evento->id;?>">
                                                        <i class="fa fa-trash-o"></i>
                                                    </a>
                                                </td>
                                            <?php } ?>
                                        </tr>
                                       <?php }?>
                                    </tbody>
                                </table>
                            </div>
                            
                        </div>                        
                        <!-- ./basic table -->
                    
                        <!-- ./basic form elements -->