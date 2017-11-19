var previousID = 0;

$(document).ready(function() {
	$('#btnSend').click( function() {
		sendChatText();
		$('#chatInput').val("");

	});
	
	startChat();
});