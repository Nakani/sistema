                        <!-- basic form elements -->
                        <div class="wrapper wrapper-white">
                            <div class="page-subtitle">
                                <h3>Editar Usuário</h3>
                            </div> 
                            <div class="row">
                                <div class="col-md-12">
                            <?php if(isset($_SESSION['save_ok'])){?>
                            <div class="alert alert-success alert-dismissible" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <strong>Atualizado com sucesso</strong> 
                            </div>
                            <?php }
                            if(isset($_SESSION['save_fail'])){ ?>
                            <div class="alert alert-danger alert-dismissible" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <strong>Erro ao atualizar</strong> 
                            </div>
                            <?php }
                            ?>
                                </div>
                            </div>


                            <form action="<?php echo base_url('usuario/update').'/'.$user->id ?>" enctype="multipart/form-data" method="post">     
                                <div class="row">
                                    <div class="col-md-12">                        
                                        <div class="form-group">
                                            <label>Nome</label>                                
                                            <input type="text" name="nome" class="form-control" value="<?php echo $user->nome; ?>"/>
                                        </div>                        
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">                        
                                        <div class="form-group">
                                            <label>Email</label>                                
                                            <input type="text" name="email" class="form-control" value="<?php echo $user->email; ?>"/>
                                            <span class="help-block">Caso for necessário atualize a senha. </span>
                                        </div>                        
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">                        
                                        <div class="form-group">
                                            <label>Senha</label>                                
                                            <input type="text" name="senha" class="form-control" placeholder="Insira uma nova senha"/>
                                        </div>                        
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Nível</label>
                                            <select name="nivel" class="form-control">
                                                <option value="1">Admin</option>
                                                <option value="2">Outros</option>
                                            </select>
                                            <?php $nivel = ($user->nivel != '1') ? 'Outros' : 'Admin'; ?>
                                            <span class="help-block">Este usuário tem permissão: <?php echo $nivel;?></span>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <button class="btn btn-primary">Atualizar</button>
                                        </div>
                                    </div>
                                </div> 
                            </form>                       
                        <!-- ./basic form elements -->