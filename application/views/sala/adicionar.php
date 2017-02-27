                        <!-- basic form elements -->
                        <div class="wrapper wrapper-white">
                            <div class="page-subtitle">
                                <h3>Adicionar Sala</h3>
                            </div> 
                            <?php echo validation_errors(); ?>

                            <form action="<?php echo base_url('sala/save');?>" enctype="multipart/form-data" method="post">     
                                <div class="row">
                                    <div class="col-md-12">                        
                                        <div class="form-group">
                                            <label>Nome da sala</label>                                
                                            <input type="text" name="nome" class="form-control" placeholder="Nome" value="<?php echo set_value('nome'); ?>"/>
                                        </div>                        
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Observações</label>
                                            <textarea class="form-control" name="observacoes" placeholder="Observações sobre a sala Exemplo: sala com ar condicionado"></textarea>                            
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