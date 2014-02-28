	function rendercivilservice(){
		if(civilservice.length == 0){
			$('#civilservice-container').html('');
			return;
		}
	    var html = '<table class="table table-bordered">';
	    html += '<tr>';
	    html += '<th>CAREER SERVICE/ RA 1080 (BOARD/ BAR) UNDER SPECIAL LAWS/ CES/ CSEE</th>';
	    html += '<th>RATING</th>';
	    html += '<th>DATE OF EXAMINATION / CONFERMENT</th>';
	    html += '<th>PLACE OF EXAMINATION / CONFERMENT</th>';
	    html += '<th>NUMBER</th>';
	    html += '<th>DATE OF RELEASE</th>';
	    html += '</tr>';
		$.each(civilservice, function(key, value){
			html += '<tr>';
				html += '<td>' + value.careerservice + '</td>';
				html += '<td>'+ value.civilrating +'</td>';
				html += '<td>'+ value.dateofexam +'</td>';
				html += '<td>'+ value.placeofexam +'</td>';
				html += '<td>'+ value.licenseno +'</td>';
				html += '<td>'+ value.licensereleasedate +'</td>';
				html += "<td><a class='btn btn-danger' onclick=\"deletecivilservice('"+value.tempid+"')\">Delete</a></td>"; 
			html += '</tr>';
		});
	    html += '</table>';
		$('#civilservice-container').html(html);
	}
	
	function deletecivilservice(key) {

	    var source = civilservice;
	    for (var i = 0; i < source.length; i++) {
	        if (source[i].tempid == key) {
	        	civilservice.splice(i, 1);
	            $('#civilservicehidden').val(JSON.stringify(civilservice));
	        }
	    }
		
	    rendercivilservice();
		$('#civilservicehidden').val(JSON.stringify(civilservice));
	}
	
	function savecivilservice() {
		  var careerservice = $('#careerservice').val();
		  var civilrating = $('#civilrating').val();
		  var dateofexam = $('#dateofexam').val();
		  var placeofexam = $('#placeofexam').val();
		  var licenseno = $('#licenseno').val();
		  var licensereleasedate = $('#licensereleasedate').val();

		  civilservice.push({ 
			  "careerservice":careerservice, 
			  "civilrating": civilrating,
			  "dateofexam": dateofexam, 
			  "placeofexam": placeofexam, 
			  "licenseno": licenseno, 
			  "licensereleasedate": licensereleasedate,
			  "tempid": guid()
		  });

		  rendercivilservice();
		    
		  $('#civilservicehidden').val(JSON.stringify(civilservice));
		  $('#addcivilservice-modal').modal('hide');		 
	}
	
	function S4() {
		return (((1+Math.random())*0x10000)|0).toString(16).substring(1);
	}
	
	function guid() {
		return (S4()+S4()+"-"+S4()+"-"+S4()+"-"+S4()+"-"+S4()+S4()+S4());
	}