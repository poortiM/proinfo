/**
 * Multiple file upload with progress bar php and jQuery
 * 
 * @author Resalat Haque
 * @link http://www.w3bees.com
 */

$(function() {
	
	/* variables */
	var status = $('.status');
	var percent = $('.percent');
	var bar = $('.bar');
	var directory = base_url+"/uploads/product/";
	
	/* submit form with ajax request */
	$('#productform').ajaxForm({

		/* set data type json */
		dataType:'json',

		/* reset before submitting */
		beforeSend: function() {
			bar.width('0%');
			percent.html('0%');
		},

		/* progress bar call back*/
		uploadProgress: function(event, position, total, percentComplete) {
			var pVel = percentComplete + '%';
			$(".progress").show();
			bar.width(pVel);
			percent.html(pVel);
		},

		/* complete call back */
		complete: function(data) {
			// status.html(data.responseJSON.count + ' Files uploaded!').fadeIn();
			console.log(data.responseJSON.data)
			$('.create-project-image').html('');
			$.each(data.responseJSON.data, function(id, value) {
				console.log(id+" "+value.image)
				$('.create-project-image').append('<div class="photo-pod col-xs-4 project-image-section-'+value.id+'"> <div class="photo-actions-container"><span class="delete-project-photo photo-action-btn pull-right" onclick=deleteProduct('+value.id+')> delete <i class="fa fa-times-circle photo-action-icon"></i> </span> </div><div class="project-image-status-container"> <div class="image-status btn btn-black-opaque"> <span style="color:white">Published</span> </div>  <input type="hidden" name="project_photo[]" value='+value.image+'"><input type="hidden" class="project_cover'+id+'" name="project_cover[]" value="0">  <img class="project-photo" src="'+base_url+"/contentimage?file=uploads/product/"+value.image+"&l=350&w=250"+'"> </div></div>');
			});
		}

	});	
});
