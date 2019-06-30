$(document).ready(function(e){

  jQuery.validator.addMethod("letras", function(value, element) {
    return this.optional(element) || /^[a-z-záàâãéèêíïóôõöúçñÁÀÂÃÉÈÍÏÓÔÕÖÚÇÑ ]+$/i.test(value);
  }, "Somente letras");


  var rules = {
    'medico[nome]': {required: true, maxlength: 150, minlength: 3, letras: true},
    'medico[crm]': {required: true, maxlength: 15, minlength: 2, number: true},
    'medico[especialidade_id][]': {required: true, minlength: 2},
    'medico[telefone][0][tipo_telefone_id]': {required: true},
    'medico[telefone][0][ddd]': {required: true, minlength: 2},
    'medico[telefone][0][numero]': {required: true, minlength: 8},
    'medico[endereco][estado_id]': {required: true},
    'medico[endereco][cidade_id]': {required: true},
  }

  var messages = {
    'medico[nome]': {required:'O campo Nome é obrigatório.'},
    'medico[crm]': {required:'O campo CRM é obrigatório.'},
    'medico[especialidade_id][]': {required:'O campo Especialidades é obrigatório.', minlength:'Selecione ao menos 2 Especialidades.'},
    'medico[telefone][0][tipo_telefone_id]': {required:'O campo Tipo de Telefone é obrigatório.'},
    'medico[telefone][0][ddd]': {required:'O campo DDD é obrigatório.'},
    'medico[telefone][0][numero]': {required: 'O campo Número é obrigatorio.'},
    'medico[endereco][estado_id]': {required: 'O campo Estado é obrigatório.'},
    'medico[endereco][cidade_id]': {required: 'O campo Cidade é obrigatório.'},
  }

  $("#formMedico").validate({

    rules: rules,

    messages: messages,

    errorPlacement: function(error, element) {

                      if(element.hasClass('nome')) {
                        error.appendTo(element.parents().siblings('.error-nome'))
                      }

                      if(element.hasClass('especialidades')) {
                        error.appendTo($('.error-especialidades'))
                      }

                      if(element.hasClass('crm')) {
                        error.appendTo(element.parents().siblings('.error-crm'))
                      }

                      if(element.hasClass('tipo_telefone')) {
                        error.appendTo(element.parents().siblings('.error-tipo_telefone'))
                      }

                      if(element.hasClass('ddd')) {
                        error.appendTo(element.parents().siblings('.error-ddd'))
                      }

                      if(element.hasClass('numero')) {
                        error.appendTo(element.parents().siblings('.error-numero'))
                      }

                      if(element.hasClass('estado')) {
                        error.appendTo(element.parents().siblings('.error-estado'))
                      }

                      if(element.hasClass('cidade')) {
                        error.appendTo(element.parents().siblings('.error-cidade'))
                      }
                    }
  })



  $("#formMedicoEdit").validate({

    rules: rules,

    messages: messages,

    errorPlacement: function(error, element) {

                      if(element.hasClass('nome')) {
                        error.appendTo(element.parents().siblings('.error-nome'))
                      }

                      if(element.hasClass('especialidades')) {
                        error.appendTo($('.error-especialidades'))
                      }

                      if(element.hasClass('crm')) {
                        error.appendTo(element.parents().siblings('.error-crm'))
                      }

                      if(element.hasClass('tipo_telefone')) {
                        error.appendTo(element.parents().siblings('.error-tipo_telefone'))
                      }

                      if(element.hasClass('ddd')) {
                        error.appendTo(element.parents().siblings('.error-ddd'))
                      }

                      if(element.hasClass('numero')) {
                        error.appendTo(element.parents().siblings('.error-numero'))
                      }

                      if(element.hasClass('estado-edit')) {
                        error.appendTo(element.parents().siblings('.error-estado'))
                      }

                      if(element.hasClass('cidade')) {
                        error.appendTo(element.parents().siblings('.error-cidade'))
                      }
                    }
  })
})
