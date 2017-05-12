/**
 * Created by carlos on 11/05/17.
 */

$(function() {

    $('#category').multiselect({

        includeSelectAllOption: true

    });

    $('#category').click(function() {

        alert($('#category').val());

    })

});
