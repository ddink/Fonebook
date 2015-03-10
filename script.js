function addContact() {
	var first_name = document.getElementById("first_name").value;
	var last_name = document.getElementById("last_name").value;
	var phone_number = document.getElementById("phone_number").value;
	var dataString = 'first_name=' + first_name + '&last_name=' + last_name + '&phone_number=' + phone_number;
	if (first_name == '' || last_name == '' || phone_number == '') {
		alert("Please Fill All Fields");
	} else {
		$.ajax({
		type: "POST",
		url: "addContact.php",
		data: dataString,
		cache: false,
		success: function(html) {
			$('tr.add_box').html('<td>' + first_name + '</td><td>' + last_name + '</td><td>' + phone_number + '</td><td><a href="#" class="tiny alert button" name="remove" value="remove" style="margin-top:10px;">Remove</a></td>').fadeIn();
		}
		});
	}
	return false;
}

function deleteRow(row){
	$.ajax({
        type: "POST",
        url: "removeContact.php",
        data: "row="+row,
        success: function(){
          $('#contact_'+row).fadeOut();
        }
	});
}