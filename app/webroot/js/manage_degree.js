$(function() {
    function getData(selectedValue, targetUrl, destination) {
        var request = $.ajax({
            type: 'get',
            url: targetUrl,
            dataType: 'json'
          });
        
<<<<<<< HEAD
        request.done(function( response ) {
=======
       request.done(function( response ) {
>>>>>>> 8a319f27450e1ffea3c0e639534e228fa5336719
            if (response.departments) {
              destination.empty(),
              destination.append('<option value="Please Select">Please Select</option>');
              appendData(response.departments, destination);
<<<<<<< HEAD
            }
=======
            } 
>>>>>>> 8a319f27450e1ffea3c0e639534e228fa5336719
            
           if (response.degrees) {
              destination.empty(),
              destination.append('<option value="Please Select">Please Select</option>');
              appendData(response.degrees, destination);
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
            destination_degree	=	$('#degrees');

		if(selectedValue != '') {
      targetUrl = $(this).attr('rel') + '?id=' + selectedValue;
      getData(selectedValue, targetUrl, destination);
			destination_degree.empty(),
			destination_degree.append('<option value="Select Department First">Select Department First</option>');
		}	else {
      destination.empty(),
      destination.append('<option value="Select Institution First">Select Institution First</option>');
		  destination_degree.empty(),
		  destination_degree.append('<option value="Select Department First">Select Department First</option>');
		}
    });

    $('#departments').on('change',function() {
  		var selectedValue = $(this).val(),
  			  destination = $('#degrees');
  		if(selectedValue != 'Please Select') {
  			targetUrl = $(this).attr('rel') + '?id=' + selectedValue;
  			getData(selectedValue, targetUrl, destination);
  		}	else {
  		  destination.empty(),
  		  destination.append('<option value="Select Department First">Select Department First</option>');
  		}
    });
});
