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

<form  id="formMedico" class="formMedico" name="formMedico" method="POST" action="<?= site_url('medico/store')?>">

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

						<input type="text" name="medico[nome]" class="form-control" value="<?php echo set_value('medico[nome]'); ?>" placeholder="Digite o Nome">

						<div class="input-group-append">
							<span class="input-group-text rounded-right">
								<i class="fas fa-user fa-fw"></i>
							</span>
						</div>

					</div>

					<?php if (!empty($errors['nome'])) {
							echo '<span class="help-block text-danger">'.$errors['nome'].'</span>';
					} ?>

				</div>

				<div class="form-group col-md-7">

					<label for="especialidades">Especialidades</label>

					<div class="input-group">

						<select multiple class="form-control selectpicker" name="medico[especialidade_id][]" value="<?php echo set_value('medico[especialidade_id][]'); ?>" placeholder="SELECIONE">

							<option value="" selected disabled>SELECIONE</option>

							<?php foreach ($especialidades as $key => $especialidade) { ?>

								<option value="<?php echo $especialidade->id ?>"><?php echo $especialidade->nome ?></option>

							<?php } ?>

						</select>

						<div class="input-group-append">
							<span class="input-group-text rounded-right">
								<i class="fas fa-user fa-fw"></i>
							</span>
						</div>

					</div>

					<?php if (!empty($errors['especialidades'])) {
							echo '<span class="help-block text-danger">'.$errors['especialidades'].'</span>';
					} ?>

				</div>

				<div class="form-group col-md-5">

					<label for="crm">CRM</label>

					<div class="input-group">

						<input class="form-control" type="text" name="medico[crm]" value="<?php echo set_value('medico[crm]'); ?>" placeholder="Digite o CRM">

						<div class="input-group-append">
							<span class="input-group-text rounded-right">
								<i class="fas fa-user fa-fw"></i>
							</span>
						</div>

					</div>

					<?php if (!empty($errors['crm'])) {
							echo '<span class="help-block text-danger">'.$errors['crm'].'</span>';
					} ?>

				</div>

			</div>

			<br>

			<h4>Contato</h4>

			<hr>

			<div id="telefoneClone">

				<div class="clone">

					<div class="form-row telefone">

						<div class="form-group col-md-4">

							<label for="telefone">Tipo de Telefone</label>

							<div class="input-group">

								<select class="form-control tipo_telefone" name="medico[telefone][0][tipo_telefone_id]">

									<option value="" selected disabled>SELECIONE</option>

									<?php foreach ($tipos_telefone as $key => $tipo) { ?>

										<option value="<?php echo $tipo->id ?>" <?php echo  set_select('medico[telefone][0][tipo_telefone_id]', $tipo->id); ?>><?php echo $tipo->nome ?></option>

									<?php } ?>

								</select>

								<div class="input-group-append">
									<span class="input-group-text rounded-right">
										<i class="fas fa-user fa-fw"></i>
									</span>
								</div>

							</div>

							<?php if (!empty($errors['tipo_telefone'])) {
									echo '<span class="help-block text-danger">'.$errors['tipo_telefone'].'</span>';
							} ?>

						</div>

						<div class="form-group col-md-8">

							<label for="telefone">DDD/Número</label>

							<div class="input-group">

								<input class="form-control col-md-2 ddd" type="text" name="medico[telefone][0][ddd]" value="<?php echo set_value('medico[telefone][0][ddd]'); ?>" placeholder="Digite o DDD">

								<input class="form-control numero" type="text" name="medico[telefone][0][numero]" value="<?php echo set_value('medico[telefone][0][numero]'); ?>" placeholder="Digite o Número">

								<div class="input-group-append">
									<span class="input-group-text rounded-right">
										<i class="fas fa-user fa-fw"></i>
									</span>
								</div>

							</div>

							<?php if (!empty($errors['ddd'])) {
									echo '<span class="help-block text-danger">'.$errors['ddd'].'</span>';
							} ?>
							<?php if (!empty($errors['numero'])) {
									echo '<span class="help-block text-danger">'.$errors['numero'].'</span>';
							} ?>

						</div>

					</div>

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

								<option value="<?php echo $estado->id ?>" <?php echo  set_select('medico[estado_id]', $estado->id); ?>><?php echo $estado->nome ?></option>

							<?php } ?>

						</select>

					</div>

					<?php if (!empty($errors['estado'])) {
							echo '<span class="help-block text-danger">'.$errors['estado'].'</span>';
					} ?>

				</div>

				<div class="form-group col-md-6">

					<label for="estado">Cidade</label>

					<div class="input-group">

						<select id="cidade" class="form-control" name="medico[endereco][cidade_id]">

							<option value="" selected disabled>SELECIONE</option>

						</select>

					</div>

					<?php if (!empty($errors['cidade'])) {
							echo '<span class="help-block text-danger">'.$errors['cidade'].'</span>';
					} ?>

				</div>

			</div>

		</div>

		<div class="card-footer text-right">

			<a class="btn btn-md btn-danger" href="../">Cancelar</a>

			<button class="btn btn-md btn-success" type="submit">Cadastrar</button>

		</div>

	</div>

</form>
