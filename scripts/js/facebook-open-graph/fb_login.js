var fbLogin = function(){
	FB.login(function(response) {
		if (response.authResponse) {
			console.log(response.authResponse);
		}else {
			return false;
		}
		},{
		scope: 'publish_stream'
	});
}


function postMessageToWall(message, name, caption, description, picture, link) {
	var args = {
		'method': 'feed',
		'name': name,
		'message': message,
		'link': link,
		'picture': picture,
		'caption': caption,
		'description': description
	};
	FB.api('/me/feed', 'post', args, function (response) {
		console.log(response);	
	});

};
