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

              <a href="<?php echo base_url('admin/clientes')?>" title="Voltar" class="btn btn-success"><i class="fa fa-reply"></i> Voltar</a>
              </div>
            </div>
         <form action="<?php echo base_url('admin/clientes/core')?>" method="post" accept-chasert="utf-8" class="form-horizontal">
          <?php
            errosValidacao();
            getMsg('msgCadastro');
          ?>

        <div class="form-group">
            <label class="col-sm-2 control-label">Nome</label>
            <div class="col-sm-8">
              <input type="text" name="nome" class="form-control"  placeholder="Nome" value="<?php echo ($dados != NULL ? $dados->nome : set_value('nome')); ?>">
            </div>
          </div>

          <div class="form-group">
            <label class="col-sm-2 control-label">CPF</label>
            <div class="col-sm-8">
              <input type="text" name="cpf" class="form-control input_cpf"  placeholder="CPF" value="<?php echo ($dados != NULL ? $dados->cpf : set_value('cpf')); ?>">
            </div>
          </div>

          <div class="form-group">
            <label class="col-sm-2 control-label">Data nascimento</label>
            <div class="col-sm-8">
              <input type="text" name="data_nascimento" class="form-control input_data"  placeholder="Data nascimento" value="<?php echo ($dados != NULL ? formataDataViewer($dados->data_nascimento) : set_value('data_nascimento')); ?>">
            </div>
          </div>

          <div class="form-group">
            <label class="col-sm-2 control-label">Telefone</label>
            <div class="col-sm-8">
              <input type="text" name="telefone" class="form-control input_telefone"  placeholder="Telefone" value="<?php echo ($dados != NULL ? $dados->telefone : set_value('telefone')); ?>">
            </div>
          </div>

          <div class="form-group">
            <label class="col-sm-2 control-label">Email</label>
            <div class="col-sm-8">
              <input type="text" name="email" class="form-control"  placeholder="Email" value="<?php echo ($dados != NULL ? $dados->email : set_value('email')); ?>">
            </div>
          </div>

          <div class="form-group">
            <label class="col-sm-2 control-label">Senha</label>
            <div class="col-sm-8">
              <input type="password" name="senha" class="form-control"  placeholder="Senha" value="<?php echo ($dados != NULL ? $dados->senha : set_value('senha')); ?>">
            </div>
          </div>

          <div class="form-group">
            <label class="col-sm-2 control-label">CEP</label>
            <div class="col-sm-8">
              <input type="text" name="cep" class="form-control input_cep"  placeholder="CEP" value="<?php echo ($dados != NULL ? $dados->cep : set_value('cep')); ?>">
            </div>
          </div>

          <div class="form-group">
            <label class="col-sm-2 control-label">Endereço</label>
            <div class="col-sm-8">
              <input type="text" name="endereco" class="form-control"  placeholder="Endereço" value="<?php echo ($dados != NULL ? $dados->endereco : set_value('endereco')); ?>">
            </div>
          </div>

            <div class="form-group">
            <label class="col-sm-2 control-label">Número</label>
            <div class="col-sm-8">
              <input type="text" name="numero" class="form-control"  placeholder="Número" value="<?php echo ($dados != NULL ? $dados->numero : set_value('numero')); ?>">
            </div>
          </div>

          <div class="form-group">
            <label class="col-sm-2 control-label">Bairro</label>
            <div class="col-sm-8">
              <input type="text" name="bairro" class="form-control"  placeholder="Bairro" value="<?php echo ($dados != NULL ? $dados->bairro : set_value('bairro')); ?>">
            </div>
          </div>

          <div class="form-group">
            <label class="col-sm-2 control-label">Complemento</label>
            <div class="col-sm-8">
              <input type="text" name="complemento" class="form-control"  placeholder="Complemento" value="<?php echo ($dados != NULL ? $dados->complemento : set_value('complemento')); ?>">
            </div>
          </div>

           <div class="form-group">
            <label class="col-sm-2 control-label">Estado</label>
            <div class="col-sm-8">
              <input type="text" name="estado" class="form-control"  placeholder="Estado" value="<?php echo ($dados != NULL ? $dados->estado : set_value('estado')); ?>">
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
              <input type="hidden" name="id_cliente" value="<?= $dados->Id ?>">
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