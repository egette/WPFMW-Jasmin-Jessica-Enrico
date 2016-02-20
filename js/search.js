var apikey = "969800c88a4d50d16ff61120543367584a42ce19";
var baseUrl = "http://www.giantbomb.com/api";

// construct the uri with our apikey
var GamesSearchUrl = baseUrl + '/search/?api_key=' + apikey + '&format=json' ; //'&format=jsonp&json_callback=searchCallback'; // ;


$(document).ready(function() {
	
$('#enter').click(function (ev) {

  var query = $('#suche').val();
  if(query !== ""){
	   
	  $.ajax({
		url: GamesSearchUrl + '&query=' + encodeURI(query) ,
		method: 'GET',
		dataType: 'json',
		//headers: { 'Access-Control-Allow-Origin' : '*' },
		crossDomain: true,
		success: searchCallback
	  });
	  
		// callback for when we get back the results
		function searchCallback(data) {
			$('#result').empty();
			$('#result').append('Found ' + data.number_of_total_results + ' results for ' + query);
			var games = data.results;
			$.each(games, function(index, game) {
				$('#result').append('<h1>' + game.name + '</h1>');
				$('#result').append('<p>' + game.deck + '</p>');
				$('#result').append('<img src="' + game.image.thumb_url + '" width="128" height="160" />');
			});
		}
    }
});	
});