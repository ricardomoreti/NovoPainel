<?php
    include_once "../conexao.php";
    
    $IdPessoa = (int)$_GET['IdPessoa'];

    $sqlRead = 'SELECT * FROM tb_pessoas WHERE IdPessoa = '.$IdPessoa;
    try {
      $read = $db->prepare($sqlRead);
      $read->execute();
    } catch (PDOException $e) {
      echo $e->getMessage();
    }
    while( $rs = $read->fetch(PDO::FETCH_OBJ) ){

?>

<?php include_once "../cabecalho.php"; ?>
        
        <div class="page-title">
          <div class="title_left">
            <h3>Pessoas</h3>
          </div>

          <div class="title_right">
            <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                <a href="cadastra_pessoas.php">
                    <a class="btn btn-app" href="busca_pessoas.php?Status=1">
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
                    <h2>Editando Pessoas</h2>
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
                    <form id="editar_pessoas" method="post" action="cadastra_pessoas.php" data-parsley-validate class="form-horizontal form-label-left">

                      <input type="hidden" name="acao" value="editar">
                      <input type="hidden" name="DtAlteracao" value="<?php echo date('d/m/Y H:i:s') ?>">
                      
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="IdPessoa">Código <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="IdPessoa" name="IdPessoa" required="required" readonly="readonly" class="form-control col-md-7 col-xs-12" value="<?php echo $rs->IdPessoa; ?>">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="NomePessoa">Nome <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="NomePessoa" name="NomePessoa" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $rs->NomePessoa; ?>">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="RazaoSocial">Razão Social</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="RazaoSocial" name="RazaoSocial" class="form-control col-md-7 col-xs-12" value="<?php echo $rs->RazaoSocial; ?>">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="CpfCnpj">CPF/CNPJ</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="CpfCnpj" name="CpfCnpj" class="form-control col-md-7 col-xs-12" value="<?php echo $rs->CpfCnpj; ?>">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="RgInscEstadual">RG/INSCRIÇÃO ESTADUAL</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="RgInscEstadual" name="RgInscEstadual" class="form-control col-md-7 col-xs-12" value="<?php echo $rs->RgInscEstadual; ?>">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Email">E-Mail</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="Email" name="Email" class="form-control col-md-7 col-xs-12" value="<?php echo $rs->Email; ?>">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Telefone1">Telefone</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="Telefone1" name="Telefone1" class="form-control col-md-7 col-xs-12" value="<?php echo $rs->Telefone1; ?>">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Telefone2">Celular</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="Telefone2" name="Telefone2" class="form-control col-md-7 col-xs-12" value="<?php echo $rs->Telefone2; ?>">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="CEP">CEP</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="CEP" name="CEP" class="form-control col-md-7 col-xs-12" value="<?php echo $rs->CEP; ?>">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Logradouro">Logradouro</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="Logradouro" name="Logradouro" class="form-control col-md-7 col-xs-12" value="<?php echo $rs->Logradouro; ?>">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Numero">Número</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="Numero" name="Numero" class="form-control col-md-7 col-xs-12" value="<?php echo $rs->Numero; ?>">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Bairro">Bairro</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="Bairro" name="Bairro" class="form-control col-md-7 col-xs-12" value="<?php echo $rs->Bairro; ?>">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Cidade">Cidade</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="Cidade" name="Cidade" class="form-control col-md-7 col-xs-12" value="<?php echo $rs->Cidade; ?>">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Estado">Estado</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="Estado" name="Estado" class="form-control col-md-7 col-xs-12" value="<?php echo $rs->Estado; ?>">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Complemento">Complemento</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="Complemento" name="Complemento" class="form-control col-md-7 col-xs-12" value="<?php echo $rs->Complemento; ?>">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Status</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="radio" name="Status" id="Status" value="1" <?php if (($IdPessoa == 0)||($rs->Status == "1")) { ?>checked="checked"<?php } ?> /> Ativo
                          <input type="radio" name="Status" id="Status" value="0" <?php if ($rs->Status == "0") { ?>checked="checked"<?php } ?> /> Inativo
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Observação</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <textarea name="Observacao" id="Observacao" class="resizable_textarea form-control" rows="3"><?php echo trim($rs->Observacao); ?></textarea>
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