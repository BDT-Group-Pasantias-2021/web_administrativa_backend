const fetch = require("node-fetch");

/* function httpGetAsync(theUrl, callback)
{
    var xmlHttp = new XMLHttpRequest();
    xmlHttp.onreadystatechange = function() { 
        if (xmlHttp.readyState == 4 && xmlHttp.status == 200)
            callback(xmlHttp.responseText);
    }
    xmlHttp.open("GET", theUrl, true); // true for asynchronous 
    xmlHttp.send(null);
} */
let url = "http://192.168.43.249/web_administrativa_backend/release/v1.0.0/?action=searchNotification&title=s";
fetch(url)
	.then((response) => response.text())
	.then((data) => console.log(data))
	.catch((error) => console.log(error));
