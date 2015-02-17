	<script>
	function showUser() {

	  var fname= document.getElementById("fname").value;
      var email= document.getElementById("email").value;

	  if (window.XMLHttpRequest)
	  {
	    // code for IE7+, Firefox, Chrome, Opera, Safari
	    xmlhttp=new XMLHttpRequest();
	  }
	  else { // code for IE6, IE5
	    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	  }
	  xmlhttp.onreadystatechange=function() {
	    if (xmlhttp.readyState==4 && xmlhttp.status==200) {
	    	if(xmlhttp.responseText.indexOf('rror',0) > 0)
	    	{
	      
	      document.getElementById("message").style.color="red";
	      //document.getElementById("message").innerHTML=xmlhttp.responseText;
	      
	      }
	      else
	      {
	        document.getElementById("message").style.color="green";
	      //document.getElementById("message").innerHTML=xmlhttp.responseText;	 
	     
	      }
	       document.getElementById("message").innerHTML=xmlhttp.responseText;

	    }
	  }
	  xmlhttp.open("POST","getuser.php",true);
	  xmlhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
	  xmlhttp.send("fname="+fname+"&email="+email);
	  $('modal-submit').prop('disabled', true);
	  		   
	}

	function flushData()
	{
		 document.getElementById("message").innerHTML="";
		 document.getElementById("fname").value="";
		 document.getElementById("email").value="";
	}
	</script>
    	<!-- Modal -->
		<div class="modal" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		  <div class="modal-dialog">
		    <div class="modal-content">
		      <div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
		        <h4 class="modal-title" id="myModalLabel">Subscribe</h4>
		      </div>
		      <div class="modal-body">
		        <span id="message"></span>
		    <!-- Text input-->
			<div class="form-group">
			  <label class=" control-label" for="textinput"></label>  
			  <div class="">
			  <input id="fname" name="fname" type="text" placeholder="Full Name" class="form-control input-md">
			  </div>
			</div>

			<!-- Text input-->
			<div class="form-group">
			  <label class=" control-label" for="textinput"></label>  
			  <div class="">
			  <input id="email" name="email" type="email" placeholder="E-Mail" class="form-control input-md">
			  </div>
			</div>

		      </div>
		      <div class="modal-footer">
		     	<button type="button" class="btn btn-primary" name="modal-submit" id="m-submit" onclick= "showUser()">Submit</button>
		        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
		      </div>
		    </div>
		  </div>
		</div>


	<footer id="social"> 
		<div class="container">
			<div class="col-md-4">
				<h2 class="h2">
				Newsletter
				</h2>
				<p>
				Keep up on our always evolving product features and technology. Enter your e-mail and subscribe to our newsletter.
				</p>

				<button class="btn btn-default" data-toggle="modal" data-target="#myModal" onclick= "flushData()">Subscribe</button>
			</div>

		<div class="col-md-4">
			<h2 class="h2">
			Get in touch
			</h2>
			<p><span class="glyphicon glyphicon-map-marker"></span><b>
			 Address:</b> <br> Gomti Nagar.
			Lucknow 226010
			Uttar Pradesh
			</p>
			<p><span class=" glyphicon glyphicon-earphone"></span><b> Phone:</b> +91-9546865771</p>
			<p><span class="glyphicon glyphicon-envelope"></span><b> E-Mail: </b>info@Codistan.in</p>
		</div>

		<div class="col-md-4">
			<h2 class="h2">
			Follow Us</h2>
				  <ul>
				    <li class="facebook" data-network="facebook"><a href="#">Facebook</a></li>
				    <li class="twitter" data-network="twitter"><a href="#">Twitter</a></li>
				    <li class="google" data-network="google"><a href="#">Github</a></li>
				    <li class="youtube" data-network="youtube"><a href="#">Github</a></li>
				  </ul>
		</div>
  	  	</div>
	 
	 	<div class="container">
	 	<span>Copyright &copy 2014 Codistan. All rights reserved. </span>	
  		</div>
	</footer>
	