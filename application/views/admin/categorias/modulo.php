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

              <a href="<?php echo base_url('admin/categorias')?>" title="Voltar" class="btn btn-success"><i class="fa fa-reply"></i> Voltar</a>
              </div>
            </div>
      <form action="<?php echo base_url('admin/categorias/core')?>" method="post" accept-chasert="utf-8" class="form-horizontal">

            <?php
            errosValidacao();
             getMsg('msgCadastro');
             ?>

         <div class="form-group">
            <label class="col-sm-2 control-label">Nome categoria</label>
            <div class="col-sm-8">
              <input type="text" name="nome" class="form-control"  placeholder="Nome" value="<?php echo ($dados != NULL ? $dados->nome : set_value('nome')); ?>">
            </div>
          </div>
         <div class="form-group">
         <label class="col-sm-2 control-label">Categoria Pai</label>
          <div class="col-sm-4">
           <select name="id_cat_pai" class="form-control">
          <option></option>
           <?php foreach( $cat_pai as $cat ) { ?>
            <option value="<?= $cat->Id ?>"><?= $cat->nome ?></option>
            <?php } // fim do foreach?>
           </select>
          </div>
        </div>

         <div class="form-group">
         <label class="col-sm-2 control-label">Ativo</label>
          <div class="col-sm-4">
           <select name="ativo" class="form-control">

            <?php if ($dados) { // inicio do if ?>
            <option value="0" <?= ($dados->ativo == 0 ? 'selected=""' : '' ) ?>>Não</option>
            <option value="1" <?= ($dados->ativo == 1 ? 'selected=""' : '' ) ?>>Sim</option>
            <?php } else { ?>
            <option value="0" selected="">Não</option>
            <option value="1" selected="">Sim</option>
          <?php } //fim do if ?>

           </select>
          </div>
        </div>
              <?php if ($dados) { // inicio do if ?>
              <input type="hidden" name="id_categoria" value="<?= $dados->Id ?>">
             <?php } //fim do if ?>

              <div class="form-group">
          <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" class="btn btn-success">Salvar</button>
          </div>
        </div>
      </form>
        <!-- /.box-footer-->
      </div>
      <!-- /.box -->
    </div>
    </section>