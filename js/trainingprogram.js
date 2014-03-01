	var pagetype = $('#pagetype').val();
	function rendertrainingprogram(){
		if(trainingprogram.length == 0){
			$('#trainingprogram-container').html('');
			return;
		}
	    var html = '<table class="table table-bordered table-striped">';
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
				if(pagetype != 'detail') {
					html += "<td><a class='btn btn-danger' onclick=\"deletetrainingprogram('"+value.tempid+"')\">Delete</a></td>";
				}
			html += '</tr>';
		});
	    html += '</table>';
		$('#trainingprogram-container').html(html);
	}
	
	function deletetrainingprogram(key) {

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
	
	function rendertrainingprogramfromdb() {
		var json_obj = JSON.parse($('#trainingprogramhidden').val());
		$.each(json_obj, function(k, v) {
			trainingprogram.push({
				  "titleofseminar":v.TrainingTitle, 
				  "trainingfrom": v.StartDate,
				  "trainingto": v.EndDate, 
				  "traininghours": v.NumberOfHours, 
				  "trainingconducted": v.ConductedSponsoredBy, 
				  "tempid": guid()
			});
		});
		$('#trainingprogramhidden').val(JSON.stringify(trainingprogram));
		rendertrainingprogram();
	}
	
	function S4() {
		return (((1+Math.random())*0x10000)|0).toString(16).substring(1);
	}
	
	function guid() {
		return (S4()+S4()+"-"+S4()+"-"+S4()+"-"+S4()+"-"+S4()+S4()+S4());
	}