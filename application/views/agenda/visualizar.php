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

                    
                        <!-- ./basic form elements -->