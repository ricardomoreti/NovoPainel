<?php
      include_once "../funcoes/remove_acentos.php";
      include_once "../funcoes/maiuscula.php";
      include_once "../funcoes/datas.php";

      $acao = (isset($_POST["acao"])) ? $_POST["acao"] : ((isset($_GET["acao"])) ? $_GET["acao"] : "");

      # INSERIR
      if($acao == 'inserir'){

        include_once "../conexao.php";

        $NomePessoa  = removeAcentos(transformaMaiuscula($_POST['NomePessoa']));
        $RazaoSocial  = removeAcentos(transformaMaiuscula($_POST['RazaoSocial']));
        $CpfCnpj = $_POST['CpfCnpj'];
        $RgInscEstadual = $_POST['RgInscEstadual'];
        $Email = $_POST['Email'];
        $Telefone1 = $_POST['Telefone1'];
        $Telefone2 = $_POST['Telefone2'];
        $CEP = $_POST['CEP'];
        $Logradouro = removeAcentos(transformaMaiuscula($_POST['Logradouro']));
        $Numero = $_POST['Numero'];
        $Bairro = removeAcentos(transformaMaiuscula($_POST['Bairro']));
        $Cidade = removeAcentos(transformaMaiuscula($_POST['Cidade']));
        $Estado = removeAcentos(transformaMaiuscula($_POST['Estado']));
        $Complemento = removeAcentos(transformaMaiuscula($_POST['Complemento']));
        $Observacao = removeAcentos(transformaMaiuscula(trim($_POST['Observacao'])));
        $Status = $_POST['Status'];
        $DtInclusao = converteDataHora($_POST['DtInclusao']);

        $sql  = 'INSERT INTO tb_pessoas ( NomePessoa, 
                                          RazaoSocial, 
                                          CpfCnpj, 
                                          RgInscEstadual, 
                                          Email,
                                          Telefone1,
                                          Telefone2,
                                          CEP,
                                          Logradouro,
                                          Numero,
                                          Bairro,
                                          Cidade,
                                          Estado,
                                          Complemento,
                                          Observacao,
                                          Status,
                                          DtInclusao) ';
        $sql .= 'VALUES ( :NomePessoa, 
                          :RazaoSocial, 
                          :CpfCnpj, 
                          :RgInscEstadual, 
                          :Email, 
                          :Telefone1, 
                          :Telefone2, 
                          :CEP, 
                          :Logradouro, 
                          :Numero, 
                          :Bairro, 
                          :Cidade, 
                          :Estado,
                          :Complemento,
                          :Observacao,
                          :Status, 
                          :DtInclusao)';

        try {
          $create = $db->prepare($sql);
          $create->bindValue(':NomePessoa', $NomePessoa, PDO::PARAM_STR);
          $create->bindValue(':RazaoSocial', $RazaoSocial, PDO::PARAM_STR);
          $create->bindValue(':CpfCnpj', $CpfCnpj, PDO::PARAM_STR);
          $create->bindValue(':RgInscEstadual', $RgInscEstadual, PDO::PARAM_STR);
          $create->bindValue(':Email', $Email, PDO::PARAM_STR);
          $create->bindValue(':Telefone1', $Telefone1, PDO::PARAM_STR);
          $create->bindValue(':Telefone2', $Telefone2, PDO::PARAM_STR);
          $create->bindValue(':CEP', $CEP, PDO::PARAM_STR);
          $create->bindValue(':Logradouro', $Logradouro, PDO::PARAM_STR);
          $create->bindValue(':Numero', $Numero, PDO::PARAM_INT);
          $create->bindValue(':Bairro', $Bairro, PDO::PARAM_STR);
          $create->bindValue(':Cidade', $Cidade, PDO::PARAM_STR);
          $create->bindValue(':Estado', $Estado, PDO::PARAM_STR);
          $create->bindValue(':Complemento', $Complemento, PDO::PARAM_STR);
          $create->bindValue(':Observacao', $Observacao, PDO::PARAM_STR);
          $create->bindValue(':Status', $Status, PDO::PARAM_INT);
          $create->bindValue(':DtInclusao', $DtInclusao, PDO::PARAM_STR);
          if($create->execute()){
            echo "<script>alert('Cadastrado com sucesso!');</script>";
            echo "<script>window.location = 'busca_pessoas.php?Status=1';</script>";
          }
        } catch (PDOException $e) {
            echo "<script>alert('Erro ao salvar')</script>";
            echo $e->getMessage();
        }

      }

      # EDITAR
      if($acao == 'editar'){

        include_once "../conexao.php";

        $IdPessoa = $_POST['IdPessoa'];
        $NomePessoa  = removeAcentos(transformaMaiuscula($_POST['NomePessoa']));
        $RazaoSocial  = removeAcentos(transformaMaiuscula($_POST['RazaoSocial']));
        $CpfCnpj = $_POST['CpfCnpj'];
        $RgInscEstadual = $_POST['RgInscEstadual'];
        $Email = $_POST['Email'];
        $Telefone1 = $_POST['Telefone1'];
        $Telefone2 = $_POST['Telefone2'];
        $CEP = $_POST['CEP'];
        $Logradouro = removeAcentos(transformaMaiuscula($_POST['Logradouro']));
        $Numero = $_POST['Numero'];
        $Bairro = removeAcentos(transformaMaiuscula($_POST['Bairro']));
        $Cidade = removeAcentos(transformaMaiuscula($_POST['Cidade']));
        $Estado = removeAcentos(transformaMaiuscula($_POST['Estado']));
        $Complemento = removeAcentos(transformaMaiuscula($_POST['Complemento']));
        $Observacao = removeAcentos(transformaMaiuscula(trim($_POST['Observacao'])));
        $Status = $_POST['Status'];
        $DtAlteracao = converteDataHora($_POST['DtAlteracao']);

        $sqlUpdate = 'UPDATE tb_pessoas 
                      SET NomePessoa = :NomePessoa, 
                          RazaoSocial = :RazaoSocial, 
                          CpfCnpj = :CpfCnpj, 
                          RgInscEstadual = :RgInscEstadual, 
                          Email = :Email, 
                          Telefone1 = :Telefone1, 
                          Telefone2 = :Telefone2, 
                          CEP = :CEP, 
                          Logradouro = :Logradouro, 
                          Numero = :Numero, 
                          Bairro = :Bairro, 
                          Cidade = :Cidade, 
                          Estado = :Estado, 
                          Complemento = :Complemento, 
                          Observacao = :Observacao, 
                          Status = :Status,
                          DtAlteracao = :DtAlteracao
                      WHERE IdPessoa = :IdPessoa';

        try {
          $update = $db->prepare($sqlUpdate);
          $update->bindValue(':NomePessoa', $NomePessoa, PDO::PARAM_STR);
          $update->bindValue(':RazaoSocial', $RazaoSocial, PDO::PARAM_STR);
          $update->bindValue(':CpfCnpj', $CpfCnpj, PDO::PARAM_STR);
          $update->bindValue(':RgInscEstadual', $RgInscEstadual, PDO::PARAM_STR);
          $update->bindValue(':Email', $Email, PDO::PARAM_STR);
          $update->bindValue(':Telefone1', $Telefone1, PDO::PARAM_STR);
          $update->bindValue(':Telefone2', $Telefone2, PDO::PARAM_STR);
          $update->bindValue(':CEP', $CEP, PDO::PARAM_STR);
          $update->bindValue(':Logradouro', $Logradouro, PDO::PARAM_STR);
          $update->bindValue(':Numero', $Numero, PDO::PARAM_STR);
          $update->bindValue(':Bairro', $Bairro, PDO::PARAM_STR);
          $update->bindValue(':Cidade', $Cidade, PDO::PARAM_STR);
          $update->bindValue(':Estado', $Estado, PDO::PARAM_STR);
          $update->bindValue(':Complemento', $Complemento, PDO::PARAM_STR);
          $update->bindValue(':Observacao', $Observacao, PDO::PARAM_STR);
          $update->bindValue(':Status', $Status, PDO::PARAM_INT);
          $update->bindValue(':DtAlteracao', $DtAlteracao, PDO::PARAM_STR);
          $update->bindValue(':IdPessoa', $IdPessoa, PDO::PARAM_INT);
          if($update->execute()){
            echo "<script>alert('Atualizado com sucesso!');</script>";
            echo "<script>window.location = 'busca_pessoas.php?Status=1';</script>";
          }
        } catch (PDOException $e) {
            echo "<script>alert('Erro ao alterar')</script>";
        }
      }


      # EXCLUIR
      if($acao == 'excluir'){

        include_once "../conexao.php";

        $IdPessoa = (int)$_GET['IdPessoa'];

        $sqlDelete = 'DELETE FROM tb_pessoas WHERE IdPessoa = :IdPessoa';

        try {
          $delete = $db->prepare($sqlDelete);
          $delete->bindValue(':IdPessoa', $IdPessoa, PDO::PARAM_INT);
          if($delete->execute()){
            echo "<script>alert('Excluido com sucesso!');</script>";
            echo "<script>window.location = 'busca_pessoas.php?Status=1';</script>";          }
        } catch (PDOException $e) {
            echo "<script>alert('Erro ao excluir')</script>";        }
      }

