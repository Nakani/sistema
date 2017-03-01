                        <!-- basic form elements -->
                        <div class="wrapper wrapper-white">
                            <div class="page-subtitle">
                                <h3>Adicionar Usuário</h3>
                            </div> 
                            <?php echo validation_errors(); ?>

                            <form action="<?php echo base_url('usuario/save');?>" enctype="multipart/form-data" method="post">     
                                <div class="row">
                                    <div class="col-md-12">                        
                                        <div class="form-group">
                                            <label>Nome</label>                                
                                            <input type="text" name="nome" class="form-control" placeholder="Nome" value="<?php echo set_value('nome'); ?>"/>
                                        </div>                        
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">                        
                                        <div class="form-group">
                                            <label>Email</label>                                
                                            <input type="text" name="email" class="form-control" placeholder="Email" value="<?php echo set_value('email'); ?>" />
                                        </div>                        
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">                        
                                        <div class="form-group">
                                            <label>Senha</label>                                
                                            <input type="password" name="senha" class="form-control" placeholder="Senha" value="<?php echo set_value('senha'); ?>"/>
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
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <button class="btn btn-primary">Salvar</button>
                                        </div>
                                    </div>
                                </div> 
                            </form>                       
                        <!-- ./basic form elements -->