$(document).ready(function(){
	$(".openCkFinder").click(function(){
		var __= $(this);
		CKFinder.popup( {
	        width: 800,
	        height: 500,
	        chooseFiles: true,
	        resourceType: 'Images',
	        selectActionFunction: function( fileUrl, data ) {
                var file_url = fileUrl.substr(9);
                __.parents(".img_menu").find("img").attr("src",base_url+file_url);
                __.parents(".img_menu").find("input").val(file_url);
	        }
	    });
	})
});