?>

<?php include_once "../cabecalho.php"; ?>
        
        <div class="page-title">
          <div class="title_left">
            <h3>Pessoas</h3>
          </div>

          <div class="title_right">
            <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                <a href="cadastra_pessoas.php">
                    <a class="btn btn-app" href="busca_pessoas.php">
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
                    <h2>Cadastro de Pessoas</h2>
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
                    <form id="cadastro_pessoas" method="post" action="" data-parsley-validate class="form-horizontal form-label-left">

                      <input type="hidden" name="acao" value="inserir">
                      <input type="hidden" name="Status" value="1">
                      <input type="hidden" name="DtInclusao" value="<?php echo date('d/m/Y H:i:s') ?>">

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="NomePessoa">Nome <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="NomePessoa" name="NomePessoa" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="RazaoSocial">Razao Social</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="RazaoSocial" name="RazaoSocial" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="CpfCnpj">CPF/CNPJ</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="CpfCnpj" name="CpfCnpj" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="RgInscEstadual">RG/INSC ESTADUAL</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="RgInscEstadual" name="RgInscEstadual" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Email">E-mail</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="Email" name="Email" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Telefone1">Telefone</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="Telefone1" name="Telefone1" class="form-control col-md-7 col-xs-12" >
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Telefone2">Celular</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="Telefone2" name="Telefone2" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="CEP">CEP</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="CEP" name="CEP" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Logradouro">Logradouro</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="Logradouro" name="Logradouro" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Numero">Número</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="Numero" name="Numero" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Bairro">Bairro</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="Bairro" name="Bairro" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Cidade">Cidade</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="Cidade" name="Cidade" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Estado">Estado</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="Estado" name="Estado" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Complemento">Complemento</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="Complemento" name="Complemento" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Observação</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <textarea name="Observacao" id="Observacao" class="resizable_textarea form-control"></textarea>
                        </div>
                      </div>

                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <button type="submit" class="btn btn-success">Salvar</button>
                        </div>
                      </div>

                    </form>
                  </div>
                </div>
              </div>
            </div>

<?php include_once "../rodape.php"; ?>