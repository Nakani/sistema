                        <!-- basic table -->
                        <div class="wrapper wrapper-white">
                            <div class="page-subtitle">
                                <h3>Lista de salas</h3>
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
                                            <th>ID</th>
                                            <th>Nome</th>
                                            <th>Observação</th>
                                            <th>Ação</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                    <?php foreach($salas as $sala){ ?>
                                        <tr>
                                            <td><?php echo $sala->id; ?></td>
                                            <td><?php echo $sala->nome; ?></td>
                                            <td><?php echo $sala->observacao; ?></td>
                                            <?php if($this->session->usuario['nivel']=='1'){ ?>
                                                <td class="acao">
                                                    <a href="<?php echo base_url('sala/editar').'/'.$sala->id;?>">
                                                        <i class="fa fa-pencil"></i>
                                                    </a>
                                                    <a href="<?php echo base_url('sala/apagar').'/'.$sala->id;?>">
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