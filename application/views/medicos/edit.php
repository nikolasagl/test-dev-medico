<div class="row" style="margin-top: 5px;width: 100%;">

	<div class="col-md-12">

		<?php if ($this->session->flashdata('success')) : ?>

			<div class="alert alert-success">

				<p><span class="glyphicon glyphicon-ok-sign"></span> <?= $this->session->flashdata('success') ?></p>

			</div>

		<?php elseif ($this->session->flashdata('danger')) : ?>

			<div class="alert alert-danger">

				<p><span class="glyphicon glyphicon-remove-sign"></span> <?= $this->session->flashdata('danger') ?></p>

			</div>

		<?php endif; ?>

	</div>

</div>

<form  id="formMedico" class="formMedico" name="formMedico" method="POST" action="<?= site_url('medico/update/'.$medico->id)?>">

	<div class="card">

		<div class="card-header">

			<h2>Cadastrar Medico</h2>

		</div>

		<div class="card-body">

			<h4>Informações Gerais</h4>

			<hr>

			<div class="form-row">

				<div class="form-group col-md-12">

					<label for="nome">Nome</label>

					<div class="input-group">

						<input type="text" name="medico[nome]" class="form-control" value="<?php echo $medico->nome; ?>" placeholder="Digite o Nome">

						<div class="input-group-append">
							<span class="input-group-text rounded-right">
								<i class="fas fa-user fa-fw"></i>
							</span>
						</div>

					</div>

					<span class="error-nome help-block text-danger">
						<?php if (!empty($errors['nome'])) echo $errors['nome'];?>
					</span>

				</div>

				<div class="form-group col-md-7">

					<label for="especialidades">Especialidades</label>

					<div class="input-group">

						<select multiple class="form-control selectpicker" name="medico[especialidade_id][]" value="" placeholder="SELECIONE">

							<option value="">SELECIONE</option>

							<?php foreach ($especialidades as $key => $especialidade) { ?>

								<option value="<?php echo $especialidade->id ?>" <?php in_array($especialidade->id, MainHelper::multiSelectValues($medico->especialidades)) ? print_r('selected') : '' ?>><?php echo $especialidade->nome ?></option>

							<?php } ?>

						</select>

						<div class="input-group-append">
							<span class="input-group-text rounded-right">
								<i class="fas fa-user fa-fw"></i>
							</span>
						</div>

					</div>

					<span class="error-especialidades help-block text-danger">
						<?php if (!empty($errors['especialidades'])) echo $errors['especialidades'];?>
					</span>

				</div>

				<div class="form-group col-md-5">

					<label for="crm">CRM</label>

					<div class="input-group">

						<input class="form-control" type="text" name="medico[crm]" value="<?php echo $medico->crm ?>" placeholder="Digite o CRM">

						<div class="input-group-append">
							<span class="input-group-text rounded-right">
								<i class="fas fa-user fa-fw"></i>
							</span>
						</div>

					</div>

					<span class="error-crm help-block text-danger">
						<?php if (!empty($errors['crm'])) echo $errors['crm'];?>
					</span>

				</div>

			</div>

			<br>

			<h4>Contato</h4>

			<hr>

			<div id="telefoneClone">

				<div class="clone">

          <?php foreach ($medico->telefones as $key => $telefone) { ?>

            <div class="form-row telefone">

              <div class="form-group col-md-4">

                <label for="telefone">Tipo de Telefone</label>

                <div class="input-group">

                  <select class="form-control tipo_telefone" name="<?php echo 'medico[telefone]['.$key.'][tipo_telefone_id]' ?>">

                    <option value="">SELECIONE</option>

                    <option value="<?php echo $telefone->tipoTelefone->id ?>" selected><?php echo $telefone->tipoTelefone->nome ?></option>

                    <?php foreach ($tipos_telefone as $tipo) { ?>

                      <option value="<?php echo $tipo->id ?>" <?php $tipo->id == $telefone->tipoTelefone->id ? print_r('selected') : '' ?>><?php echo $tipo->nome ?></option>

                    <?php } ?>

                  </select>

                  <div class="input-group-append">
                    <span class="input-group-text rounded-right">
                      <i class="fas fa-user fa-fw"></i>
                    </span>
                  </div>

                </div>

                <span class="error-tipo_telefone help-block text-danger">
                  <?php if (!empty($errors['tipo_telefone'])) echo $errors['tipo_telefone'];?>
                </span>

              </div>

              <div class="form-group col-md-8">

                <label for="telefone">DDD/Número</label>

                <div class="input-group">

                  <input class="form-control col-md-2 ddd" type="text" name="<?php echo 'medico[telefone]['.$key.'][ddd]' ?>" value="<?php echo $telefone->numero['ddd'] ?>" placeholder="Digite o DDD">

                  <input class="form-control numero" type="text" name="<?php echo 'medico[telefone]['.$key.'][numero]' ?>" value="<?php echo $telefone->numero['numero'] ?>" placeholder="Digite o Número">

                  <div class="input-group-append">
                    <span class="input-group-text rounded-right">
                      <i class="fas fa-user fa-fw"></i>
                    </span>
                  </div>

                </div>

                <span class="error-ddd help-block text-danger">
                  <?php if (!empty($errors['ddd'])) echo $errors['ddd'];?>
                </span>

                <span class="error-numero help-block text-danger">
                  <?php if (!empty($errors['numero'])) echo $errors['numero'];?>
                </span>

              </div>

            </div>

          <?php } ?>

				</div>

			</div>

			<div class="form-row">

        <div class="col-md-1">

					<button id="adicionarTel" class="btn btn-sm btn-primary" type="button" name="adicionar" style="width:100%;margin-bottom:20px;">
						<span>Adicionar</span>
					</button>

        </div>

        <div class="col-md-1">

					<button id="excluirTel" class="btn btn-sm btn-warning" type="button" name="excluir" style="width:100%;margin-bottom:20px;">
						<span>Remover</span>
					</button>

        </div>

      </div>

			<br>

			<h4>Endereço</h4>

			<hr>

			<div class="form-row">

				<div class="form-group col-md-6">

					<label for="estado">Estado</label>

					<div class="input-group">

						<select id="estado" class="form-control" name="medico[endereco][estado_id]">

							<option value="" selected disabled>SELECIONE</option>

							<?php foreach ($estados as $key => $estado) { ?>

								<option value="<?php echo $estado->id ?>" <?php $estado->id == $medico->endereco->cidade->estado->id ? print_r('selected') : '' ?>><?php echo $estado->nome ?></option>

							<?php } ?>

						</select>

					</div>

					<span class="error-estado help-block text-danger">
						<?php if (!empty($errors['estado'])) echo $errors['estado'];?>
					</span>

				</div>

				<div class="form-group col-md-6">

					<label for="estado">Cidade</label>

					<div class="input-group">

						<select id="cidade" class="form-control" name="medico[endereco][cidade_id]">

							<option value="" selected disabled>SELECIONE</option>

						</select>

					</div>

					<span class="error-cidade help-block text-danger">
						<?php if (!empty($errors['cidade'])) echo $errors['cidade'];?>
					</span>

				</div>

			</div>

		</div>

		<div class="card-footer text-right">

			<a class="btn btn-md btn-danger" href="../">Cancelar</a>

			<button class="btn btn-md btn-success" type="submit">Editar</button>

		</div>

	</div>

</form>
