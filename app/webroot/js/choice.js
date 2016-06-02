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
                var attri1 = 'input[name$="data[Choice][0][std_id]"]';
                var attri2 = 'input[name$="data[Choice][' + (numberRows - 1) +  '][std_id]"]';
                var attri3 = 'input[name$="data[Choice][' + (numberRows - 1) +  '][id]"]';
                if($(attri2))
                    $(attri2).val($(attri1).val());
                $(attri3).remove();
            }
            else {
                var attri1 = 'input[name$="data[Choice][0][std_id]"]';
                if($(attri1))
                    $(attri1).val($('#glob_userId').val());
            }
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
                    .closest('tr')
                    .fadeOut('fast', function() {
                        $(this).remove();
                    });
                    
                $("#modified").val('true');
            }
            var count = 1;
            $('table#options-table tbody tr input').each(function() {
                alert($(this).attr('name'));
                if($(this).attr('name').indexOf("pref_order") != -1) {
                    $(this).val(count++);
                }
            });
            
        });

        if (numberRows === 0) {
            gradeTable.find('a.add').click();
        }
        
        $('#formSubmit').on('click', function(e){
            //e.preventDefault();
            
            /*$('#grade-table > tbody > tr').each(function(i, row) {
                var str = '<input type="hidden" name="data[Education][' + (numberRows - 1) + '][counter]" value="' + i + '" id="Education' + (numberRows - 1) + 'Counter">';
                $(this).find('td:first-child').append(str);
            });*/
        });
});