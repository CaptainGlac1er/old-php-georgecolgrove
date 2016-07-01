<!DOCTYPE html>
<html>
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
<script type="text/javascript" language="javascript">
function getPrice(){
	var ticker = $('#ticker').val();
	var data;
	$.getJSON("http://query.yahooapis.com/v1/public/yql?q=select%20*%20from%20yahoo.finance.quotes%20where%20symbol%20in%20(%22" + ticker + "%22)%0A%09%09&env=http%3A%2F%2Fdatatables.org%2Falltables.env&format=json", function(data){breakdown(data);});

}
function breakdown(data){
	console.log(data);
	$('#output').text(data.query.results.quote.LastTradePriceOnly);
}
</script>
</head>
<body>
<input type="text" id="ticker"></input>
<button onclick="getPrice()">Get Stock Price</button>
<label id="output"></label>
</body>
</html>
