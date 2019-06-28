	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

		<!-- Alertas de sucesso / erro -->
		<div class="row" style="margin-top: 5px;">

			<div class="col-sm-10 col-md-12">

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

		<!-- Início do conteúdo da view-->
		<div class="top-bar" style="padding: 0 0 15px 0">

			<div class="row">

				<div class="col-md-12">

					<h2 class="page-header">Medicos

						<a class="btn btn-success" href="<?= base_url('index.php/medico/create')?>"><span class="glyphicon glyphicon-plus"></span> Cadastrar</a>

					</h2>

				</div>

			</div>

		</div>

		<table id="medicoTable" class="display" style="width: 100%">

			<thead>

				<tr>

					<th class="text-center">#</th>

					<th class="text-center">Nome</th>

					<th class="text-center">CRM</th>

					<th class="text-center">Status</th>

					<th class="text-center">Ações</th>

				</tr>

			</thead>

			<tbody>

				<?php foreach ($medicos as $medico) { ?>

					<tr <?php $medico->deleted_at ? 'class="danger"' : '' ?>>

						<td class="text-center"><?= $medico['id']; ?></td>

						<td class="text-center"><?= $medico['nome']; ?></td>

						<td class="text-center"><?= $medico['crm']; ?></td>

						<td class="text-center"><?= !is_null($medico->deleted_at) ? 'Ativado' : 'Desativado'?></td>

						<td class="text-center">

							<?php if ( empty($medico->deleted_at) ) : ?>

								<a class="btn btn-warning glyphicon glyphicon-pencil" title="Editar" href="<?= site_url('medico/editar/'.$medico->id)?>"></a>

								<button class="btn btn-danger" type="button" id="btn-delete" title="Desativar" onclick="confirmDelete(<?= $medico->id ?>,'Deseja desativar o Curso?','deletar')"> <i class="glyphicon glyphicon-remove"></i></button>

							<?php else : ?>

								<a class="btn btn-warning glyphicon glyphicon-pencil disabled" title="Editar" href="<?= site_url('medico/editar/'.$medico->id)?>"></a>

								<button class="btn btn-success" type="button" id="btn-delete" title="Ativar" onclick="confirmDelete(<?= $medico->id ?>,'Deseja ativar o Curso?','ativar')"> <i class="glyphicon glyphicon-check"></i></button>

							<?php endif; ?>

						</td>

					</tr>

				<?php } ?>

			</tbody>

		</table>

	</div>
