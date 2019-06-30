$('.dropdown-toggle').dropdown();

$(document).ready(function() {

  $.ajax({
    method: 'POST',
    url: 'http://localhost/test-dev-medico/index.php/ajax/search',
    // url: 'http://localhost/test-dev-medico/index.php/ajax/search',
    data: {term: ''},
    success: function(data) {
      $('#medicoTable').append(data)
    }
  })
})

$(document).on('keyup keydown paste', '.search_field', function() {

  var search = $(this).val()

  if(search.length < 1 || search.length > 2) {

    $.ajax({
      method: 'POST',
      url: 'http://localhost/test-dev-medico/index.php/ajax/search',
      // url: 'http://localhost/test-dev-medico/index.php/ajax/search',
      data: {term: search},
      success: function(data) {
        $('#medicoTable').html('')
        $('#medicoTable').append(data)
      }
    })
  }
})
