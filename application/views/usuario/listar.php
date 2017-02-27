                        <!-- basic table -->
                        <div class="wrapper wrapper-white">
                            <div class="page-subtitle">
                                <h3>Lista de usuários</h3>
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
                                            <th>Email</th>
                                            <th>Nível</th>
                                            <th>Ação</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                    <?php foreach($users as $user){ ?>
                                        <tr>
                                            <td><?php echo $user->id; ?></td>
                                            <td><?php echo $user->nome; ?></td>
                                            <td><?php echo $user->email; ?></td>
                                            <?php $nivel = ($user->nivel != '1') ? 'outros' : 'admin'; ?>
                                            <td><?php echo $nivel;?> </td>
                                            <?php if($this->session->usuario['nivel']=='1'){ ?>
                                                <td class="acao">
                                                    <a href="<?php echo base_url('usuario/editar').'/'.$user->id;?>">
                                                        <i class="fa fa-pencil"></i>
                                                    </a>
                                                    <a href="<?php echo base_url('usuario/apagar').'/'.$user->id;?>">
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