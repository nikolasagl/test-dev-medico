	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

		<div class="row alert-div">

			<div class="col-md-12">

				<?php if ($this->session->flashdata('success')) : ?>

					<div class="alert alert-success alert-dismissible fade show">

						<p><?= $this->session->flashdata('success') ?></p>

						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					    <span aria-hidden="true">&times;</span>
					  </button>

					</div>

				<?php elseif ($this->session->flashdata('danger')) : ?>

					<div class="alert alert-danger alert-dismissible fade show">

						<p></span> <?= $this->session->flashdata('danger') ?></p>

						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					    <span aria-hidden="true">&times;</span>
					  </button>

					</div>

				<?php endif; ?>

			</div>

		</div>

		<div class="card">

			<div class="card-header">

				<!-- Início do conteúdo da view-->
				<div class="top-bar">

					<div class="row">

						<div class="col-md-8">

							<h2 class="page-header">Medicos

								<a class="btn btn-warning" href="<?= base_url('index.php/medico/create')?>">Cadastrar</a>

							</h2>

						</div>

						<div class="col-md-4">

							<form class="searchForm" action="" method="post">

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

				<div id="medicoTable" class="table-responsive">

				</div>

			</div>

			<div class="card-footer">

				<div class="col-md-12">

					<p class="text-center"><strong>Desenvolvido por Níkolas Lencioni</strong></p>

				</div>

			</div>

		</div>

	</div>
