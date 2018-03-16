function getStudentList(json,id) {
	$.getJSON(json,'',function(result) {
		var tableData = '';
		console.log(result);

		if(result != "null") {
			$.each(result,function(i,field) {	
				 tableData += '<tr>';
				 tableData += '<td>'+field.studentNo+'</td>';
				 tableData += '<td>'+field.name+'</td>';
				 tableData += '<td>'+field.contact+'</td>';
				 tableData += '<td>'+field.age+'</td>';
				 tableData += '<td>'+field.address+'</td>';
				 tableData += '<td>'+field.civilStatus+'</td>';
				 tableData += '<td>'+field.gender+'</td>';
				 tableData += '<td>'+field.backgroundStudy+'</td>';
				 tableData += '</tr>';
			});
		}else {
			tableData += '<tr></tr>';
		}

		 $(id).html(tableData);
	});
}

$(function(){
	
	getStudentList('student-json-encoder.php','#student-table');

	$('#addStudentBtn').click(function(){

		var studentNo = $('#studentNo').val();
		var studentName = $('#studentName').val();
		var studentContact = $('#studentContact').val();
		var studentAge = $('#studentAge').val();
		var studentAddress = $('#studentAddress').val();
		var studentStatus = $('#studentStatus').val();
		var studentGender = $('#studentGender').val();
		var studentStudy = $('#studentStudy').val();

		var data = {
			studentNo:studentNo,
			studentName:studentName,
			studentContact:studentContact,
			studentAge:studentAge,
			studentAddress:studentAddress,
			studentStatus:studentStatus,
			studentGender:studentGender,
			studentStudy:studentStudy
		};

		

		console.log(data);		
		$.ajax({
			url:'insert.php',
			type:'POST',
			data:data,
			success:function(){
				$('#studentNo').val("");
				$('#studentName').val("");
				$('#studentContact').val("");
				$('#studentAge').val("");
				$('#studentAddress').val("");
				$('#studentStatus').val("");
				$('#studentGender').val("");
				$('#studentStudy').val("");
				getStudentList('student-json-encoder.php','#student-table');
			}
		});



	});

});