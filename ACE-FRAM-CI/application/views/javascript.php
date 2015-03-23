(function(){
	var URL = {
		baseUrl: function(){
			return '<?php echo base_url(); ?>';
		},
		siteUrl: function(){
			return '<?php echo site_url(); ?>';
		},
		getBaseAction: function(action){
			return '<?php echo base_url(); ?>' + action;
		},
		getSiteAction: function(action){
			return '<?php echo site_url(); ?>' + action;
		}
	};
	window.URL = URL;
}());
