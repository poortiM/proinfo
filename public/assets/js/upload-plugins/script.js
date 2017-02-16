$(function() {
    
    /* variables */
    var status = $('.status');
    var percent = $('.percent');
    var bar = $('.bar');
    
    /* submit form with ajax request */
    $('#project-image').ajaxForm({

        /* set data type json */
        dataType:'json',

        /* reset before submitting */
        beforeSend: function() {
            status.fadeOut();
            bar.width('0%');
            percent.html('0%');
        },

        /* progress bar call back*/
        uploadProgress: function(event, position, total, percentComplete) {
            var pVel = percentComplete + '%';
            bar.width(pVel);
            percent.html(pVel);
        },

        /* complete call back */
        complete: function(data) {
            status.html(data.responseJSON.count + ' Files uploaded!').fadeIn();
        }

    }); 
});