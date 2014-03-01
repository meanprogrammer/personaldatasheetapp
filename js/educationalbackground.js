var pagetype = $('#pagetype').val();
	function rendereducationalbackground(){
		if(educationalbackground.length == 0){
			$('#educational-background-container').html('');
			return;
		}
	    var html = '<table class="table table-bordered table-striped">';
	    html += '<tr>';
	    html += '<th>LEVEL</th>';
	    html += '<th>NAME OF SCHOOL</th>';
	    html += '<th>DEGREE COURSE</th>';
	    html += '<th>YEAR GRADUATED</th>';
	    html += '<th>HIGHEST GRADE/LEVEL/UNITS EARNED</th>';
	    html += '<th>FROM</th>';
	    html += '<th>TO</th>';
	    html += '<th>SCHOLARSHIP/ ACADEMIC HONORS RECEIVED</th>';
	    html += '</tr>';
		$.each(educationalbackground, function(key, value){
			html += '<tr>';
				html += '<td>' + value.educationlevel + '</td>';
				html += '<td>'+ value.nameofschool +'</td>';
				html += '<td>'+ value.degreecourse +'</td>';
				html += '<td>'+ value.yeargraduated +'</td>';
				html += '<td>'+ value.highestgrade +'</td>';
				html += '<td>'+ value.educationfrom +'</td>';
				html += '<td>'+ value.educationto +'</td>';
				html += '<td>'+ value.academichonors +'</td>';
				if(pagetype != 'detail') {
					html += "<td><a class='btn btn-danger' onclick=\"deleteeducationalbackground('"+value.tempid+"')\">Delete</a></td>";	
				}
			html += '</tr>';
		});
	    html += '</table>';
		$('#educational-background-container').html(html);
	}
	
	function deleteeducationalbackground(key) {

	    var source = educationalbackground;
	    for (var i = 0; i < source.length; i++) {
	        if (source[i].tempid == key) {
	        	educationalbackground.splice(i, 1);
	            $('#educationhidden').val(JSON.stringify(educationalbackground));
	        }
	    }
		
	    rendereducationalbackground();
		$('#educationhidden').val(JSON.stringify(educationalbackground));
	}
	
	function saveeducationalbackground() {
		  var educationlevel = $('#educationlevel').val();
		  var nameofschool = $('#nameofschool').val();
		  var degreecourse = $('#degreecourse').val();
		  var yeargraduated = $('#yeargraduated').val();
		  var highestgrade = $('#highestgrade').val();
		  var educationfrom = $('#educationfrom').val();
		  var educationto = $('#educationto').val();
		  var academichonors = $('#academichonors').val();
		  
		  educationalbackground.push({ 
			  "educationlevel":educationlevel, 
			  "nameofschool": nameofschool,
			  "degreecourse": degreecourse, 
			  "yeargraduated": yeargraduated, 
			  "highestgrade": highestgrade, 
			  "educationfrom": educationfrom, 
			  "educationto": educationto, 
			  "academichonors": academichonors,
			  "tempid": guid()
		  });

		  rendereducationalbackground();
		    
		  $('#educationhidden').val(JSON.stringify(educationalbackground));
		  $('#addeducation-modal').modal('hide');		 
	}
	
	function rendereducationalbackgroundfromdb() {
		var json_obj = JSON.parse($('#educationhidden').val());
		$.each(json_obj, function(k, v) {
			educationalbackground.push({
				  "educationlevel":v.Level, 
				  "nameofschool": v.NameOfSchool,
				  "degreecourse": v.DegreeCourse, 
				  "yeargraduated": v.YearGraduated, 
				  "highestgrade": v.HighestGradeLevelUnitsEarned, 
				  "educationfrom": v.DateFrom, 
				  "educationto": v.DateTo, 
				  "academichonors": v.ScholarshipAcademicHonorRecieved,
				  "tempid": guid()
			});
		});
		$('#educationhidden').val(JSON.stringify(educationalbackground));
		rendereducationalbackground();
	}
	
	function S4() {
		return (((1+Math.random())*0x10000)|0).toString(16).substring(1);
	}
	
	function guid() {
		return (S4()+S4()+"-"+S4()+"-"+S4()+"-"+S4()+"-"+S4()+S4()+S4());
	}