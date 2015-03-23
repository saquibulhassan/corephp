	/// ONLY FOR THEME
	jQuery(function($) {
		//And for the first simple table, which doesn't have TableTools or dataTables
		//select/deselect all rows according to table header checkbox
		var active_class = 'success';
		$(document).eq(0).on('click', '#simple-table > thead > tr > th input[type=checkbox]', function(){
			var th_checked = this.checked;//checkbox inside "TH" table header
			
			$(this).closest('table').find('tbody > tr').each(function(){
				var row = this;
				if(th_checked) $(row).addClass(active_class).find('input[type=checkbox]').eq(0).prop('checked', true);
				else $(row).removeClass(active_class).find('input[type=checkbox]').eq(0).prop('checked', false);
			});
		});

		//select/deselect all rows according to table header checkbox
		$(document).on('click', '.floatThead-table > thead > tr > th input[type=checkbox]' , function(){
			var th_checked = this.checked;//checkbox inside "TH" table header

			$('#simple-table').find('tbody > tr').each(function(){
				var row = this;
				if(th_checked) $(row).addClass(active_class).find('input[type=checkbox]').eq(0).prop('checked', true);
				else $(row).removeClass(active_class).find('input[type=checkbox]').eq(0).prop('checked', false);
			});
		});

		//select/deselect a row when the checkbox is checked/unchecked
		$(document).on('click', '#simple-table td input[type=checkbox]' , function(){
			var $row = $(this).closest('tr');
			if(this.checked) $row.addClass(active_class);
			else $row.removeClass(active_class);
		});
	
	});

	// NUMBER FORMATE
	function getNumber(number){
		return $.number(number, '2', '.', ',');
	}

	// STIRNG PADDING. MAKE 123 TO 0000123 
	function pad (str, max) {
	  str = str.toString();
	  return str.length < max ? pad("0" + str, max) : str;
	}

	//FOR TYPEHEAD JS / AUTOCOMPLETE
	var substringMatcher = function(strs) {
	  return function findMatches(q, cb) {
	    var matches, substrRegex;

	    // an array that will be populated with substring matches
	    matches = [];

	    // regex used to determine if a string contains the substring `q`
	    substrRegex = new RegExp(q, 'i');

	    // iterate through the pool of strings and for any string that
	    // contains the substring `q`, add it to the `matches` array
	    $.each(strs, function(i, str) {
	      if (substrRegex.test(str)) {
	        // the typeahead jQuery plugin expects suggestions to a
	        // JavaScript object, refer to typeahead docs for more info
	        matches.push({ value: str });
	      }
	    });

	    cb(matches);
	  };
	};


	/// SINGLE PAGE APPLICATION FRAMEWORK

	//// DATA TABLE
	$(document).on('change', '.display-per-page' ,function(e) {
		$.cookie('per-page', $(this).val());
		reload();
	});

	$(document).on('click', '.sorting, .sorting_desc' ,function(e) {
		$.cookie('sorting-key', $(this).attr('data-sorting'));
		$.cookie('sorting-value', 'asc');
		$.cookie('onset', 0);
		reload();
	});

	$(document).on('click', '.sorting_asc' ,function(e) {
		$.cookie('sorting-key', $(this).attr('data-sorting'));
		$.cookie('sorting-value', 'desc');
		$.cookie('onset', 0);
		reload();
	});

	$(document).on('click', '.onset' ,function(e) {
		$.cookie('onset', $(this).attr('data-onset'));
		reload();
		e.preventDefault();
	});

	$(document).on('click', '.filter' ,function(e) {		
		$.cookie('filter-key', $('.filter-key').val());
		$.cookie('filter-value', $('.filter-value').val());
		$.cookie('onset', 0);
		reload();
	});

	function initiateDataTable() {
		$.cookie('per-page', '');
		$.cookie('sorting-key', '');
		$.cookie('sorting-value', '');
		$.cookie('onset', '');
		$.cookie('filter-key', '');
		$.cookie('filter-value', '');
	};


	/// CONFIRM BOX AND DELETE
	$(document).on('click', '.bootbox-confirm', function() {
		var url = $(this).attr('data-href');
		var id = $(this).attr('data-id');
		
		bootbox.confirm({
			message: "<h5>Are you sure to delete? <br /> This would not be undone.</h5>",
			buttons: {
			  confirm: {
				 label: '<i class="ace-icon glyphicon glyphicon-trash bigger-110"></i> Delete',
				 className: "btn-info btn-sm",
			  },
			  cancel: {
				 label: "Cancel",
				 className: "btn-danger btn-sm",
			  }
			},
			callback: function(result) {
				if(result) {
					$.ajax({
	                    url: url,
	                    type: "POST",
	                    data: {id : id},
	                    dataType: "json",
	                    success: function(data, textStatus, jqXHR) {
							setAlert(data.class, data.message);
							if(!data.hasError) {
								reload();
							}
	                    },
	                    error: function (xhr, ajaxOptions, thrownError){
					       	console.log(thrownError);
					    }
	                });
				}
			}
		  }
		);
		
	});



	/** POP UP HTML CONTENT / FORM
	 * CUSTOM ATTRIBUTE required data-href : url to be loaded
	 * CUSTOM ATTRIBUTE required data-title : title will show as pop up title
	 * CUSTOM ATTRIBUTE optional data-html : either pop up body will be a new form or other html
	 * CUSTOM ATTRIBUTE optional data-selector : html element id
	 **/
	$(document).on('click', '.ajax-popup-load' ,function(e) {

		var url 		= $(this).attr('data-href');
		var title 		= $(this).attr('data-title');
		var className 	= (isExist($(this).attr('data-class'))) ? $(this).attr('data-class') : "";
		var htmlType 	= (isExist($(this).attr('data-html'))) ? $(this).attr('data-html') : "content";
		var selector 	= (isExist($(this).attr('data-selector'))) ? $(this).attr('data-selector')+"ModalContent" : "modalContent";

		if(htmlType == 'form') {
			var successButton 	= "Save";
		} else {
			var successButton 	= "Print";
		}

		var popup = bootbox.dialog({
			title: title,
			message: '<div id="'+selector+'">Loading . . .</div>',
			className: className,
			buttons: 			
			{
				"success" :
				 {
					"label" : successButton,
					"className" : "btn-sm btn-info disable-on-click",
					"callback": function() {						
						if(htmlType == 'form') {
							$(".modal .disable-on-click").addClass('disabled');
							$("#"+selector+" form").submit();
						} else {							
            				$("#"+selector).printArea({ 
            					mode : "iframe",
            					popTitle : $("#"+selector).parents(".modal-content").find(".modal-header h4").html()
            				});       
						}
						$(".modal-backdrop").css("height", getHeight(".bootbox"));
						return false;
					}
				},
				"danger" :
				{
					"label" : "Cancel",
					"className" : "btn-sm btn-danger",
					"callback": function() {
						//Example.show("uh oh, look out!");
					}
				}
			}
		});


		$.ajax({
			url: url,
			type: 'GET',
			dataType: "html",
			success: function(data) {
				$("#"+selector).html(data);		
			},
			error: function (jqXHR, textStatus, errorThrown) {
				console.log(errorThrown);
			},
			complete: function(){
				$(".modal-backdrop").css("height", getHeight(".bootbox"));
			}
		});

		e.preventDefault();	
	});


	/// LOAD FORM
	/*
	 * this function can be used for both of form with validation and without validation
	 * for without validation just pass null object "{}" 
 	 * @params selector : form id
	 * @params validationRules : see the reference of jquery form validation
	 * @params validationMessages : see the reference of jquery form validation
	 * @params formType : new / edit
	 * @params gotoUrl : where to go after form submit success only for edit form.
	 * @params isPopup : Boolean 1/0
	 */

	 /*
		function callbackSaju() {
			//code will be here...	
		}

		callbackSaju
	 */
	function loadFormValidation(selector, validationRules, validationMessages, formType, gotoUrl, onSuccessCallback, isPopup) {
		$(selector).validate({
			errorElement: 'div',
			errorClass: 'help-block',
			ignore: '',
			rules: validationRules,
			messages: validationMessages,
			highlight: function (e) {
				$(e).closest('.form-group').removeClass('has-info').addClass('has-error');
			},
			success: function (e) {
				$(e).closest('.form-group').removeClass('has-error');//.addClass('has-info');
				$(e).remove();
			},
			errorPlacement: function (error, element) {
				
				if(element.is('input[type=checkbox]') || element.is('input[type=radio]')) {
					var controls = element.closest('div[class*="col-"]');
					if(controls.find(':checkbox,:radio').length > 1) controls.append(error);
					else error.insertAfter(element.nextAll('.lbl:eq(0)').eq(0));
				}
				else if(element.is('.select2')) {
					error.insertAfter(element.siblings('[class*="select2-container"]:eq(0)'));
				}
				else if(element.is('.chosen-select')) {
					error.insertAfter(element.siblings('[class*="chosen-container"]:eq(0)'));
				}
				else error.insertAfter(element.parent());
			},
			submitHandler: function (form) {

				var postData 	= $(form).serializeArray();
                var formURL 	= $(form).attr('action');
                
                $.ajax({
                    url: formURL,
                    type: "POST",
                    data: postData,
                    dataType: "json",
                    success: function(data, textStatus, jqXHR) {
						if(!data.hasError) {
							if(formType == 'new') {
								$(form)[0].reset();
								$(".select2").trigger("change");
								$(".form-group").removeClass('has-error');
								$(".help-block").hide();
								$(selector+' button[type=submit]').removeClass('disabled')
									.html('<i class="ace-icon glyphicon glyphicon-floppy-disk no-border bigger-110"></i> Save');

								setAlert(data.class, data.message);

								if(isPopup) {
									reload();
									$('.modal .disable-on-click').removeClass('disabled');
								}

							} else {
								if(isPopup) {
									reload();
									setAlert(data.class, data.message);									
									$(form).closest('.modal').modal('hide');
								} else {
									window.location.hash = gotoUrl;									
									var callback = function() {
										setAlert(data.class, data.message);
									};
									LoadAjaxContent(gotoUrl, callback);
								}
							}

							if(typeof(onSuccessCallback) == 'function') {
								onSuccessCallback();
							}
							
						} else {
							setAlert(data.class, data.message);
							$('#setFormMessage').html(data.detailMessage);
						}

                    },
                    error: function (xhr, ajaxOptions, thrownError){
				       	console.log(thrownError);
				    }
                });
            },
			invalidHandler: function (form) {
				$(selector+' .disable-on-click').removeClass('disabled')
				.html('<i class="ace-icon glyphicon glyphicon-floppy-disk no-border bigger-110"></i> Save');

				$(".modal .disable-on-click").removeClass('disabled');
			}
		});
	}


	//// CORE 
	$(window).load(function(){
		var ajax_url = location.hash.replace(/^#/, '');
		if (ajax_url.length < 1 || ajax_url == '#') {
			ajax_url = 'dashboard';
			window.location.hash = ajax_url;
		}
		
		LoadAjaxContent(ajax_url);
	});

	$(document).on('click', '.nav a' ,function(e) {
		var url 	= $(this).attr('href');
		var title 	= $(this).children("span").html();
		url 		= url.substring(url.indexOf('#')+1);
	
		if ($(this).hasClass('ajax-link')) {
			var parents = $(this).parents('li');
			var another_items = $('.nav').not(parents);
			another_items.find('li').removeClass('active');
			$(parents).addClass('active');

			if(url != '#' && url != '') { 
				window.location.hash = url; 
				initiateDataTable();
				LoadAjaxContent(url); 
				$(".page-header h1").html(title);
			}
			e.preventDefault();
		}
	});
	
	$(document).on('click', '.ajax-load' ,function(e) {
		var url = $(this).attr('href');
		url = url.substring(url.indexOf('#')+1);
		
		if(url != '#' && url != '') {
			window.location.hash = url;
			LoadAjaxContent(url);
		}
		e.preventDefault();	
	});

	$(document).on('click', '.disable-on-click' ,function(e) {
		var img = '<img src="'+URL.getBaseAction('assets/img/ajax-loader.gif')+'" />';
		$(this).addClass('disabled').html(img+" Save");
	});

	$(document).on('click', '.reload-form' ,function(e) {
		reload();
	});

	function addClass(n,t){
		var i=n.className;i&&(i+=" ");
		n.className=i+t
	}
	function removeClass(n,t){
		var i=" "+n.className+" ";n.className=i.replace(" "+t,"").replace(/^\s+/g,"").replace(/\s+$/g,"")
	}
	function hasClass(n,t){
		var i=" "+n.className+" ",r=" "+t+" ";
		return i.indexOf(r)!=-1
	}
	function isExist(a){
		if (typeof a !== typeof undefined && a !== false) {
		    return true;
		} else {
			return false;
		}
	}
	function getHeight(s){
		return $(s).prop("scrollHeight");
	}
	
	//Custom JS
	function reload() {
		LoadAjaxContent(location.hash.replace(/^#/, ''));
	};
	
	function LoadAjaxContent(url, callback){
		$('#ajax-content').html('');
		$('.preloader').show();
		
		$.ajax({
			mimeType: 'text/html; charset=utf-8',
			url: URL.getSiteAction(url),
			type: 'GET',
			dataType: "html",
			success: function(data) {
				$('#ajax-content').html(data);			
			},
			error: function (jqXHR, textStatus, errorThrown) {
				console.log(errorThrown);
			},
			complete: function() {
				if(typeof(callback) == 'function'){
					callback();
				}	

				$('.preloader').hide();		
			},
		});
	}

	function setAlert(status, msg) {
		toastr.options = {
		  "closeButton": true,
		  "debug": false,
		  "progressBar": false,
		  "positionClass": "toast-top-center",
		  "preventDuplicates": false,
		  "onclick": null,
		  "showDuration": "300",
		  "hideDuration": "1000",
		  "timeOut": "3000",
		  "extendedTimeOut": "1000",
		  "showEasing": "swing",
		  "hideEasing": "linear",
		  "showMethod": "fadeIn",
		  "hideMethod": "fadeOut"
		};

		if($('.bootbox').length > 0) { 
			$('.bootbox').animate({ 'scrollTop': 0 }, 500, 'swing'); 
		} else {
			$('html, body').animate({ 'scrollTop': 0 }, 500, 'swing');
		}
		toastr[status](msg);
	} 