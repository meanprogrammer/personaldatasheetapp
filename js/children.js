	var pagetype = $('#pagetype').val();
	function renderchildren(){
		if(children.length == 0){
			$('#children-container').html('');
			return;
		}
	    var html = '<table class="table table-bordered table-striped">';
	    html += '<tr>';
	    html += '<th>NAME OF CHILD</th>';
	    html += '<th>DATE OF BIRTH</th>';
	    html += '</tr>';
		$.each(children, function(key, value){
			html += '<tr>';
				html += '<td>' + value.nameofchild + '</td>';
				html += '<td>'+ value.childdateofbirth +'</td>';
				
				if(pagetype != 'detail') {
					html += "<td><a class='btn btn-danger' onclick=\"deletechildren('"+value.nameofchild+"|"+value.childdateofbirth+"')\">Delete</a></td>";
				}
			html += '</tr>';
		});
	    html += '</table>';
		$('#children-container').html(html);
	}
	
	function deletechildren(key) {
		var splitted = key.split("|");
		var name = splitted[0];
		var date = splitted[1];
		
	    var source = children;
	    for (var i = 0; i < source.length; i++) {
	        if (source[i].nameofchild == name && source[i].childdateofbirth == date) {
	        	children.splice(i, 1);
	            $('#childrenhidden').val(JSON.stringify(children));
	        }
	    }
		
		renderchildren();
		$('#childrenhidden').val(JSON.stringify(children));
	}
	
	function renderchildrenfromdb(){
		var json_obj = JSON.parse($('#childrenhidden').val());
		$.each(json_obj, function(k, v) {
			children.push({
				"nameofchild": v.NameOfChild,
				"childdateofbirth": v.DateOfBirth,
				"tempid": guid()
			});
		});
		$('#childrenhidden').val(JSON.stringify(children));
		renderchildren();
	}
	
	function S4() {
		return (((1+Math.random())*0x10000)|0).toString(16).substring(1);
	}
	
	function guid() {
		return (S4()+S4()+"-"+S4()+"-"+S4()+"-"+S4()+"-"+S4()+S4()+S4());
	}