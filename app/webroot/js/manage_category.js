$(function() {
    function getData(selectedValue, targetUrl, destination) {
        var request = $.ajax({
            type: 'get',
            url: targetUrl,
            dataType: 'json'
          });
        
        request.done(function( response ) {
            if (response.departments) {
              destination.empty(),
              destination.append('<option value="Please Select">Please Select</option>');
              appendData(response.departments, destination);
            }
            
           if (response.categories) {
              destination.empty(),
              destination.append('<option value="Please Select">Please Select</option>');
              appendData(response.categories, destination);
            }
            if (response.forms) {
              destination.empty(),
              destination.append('<option value="Please Select">Please Select</option>');
              appendData(response.forms, destination);
            }
        });
 
        request.fail(function( jqXHR, textStatus ) {
           alert( "Request failed: " + textStatus );
        });
    
    }

	function appendData(data, destination) {
		for (var prop in data) {
			if (data.hasOwnProperty(prop)) {
			$(destination).append('<option value="' + prop + '">' + data[prop] + '</option>');
			}
		}
	}

    $('#institutions').on('change',function() {
        var selectedValue	=	$(this).val(),
            destination 	=	$('#departments'),
            destination_category	=	$('#categories');

		if(selectedValue != '') {
      targetUrl = $(this).attr('rel') + '?id=' + selectedValue;
      getData(selectedValue, targetUrl, destination);
			destination_category.empty(),
			destination_category.append('<option value="Select Department First">Select Department First</option>');
		}	else {
      destination.empty(),
      destination.append('<option value="Select Institution First">Select Institution First</option>');
		  destination_category.empty(),
		  destination_category.append('<option value="Select Department First">Select Department First</option>');
		}
    });

    $('#departments').on('change',function() {
  		var selectedValue = $(this).val(),
  			  destination = $('#categories');
  		if(selectedValue != 'Please Select') {
  			targetUrl = $(this).attr('rel') + '?id=' + selectedValue;
  			getData(selectedValue, targetUrl, destination);
  		}	else {
  		  destination.empty(),
  		  destination.append('<option value="Select Department First">Select Department First</option>');
  		}
    });

    $('#categories').on('change',function() {
      var selectedValue = $(this).val(),
          destination = $('#forms');
      if(selectedValue != 'Please Select') {
        targetUrl = $(this).attr('rel') + '?id=' + selectedValue;
        getData(selectedValue, targetUrl, destination);
      } else {
        destination.empty(),
        destination.append('<option value="Select Category First">Select Category First</option>');
      }
    });
    $('#forms').on('change',function() {
      var selectedValue = $(this).val(),
          destination = $('#forms');
      if(selectedValue != 'Please Select') {
        targetUrl = $(this).attr('rel') + '?id=' + selectedValue;
        getData(selectedValue, targetUrl, destination);
      } else {
        destination.empty(),
        destination.append('<option value="Select Category First">Select Category First</option>');
      }
    });


});
