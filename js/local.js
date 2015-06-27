function create_tny(){

	var post_url = '/ajax.php';

	var posting = $.post( post_url, { tny_mx_url: jQuery("#tny_mx_url").val() } );
 
	posting.done(function( data ) {

  		var content = data;

    	$( "#result" ).empty().append( content );

	});

}

jQuery(document).ready(function(){

	jQuery("#tny_mx_form").submit(function(){


		event.preventDefault();
		create_tny();

	});

});