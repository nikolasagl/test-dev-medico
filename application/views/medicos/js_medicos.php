<script>

$(document).ready(function () {
  $('#medicoTable').DataTable();
});

</script>

<script>

  function confirmDelete(id, msg, funcao) {
    bootbox.confirm({
      message: msg,
      buttons: {
        confirm: {
          label: 'Sim',
          className: 'btn-success'
        },
        cancel: {
          label: 'Não',
          className: 'btn-danger'
        }
      },
      callback: function (result) {
        if (result == true)
        window.location.href = '<?= site_url("curso/") ?>' + funcao + '/' + id;
      }
    });
  }

  function exclude(id) {
    bootbox.confirm({
      message: "Realmente deseja desativar esse curso?",
      buttons: {
        confirm: {
          label: 'Sim',
          className: 'btn-success'
        },
        cancel: {
          label: 'Não',
          className: 'btn-danger'
        }
      },
      callback: function (result) {
        if (result)
        window.location.href = '<?= base_url('index.php/Curso/deletar/') ?>' + id
      }
    });
  }

  function able(id) {
    bootbox.confirm({
      message: "Realmente deseja ativar esse curso?",
      buttons: {
        confirm: {
          label: 'Sim',
          className: 'btn-success'
        },
        cancel: {
          label: 'Não',
          className: 'btn-danger'
        }
      },
      callback: function (result) {
        if (result)
        window.location.href = '<?= base_url("index.php/Curso/ativar/") ?>' + id
      }
    });
  }

</script>

<script>

  $(document).ready(function() {

    $('#adicionarTel').on('click', function() {

      var main = $('#telefoneClone')

      var clone = main.find('.clone').html()

      main.append(clone)

      recontar()
    })

    $('#excluirTel').on('click', function() {

      if ($('.telefone').length > 1) {

        $('#telefoneClone').find('.telefone:last').remove()

      }

      recontar()
    })

    function recontar() {

      $('.telefone').each(function(index) {

        $(this).find('.tipo_telefone').attr('name', 'medico[telefone]['+index+'][tipo_telefone_id]')
        $(this).find('.ddd').attr('name', 'medico[telefone]['+index+'][ddd]')
        $(this).find('.numero').attr('name', 'medico[telefone]['+index+'][numero]')

      })
    }
  })


</script>

</body>

</html>
