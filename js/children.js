	function renderchildren(){
		if(children.length == 0){
			$('#children-container').html('');
			return;
		}
	    var html = '<table class="table table-bordered">';
	    html += '<tr>';
	    html += '<th>NAME OF CHILD</th>';
	    html += '<th>DATE OF BIRTH</th>';
	    html += '</tr>';
		$.each(children, function(key, value){
			html += '<tr>';
				html += '<td>' + value.nameofchild + '</td>';
				html += '<td>'+ value.childdateofbirth +'</td>';
				html += "<td><a class='btn btn-danger' onclick=\"deletechildren('"+value.nameofchild+"|"+value.childdateofbirth+"')\">Delete</a></td>"; 
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