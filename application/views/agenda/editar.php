                        <!-- basic form elements -->
                        <div class="wrapper wrapper-white">
                            <div class="page-subtitle">
                                <h3>Reservar Sala</h3>
                            </div> 
                            <?php echo validation_errors(); ?>

                            <div class="row">
                                <div class="col-md-12">
                            <?php if(isset($_SESSION['message_ok'])){?>
                            <div class="alert alert-success alert-dismissible" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <strong><?php echo $_SESSION['message_ok'];?></strong> 
                            </div>
                            <?php }
                            if(isset($_SESSION['message_fail'])){ ?>
                            <div class="alert alert-danger alert-dismissible" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <strong><?php echo $_SESSION['message_fail'];?></strong> 
                            </div>
                            <?php }
                            ?>
                                </div>
                            </div>


                            <form action="<?php echo base_url('agenda/update').'/'.$evento->id ?>" enctype="multipart/form-data" method="post">     
                                <div class="row">
                                    <div class="col-md-12">                        
                                        <div class="form-group">
                                            <label>Escolha a Sala</label>                                
                                            <select name="sala" class="form-control">
                                            <?php foreach($salas as $sala){ ?>
                                                <option value="<?php echo $sala->id; ?>"><?php echo $sala->nome; ?></option>
                                            <?php } ?>
                                            </select>

                                        </div>                        
                                    </div>
                                </div>
                                <div class="row">

                                <?php 
                                    $hora_ini = explode(' ',$evento->data_ini ); 
                                    $hora_fim = explode(' ',$evento->data_fim ); 
                                ?>  
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Data Início</label>                            
                                <input type="text" name="data_ini" class="form-control datepicker" value="<?php echo date('m/d/Y', strtotime($evento->data_ini)); ?>"/>
                                    </div>                        
                                </div>                             

                                        <?php 
                                        $hora_ini = explode(' ',$evento->data_ini ); 
                                        $hora_fim = explode(' ',$evento->data_fim ); 
                                        ?>                         
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Hora Início</label> 


                                        <input type="text" name="hora_ini" class="form-control timepicker" value="<?php echo $hora_ini[1]; ?>"/>
                                    </div>                        
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Hora Fim</label>                            
                                        <input type="text" name="hora_fim" class="form-control timepicker" value="<?php echo $hora_fim[1]; ?>" />
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
                        <div class="col-md-12">
                        <div id='calendar'></div>
                        </div>


                        </div>                    
                        <!-- ./basic form elements -->