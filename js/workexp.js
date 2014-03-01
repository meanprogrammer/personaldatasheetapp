	var pagetype = $('#pagetype').val();
	function renderworkexp(){
		if(workexp.length == 0){
			$('#workexp-container').html('');
			return;
		}
	    var html = '<table class="table table-bordered table-striped">';
	    html += '<tr>';
	    html += '<th>FROM</th>';
	    html += '<th>TO</th>';
	    html += '<th>POSITION TITLE</th>';
	    html += '<th>DEPARTMENT / AGENCY / OFFICE / COMPANY</th>';
	    html += '<th>MONTHLY SALARY</th>';
	    html += '<th>SALARY GRADE & STEP INCREMENT</th>';
	    html += '<th>STATUS OF APPOINTMENT</th>';
	    html += '<th>GOV\'T SERVICE</th>';
	    html += '</tr>';
		$.each(workexp, function(key, value){
			html += '<tr>';
				html += '<td>' + value.workstart + '</td>';
				html += '<td>'+ value.workend +'</td>';
				html += '<td>'+ value.positiontitle +'</td>';
				html += '<td>'+ value.agencyname +'</td>';
				html += '<td>'+ value.monthlysalary +'</td>';
				html += '<td>'+ value.salaryincrement +'</td>';
				html += '<td>'+ value.statusofappointment +'</td>';
				html += '<td>'+ value.govtservice +'</td>';
				if(pagetype != 'detail') {
					html += "<td><a class='btn btn-danger' onclick=\"deleteworkexp('"+value.tempid+"')\">Delete</a></td>";
				}
			html += '</tr>';
		});
	    html += '</table>';
		$('#workexp-container').html(html);
	}
	
	function deleteworkexp(key) {
	    var source = workexp;
	    for (var i = 0; i < source.length; i++) {
	        if (source[i].tempid == key) {
	        	workexp.splice(i, 1);
	            $('#workexphidden').val(JSON.stringify(workexp));
	        }
	    }
		
	    renderworkexp();
		$('#workexphidden').val(JSON.stringify(workexp));
	}
	
	function saveworkexp() {
		  var workstart = $('#workstart').val();
		  var workend = $('#workend').val();
		  var positiontitle = $('#positiontitle').val();
		  var agencyname = $('#agencyname').val();
		  var monthlysalary = $('#monthlysalary').val();
		  var salaryincrement = $('#salaryincrement').val();
		  var statusofappointment = $('#statusofappointment').val();
		  var govtservice = $('#govtservice').val();

		  workexp.push({ 
			  "workstart":workstart, 
			  "workend": workend,
			  "positiontitle": positiontitle, 
			  "agencyname": agencyname, 
			  "monthlysalary": monthlysalary, 
			  "salaryincrement": salaryincrement,
			  "statusofappointment": statusofappointment,
			  "govtservice": govtservice,
			  "tempid": guid()
		  });

		  renderworkexp();
		    
		  $('#workexphidden').val(JSON.stringify(workexp));
		  $('#addworkexp-modal').modal('hide');		 
	}
	
	function renderworkexpfromdb() {
		var json_obj = JSON.parse($('#workexphidden').val());
		$.each(json_obj, function(k, v) {
			workexp.push({
				  "workstart":v.StartDate, 
				  "workend": v.EndDate,
				  "positiontitle": v.PositionTitle, 
				  "agencyname": v.CompanyName, 
				  "monthlysalary": v.MonthlySalary, 
				  "salaryincrement": v.SalaryGradeStepIncrement,
				  "statusofappointment": v.StatusOfAppointment,
				  "govtservice": v.GovtService,
				  "tempid": guid()
			});
		});
		$('#workexphidden').val(JSON.stringify(workexp));
		renderworkexp();
	}
	
	function S4() {
		return (((1+Math.random())*0x10000)|0).toString(16).substring(1);
	}
	
	function guid() {
		return (S4()+S4()+"-"+S4()+"-"+S4()+"-"+S4()+"-"+S4()+S4()+S4());
	}