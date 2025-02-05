// Loading button plugin (removed from BS5)
$(document).ready(function() {
    $.fn.button = function(action) {
        if (action === 'loading' && this.data('loading-text')) {
            this.data('original-text', this.html()).html(this.data('loading-text')).prop('disabled', true);
        }
        if (action === 'reset' && this.data('original-text')) {
            this.html(this.data('original-text')).prop('disabled', false);
        }
    };
});

$(document).on('click', '#termsFooter, .terms', function() {
    $.ajax({
        url: base_url + "saas_website/getTermsConditions",
        success: function(response){
            $('#termsModal .modal-body').html(response);
            $('#termsModal').modal('show'); 
        }
    });
});

$(document).on('click', '.plans-purchase', function() {
    var $this = $(this);
    var package_id = $(this).data('id');
    $('#packageID').val(package_id);
    $('.school-reg').find('.form-control').val('');
    $('.school-reg').find('.error').html('');
    $.ajax({
        type: 'POST',
        url: base_url + "saas_website/getPlanDetails",
        data: {
            'package_id': package_id
        },
        dataType: 'JSON',
        beforeSend: function() {
            $this.button('loading');
        },
        success: function(data) {
            if (data.islogin) {
                swal({
                    title: data.title,
                    text: data.message,
                    buttonsStyling: false,
                    showCloseButton: true,
                    focusConfirm: false,
                    confirmButtonClass: "btn swal2-btn-default",
                    type: "error"
                });
            } else {
                if (data.recaptcha == 1) {
                    grecaptcha.reset();
                }
                $("#summary").html(data.html);
                $('#regModal').modal('show');
            }
        },
        error: function(xhr) { // if error occured
            $this.button('reset');
        },
        complete: function() {
            $this.button('reset');
        }
    });
});

$("form.contact-frm").on('submit', function(e) {
    e.preventDefault();
    var $this = $(this);
    var btn = $this.find('[type="submit"]');
    $.ajax({
        url: $(this).attr('action'),
        type: "POST",
        data: $(this).serialize(),
        dataType: 'json',
        beforeSend: function () {
            btn.button('loading');
        },
        success: function (data) {
            $('.error').html("");
            if (data.status == "fail") {
                $.each(data.error, function(index, value) {
                    $this.find("[name='" + index + "']").parents('.form-group').find('.error').html(value);
                });
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
        complete: function() {
            btn.button('reset');
        },
        error: function() {
            btn.button('reset');
        }
    });
});


(function () {
    //===== Prealoder

    window.onload = function () {
        window.setTimeout(fadeout, 500);
    }

    function fadeout() {
        document.querySelector('.preloader').style.opacity = '0';
        document.querySelector('.preloader').style.display = 'none';
    }


    /*=====================================
    Sticky
    ======================================= */
    window.onscroll = function () {
        var header_navbar = document.querySelector(".navbar-area");
        var sticky = header_navbar.offsetTop;

        var logo = document.querySelector('.navbar-brand img')
        if (window.pageYOffset > sticky) {
          header_navbar.classList.add("sticky");
        } else {
          header_navbar.classList.remove("sticky");
        }

        // show or hide the back-top-top button
        var backToTo = document.querySelector(".scroll-top");
        if (document.body.scrollTop > 50 || document.documentElement.scrollTop > 50) {
            backToTo.style.display = "flex";
        } else {
            backToTo.style.display = "none";
        }
    };


    
    // section menu active
	function onScroll(event) {
		var sections = document.querySelectorAll('.page-scroll');
		var scrollPos = window.pageYOffset || document.documentElement.scrollTop || document.body.scrollTop;

		for (var i = 0; i < sections.length; i++) {
			var currLink = sections[i];
			var val = currLink.getAttribute('href');
			var refElement = document.querySelector(val);
			var scrollTopMinus = scrollPos + 73;
			if (refElement.offsetTop <= scrollTopMinus && (refElement.offsetTop + refElement.offsetHeight > scrollTopMinus)) {
				document.querySelector('.page-scroll').classList.remove('active');
				currLink.classList.add('active');
			} else {
				currLink.classList.remove('active');
			}
		}
	};

    window.document.addEventListener('scroll', onScroll);
    
    // for menu scroll 
    var pageLink = document.querySelectorAll('.page-scroll');

    pageLink.forEach(elem => {
        elem.addEventListener('click', e => {
            e.preventDefault();
            document.querySelector(elem.getAttribute('href')).scrollIntoView({
                behavior: 'smooth',
                offsetTop: 1 - 60,
            });
        });
    });

    // WOW active
    new WOW().init();

    let filterButtons = document.querySelectorAll('.portfolio-btn-wrapper button');
    filterButtons.forEach(e =>
        e.addEventListener('click', () => {

            let filterValue = event.target.getAttribute('data-filter');
            iso.arrange({
                filter: filterValue
            });
        })
    );

    var elements = document.getElementsByClassName("portfolio-btn");
    for (var i = 0; i < elements.length; i++) {
        elements[i].onclick = function () {
            var el = elements[0];
            while (el) {
                if (el.tagName === "BUTTON") {
                    el.classList.remove("active");
                }
                el = el.nextSibling;
            }
            this.classList.add("active");
        };
    };

    //===== mobile-menu-btn
    let navbarToggler = document.querySelector(".mobile-menu-btn");
    navbarToggler.addEventListener('click', function () {
        navbarToggler.classList.toggle("active");
    });
})();