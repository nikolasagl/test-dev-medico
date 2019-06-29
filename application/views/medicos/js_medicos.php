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
        window.location.href = '<?= site_url("medico/") ?>' + funcao + '/' + id;
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

<script>

  $(document).ready(function() {

    $('#estado').on('change', function() {

      var estado_id = $(this).val()

      $.ajax({
        method: 'POST',
        url: 'http://localhost/test-dev-medico/index.php/ajax/findCidade',
        data: {term: estado_id},
        success: function(data) {

          $('#cidade').html('<option value="">SELECIONE</option>')

          cidades = $.parseJSON(data)

          for (var i = 0; i < cidades.length; i++) {

            $('#cidade').append('<option value="' + cidades[i].id + '">' + cidades[i].nome + '</option>')
          }
        }

      })

    })

  })

</script>

</body>

</html>
