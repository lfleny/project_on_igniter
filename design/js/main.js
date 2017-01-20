$(document).ready(function() {
	var queryStr = parseQueryString(window.location.search);
	var page = queryStr['page'];

	if (page == "main" || page == undefined) {
		get_student_by_page(1);
	} else if (page == "group_list") {
		get_group_by_page(1);
	} else if (page == "group_edit") {
		$('#inputGroupNumb').val(queryStr['group_numb']);
	} else if (page == "student_edit") {
		if (queryStr['status'] == "edit") {
			$('#inputFirstName').val(decodeURIComponent(queryStr['stud_name']));
			$('#inputSecondName').val(decodeURIComponent(queryStr['stud_second_name']));
			$('#inputMiddleName').val(decodeURIComponent(queryStr['stud_middle_name']));
			$('#group_select').append(
						'<option>'+queryStr['group_numb']+'</option>'
 						);
		} else {
			$('#group_select').append(
						'<option>Выбор</option>'
 						);
		}
		$.post(
			"index.php?page=json",
			{action: "get_all_groups"},
			function(data){
				$('#groups_table').empty();
				for (i in data.list) {
					$('#group_select').append(
						'<option>'+data.list[i].group_numb +'</option>'
 						);
				}
			},
			"json"
		);
	}
});

function student_add() {
	var queryStr = parseQueryString(window.location.search);
	var name = $('#inputFirstName').val(),
		second_name = $('#inputSecondName').val(),
		middle_name = $('#inputMiddleName').val(),
		group_numb = $('#group_select').val();
	if (!name.replace(/^\s+|\s+$/g, '') || !second_name.replace(/^\s+|\s+$/g, '') || !middle_name.replace(/^\s+|\s+$/g, '')) {
		alert('Необходимо заполнить все поля!');
	} else {
		if (group_numb != "Выбор") {
			if (queryStr['status'] == "edit") {
				$.post(
					"index.php?page=json",
					{name: name, second_name: second_name, middle_name: middle_name, group_numb: group_numb, stud_id: queryStr['stud_id'], action: "student_edit"},
					function(data){
						if(data.state==true){
							alert(data.mesage);
							setTimeout(function(){document.location.href = "https://lenybot.ru/project/index.php?page=main";},100);
						}
						else{
							alert(data.mesage);
						}
						
					},
					"json"
				);	
			} else {
				$.post(
					"index.php?page=json",
					{name: name, second_name: second_name, middle_name: middle_name, group_numb: group_numb, action: "student_add"},
					function(data){
						if(data.state==true){
							alert(data.mesage);
							setTimeout(function(){document.location.href = "https://lenybot.ru/project/index.php?page=main";},100);
						}
						else{
							alert(data.mesage);
						}
						
					},
					"json"
				);	
			}
		} else {
			alert('Необходимо выбрать группу!')
		}

	}
}

function group_add(){
	var queryStr = parseQueryString(window.location.search);
	var group_numb = $('#inputGroupNumb').val();
	if (!group_numb.replace(/^\s+|\s+$/g, '')) {
		alert('Необходимо ввести номер группы');
	} else {
		if (queryStr['status'] == "edit") {
			$.post(
				"index.php?page=json",
				{group_numb_new: group_numb, group_numb_old: queryStr['group_numb'], action: "group_edit"},
				function(data){
					if(data.state==true){
						alert(data.mesage);
						setTimeout(function(){document.location.href = "https://lenybot.ru/project/index.php?page=group_list";},100);
					}
					else{
						alert(data.mesage);
					}
					
				},
				"json"
			);	
		} else {
			$.post(
				"index.php?page=json",
				{group_numb: group_numb, action: "group_add"},
				function(data){
					if(data.state==true){
						alert(data.mesage);
						setTimeout(function(){document.location.href = "https://lenybot.ru/project/index.php?page=group_list";},100);
					}
					else{
						alert(data.mesage);
					}
					
				},
				"json"
			);	

		}
	}
}

function group_del(group_numb) {
	if (!group_numb.toString().replace(/^\s+|\s+$/g, '')) {
		alert('Необходимо ввести номер группы');
	} else {
		$.post(
			"index.php?page=json",
			{group_numb: group_numb, action: "group_del"},
			function(data){
				if(data.state==true){
					alert(data.mesage);
					setTimeout(function(){document.location.href = "https://lenybot.ru/project/index.php?page=group_list";},100);
				}
				else{
					alert(data.mesage);
				}
				
			},
			"json"
		);
	}	
}

function student_del(stud_id) {
	$.post(
			"index.php?page=json",
			{stud_id: stud_id, action: "student_del"},
			function(data){
				if(data.state==true){
					alert(data.mesage);
					setTimeout(function(){document.location.href = "https://lenybot.ru/project/index.php?page=main";},100);
				}
				else{
					alert(data.mesage);
				}	
			},
			"json"
		);
}

