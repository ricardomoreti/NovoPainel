<?php
    include_once "../conexao.php";
    
    $IdVendedor = (int)$_GET['IdVendedor'];

    $sqlRead = 'SELECT * FROM tb_vendedores WHERE IdVendedor = '.$IdVendedor;
    try {
      $read = $db->prepare($sqlRead);
      $read->execute();
    } catch (PDOException $e) {
      echo $e->getMessage();
    }
    while( $vendedores = $read->fetch(PDO::FETCH_OBJ) ){

?>

<?php include_once "../cabecalho.php"; ?>
        
        <div class="page-title">
          <div class="title_left">
            <h3>Vendedores</h3>
          </div>

          <div class="title_right">
            <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                <a href="cadastra_vendedores.php">
                    <a class="btn btn-app" href="busca_vendedores.php?Status=1">
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
                    <h2>Editando Vendedores</h2>
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
                    <form id="editar_vendedores" method="post" action="cadastra_vendedores.php" data-parsley-validate class="form-horizontal form-label-left">

                      <input type="hidden" name="acao" value="editar">
                      <input type="hidden" name="DtAlteracao" value="<?php echo date('d/m/Y H:i:s') ?>">
                      
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="IdVendedor">Código <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="IdVendedor" name="IdVendedor" required="required" readonly="readonly" class="form-control col-md-7 col-xs-12" value="<?php echo $vendedores->IdVendedor; ?>">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Vendedor</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select name="IdPessoa" id="IdPessoa" class="form-control">
                            <option value="">Selecione um vendedor</option>
                            <?php 
                              include_once "../conexao.php";
                              $sqlRead = "SELECT * FROM tb_pessoas";
                              try {
                                $read = $db->prepare($sqlRead);
                                $read->execute();
                              } catch (PDOException $e) {
                                echo $e->getMessage();
                              }
                              while( $pessoas = $read->fetch(PDO::FETCH_OBJ) ){
                            ?>
                            
                            <option value=<?php echo $pessoas->IdPessoa; ?> <?php if($vendedores->IdPessoa == $pessoas->IdPessoa){ echo "selected='selected'";} ?> ><?php echo $pessoas->NomePessoa; ?></option>

                            <?php  
                              }
                            ?>
                          </select>
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="CodUplife">Código upLIFE</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="CodUplife" name="CodUplife" class="form-control col-md-7 col-xs-12" value="<?php echo $vendedores->CodUplife; ?>">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="SequencialVenda">Sequencial de Venda</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="SequencialVenda" name="SequencialVenda" class="form-control col-md-7 col-xs-12" value="<?php echo $vendedores->SequencialVenda; ?>">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Status</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="radio" name="Status" id="Status" value="1" <?php if (($IdVendedor == 0)||($vendedores->Status == "1")) { ?>checked="checked"<?php } ?> /> Ativo
                          <input type="radio" name="Status" id="Status" value="0" <?php if ($vendedores->Status == "0") { ?>checked="checked"<?php } ?> /> Inativo
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