<table class="display table table-bordered table-hover" style="width: 100%">

  <thead class="thead-light">

    <tr>

      <th class="text-center">#</th>

      <th class="text-center">Nome</th>

      <th class="text-center">CRM</th>

      <th class="text-center">Especialidades</th>

      <th class="text-center">Estado</th>

      <th class="text-center">Status</th>

      <th class="text-center">Ações</th>

    </tr>

  </thead>

  <tbody>

    <?php foreach ($medicos as $medico) { ?>

      <tr <?php $medico->deleted_at ? 'class="danger"' : '' ?>>

        <td class="text-center"><?= $medico->id; ?></td>

        <td class="text-center"><?= $medico->nome; ?></td>

        <td class="text-center"><?= $medico->crm; ?></td>

        <td class="text-center"><?= $medico->getEspecialidades($medico); ?></td>

        <td class="text-center"><?= $medico->endereco->cidade->estado->nome; ?></td>

        <td class="text-center"><?= is_null($medico->deleted_at) ? 'Ativado' : 'Desativado'?></td>

        <td class="text-center">

          <?php if (empty($medico->deleted_at)) : ?>

            <a class="btn btn-warning" title="Editar" href="<?= site_url('medico/editar/'.$medico->id)?>"><i class="fas fa-pencil-alt fa-fw"></i></a>

            <button class="btn btn-danger" type="button" id="btn-delete" title="Desativar" onclick="confirmDelete(<?= $medico->id ?>,'Deseja desativar o Curso?','deletar')"><i class="fas fa-trash-alt fa-fw"></i></button>

          <?php else : ?>

            <a class="btn btn-warning disabled" title="Editar" href="<?= site_url('medico/editar/'.$medico->id)?>"><i class="fas fa-pencil-alt fa-fw"></i></a>

            <button class="btn btn-success" type="button" id="btn-delete" title="Ativar" onclick="confirmDelete(<?= $medico->id ?>,'Deseja ativar o Curso?','ativar')"><i class="fas fa-recycle fa-fw"></i></button>

          <?php endif; ?>

        </td>

      </tr>

    <?php } ?>

  </tbody>

</table>