function curent_student_del() {
	var name = $('#inputFirstName').val(),
		second_name = $('#inputSecondName').val(),
		middle_name = $('#inputMiddleName').val(),
		group_numb = $('#group_select').val();
	if (!name.replace(/^\s+|\s+$/g, '') || !second_name.replace(/^\s+|\s+$/g, '') || !middle_name.replace(/^\s+|\s+$/g, '')) {
		alert('Необходимо заполнить все поля!');
	} else {
		if (group_numb != "Выбор") {
		$.post(
			"index.php?page=json",
			{name: name, second_name: second_name, middle_name: middle_name, group_numb: group_numb, action: "curent_student_delete"},
			function(data){
				if(data.state==true){
					alert(data.mesage);
					setTimeout(function(){document.location.href = "https://lenybot.ru/project/index.php?page=main";},100);
				}
				else{
					alert(data.mesage);
				}	
			},
			"json"
		);
		} else {
			alert('Необходимо выбрать группу!')
		}
	}
}

function get_student_by_page(page_numb) {
	$.post(
	"index.php?page=json",
	{action: "get_all_students"},
	function(data){
		curl = "https://lenybot.ru/project/index.php?page=main&page_numb=" + page_numb;
		history.pushState('', '', curl);
		$('#page_list').html('');
		$('#page_list').append(form_page_list(data.list.length, page_numb, "get_student_by_page"));
		$('#students_table').empty();
		var query = parseQueryString(window.location.search);
		var max;
		if ((data.list.length - query['page_numb']*10) < 0) {
			max = (query['page_numb'] - 1)*10 + 10 - query['page_numb']*10 + data.list.length;
		} else {
			max = query['page_numb']*10;
		}
		for (var i = ((query['page_numb'] - 1)*10); i < max; i++) {
			$('#students_table').append(
				'<tr><td>'+data.list[i].stud_second_name + " "+data.list[i].stud_name +" "+data.list[i].stud_middle_name +'</td>'+
				'<td>'+data.list[i].group_numb +'</td>'+
 				'<td><a name="" href="https://lenybot.ru/project/index.php?page=student_edit&stud_id=' + data.list[i].stud_id +'&stud_name='+data.list[i].stud_name+'&stud_second_name='+ data.list[i].stud_second_name +'&stud_middle_name='+data.list[i].stud_middle_name+'&group_numb='+data.list[i].group_numb +'&status=edit">Редактировать</a></td>' +
 				'<td><a name="" href="#" onclick="student_del(' + data.list[i].stud_id + ');">Удалтить</a></td></tr>'
				);
		}
		},
		"json"
	);
}

function get_group_by_page(page_numb) {
	$.post(
		"index.php?page=json",
		{action: "get_all_groups"},
		function(data){
			curl = "https://lenybot.ru/project/index.php?page=group_list&page_numb=" + page_numb;
			history.pushState('', '', curl);
			$('#page_list').html('');
			$('#page_list').append(form_page_list(data.list.length, page_numb, "get_group_by_page"));
			$('#groups_table').empty();
			var query = parseQueryString(window.location.search);
			var max;
			if ((data.list.length - query['page_numb']*10) < 0) {
				max = (query['page_numb'] - 1)*10 + 10 - query['page_numb']*10 + data.list.length;
			} else {
				max = query['page_numb']*10;
			}

			for (var i = ((query['page_numb'] - 1)*10); i < max; i++) {
				$('#groups_table').append(
					'<tr><td>'+data.list[i].group_numb +'</td>'+
 					'<td><a name="" href="https://lenybot.ru/project/index.php?page=group_edit&group_numb=' + data.list[i].group_numb +'&status=edit">Редактировать</a></td>' +
 					'<td><a name="" href="#" onclick="group_del(\'' + data.list[i].group_numb + '\');">Удалтить</a></td></tr>'
				);
			}

		},
		"json"
	);
}

function form_page_list (count, cur_page, func) {
	var page = Math.ceil(count / 10);
	var result = "Страница " + cur_page + " из " + page + ". ";
	for (var i = 1; i <= page; i++) {
		if (i == cur_page) {
			result +=' <b">'+ i + '</b>,';
		} else {
			result += ' <a href="#" onclick="' + func + '('+ i +')">'+ i + '</a>,';
		}
		
	}
	return result.substring(0, result.length - 1);
}

function parseQueryString (strQuery) {
    var strSearch   = strQuery.substr(1),
        strPattern  = /([^=]+)=([^&]+)&?/ig,
        arrMatch    = strPattern.exec(strSearch),
        objRes      = {};
    while (arrMatch != null) {
        objRes[arrMatch[1]] = arrMatch[2];
        arrMatch = strPattern.exec(strSearch);
    }
    return objRes;
};