	var pagetype = $('#pagetype').val();
	function renderotherinfo(){
		if(otherinfo.length == 0){
			$('#otherinfo-container').html('');
			return;
		}
	    var html = '<table class="table table-bordered table-striped">';
	    html += '<tr>';
	    html += '<th>SPECIAL SKILLS / HOBBIES:</th>';
	    html += '<th>NON-ACADEMIC DISTINCTIONS / RECOGNITION:(Write in full)</th>';
	    html += '<th>MEMBERSHIP IN ASSOCIATION/ORGANIZATION (Write in full)</th>';
	    html += '</tr>';
		$.each(otherinfo, function(key, value){
			html += '<tr>';
				html += '<td>' + value.specialskills + '</td>';
				html += '<td>'+ value.nonacademicdistinction +'</td>';
				html += '<td>'+ value.membershipassoc +'</td>';
				if(pagetype != 'detail') {
					html += "<td><a class='btn btn-danger' onclick=\"deleteotherinfo('"+value.tempid+"')\">Delete</a></td>";
				}
			html += '</tr>';
		});
	    html += '</table>';
		$('#otherinfo-container').html(html);
	}
	
	function deleteotherinfo(key) {

	    var source = otherinfo;
	    for (var i = 0; i < source.length; i++) {
	        if (source[i].tempid == key) {
	        	otherinfo.splice(i, 1);
	            $('#otherinfohidden').val(JSON.stringify(otherinfo));
	        }
	    }
		
	    renderotherinfo();
		$('#otherinfohidden').val(JSON.stringify(otherinfo));
	}
	
	function saveotherinfo() {
		  var specialskills = $('#specialskills').val();
		  var nonacademicdistinction = $('#nonacademicdistinction').val();
		  var membershipassoc = $('#membershipassoc').val();

		  otherinfo.push({ 
			  "specialskills":specialskills, 
			  "nonacademicdistinction": nonacademicdistinction,
			  "membershipassoc": membershipassoc, 
			  "tempid": guid()
		  });

		  renderotherinfo();
		    
		  $('#otherinfohidden').val(JSON.stringify(otherinfo));
		  $('#addotherinfo-modal').modal('hide');		 
	}
	
	function renderotherinfofromdb() {
		var json_obj = JSON.parse($('#otherinfohidden').val());
		$.each(json_obj, function(k, v) {
			otherinfo.push({
				  "specialskills":v.SpecicalSkillsHobbies, 
				  "nonacademicdistinction": v.NonAcademicDistinctionRecognition,
				  "membershipassoc": v.OrganizationMembership, 
				  "tempid": guid()
			});
		});
		$('#otherinfohidden').val(JSON.stringify(otherinfo));
		renderotherinfo();
	} 
	
	function S4() {
		return (((1+Math.random())*0x10000)|0).toString(16).substring(1);
	}
	
	function guid() {
		return (S4()+S4()+"-"+S4()+"-"+S4()+"-"+S4()+"-"+S4()+S4()+S4());
	}