<?php

      include_once "../funcoes/remove_acentos.php";
      include_once "../funcoes/maiuscula.php";
      include_once "../funcoes/datas.php";

      $acao = (isset($_POST["acao"])) ? $_POST["acao"] : ((isset($_GET["acao"])) ? $_GET["acao"] : "");

      # INSERIR
      if($acao == 'inserir'){

        include_once "../conexao.php";

        $Descricao = removeAcentos(transformaMaiuscula($_POST['Descricao']));
        $Status = $_POST['Status'];
        $DtInclusao = converteDataHora($_POST['DtInclusao']);

        $sql  = 'INSERT INTO tb_obras_padrao (    Descricao, 
                                                Status,
                                                DtInclusao) ';
        $sql .= 'VALUES ( :Descricao,
                          :Status, 
                          :DtInclusao)';

        try {
          $create = $db->prepare($sql);
          $create->bindValue(':Descricao', $Descricao, PDO::PARAM_STR);
          $create->bindValue(':Status', $Status, PDO::PARAM_INT);
          $create->bindValue(':DtInclusao', $DtInclusao, PDO::PARAM_STR);
          if($create->execute()){
            echo "<script>alert('Cadastrado com sucesso!');</script>";
            echo "<script>window.location = 'busca_obras_padrao.php?Status=1';</script>";
          }
        } catch (PDOException $e) {
            echo "<script>alert('Erro ao salvar')</script>";
            echo $e->getMessage();
        }

      }

      # EDITAR
      if($acao == 'editar'){

        include_once "../conexao.php";

        $IdObraPadrao  = $_POST['IdObraPadrao'];
        $Descricao = removeAcentos(transformaMaiuscula($_POST['Descricao']));
        $Status = $_POST['Status'];
        $DtAlteracao = converteDataHora($_POST['DtAlteracao']);

        $sqlUpdate = 'UPDATE tb_obras_padrao 
                      SET IdObraPadrao = :IdObraPadrao, 
                          Descricao = :Descricao, 
                          Status = :Status,
                          DtAlteracao = :DtAlteracao
                      WHERE IdObraPadrao = :IdObraPadrao';

        try {
          $update = $db->prepare($sqlUpdate);
          $update->bindValue(':Descricao', $Descricao, PDO::PARAM_STR);
          $update->bindValue(':Status', $Status, PDO::PARAM_INT);
          $update->bindValue(':DtAlteracao', $DtAlteracao, PDO::PARAM_STR);
          $update->bindValue(':IdObraPadrao', $IdObraPadrao, PDO::PARAM_INT);
          if($update->execute()){
            echo "<script>alert('Atualizado com sucesso!');</script>";
            echo "<script>window.location = 'busca_obras_padrao.php?Status=1';</script>";
          }
        } catch (PDOException $e) {
            echo "<script>alert('Erro ao alterar')</script>";
        }
      }


      # EXCLUIR
      if($acao == 'excluir'){

        include_once "../conexao.php";

        $IdObraPadrao = (int)$_GET['IdObraPadrao'];

        $sqlDelete = 'DELETE FROM tb_obras_padrao WHERE IdObraPadrao = :IdObraPadrao';

        try {
          $delete = $db->prepare($sqlDelete);
          $delete->bindValue(':IdObraPadrao', $IdObraPadrao, PDO::PARAM_INT);
          if($delete->execute()){
            echo "<script>alert('Excluido com sucesso!');</script>";
            echo "<script>window.location = 'busca_obras_padrao.php?Status=1';</script>";          }
        } catch (PDOException $e) {
            echo "<script>alert('Erro ao excluir')</script>";        }
      }

?>

<?php include_once "../cabecalho.php"; ?>
        
        <div class="page-title">
          <div class="title_left">
            <h3>Padrões da Obra</h3>
          </div>

          <div class="title_right">
            <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                <a href="cadastra_obras_fase.php">
                    <a class="btn btn-app" href="busca_obras_padrao.php">
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
                    <h2>Cadastro de Padrões da Obra</h2>
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
                    <form id="cadastro_obras_padrao" method="post" action="" data-parsley-validate class="form-horizontal form-label-left">

                      <input type="hidden" name="acao" value="inserir">
                      <input type="hidden" name="Status" value="1">
                      <input type="hidden" name="DtInclusao" value="<?php echo date('d/m/Y H:i:s') ?>">

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Descricao">Descrição</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="Descricao" name="Descricao" required="required" class="form-control col-md-7 col-xs-12">
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