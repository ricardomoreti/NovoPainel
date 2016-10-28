<?php 
  include_once "../cabecalho.php";
  include_once "../conexao.php";
?>
        
        <div class="page-title">
          <div class="title_left">
            <h3>Concorrentes</h3>
          </div>

            <div class="title_right">
              <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                <a class="btn btn-app" href="cadastra_concorrentes.php">
                  <i class="fa fa-plus"></i> Novo
                </a>
              </div>
            </div>
          </div>

            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Listando Concorrentes<small>Filtros para pesquisa</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">

                    <!-- INICIO FORM DE BUSCA -->
                    <form id="form_busca" method="get" action="busca_concorrentes.php" data-parsley-validate class="form-horizontal form-label-left">

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="NomePessoa">Concorrente</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="NomePessoa" name="NomePessoa" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Status">Status</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="radio" name="Status" id="Status" value="1" checked="checked">Ativo
                          <input type="radio" name="Status" id="Status" value="0">Inativo
                        </div>
                      </div>                        

                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <button type="submit" class="btn btn-success">Filtrar</button>
                        </div>
                      </div>

                    </form>
                    <!-- FINAL FORM DE BUSCA -->


                    <!-- INICIO LISTAGEM DE PESSOAS -->
                    <br />

                    <div class="table-responsive">
                      <table class="table table-striped jambo_table bulk_action">
                        <thead>
                          <tr class="headings">
                            <th class="column-title">Código</th>
                            <th class="column-title">Concorrente</th>
                            <th class="column-title no-link last"><span class="nobr">Ação</span></th>
                            <th class="bulk-actions" colspan="7">
                              <a class="antoo" style="color:#fff; font-weight:500;">Bulk Actions ( <span class="action-cnt"> </span> ) <i class="fa fa-chevron-down"></i></a>
                            </th>
                          </tr>
                        </thead>

                        <tbody>

                          <?php
                            $NomePessoa = (isset($_GET['NomePessoa'])) ? $_GET['NomePessoa'] : '';
                            $Status = (isset($_GET['Status'])) ? $_GET['Status'] : '';

                            if($NomePessoa == ''){
                              $CriterioNomePessoa = '';
                            } else {
                              $CriterioNomePessoa = "AND PE.NomePessoa LIKE '%".$NomePessoa."%' ";
                            }

                            if($Status == ''){
                              $CriterioStatus = '';
                            } else {
                              $CriterioStatus = "AND CC.Status = ".$Status;
                            }

                            $Criterios = $CriterioNomePessoa.$CriterioStatus;

                            if(strcmp(substr($Criterios, 0, 3), "AND") == 0){
                              $Criterios = " WHERE " . substr($Criterios, 4, strlen($Criterios));
                            }
                            
                            $sqlRead = "SELECT * 
                                        FROM tb_concorrentes CC
                                        LEFT JOIN tb_pessoas PE ON CC.IdPessoa = PE.IdPessoa ".$Criterios;

                              try {
                              $read = $db->prepare($sqlRead);
                              $read->execute();
                              } catch (PDOException $e) {
                                echo $e->getMessage();
                              }
                             
                              while( $rs = $read->fetch(PDO::FETCH_OBJ) ){
                          ?>                          

                          <tr class="even pointer">
                            <td class=" "><?php echo $rs->IdConcorrente; ?></td>
                            <td class=" "><?php echo $rs->NomePessoa; ?></td>
                            <td class=" last">                              
                                <a href="editar_concorrentes.php?IdConcorrente=<?php echo $rs->IdConcorrente; ?>">
                                  <i class="fa fa-edit"></i> Editar
                                </a> | 
                                <a href="cadastra_concorrentes.php?acao=excluir&IdConcorrente=<?php echo $rs->IdConcorrente; ?>" onclick="return confirm('Deseja excluir?');">
                                  <i class="fa fa-trash"></i> Excluir
                                </a>
                            </td>
                          </tr>
                          <?php } ?>
                        </tbody>
                      </table>
                    </div>
                    <!-- FINAL LISTAGEM DE PESSOAS -->
                  </div>
                </div>
              </div>
            </div>

<?php include_once "../rodape.php"; ?>