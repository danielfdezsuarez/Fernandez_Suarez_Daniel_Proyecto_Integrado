<!-- sin conexion bd
-->

<?php
      $connection = new mysqli("localhost", "root", "123456", "camisetas");
      $connection->set_charset("utf8");
      
      if ($connection->connect_errno) {
          printf("Connection failed: %s\n", $connection->connect_error);
          exit();
      }


     
?>


<?php if (!isset($_POST["tema"])) : ?>
      
        <form action="tema_admin.php" method="post" enctype="multipart/form-data">
          <fieldset>
            <div class="tema">
              Elegir tema:
              <input type="radio" name="tema" value="tema0"> Prederminado
              <input type="radio" name="tema" value="tema1"> nocturno
              <input type="radio" name="tema" value="tema2"> Verde
              <a href="tema_user.php"><input type="submit" value="ok"></a>
            </div>
	      </fieldset>
        </form><br>

<?php else: ?>

<?php endif ?>