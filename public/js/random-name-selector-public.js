jQuery(function( $ ) {
	'use strict';
    
    function get_name() {
      if(!$('#name_list').val()) {
        alert("There were not names in the list");
        return;
      }
      $.ajax(ajax_object.ajax_url, {
        data : {
          action: 'get_names',
          name_list: $('#name_list').val().replace('"', "")
        },
        success:function(data) {
          if(data.error) {
            console.error(data.error);
          }
          else {
            alert("There were " + data.total + ' entries\nThe randomly drawn number was ' + data.number + '\nTherefore the winner is '+data.winner);
          }
        },
        error:function(xhr,status,error){
          console.error(error);
        },
        dataType:'json',
        method:'post',
        timeout:10000
      });
    }
    
    $('#action').click(get_name);

});
