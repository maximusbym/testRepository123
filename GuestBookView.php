
<div id="messages">


</div>


<form id="guestForm" action="/GuestBook.php" method="POST">

	<input type="text" id="name" name="name" placeholder="Name"> <br/>
	<input type="text" id="email" name="email" placeholder="Email"> <br/>
	<input type="text" id="message" name="message" placeholder="Message"> <br/>

	<button type="submit">SEND</button>

</form>


<script
  src="https://code.jquery.com/jquery-3.1.1.min.js"
  integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8="
  crossorigin="anonymous"></script>

<script>
	$(document).ready( function(e) {	// Загрузка документа
		
		$('#guestForm').submit( function(e) {
			e.preventDefault();
			
			$.ajax({
				method: "POST",
				url: "/GuestBook.php",
				data: { 
					name: $('#name').val(), 
					email: $('#email').val(),
					message:  $('#message').val()
				}
			}).done( function( data ) {

				var res = JSON.parse( data );
				
				if( res.message ) {
					
					el = document.createElement('div');
					$(el).html( res.meesage.name + '<br/>' + 
								res.meesage.email + '<br/>' + 
								res.message.time + '<br/>' + 
								res.meesage.message + '<br/><br/><hr/>' );
					console.log(el);
					$('#messages').prepend(el);
				}				
			});
		});
	});
</script>