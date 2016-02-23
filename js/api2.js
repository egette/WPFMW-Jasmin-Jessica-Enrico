function showResults(result) {

      var html = "";
	  var platform = "";
      $.each(result.results, function(index, value) {
        var gameName = value.name;
        var boxArt = value.image ? value.image.icon_url : '';
        var releaseDate = value.original_release_date;
		$.each(value.platforms, function(index, value) {
         platform += (value.name + " ");
		});
		var deck = value.deck;
		var description = value.description;
		var gameID = value.id;
		
        var site_detail = value.site_detail_url;
        html += "<a href='?idgame=" + gameID + "'><li><p>" + gameName + "</p></li>" + "<img src=" +boxArt + "></a><a href='links-speichern.php?blubb=" + gameID + "'> Links abspeichern? </a><p>" + releaseDate + "</p><p>" + platform + "</p><p>" + deck +"</p>" + "<a href='" + site_detail + "'><p>Click here for more information</p></a>";
      });

      $("#result").html(html);

}

function showResultsgame(result) {

      var html = "";
	  var platform ="";
      var value = result.results;
        var gameName = value.name;
        var boxArt = value.image ? value.image.icon_url : '';
        var releaseDate = value.original_release_date;
		$.each(value.platforms, function(index, value) {
         platform += (value.name + " ");
		});
		var deck = value.deck;
		var description = value.description;
		var gameID = value.id;
		
        var site_detail = value.site_detail_url;
        html += "<a href='?gameid=" + gameID + "'><li><p>" + gameName + "</p></li>" + "<img src=" +boxArt + "></a>" + "<p>" + releaseDate + "</p><p>" + platform + "</p><p>" + deck +"</p><p>" + description +"</p>"  + "<a href='" + site_detail + "'><p>Click here for more information</p></a>";
      

      $("#result").html(html);

}

var getUrlParameter = function getUrlParameter(sParam) {
    var sPageURL = decodeURIComponent(window.location.search.substring(1)),
        sURLVariables = sPageURL.split('&'),
        sParameterName,
        i;

    for (i = 0; i < sURLVariables.length; i++) {
        sParameterName = sURLVariables[i].split('=');

        if (sParameterName[0] === sParam) {
            return sParameterName[1] === undefined ? true : sParameterName[1];
        }
    }
};

$(document).ready(function() {
function sendRequest(resource, filter2, data) {
    var baseURL = 'http://giantbomb.com/api';
    var apiKey = "969800c88a4d50d16ff61120543367584a42ce19";

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
	if(resource == "/game/"){
		var requestURL = baseURL + resource +  filter2 + "?api_key=" + apiKey + filters;
	} else {
		var requestURL = baseURL + resource + "?api_key=" + apiKey + filter2 + filters;
	}
	
	//Callback je nach RESOURCE
	if(resource == "/search" || "/games") {
		var resultcallback = "showResults";
	};
	if(resource == "/game/"){
		var resultcallback = "showResultsgame";
	};
	
    // the actual ajax request
    $.ajax({
        url: requestURL,
        type: 'GET',
		data: {
			format: "jsonp",
			//crossDomain: true,
			json_callback: resultcallback,
		},
		dataType: 'jsonp',
        
    }).done(function(data) {
        showResults(data.results);
        console.log(data);
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
	var filter = "";
  
    // Send the ajax request with to '/search' resource and with custom callbacks
    sendRequest('/search', filter, data);
}

function getPlatformGames(id) {
    var resource = '/games';
	var filter = '&platform=' + id;
    // Set the fields or filters 
    var data = {
        field_list: 'name,description,company,deck,image,id,original_release_date'
    };

    sendRequest(resource, filter, data);
}

function getGenres() {
    var id =  getUrlParameter('genre');
    var resource = '/genres';
	var filter = '&platform=' + id;
    // Set the fields or filters 
    var data = {
        field_list: 'name,description,company,deck,image,id,original_release_date'
    };
    sendRequest(resource, filter, data);
}

function getGame(gameID) {
    var resource = '/game/';

    // Set the fields or filters 
    var data = {
      //  field_list: 'name,description'
    };

    sendRequest(resource, gameID, data);
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

if(getUrlParameter('id')){
	var id = getUrlParameter('id');
	getPlatformGames(id);
}

if(getUrlParameter('idgame')){
	var gameID = getUrlParameter('idgame');
	getGame(gameID);
}

});