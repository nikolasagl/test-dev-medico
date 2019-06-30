$(document).ready(function() {

  var SPMaskBehavior = function (val) {
    return val.replace(/\D/g, '').length === 9 ? '00000-0000' : '0000-00009';
  },
  spOptions = {
    onKeyPress: function(val, e, field, options) {
      field.mask(SPMaskBehavior.apply({}, arguments), options);
    }
  };

  $('.numero').mask(SPMaskBehavior, spOptions);


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


  $('#estado').on('change', function() {

    var estado_id = $(this).val()

    findCidade(estado_id)
  })

  if ($('.estado-edit').length > 0) {

    var estado_id = $('#estado').val()
    var cidade_id = $('#old_cidade').val()

    findCidade(estado_id, cidade_id)
  }

  $('.especialidades').selectpicker({
    countSelectedText: "{0} Especialidades Selecionadas"
  });
})


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
      window.location.href = 'http://localhost/test-dev-medico/index.php/medico/' + funcao + '/' + id;
    }
  });
}


function recontar() {

  $('.telefone').each(function(index) {

    $(this).find('.tipo_telefone').attr('name', 'medico[telefone]['+index+'][tipo_telefone_id]')
    $(this).find('.ddd').attr('name', 'medico[telefone]['+index+'][ddd]')
    $(this).find('.numero').attr('name', 'medico[telefone]['+index+'][numero]')
  })
}

function findCidade(estado_id, cidade_id=null)
{
  $.ajax({
    method: 'POST',
    url: 'http://localhost/test-dev-medico/index.php/ajax/findCidade',
    data: {term: estado_id},
    success: function(data) {

      $('#cidade').html('<option value="">SELECIONE</option>')

      cidades = $.parseJSON(data)

      $('#cidade').empty()

      for (var i = 0; i < cidades.length; i++) {

        if (cidade_id != null && cidades[i].id == cidade_id) {

          var option = '<option selected value="' + cidades[i].id + '">' + cidades[i].nome + '</option>'

        } else {

          var option = '<option value="' + cidades[i].id + '">' + cidades[i].nome + '</option>'
        }

        $('#cidade').append(option)
      }

      $('#cidade').selectpicker('refresh')
    }
  })
}
