	function rendervoluntarywork(){
		if(voluntarywork.length == 0){
			$('#voluntarywork-container').html('');
			return;
		}
	    var html = '<table class="table table-bordered">';
	    html += '<tr>';
	    html += '<th>NAME & ADDRESS OF ORGANIZATION</th>';
	    html += '<th>FROM</th>';
	    html += '<th>TO</th>';
	    html += '<th>NUMBER OF HOURS</th>';
	    html += '<th>POSITION / NATURE OF WORK</th>';
	    html += '</tr>';
		$.each(voluntarywork, function(key, value){
			html += '<tr>';
				html += '<td>' + value.voluntaryworkorg + '</td>';
				html += '<td>'+ value.voluntaryworkfrom +'</td>';
				html += '<td>'+ value.voluntaryworkto +'</td>';
				html += '<td>'+ value.voluntaryworkhours +'</td>';
				html += '<td>'+ value.voluntaryworknature +'</td>';
				html += "<td><a class='btn btn-danger' onclick=\"deletecivilservice('"+value.tempid+"')\">Delete</a></td>"; 
			html += '</tr>';
		});
	    html += '</table>';
		$('#voluntarywork-container').html(html);
	}
	
	function deletecivilservice(key) {

	    var source = voluntarywork;
	    for (var i = 0; i < source.length; i++) {
	        if (source[i].tempid == key) {
	        	voluntarywork.splice(i, 1);
	            $('#voluntaryworkhidden').val(JSON.stringify(voluntarywork));
	        }
	    }
		
	    rendervoluntarywork();
		$('#voluntaryworkhidden').val(JSON.stringify(voluntarywork));
	}
	
	function savevoluntarywork() {
		  var voluntaryworkorg = $('#voluntaryworkorg').val();
		  var voluntaryworkfrom = $('#voluntaryworkfrom').val();
		  var voluntaryworkto = $('#voluntaryworkto').val();
		  var voluntaryworkhours = $('#voluntaryworkhours').val();
		  var voluntaryworknature = $('#voluntaryworknature').val();

		  voluntarywork.push({ 
			  "voluntaryworkorg":voluntaryworkorg, 
			  "voluntaryworkfrom": voluntaryworkfrom,
			  "voluntaryworkto": voluntaryworkto, 
			  "voluntaryworkhours": voluntaryworkhours, 
			  "voluntaryworknature": voluntaryworknature, 
			  "tempid": guid()
		  });

		  rendervoluntarywork();
		    
		  $('#voluntaryworkhidden').val(JSON.stringify(voluntarywork));
		  $('#addvoluntarywork-modal').modal('hide');		 
	}
	
	function S4() {
		return (((1+Math.random())*0x10000)|0).toString(16).substring(1);
	}
	
	function guid() {
		return (S4()+S4()+"-"+S4()+"-"+S4()+"-"+S4()+"-"+S4()+S4()+S4());
	}