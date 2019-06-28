<form  id="formMedico" class="formMedico" name="formMedico" method="POST" action="<?= site_url('medico/save')?>">

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

						<input type="text" name="medico[nome]" class="form-control">

						<div class="input-group-append">
							<span class="input-group-text rounded-right">
								<i class="fas fa-user fa-fw"></i>
							</span>
						</div>

					</div>

				</div>

				<div class="form-group col-md-7">

					<label for="especialidades">Especialidades</label>

					<div class="input-group">

						<select multiple class="form-control selectpicker" name="medico[especialidade_id]">

						</select>

						<div class="input-group-append">
							<span class="input-group-text rounded-right">
								<i class="fas fa-user fa-fw"></i>
							</span>
						</div>

					</div>

				</div>

				<div class="form-group col-md-5">

					<label for="crm">CRM</label>

					<div class="input-group">

						<input class="form-control" type="text" name="medico[crm]">

						<div class="input-group-append">
							<span class="input-group-text rounded-right">
								<i class="fas fa-user fa-fw"></i>
							</span>
						</div>

					</div>

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

									<?php foreach ($tipos_telefone as $key => $tipo) { ?>

										<option value="<?php echo $tipo->id ?>"><?php echo $tipo->nome ?></option>

									<?php } ?>

								</select>

								<div class="input-group-append">
									<span class="input-group-text rounded-right">
										<i class="fas fa-user fa-fw"></i>
									</span>
								</div>

							</div>

						</div>

						<div class="form-group col-md-8">

							<label for="telefone">DDD/Número</label>

							<div class="input-group">

								<input class="form-control col-md-2 ddd" type="text" name="medico[telefone][0][ddd]" value="">

								<input class="form-control numero" type="text" name="medico[telefone][0][numero]" value="">

								<div class="input-group-append">
									<span class="input-group-text rounded-right">
										<i class="fas fa-user fa-fw"></i>
									</span>
								</div>

							</div>

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

						<select class="form-control" name="medico[estado_id]">

						</select>

					</div>

				</div>

				<div class="form-group col-md-6">

				</div>

			</div>

		</div>

		<div class="card-footer text-right">

			<a class="btn btn-md btn-danger" href="#">Cancelar</a>

			<button class="btn btn-md btn-success" type="submit" name="cadastrar">Cadastrar</button>

		</div>

	</div>

</form>
