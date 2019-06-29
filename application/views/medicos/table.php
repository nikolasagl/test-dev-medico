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

      <tr class="<?= !empty($medico->deleted_at) ? 'table-danger' : '' ?>">

        <td class="text-center align-middle"><?= $medico->id; ?></td>

        <td class="text-center align-middle"><?= $medico->nome; ?></td>

        <td class="text-center align-middle"><?= $medico->crm; ?></td>

        <td class="text-center align-middle especialidades"><?= $medico->getEspecialidades($medico); ?></td>

        <td class="text-center align-middle"><?= $medico->endereco->cidade->estado->nome; ?></td>

        <td class="text-center align-middle"><?= is_null($medico->deleted_at) ? 'Ativado' : 'Desativado'?></td>

        <td class="text-center align-middle">

        <a class="btn btn-secondary <?= !empty($medico->deleted_at) ? 'disabled' : ''?>" title="Editar" href="<?= site_url('medico/edit/'.$medico->id)?>"><i class="fas fa-pencil-alt"></i></a>

          <?php if (empty($medico->deleted_at)) : ?>

            <button class="btn btn-danger" type="button" id="btn-delete" title="Desativar" onclick="confirmDelete(<?= $medico->id ?>,'Deseja desativar o Medico?','destroy')"><i class="fas fa-trash-alt fa-fw"></i></button>

          <?php else : ?>

            <button class="btn btn-success" type="button" id="btn-delete" title="Ativar" onclick="confirmDelete(<?= $medico->id ?>,'Deseja ativar o Medico?','restore')"><i class="fas fa-recycle fa-fw"></i></button>

          <?php endif; ?>

        </td>

      </tr>

    <?php } ?>

  </tbody>

</table>
