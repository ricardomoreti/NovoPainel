<?php

      $acao = (isset($_POST["acao"])) ? $_POST["acao"] : ((isset($_GET["acao"])) ? $_GET["acao"] : "");

      # INSERIR
      if($acao == 'inserir'){

        include_once "../conexao.php";

        $IdPessoa  = $_POST['IdPessoa'];
        $CodUplife  = $_POST['CodUplife'];
        $SequencialVenda  = $_POST['SequencialVenda'];
        $Status = $_POST['Status'];
        
        $DtInclusao = str_replace('/','-',trim($_POST["DtInclusao"]));
        $DtInclusaoTratada = date('Y-m-d H:i:s', strtotime($DtInclusao));
        $DtInclusao = $DtInclusaoTratada;

        $sql  = 'INSERT INTO tb_vendedores (  IdPessoa, 
                                              CodUplife, 
                                              SequencialVenda, 
                                              Status,
                                              DtInclusao) ';
        $sql .= 'VALUES ( :IdPessoa, 
                          :CodUplife, 
                          :SequencialVenda, 
                          :Status, 
                          :DtInclusao)';

        try {
          $create = $db->prepare($sql);
          $create->bindValue(':IdPessoa', $IdPessoa, PDO::PARAM_INT);
          $create->bindValue(':CodUplife', $CodUplife, PDO::PARAM_INT);
          $create->bindValue(':SequencialVenda', $SequencialVenda, PDO::PARAM_INT);
          $create->bindValue(':Status', $Status, PDO::PARAM_INT);
          $create->bindValue(':DtInclusao', $DtInclusao, PDO::PARAM_STR);
          if($create->execute()){
            echo "<script>alert('Cadastrado com sucesso!');</script>";
            echo "<script>window.location = 'busca_vendedores.php?Status=1';</script>";
          }
        } catch (PDOException $e) {
            echo "<script>alert('Erro ao salvar')</script>";
            echo $e->getMessage();
        }

      }

      # EDITAR
      if($acao == 'editar'){

        include_once "../conexao.php";

        $IdVendedor  = $_POST['IdVendedor'];
        $IdPessoa = $_POST['IdPessoa'];
        $CodUplife  = $_POST['CodUplife'];
        $SequencialVenda  = $_POST['SequencialVenda'];
        $Status = $_POST['Status'];

        $DtAlteracao = str_replace('/','-',trim($_POST["DtAlteracao"]));
        $DtAlteracaoTratada = date('Y-m-d H:i:s', strtotime($DtAlteracao));
        $DtAlteracao = $DtAlteracaoTratada;

        $sqlUpdate = 'UPDATE tb_vendedores 
                      SET IdPessoa = :IdPessoa, 
                          CodUplife = :CodUplife, 
                          SequencialVenda = :SequencialVenda, 
                          Status = :Status,
                          DtAlteracao = :DtAlteracao
                      WHERE IdVendedor = :IdVendedor';

        try {
          $update = $db->prepare($sqlUpdate);
          $update->bindValue(':IdPessoa', $IdPessoa, PDO::PARAM_INT);
          $update->bindValue(':CodUplife', $CodUplife, PDO::PARAM_INT);
          $update->bindValue(':SequencialVenda', $SequencialVenda, PDO::PARAM_INT);
          $update->bindValue(':Status', $Status, PDO::PARAM_INT);
          $update->bindValue(':DtAlteracao', $DtAlteracao, PDO::PARAM_STR);
          $update->bindValue(':IdVendedor', $IdVendedor, PDO::PARAM_INT);
          if($update->execute()){
            echo "<script>alert('Atualizado com sucesso!');</script>";
            echo "<script>window.location = 'busca_vendedores.php?Status=1';</script>";
          }
        } catch (PDOException $e) {
            echo "<script>alert('Erro ao alterar')</script>";
        }
      }


      # EXCLUIR
      if($acao == 'excluir'){

        include_once "../conexao.php";

        $IdVendedor = (int)$_GET['IdVendedor'];

        $sqlDelete = 'DELETE FROM tb_vendedores WHERE IdVendedor = :IdVendedor';

        try {
          $delete = $db->prepare($sqlDelete);
          $delete->bindValue(':IdVendedor', $IdVendedor, PDO::PARAM_INT);
          if($delete->execute()){
            echo "<script>alert('Excluido com sucesso!');</script>";
            echo "<script>window.location = 'busca_vendedores.php?Status=1';</script>";          }
        } catch (PDOException $e) {
            echo "<script>alert('Erro ao excluir')</script>";        }
      }

?>

<?php include_once "../cabecalho.php"; ?>
        
        <div class="page-title">
          <div class="title_left">
            <h3>Vendedores</h3>
          </div>

          <div class="title_right">
            <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                <a href="cadastra_pessoas.php">
                    <a class="btn btn-app" href="busca_vendedores.php">
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
                    <h2>Cadastro de Vendedores</h2>
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
                    <form id="cadastro_vendedores" method="post" action="" data-parsley-validate class="form-horizontal form-label-left">

                      <input type="hidden" name="acao" value="inserir">
                      <input type="hidden" name="Status" value="1">
                      <input type="hidden" name="DtInclusao" value="<?php echo date('d/m/Y H:i:s') ?>">

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
                              while( $rs = $read->fetch(PDO::FETCH_OBJ) ){
                            ?>
                            
                            <option value=<?php echo $rs->IdPessoa; ?>><?php echo $rs->NomePessoa; ?></option>

                            <?php  
                              }
                            ?>
                          </select>
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="CodUplife">Código upLIFE</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="CodUplife" name="CodUplife" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="SequencialVenda">Sequencial de Venda</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="SequencialVenda" name="SequencialVenda" class="form-control col-md-7 col-xs-12">
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