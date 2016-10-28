<?php
    include_once "../conexao.php";
    
    $IdUsuario = (int)$_GET['IdUsuario'];

    $sqlRead = 'SELECT * FROM tb_usuarios WHERE IdUsuario = '.$IdUsuario;
    try {
      $read = $db->prepare($sqlRead);
      $read->execute();
    } catch (PDOException $e) {
      echo $e->getMessage();
    }
    while( $usuarios = $read->fetch(PDO::FETCH_OBJ) ){

?>

<?php include_once "../cabecalho.php"; ?>
        
        <div class="page-title">
          <div class="title_left">
            <h3>Usuários</h3>
          </div>

          <div class="title_right">
            <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                <a href="cadastra_usuarios.php">
                    <a class="btn btn-app" href="busca_usuarios.php?Status=1">
                      <i class="fa fa-arrow-circle-left"></i> Cancelar
                    </a>
                </a>
            </div>
          </div>
        </div>

        <!-- page content -->
          <div class="">
            
            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Editando Usuários</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br />
                    <form id="editar_usuarios" method="post" action="cadastra_usuarios.php" data-parsley-validate class="form-horizontal form-label-left">

                      <input type="hidden" name="acao" value="editar">
                      <input type="hidden" name="DtAlteracao" value="<?php echo date('d/m/Y H:i:s') ?>">
                      
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="IdUsuario">Código <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="IdUsuario" name="IdUsuario" required="required" readonly="readonly" class="form-control col-md-7 col-xs-12" value="<?php echo $usuarios->IdUsuario; ?>">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Usuario">Usuário</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="Usuario" name="Usuario" class="form-control col-md-7 col-xs-12" value="<?php echo $usuarios->Usuario; ?>">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Nível</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="radio" name="Nivel" id="Nivel" value="0" <?php if ($usuarios->Nivel == "0") { ?>checked="checked"<?php } ?> /> Administrador
                          <input type="radio" name="Nivel" id="Nivel" value="1" <?php if ($usuarios->Nivel == "1") { ?>checked="checked"<?php } ?> /> Vendedor
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Vendedor</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select name="IdVendedor" id="IdVendedor" class="form-control">
                            <option value="">Selecione um vendedor</option>
                            <?php 
                              include_once "../conexao.php";
                              $sqlRead = "SELECT * 
                                          FROM tb_vendedores VE
                                          LEFT JOIN tb_pessoas PE ON VE.IdPessoa= PE.IdPessoa";
                              try {
                                $read = $db->prepare($sqlRead);
                                $read->execute();
                              } catch (PDOException $e) {
                                echo $e->getMessage();
                              }
                              while( $rs = $read->fetch(PDO::FETCH_OBJ) ){
                            ?>
                            
                            <option value=<?php echo $rs->IdVendedor; ?>><?php echo $rs->NomePessoa; ?></option>

                            <?php  
                              }
                            ?>
                          </select>
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Status</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="radio" name="Status" id="Status" value="1" <?php if (($IdUsuario == 0)||($usuarios->Status == "1")) { ?>checked="checked"<?php } ?> /> Ativo
                          <input type="radio" name="Status" id="Status" value="0" <?php if ($usuarios->Status == "0") { ?>checked="checked"<?php } ?> /> Inativo
                        </div>
                      </div>

                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <button type="submit" class="btn btn-success">Salvar</button>
                        </div>
                      </div>

                    </form>

                    <?php
                      }
                    ?>
                  </div>
                </div>
              </div>
            </div>

<?php include_once "../rodape.php"; ?>