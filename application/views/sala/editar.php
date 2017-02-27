                        <!-- basic form elements -->
                        <div class="wrapper wrapper-white">
                            <div class="page-subtitle">
                                <h3>Editar Sala</h3>
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


                            <form action="<?php echo base_url('sala/update').'/'.$sala->id ?>" enctype="multipart/form-data" method="post">     
                                <div class="row">
                                    <div class="col-md-12">                        
                                        <div class="form-group">
                                            <label>Nome</label>                                
                                            <input type="text" name="nome" class="form-control" value="<?php echo $sala->nome; ?>"/>
                                        </div>                        
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Observações</label>
<textarea class="form-control" name="observacoes" placeholder="Observações sobre a sala Exemplo: sala com ar condicionado"><?php echo $sala->observacao; ?></textarea>                            
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