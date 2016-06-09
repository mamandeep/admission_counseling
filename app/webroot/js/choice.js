function loadPreferences(index) {
    alert('fired index=' + index);
    $('select[name="data[Choice][' + index + '][preference]"]')
            .find('option')
            .remove()
            .end();
    $.each(codeSubjectCentre, function(key, value) {
        //console.log('stuff : ' + key + ", " + value);
        if(key == $( 'select[name="data[Choice][' + index + '][subject]"] option:selected' ).val()) {
            var temp = "";
            var temp2 = "";
            $.each(value, function(key2, value2) {
                $('select[name="data[Choice][' + index + '][preference]"]')
                    .append('<option value="' + key2 + '">' + key2 + '</option>');
                temp = key2;
                temp2 = value2;
            });
            $('select[name="data[Choice][' + index + '][preference]"]').val(temp);
            $('div[name="[Choice][' + index + '][centre]"]').html(temp2);
            $('input[name="data[Choice][' + index + '][centre]"]').val(temp2);
        }
    });
    
}
    
function loadCenter(index){
    $.each(codeSubjectCentre, function(key, value) {
        //console.log('stuff : ' + key + ", " + value);
        $.each(value, function(key2, value2) {
            if(key2 == $( 'select[name="data[Choice][' + index + '][preference]"] option:selected' ).val()) {
                $('div[name="[Choice][' + index + '][centre]"]').html(value2);
                $('input[name="data[Choice][' + index + '][centre]"]').val(value2);
            }
        });
    });
}

$(document).ready(function () {
    
    var
        gradeTable = $('#options-table'),
        gradeBody = gradeTable.find('tbody'),
        gradeTemplate = _.template($('#options-template').remove().text()),
        numberRows = gradeTable.find('tbody > tr').length;

    gradeTable
        .on('click', 'a.add', function(e) {
            e.preventDefault();
            if(gradeTable.find('tbody > tr').length >= 3 ) {
                alert("Maximum limit for filling the Options has reached.");
                return false;
            }
            $(gradeTemplate({key: numberRows++}))
                .hide()
                .appendTo(gradeBody)
                .fadeIn('fast');
            if(numberRows > 1) {
                var attri1 = 'input[name="data[Choice][0][std_id]"]';
                var attri2 = 'input[name="data[Choice][' + (numberRows - 1) +  '][std_id]"]';
                var attri3 = 'input[name="data[Choice][' + (numberRows - 1) +  '][id]"]';
                if($(attri2))
                    $(attri2).val($(attri1).val());
                $(attri3).remove();
            }
            else {
                var attri1 = 'input[name="data[Choice][0][std_id]"]';
                if($(attri1))
                    $(attri1).val($('#glob_userId').val());
            }
            
            //alert('Number of rows = ' + numberRows);
            var index = (numberRows-1);
            $('select[name="data[Choice][' + index + '][subject]"]').on('change', loadPreferences(index));
            $('select[name="data[Choice][' + index + '][preference]"]').on('change', loadCenter(index));
            
            $("#modified").val('true');
            var count = 1;
            $('table#options-table tbody tr input').each(function() {
                //alert($(this).attr('name'));
                if($(this).attr('name').indexOf("pref_order") != -1) {
                    $(this).val(count++);
                }
            });
        })
        .on('click', 'a.remove', function(e) {
                e.preventDefault();
            idElem = $("[name='Choice.0.id']");
            userIdElem = $("[name='Choice.0.std_id']");
            if(gradeTable.find('tbody > tr').length > 1 && $(this).closest('tr').find('td:first-child input:first-child').attr('name') != 'data[Choice][0][id]') {
                $(this)
                    .closest('tr').remove();
                    //.fadeOut('fast', function() {
                    //    $(this).remove();
                    //    alert('removed row');
                    //});
                    
                $("#modified").val('true');
            }
            var count = 1;
            $('table#options-table tbody tr input').each(function() {
                if($(this).attr('name').indexOf("pref_order") != -1) {
                    $(this).val(count++);
                }
            });
            
        });

        if (numberRows === 0) {
            gradeTable.find('a.add').click();
        }
        
        var tableLength = gradeTable.find('tbody > tr').length;
        for(var i=0; i< tableLength; i++) {
            var index = i;
            
            $('#row_' + index).on('change', 'select[name="data[Choice][' + index + '][subject]"]' , loadPreferences(index));
            $('#row_' + index).on('change', 'select[name="data[Choice][' + index + '][preference]"]' , loadCenter(index));
            //$('select[name="data[Choice][' + index + '][subject]"]').on('change', loadPreferences(index));
            //$('select[name="data[Choice][' + index + '][preference]"]').on('change', loadCenter(index));
            
            $('select[name="data[Choice][' + index + '][subject]"]').val(dbValues[i]['subject']);
            $('select[name="data[Choice][' + index + '][subject]"]').trigger('change');
            //$('select[name="data[Choice][' + index + '][subject]"]').val(dbValues[i]['subject']).change();
            
            $('select[name="data[Choice][' + index + '][preference]"]').val(dbValues[i]['preference']);
            $('select[name="data[Choice][' + index + '][preference]"]').trigger('change');
            //$('select[name="data[Choice][' + index + '][preference]"]').val(dbValues[i]['preference']).change();
        }
        
        $('#formSubmit').on('click', function(e){
            //e.preventDefault();
            
            /*$('#grade-table > tbody > tr').each(function(i, row) {
                var str = '<input type="hidden" name="data[Education][' + (numberRows - 1) + '][counter]" value="' + i + '" id="Education' + (numberRows - 1) + 'Counter">';
                $(this).find('td:first-child').append(str);
            });*/
        });
});