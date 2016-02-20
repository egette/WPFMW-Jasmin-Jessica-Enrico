$(document).ready(function() {

/*
 *  Send a get request to the Giant bomb api.
 *  @param string resource set the RESOURCE.
 *  @param object data specifiy any filters or fields.
 *  @param object callbacks specify any custom callbacks.
 */
function sendRequest(resource, data, callbacks) {
    var baseURL = 'http://giantbomb.com/api';
    var apiKey = "969800c88a4d50d16ff61120543367584a42ce19";
    var format = 'json';

    // make sure data is an empty object if its not defined.
    data = data || {};

    // Proccess the data, the ajax function escapes any characters like ,
    // So we need to send the data with the "url:"
    var str, tmpArray = [], filters;
    $.each(data, function(key, value) {
        str = key + '=' + value;
        tmpArray.push(str);
    });

    // Create the filters if there were any, else it's an empty string.
    filters =  (tmpArray.length > 0) ? '&' + tmpArray.join('&') : '';

    // Create the request url.
    var requestURL = baseURL + resource + "?api_key=" + apiKey + "&format=" + format + filters;

    // Set custom callbacks if there are any, otherwise use the default onces.
    // Explanation: if callbacks.beforesend is passend in the argument callbacks, then use it. 
    // If not "||"" set an default function.
    var callbacks = callbacks || {};
    callbacks.beforeSend = callbacks.beforeSend || function(response) {};
    callbacks.success = callbacks.success || function(response) {};
    callbacks.error = callbacks.error || function(response) {};
    callbacks.complete = callbacks.complete || function(response) {};

    // the actual ajax request
    $.ajax({
        url: requestURL,
        method: 'GET',
        dataType: 'json',

        // Callback methods,
        beforeSend: function() {
            callbacks.beforeSend()
        },
        success: function(response) {
            callbacks.success(response);
        },
        error: function(response) {
            callbacks.error(response);
        },
        complete: function() {
            callbacks.complete();
        }
    });
}
function search() {
    // Get your text box input, something like: 
    // You might want to put a validate and sanitation function before sending this to the ajax function.
    var query = $('#suche').val();

    // Set the fields or filters 
    var data = {
        query: query,
        resources: 'game'
    };

    // Send the ajax request with to '/search' resource and with custom callbacks
    sendRequest('/search', data, { 
        // Custom callbacks, define here what you want the search callbacks to do when fired.
        beforeSend: function(data) {},
        success: function(data) {
			$('#result').empty();
			$('#result').append('Found ' + data.number_of_total_results + ' results for ' + query);
			var games = data.results;
			$.each(games, function(index, game) {
				$('#result').append('<h1>' + game.name + '</h1>');
				$('#result').append('<p>' + game.deck + '</p>');
				$('#result').append('<img src="' + game.image.thumb_url + '" width="128" height="160" />');
			});
		},
        error: function(data) {},
        complete: function(data) {},
    });
}

function getGame() {
    // get game id from somewhere like a link.
    var gameID = '3030-38206';
    var resource = '/game/' + gameID;

    // Set the fields or filters 
    var data = {
        field_list: 'name,description'
    };

    // No custom callbacks defined here, just use the default onces.
    sendRequest(resource, data);
}

$('#enter').click(function (ev) {
	var query = $('#suche').val();
	if(query !== ""){
	search();
	}
});

$('#suche').keypress(function(event){
    var keycode = (event.keyCode ? event.keyCode : event.which);
    if(keycode == '13'){
		event.preventDefault();
		var query = $('#suche').val();
		if(query !== ""){
		search();
		}		
    }
});

});