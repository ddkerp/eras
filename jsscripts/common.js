//jQuery(function() {
function anchoring(params){
		window.location.href = params.url;
}
function submitting(params){
	params.form.submit();	
}
jQuery(document).ready(function() {	
	function customDialogBase(params){
		
		return customDialog({
				"width": 300,
				"title": "Warning!",
				"descr": params.descr,
				"btns": [{
					"text": "Yes",
					"handler": function(){
							window[params.func](params); 
						},
					"background": "green",
					"fontColor": "#fff"
				}, {
					"text": "No",
					"handler": function(){
							return false;
						}
				}],
				"toTop": 280,
				"borderRadius": 3,
				"backgroundColor": "#fff",
				"borderColor": "#999",
				"titleColor": "#333",
				"titleFontSize": 16,
				"titleBackgroundColor": "#ddd",
				"titleBorderColor": "#999",
				"descColor": "#d90001",
				"descSize": 14,
				"descLineHeight": 1.5
		});
	}
	function anchoring(url){
		alert("hi");
	}
	$("#fileDoc").click(function(){
		var params = {};
		params.url = this.href;
		params.func = "anchoring";
		params.descr = "Do you want to delete the Document"
		return	customDialogBase(params);
	});	

	$("#fileDocket").click(function(){
		var params = {};
		params.url = this.href;
		params.func = "anchoring";
		params.descr = "Do you want to delete the Docket file"
		return	customDialogBase(params);
	});	
	
	
	$("#butt_case_create").click(function(){
		
		if($('#file').val() == ""){
			var params = {};
			params.url = this.href;
			params.func = "submitting";
			params.descr = "Do you want to save without uploading Docket file";
			params.form = $( "form:first" );
			return	customDialogBase(params);
		}
		if($('#file_doc').val() == ""){
			var params = {};
			params.url = this.href;
			params.func = "submitting";
			params.descr = "Do you want to save without uploading Document";
			params.form = $( "form:first" );
			return	customDialogBase(params);
		}
	});
		
	
	$("#butt_case_save").click(function(){
		var form = this;
		if($('#file').val() == "" && $('[name="saved_file"]').val() ==""){
			var params = {};
			params.url = this.href;
			params.func = "submitting";
			params.descr = "Do you want to save without uploading Docket file";
			params.form = $( "form:first" );
			return	customDialogBase(params);
			
		}
		if($('#file_doc').val() == "" && $('[name="saved_file_doc"]').val() == ""){
			var params = {};
			params.url = this.href;
			params.func = "submitting";
			params.descr = "Do you want to save without uploading Document";
			params.form = $( "form:first" );
			return	customDialogBase(params);
		}
		
	});	
	
	
	
	//jQuery( ".msg.success" ).delay( 800 ).hide( "slow" );

});
