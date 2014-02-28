	function rendertrainingprogram(){
		if(trainingprogram.length == 0){
			$('#trainingprogram-container').html('');
			return;
		}
	    var html = '<table class="table table-bordered">';
	    html += '<tr>';
	    html += '<th>TITLE OF SEMINAR/CONFERENCE/WORKSHOP/SHORT COURSES</th>';
	    html += '<th>FROM</th>';
	    html += '<th>TO</th>';
	    html += '<th>NUMBER OF HOURS</th>';
	    html += '<th>CONDUCTED/ SPONSORED BY</th>';
	    html += '</tr>';
		$.each(trainingprogram, function(key, value){
			html += '<tr>';
				html += '<td>' + value.titleofseminar + '</td>';
				html += '<td>'+ value.trainingfrom +'</td>';
				html += '<td>'+ value.trainingto +'</td>';
				html += '<td>'+ value.traininghours +'</td>';
				html += '<td>'+ value.trainingconducted +'</td>';
				html += "<td><a class='btn btn-danger' onclick=\"deletecivilservice('"+value.tempid+"')\">Delete</a></td>"; 
			html += '</tr>';
		});
	    html += '</table>';
		$('#trainingprogram-container').html(html);
	}
	
	function deletecivilservice(key) {

	    var source = trainingprogram;
	    for (var i = 0; i < source.length; i++) {
	        if (source[i].tempid == key) {
	        	trainingprogram.splice(i, 1);
	            $('#trainingprogramhidden').val(JSON.stringify(trainingprogram));
	        }
	    }
		
	    rendertrainingprogram();
		$('#trainingprogramhidden').val(JSON.stringify(trainingprogram));
	}
	
	function savetrainingprogram() {
		  var titleofseminar = $('#titleofseminar').val();
		  var trainingfrom = $('#trainingfrom').val();
		  var trainingto = $('#trainingto').val();
		  var traininghours = $('#traininghours').val();
		  var trainingconducted = $('#trainingconducted').val();

		  trainingprogram.push({ 
			  "titleofseminar":titleofseminar, 
			  "trainingfrom": trainingfrom,
			  "trainingto": trainingto, 
			  "traininghours": traininghours, 
			  "trainingconducted": trainingconducted, 
			  "tempid": guid()
		  });

		  rendertrainingprogram();
		    
		  $('#trainingprogramhidden').val(JSON.stringify(trainingprogram));
		  $('#addtraningprogram-modal').modal('hide');		 
	}
	
	function S4() {
		return (((1+Math.random())*0x10000)|0).toString(16).substring(1);
	}
	
	function guid() {
		return (S4()+S4()+"-"+S4()+"-"+S4()+"-"+S4()+"-"+S4()+S4()+S4());
	}