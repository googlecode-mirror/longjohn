function create_request_object() {
    var ro;
    var browser = navigator.appName;
    if(browser == "Microsoft Internet Explorer"){
        ro = new ActiveXObject("Microsoft.XMLHTTP");
    }else{
        ro = new XMLHttpRequest();
    }
    return ro;
}

function send_request(page, args, func) {
	// Create query string.
	var output_array = [];
	for (var key in args) {
		output_array.push(key + "=" + escape(args[key]));
	}
	query_string = output_array.join("&");

	var req = create_request_object();
	// Create request string.
	page = page + ".php";
    //alert(page);

	if (query_string) {
		page += "?" + query_string;
	}

    //alert(page);

	req.open("get", page, false);
	req.send(null);
	response = req.responseText;
	req.abort();

	if (func == undefined) func = refresh_page;

	return func(response);
}

function send_request2(method, page, args, async, func) {
	// Create query string.
	var output_array = [];
	for (var key in args) {
		output_array.push(key + "=" + escape(args[key]));
	}
	query_string = output_array.join("&");

	var req = create_request_object();
	// Create request string.
	page = page;

	if (method == 'GET') {
		page += "?" + query_string;
	}

	req.open(method, page, async);
	if (method == 'GET') {
	   req.send(null);
	} else {
	    req.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
	    req.setRequestHeader('Content-Length',query_string.length);
	    req.send(query_string);
	}
	response = req.responseText;
	alert(req.status);
	alert(response);
	req.abort();

	if (func == undefined) func = refresh_page;

	return func(response);
}


function response_debug() {
    alert(response);
}

function text_replace(response) {
    var pos = response.indexOf("|");

    if(pos > -1) {
		var div_name = response.substr(0, pos);
		var contents = response.substr(pos + 1);
        document.getElementById(div_name).innerHTML = contents;
    } else {
    	alert("ERROR:\n\n" + response);
    }
}

function no_response(response) { }

function rc(response) {
    return(response);
}