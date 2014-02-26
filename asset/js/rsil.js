function removeRow(tag){
	jQuery('#' + tag).remove();
}

function AddRow(array, target, count){
        if(count%2 == 0){
            row = "<tr id='" + target + count + "' class='genap'>";
        }else{
            row = "<tr id='" + target + count + "' class='ganjil'>";
        }
	
	for(i = 0 ; i < array.length ; i++){
		row += "<td>" + array[i] + "</td>";
	}
	row += "<td><button onclick='removeRow(" + '"' + target + count +'")' + "' >Remove</button>";
	row += "</tr>";
	jQuery('#' + target + ' tbody').append(row);
	count = count + 1;
	return count;
}

function upload(i, form_name){
	$('#' + form_name).ajaxSubmit({
		url: base_uri + 'master/uploader/FileUploadBase64/file' + i,
		enctype: "multipart/form-data",
		method: "POST",
		beforeSend: function(){
			$('#percent' + i).width('0%');
		},
		success: function(data){
			$('#percent' + i).width('100%');
			var obj = data;
			obj = $.parseJSON(obj);
			$('#name' + i).val(obj.FileName);
			$('#size' + i).val(obj.Size);
			$('#content' + i).val(obj.Content);
			$('#type' + i).val(obj.Type);
			$('#images' + i).html('<img src="data:' + obj.Type + ';base64,' + obj.Content + '" width="60px" />');
                        $('#file' + i).remove();
                        $('#loader' + i).remove();
		},
		uploadProgress: function(event, position, total, percentComplete){
			$('#percent' + i).width(percentComplete+'%');
		}
	});
}