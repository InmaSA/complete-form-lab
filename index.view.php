<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="index.css"> 
  <title>Document</title>
</head>
<body>
  <div class="container box">
    <div class="row justify-content-center">
      <form class="col-md-6" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?> "method="POST" >
      <!-- <form class="col-md-6" action="" method="POST"> -->
        <div class="form-group ">
          <input type="text" class="form-control" name="name" id="name" placeholder="Enter name"
          value="<?php if(!$sent && isset($name)) echo $name ?>">
        </div>
        <div class="form-group">
          <input type="text" class="form-control" name="email" id="email" placeholder="Enter email"
          value="<?php if(!$sent && isset($email)) echo $email ?>">
        </div>
        <div class="form-group">
          <textarea class="form-control" name="message" id="message" placeholder="Message"
          value="<?php if(!$sent && isset($message)) echo $message ?>"></textarea>
        </div>
         <?php if(!empty($e)) : ?>
            <div class="alert-error">
              <?php echo $e; ?>
            </div> 
         <?php elseif($sent) : ?>   
            <div class="alert-succes">
              <p>Enviado correctamente</p>
            </div> 
         <?php endif ?>   
        <button name="submit" type="submit" class="btn btn-primary">Submit</button>
      </form>
    </div>
  </div>

</body>
</html>