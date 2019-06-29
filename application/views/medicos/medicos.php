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

		<div class="card">

			<div class="card-header" style="height:90px;">

				<!-- Início do conteúdo da view-->
				<div class="top-bar" style="padding: 0 0 15px 0">

					<div class="row">

						<div class="col-md-8">

							<h2 class="page-header">Medicos

								<a class="btn btn-success" href="<?= base_url('index.php/medico/create')?>"><span class="glyphicon glyphicon-plus"></span> Cadastrar</a>

							</h2>

						</div>

						<div class="col-md-4" style="margin-top:-25px;">

							<form class="" action="" method="post">

								<div class="form-group col-md-12">

									<div class="input-group">

										<input type="text" name="search_field" class="form-control search_field" placeholder="Busque por Nome ou por CRM...">

										<div class="input-group-append">
											<span class="input-group-text rounded-right">
												<i class="fas fa-search fa-fw"></i>
											</span>
										</div>

									</div>

								</div>

							</form>

						</div>

					</div>

				</div>

			</div>

			<div class="card-body">

				<div id="medicoTable">

				</div>

			</div>

			<div class="card-footer">

				<div class="col-md-12">

					<p class="text-center"><strong>Desenvolvido por Níkolas Lencioni</strong></p>

				</div>

			</div>

		</div>

	</div>
