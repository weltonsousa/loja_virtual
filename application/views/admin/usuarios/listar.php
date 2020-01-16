<!--titulo da pagina-->
 <section class="content-header">
      <h1>
       <?php echo $titulo ?>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php base_url('admin') ?>"><i class="fa fa-dashboard"></i> Home</a></li>
      <!--   <li><a href="#">Examples</a></li> -->
        <li class="active"><?php echo $titulo ?></li>
      </ol>
    </section>



    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">

          <div class="row margin-bottom-20">
            <div class="col-md-12 text-right">

              <a href="<?php echo base_url('admin/usuarios/modulo')?>" title="Novo" class="btn btn-success"><i class="fa fa-plus-circle"></i> Novo</a>
              </div>
            </div>

            <?php getMsg('msgCadastro'); ?>

    <table class="table table-bordered table_listar_DataTable">
        <thead>
        <tr>
          <td>Nome</td>
          <td>E-mail</td> 
          <td class ="text-center">Status</td> 
          <td class ="text-right">Opções</td>
        </tr>  
          </thead>
        <tbody>
          <!-- listar usuario na tabela -->
        <?php 
          foreach ($usuarios as $row) {
            echo '<tr>';
              echo '<td>'. $row->username . '</td>';
              echo '<td>'. $row->email . '</td>'; 
              echo '<td class ="text-center">' . ($row->active == 1 ? '<span class="label label-success">Ativo</span>' : '<span class="label label-danger">Inativo</span>'). '</td>'; 
              echo '<td class ="text-right">';
                echo '<a href ="'. base_url('admin/usuarios/modulo/' . $row->id) .'" title="Editar" class="btn btn-primary"><i class="fa fa-pencil-square"></i></a>';
                echo ' <a href ="'. base_url('admin/usuarios/del/' . $row->id) .'" title="Apagar" class="btn btn-danger"><i class="fa fa-trash-o"></i></a>';

              echo '</td >';
            echo '</tr>';
          }
                ?>
        </tbody>

          </table>
          
        <!-- /.box-footer-->
      </div>
      <!-- /.box -->
    </div>
    </section>