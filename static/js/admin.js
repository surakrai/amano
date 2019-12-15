(function($){

	$(document).ready(function(){

    $('#amano-icons-modal').dialog({
      title: 'Icon',
      dialogClass: 'wp-dialog',
      autoOpen: false,
      draggable: false,
      width: '500px',
      modal: true,
      resizable: false,
      closeOnEscape: true,
    });

    var input = null;

    $(document).on('click', '.amano-icon input', function() {

      input = $(this);
      
      $('#amano-icons-modal').dialog('open');

    });

    $(document).on('click', '.amano-icons-modal input', function() {
      $('#amano-icons-modal').dialog('close');

      input.val($(this).val());

    });
    
	});

  $(window).load(function() {

  });

})(jQuery);