<!DOCTYPE html>
<html lang="pt-br">
    <head>        
        <!-- meta section -->
        <title>Sistema</title>
        
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" >
        <meta http-equiv="X-UA-Compatible" content="IE=edge" >
        <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" >
        
        <link rel="icon" href="favicon.ico" type="image/x-icon" >
        <!-- /meta section -->        
        
        <!-- css styles -->
        <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets');?>/css/blue-white.css" id="dev-css">
        <!-- ./css styles -->                                    
                
        <!--[if lte IE 9]>
        <link rel="stylesheet" type="text/css" href="css/dev-other/dev-ie-fix.css">
        <![endif]-->
        
        <!-- javascripts -->
        <script type="text/javascript" src="<?php echo base_url('assets');?>/js/plugins/modernizr/modernizr.js"></script>
        <!-- ./javascripts -->
        
        <style>.dev-page{visibility: hidden;}</style>
    </head>
    <body>
                
        <!-- page wrapper -->
        <div class="dev-page dev-page-login dev-page-login-v2">
                      
            <div class="dev-page-login-block">
                <a class="dev-page-login-block__logo">Sistema</a>
                <div class="dev-page-login-block__form">
                <?php if(isset($mensagem)){  ?>
                    <div class="alert alert-danger alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <strong>Opa!</strong> <?php echo $mensagem;?>
                    </div>
                <?php } ?>
                    <div class="title"><strong>Seja bem vindo</strong>, Por favor Logue-se</div>
                    <form action="<?php echo base_url('login/autenticar')?>" enctype="multipart/form-data" method="post">                        
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                <input type="text" name="email" class="form-control" placeholder="Login">
                            </div>
                        </div>                        
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                                <input type="password"  name="pass" class="form-control" placeholder="Password">
                            </div>
                        </div>
                        <div class="form-group no-border margin-top-20">
                            <button class="btn btn-success btn-block">Login</button>
                        </div>
                    </form>
                </div>
                <div class="dev-page-login-block__footer">
                    © 2017 <strong>Sistema</strong>. Todos Direitos reservados.
                </div>
            </div>
            
        </div>
        <!-- ./page wrapper -->                
        
        <!-- javascript -->
        <script type="text/javascript" src="<?php echo base_url('assets');?>/js/plugins/jquery/jquery.min.js"></script>       
        <script type="text/javascript" src="<?php echo base_url('assets');?>/js/plugins/bootstrap/bootstrap.min.js"></script>        
        <!-- ./javascript -->
    </body>
</html>






