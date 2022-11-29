<?php 
	
 include("../PhpDocs/Conexion.php");

		include("../PhpDocs/PhpInclude.php");
		include "../layouts/header2.php"; 
		include "../Chat/config.php"; 
		
		$query="SELECT * FROM chat";
  
		$query = mysqli_query($conexion,$query);
?>
<style>
  h2{
color:white;
  }
  label{
color:white;
  }
  span{
	  color:#673AB7;
	  font-weight:bold;
  }
  .container {
    margin-top: 3%;
    width: 80%;
    background-color: #428347 ;
    padding-right:10%;
    padding-left:10%;
  }
  .btn-primary {
    background-color: #673AB7;
	}
	.display-chat{
		height:300px;
		background-color: #84b295;
		margin-bottom:4%;
		overflow:auto;
		padding:15px;
	}
	.message{
		background-color: #c616e469;
		color: white;
		border-radius: 5px;
		padding: 5px;
		margin-bottom: 3%;
	}
  </style>

<meta http-equiv="refresh" content="20">
<script>

      $(document).ready(function(){
        // Set trigger and container variables
        var trigger = $('.container .display-chat '),
            container = $('#content');
        
        // Fire on click
        trigger.on('click', function(){
          // Set $this for re-use. Set target from data attribute
          var $this = $(this),
            target = $this.data('target');       
          
          // Load target page into container
          container.load(target + '.php');
          
          // Stop normal link behavior
          return false;
        });
      });
    </script>


<div class="container">
  <center><h2>Negociación <span style="color:#dd7ff3;"><?php echo $_SESSION['user']; ?> !</span></h2>
	<label>Inicia tu negociación</label>
  </center></br>
   <div class="display-chat" id = "display-chat">
<?php
	if(mysqli_num_rows($query)>0)
	{
		while($row= mysqli_fetch_assoc($query))	
		{
?>
		<div class="Mensaje">
			<p>
				<span><?php echo $_SESSION['user']; ?> :</span>
				<?php echo $row['Mensaje']; ?>
			</p>
		</div>
<?php
		}
	}
	else
	{
?>
<div class="Mensaje">
			<p>
				No hay ninguna conversación previa.
			</p>
</div>
<?php
	} 
?>

  </div>


  
  <form class="form-horizontal" method="post" action="sendMessage.php">
    <div class="form-group">
      <div class="col-sm-10">          
        <textarea name="msg" class="form-control" placeholder="Ingresa tu mensaje acá..."></textarea>
      </div>
	         
      <div class="col-sm-2">
        <button type="submit" class="btn btn-primary" >Enviar</button>
      </div>

    </div>
  </form>
</div>
<?php
	
	
?>

</body>
</html>
