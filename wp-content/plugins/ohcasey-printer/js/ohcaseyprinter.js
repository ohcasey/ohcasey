jQuery(document).ready(function($) {
    $('.preprint').click(function() {
        var this2 = this;
        $.post(ajax_object.ajax_url, {
            action:      "change",
            _ajax_nonce:   ajax_object.author,
            status: $(this).attr('data-status'),
            order:  $(this).attr('data-order'),
        }, function(data) {
            //if (data) {
                $('.ohcasey-printer-act-'+$(this2).attr('data-order')).empty().html('<span style="color: green">Напечатано</span>');
            //}
        });
    });

    $('.errorprint').click(function() {
        var this2 = this;
        $.post(ajax_object.ajax_url, {
            action:      "change",
            _ajax_nonce:   ajax_object.author,
            status: $(this).attr('data-status'),
            order:  $(this).attr('data-order'),
        }, function(data) {
            //if (data) {
                $('.ohcasey-printer-act-'+$(this2).attr('data-order')).empty().html('<span style="color: red">Проблема печати</span>');
            //}
        });
    });
});