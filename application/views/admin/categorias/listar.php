<!--titulo da pagina-->
 <section class="content-header">
      <h1>
       <?= $titulo ?>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?= base_url('admin') ?>"><i class="fa fa-dashboard"></i> Home</a></li>
      <!--   <li><a href="#">Examples</a></li> -->
        <li class="active"><?= $titulo ?></li>
      </ol>
    </section>



    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">

          <div class="row margin-bottom-20">
            <div class="col-md-12 text-right">

              <a href="<?php echo base_url('admin/categorias/modulo')?>" title="Novo" class="btn btn-success"><i class="fa fa-plus-circle"></i> Novo</a>
              </div>
            </div>

            <?php getMsg('msgCadastro'); ?>
    <table class="table table-bordered table_listar_DataTable">
          <thead>
        <tr>
          <td>Categoria</td>
          <td>Categoria Pai</td>
          <td class ="text-center">Status</td>
          <td class ="text-right">Opções</td>
        </tr>
          </thead>
    <tbody>
      <?php foreach ($categorias as $cat) { ?>
        <tr>
          <td><?= $cat->nome ?></td>
          <td><?= $this->categorias_model->getCatNome($cat->id_cat_pai )?>
          </td>
          <td class ="text-center">
            <?= ( $cat->ativo == 1 ? 'Ativo' : 'Inativo' ) ?>
          </td>
          <td class ="text-right">
          <a href="<?= base_url('admin/categorias/modulo/'. $cat->Id ) ?>" title="Atualizar categoria" class="btn btn-primary"><i class="fa fa-pencil-square"></i></a>
          <a href="<?= base_url('admin/categorias/del/'. $cat->Id ) ?>" title="Apagar categoria" class="btn btn-danger btn-apagar-registro"><i class="fa fa-trash-o"></i></a>
          </td>
        </tr>
      <?php } //fim do foreach ?>
    </tbody>
  </table>

        <!-- /.box-footer-->
      </div>
      <!-- /.box -->
    </div>
    </section>