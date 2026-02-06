jQuery(document).ready(function($) {
    "use strict";

    $('#category-filter, #featured-filter').on('change', function() {
        const filterData = {
            action: 'filter_specialists',
            category: $('#category-filter').val(),
            featured: $('#featured-filter').is(':checked') ? 'true' : 'false'
        };

        $.ajax({
            url: ajax_params.ajax_url,
            data: filterData,
            type: 'POST',
            beforeSend: function() {
                $('#specialists-container').css('opacity', '0.5');
            },
            success: function(response) {
                $('#specialists-container').html(response).css('opacity', '1');
            },
            error: function(xhr, status, error) {
                $('#specialists-container').css('opacity', '1');
            }
        });
    });
});