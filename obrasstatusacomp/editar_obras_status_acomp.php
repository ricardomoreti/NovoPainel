<?php
    include_once "../conexao.php";
    
    $IdObraStatus = (int)$_GET['IdObraStatus'];

    $sqlRead = 'SELECT * FROM tb_obras_status_acomp WHERE IdObraStatus = '.$IdObraStatus;
    try {
      $read = $db->prepare($sqlRead);
      $read->execute();
    } catch (PDOException $e) {
      echo $e->getMessage();
    }
    while( $obras_status_acomp = $read->fetch(PDO::FETCH_OBJ) ){

?>

<?php include_once "../cabecalho.php"; ?>
        
        <div class="page-title">
          <div class="title_left">
            <h3>Status de Acompanhamento</h3>
          </div>

          <div class="title_right">
            <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                <a href="cadastra_obras_status_acomp.php">
                    <a class="btn btn-app" href="busca_obras_status_acomp.php?Status=1">
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
                    <h2>Editando Status de Acompanhamento</h2>
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
                    <form id="editar_obras_padrao" method="post" action="cadastra_obras_status_acomp.php" data-parsley-validate class="form-horizontal form-label-left">

                      <input type="hidden" name="acao" value="editar">
                      <input type="hidden" name="DtAlteracao" value="<?php echo date('d/m/Y H:i:s') ?>">
                      
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="IdObraStatus">Código <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="IdObraStatus" name="IdObraStatus" required="required" readonly="readonly" class="form-control col-md-7 col-xs-12" value="<?php echo $obras_status_acomp->IdObraStatus; ?>">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Descricao">Status do Acompanhamento</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="Descricao" name="Descricao" class="form-control col-md-7 col-xs-12" value="<?php echo $obras_status_acomp->Descricao; ?>">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Status Final?</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="radio" name="StatusFinal" id="StatusFinal" value="1" <?php if (($IdObraStatus == 0)||($obras_status_acomp->StatusFinal == "1")) { ?>checked="checked"<?php } ?> /> Sim
                          <input type="radio" name="StatusFinal" id="StatusFinal" value="0" <?php if ($obras_status_acomp->StatusFinal == "0") { ?>checked="checked"<?php } ?> /> Não
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Status</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="radio" name="Status" id="Status" value="1" <?php if (($IdObraStatus == 0)||($obras_status_acomp->Status == "1")) { ?>checked="checked"<?php } ?> /> Ativo
                          <input type="radio" name="Status" id="Status" value="0" <?php if ($obras_status_acomp->Status == "0") { ?>checked="checked"<?php } ?> /> Inativo
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