	function renderreferences(){
		if(references.length == 0){
			$('#reference-container').html('');
			return;
		}
	    var html = '<table class="table table-bordered">';
	    html += '<tr>';
	    html += '<th>NAME</th>';
	    html += '<th>ADDRESS</th>';
	    html += '<th>TEL. NO.</th>';
	    html += '</tr>';
		$.each(references, function(key, value){
			html += '<tr>';
				html += '<td>' + value.referencename + '</td>';
				html += '<td>'+ value.referenceaddress +'</td>';
				html += '<td>'+ value.referencecontact +'</td>';
				html += "<td><a class='btn btn-danger' onclick=\"deletecivilservice('"+value.tempid+"')\">Delete</a></td>"; 
			html += '</tr>';
		});
	    html += '</table>';
		$('#reference-container').html(html);
	}
	
	function deletecivilservice(key) {

	    var source = references;
	    for (var i = 0; i < source.length; i++) {
	        if (source[i].tempid == key) {
	        	references.splice(i, 1);
	            $('#referenceshidden').val(JSON.stringify(references));
	        }
	    }
		
	    renderreferences();
		$('#referenceshidden').val(JSON.stringify(references));
	}
	
	function savereference() {
		  var referencename = $('#referencename').val();
		  var referenceaddress = $('#referenceaddress').val();
		  var referencecontact = $('#referencecontact').val();

		  references.push({ 
			  "referencename":referencename, 
			  "referenceaddress": referenceaddress,
			  "referencecontact": referencecontact, 
			  "tempid": guid()
		  });

		  renderreferences();
		    
		  $('#referenceshidden').val(JSON.stringify(references));
		  $('#addreference-modal').modal('hide');		 
	}
	
	function S4() {
		return (((1+Math.random())*0x10000)|0).toString(16).substring(1);
	}
	
	function guid() {
		return (S4()+S4()+"-"+S4()+"-"+S4()+"-"+S4()+"-"+S4()+S4()+S4());
	}