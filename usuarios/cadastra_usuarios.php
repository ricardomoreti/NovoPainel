<?php

      $acao = (isset($_POST["acao"])) ? $_POST["acao"] : ((isset($_GET["acao"])) ? $_GET["acao"] : "");

      # INSERIR
      if($acao == 'inserir'){

        include_once "../conexao.php";

        $Usuario = $_POST['Usuario'];
        $Senha  = md5($_POST['Senha']);
        $Nivel = $_POST['Nivel'];
        $IdVendedor = $_POST['IdVendedor'];
        $Status = $_POST['Status'];
        
        $DtInclusao = str_replace('/','-',trim($_POST["DtInclusao"]));
        $DtInclusaoTratada = date('Y-m-d H:i:s', strtotime($DtInclusao));
        $DtInclusao = $DtInclusaoTratada;

        $sql  = 'INSERT INTO tb_usuarios (    Usuario, 
                                              Senha, 
                                              Nivel, 
                                              IdVendedor, 
                                              Status,
                                              DtInclusao) ';
        $sql .= 'VALUES ( :Usuario, 
                          :Senha, 
                          :Nivel, 
                          :IdVendedor, 
                          :Status, 
                          :DtInclusao)';

        try {
          $create = $db->prepare($sql);
          $create->bindValue(':Usuario', $Usuario, PDO::PARAM_STR);
          $create->bindValue(':Senha', $Senha, PDO::PARAM_STR);
          $create->bindValue(':Nivel', $Nivel, PDO::PARAM_INT);
          $create->bindValue(':IdVendedor', $IdVendedor, PDO::PARAM_INT);
          $create->bindValue(':Status', $Status, PDO::PARAM_INT);
          $create->bindValue(':DtInclusao', $DtInclusao, PDO::PARAM_STR);
          if($create->execute()){
            echo "<script>alert('Cadastrado com sucesso!');</script>";
            echo "<script>window.location = 'busca_usuarios.php?Status=1';</script>";
          }
        } catch (PDOException $e) {
            echo "<script>alert('Erro ao salvar')</script>";
            echo $e->getMessage();
        }

      }

      # EDITAR
      if($acao == 'editar'){

        include_once "../conexao.php";

        $IdUsuario  = $_POST['IdUsuario'];
        $Usuario = $_POST['Usuario'];
        $Nivel  = $_POST['Nivel'];
        $IdVendedor  = $_POST['IdVendedor'];
        $Status = $_POST['Status'];

        $DtAlteracao = str_replace('/','-',trim($_POST["DtAlteracao"]));
        $DtAlteracaoTratada = date('Y-m-d H:i:s', strtotime($DtAlteracao));
        $DtAlteracao = $DtAlteracaoTratada;

        $sqlUpdate = 'UPDATE tb_usuarios 
                      SET IdUsuario = :IdUsuario, 
                          Usuario = :Usuario, 
                          Nivel = :Nivel, 
                          Status = :Status,
                          IdVendedor = :IdVendedor,
                          DtAlteracao = :DtAlteracao
                      WHERE IdUsuario = :IdUsuario';

        try {
          $update = $db->prepare($sqlUpdate);
          $update->bindValue(':Usuario', $Usuario, PDO::PARAM_STR);
          $update->bindValue(':Nivel', $Nivel, PDO::PARAM_INT);
          $update->bindValue(':IdVendedor', $IdVendedor, PDO::PARAM_INT);
          $update->bindValue(':Status', $Status, PDO::PARAM_INT);
          $update->bindValue(':DtAlteracao', $DtAlteracao, PDO::PARAM_STR);
          $update->bindValue(':IdUsuario', $IdUsuario, PDO::PARAM_INT);
          if($update->execute()){
            echo "<script>alert('Atualizado com sucesso!');</script>";
            echo "<script>window.location = 'busca_usuarios.php?Status=1';</script>";
          }
        } catch (PDOException $e) {
            echo "<script>alert('Erro ao alterar')</script>";
        }
      }


      # EXCLUIR
      if($acao == 'excluir'){

        include_once "../conexao.php";

        $IdUsuario = (int)$_GET['IdUsuario'];

        $sqlDelete = 'DELETE FROM tb_usuarios WHERE IdUsuario = :IdUsuario';

        try {
          $delete = $db->prepare($sqlDelete);
          $delete->bindValue(':IdUsuario', $IdUsuario, PDO::PARAM_INT);
          if($delete->execute()){
            echo "<script>alert('Excluido com sucesso!');</script>";
            echo "<script>window.location = 'busca_usuarios.php?Status=1';</script>";          }
        } catch (PDOException $e) {
            echo "<script>alert('Erro ao excluir')</script>";        }
      }

?>

<?php include_once "../cabecalho.php"; ?>
        
        <div class="page-title">
          <div class="title_left">
            <h3>Usuários</h3>
          </div>

          <div class="title_right">
            <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                <a href="cadastra_pessoas.php">
                    <a class="btn btn-app" href="busca_usuarios.php">
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
                    <h2>Cadastro de Usuários</h2>
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
                    <form id="cadastro_usuarios" method="post" action="" data-parsley-validate class="form-horizontal form-label-left">

                      <input type="hidden" name="acao" value="inserir">
                      <input type="hidden" name="Status" value="1">
                      <input type="hidden" name="DtInclusao" value="<?php echo date('d/m/Y H:i:s') ?>">

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Usuario">Usuário</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="Usuario" name="Usuario" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Senha">Senha</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="password" id="Senha" name="Senha" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Nivel</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="radio" name="Nivel" id="Nivel" value="0" checked="checked" /> Administrador
                          <input type="radio" name="Nivel" id="Nivel" value="1" /> Vendedor
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