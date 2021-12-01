$('select option:first').each(function () {
  $(this).attr('selected', 'selected')
})

$('select option').each(function () {
  if (!$(this).attr('value')) {
    $(this).attr('value', $(this).text())
  }
});

$('#render').on('loadeddata', function () {
  $('#submit .spinner-border').hide()
  $('#submit .status').text('Submit')
  $('#submit').prop('disabled', false)
})

$('#tailornetForm').on('submit', function (e) {

  function dispError() {
    $('#submit .status').text('Error!')
    $('#submit .spinner-border').hide()
    $('#submit').prop('disabled', false)
  }

  e.preventDefault()
  $('#submit .spinner-border').show()
  params = $(this).serialize()
  $('#submit .status').text('Inferring...')
  $('#submit').prop('disabled', true)
  $.ajax({
    url: "/infer.php",
    data: $(this).serializeArray()
  }).always(function (data, status, error) {
    if (status === 'error') {
      dispError()
    } else {
      $('#submit .status').text('Rendering...')

      $.ajax({
        url: "/render.php",
        data: $(this).serializeArray()
      }).always(function (data, status, error) {
        $('#submit .status').text('Combining...')
        $('#render').attr('src', '/combine.php?' + params)

      })
    }
  });
});


$('#genderSelect').on('change', function () {
  isSelected = $('#skirt').attr('selected')
  if (this.value === 'Male') {
    $('#skirt').remove()
    if (isSelected) {
      $('#garmentSelect option:first').each(function () {
        $(this).attr('selected', 'selected')
      })
    }
  } else {
    $('#garmentSelect').append('<option id="skirt">Skirt</option>');
  }
})