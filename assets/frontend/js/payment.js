(function($) {
    "use strict";

	$("form.frm-submit").each(function(i, el)
	{
		var $this = $(el);
        $this.on('submit', function(e){
            e.preventDefault();
            var btn = $this.find('[type="submit"]');
            $.ajax({
                url: $(this).attr('action'),
                type: "POST",
                data: new FormData(this),
                dataType: "json",
                contentType: false,
                processData: false,
                cache: false,
                beforeSend: function () {
                    btn.button('loading');
                },
                success: function (data) {
                    console.log(data.error);
                    $('.error').html("");
                    if (data.status == "fail") {
                        $.each(data.error, function (index, value) {
                            $this.find("[name='" + index + "']").parents('.form-group').find('.error').html(value);
                        });
                        btn.button('reset');
                    } else {
                        if (data.url) {
                            window.location.href = data.url;
                        } else if (data.status == "access_denied") {
                            window.location.href = base_url + "dashboard";
                        } else {
                            location.reload(true);
                        }
                    }
                },
                error: function () {
                    btn.button('reset');
                }
            });
        });
	});
}).apply(this, [jQuery]);

// Select2
(function($) {
    'use strict';
    if ($.isFunction($.fn['select2'])) {
        $(function() {
            $('[data-plugin-selectTwo]').each(function() {
                $(this).select2({
                    width: "100%"
                });
            });
        });
    }
}).apply(this, [jQuery]);

// Loading button plugin (removed from BS4)
(function($) {
    $.fn.button = function(action) {
        if (action === 'loading' && this.data('loading-text')) {
            this.data('original-text', this.html()).html(this.data('loading-text')).prop('disabled', true);
        }
        if (action === 'reset' && this.data('original-text')) {
            this.html(this.data('original-text')).prop('disabled', false);
        }
    };
}(jQuery));

// dropify basic configurations
if (typeof Dropify != 'undefined') {
	if ($(".dropify").length) {
		$(".dropify").dropify();
	}
} 

// Datepicker
(function($) {
	'use strict';
	if ($.isFunction($.fn['datepicker'])) {
		$(function() {
			$('[data-plugin-datepicker]').each(function() {
				$(this).datepicker({
					format: "yyyy-mm-dd",
					orientation: "bottom",
					autoclose: true,
					todayHighlight: true
				});
			});
		});
	}
}).apply(this, [jQuery]);
