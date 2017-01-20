<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>[#title#]</title>
 	<!-- Bootstrap -->
    <link href="design/bootstrap/css/bootstrap.min.css" rel="stylesheet">
   	<link rel="stylesheet" href="design/css/style.css">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    <nav class="navbar navbar-default">
    <div class="container-fluid">
      <div class="navbar-header">
        <a class="navbar-brand" href="http://host20.vps10.r70.ru/">Вернуться к списку студентов</a>
      </div>
    </div>
  </nav>


    <div class="row">
    <?php echo form_open('Student_edit/student_edit', array('class' => 'form-horizontal')); ?>
      <div class="form-group">
        <label for="inputSecondName" class="col-md-offset-2 col-md-2 control-label">Фамилия:</label>
        <div class="col-md-4">
          <input type="text" class="form-control" id="inputSecondName" name="name" placeholder="Введите фамилию">
        </div>
      </div>

      <div class="form-group">
        <label for="inputFirstName" class="col-md-offset-2 col-md-2 control-label">Имя:</label>
        <div class="col-md-4">
          <input type="text" class="form-control" id="inputFirstName" name="second_name" placeholder="Введите имя">
        </div>
      </div>

      <div class="form-group">
        <label for="inputMiddleName" class="col-md-offset-2 col-md-2 control-label">Отчество:</label>
        <div class="col-md-4">
          <input type="text" class="form-control" id="inputMiddleName" name="middle_name" placeholder="Введите отчество">
        </div>
      </div>

      <div class="form-group">
        <label for="inputGroup" class="col-md-offset-2 col-md-2 control-label">Группа:</label>
        <div class="col-md-4">
          <select class="form-control" id="group_select" name="group_numb">
            <?=$option_list?>
          </select>
        </div>
      </div>

      <div class="form-group">
        <div class="col-md-offset-4 col-md-1">
          <form action="Student_edit.php" method="post">
             <input type="submit" class="btn btn-default" value="Сохранить">
          </form>
         
        </div>
        <div class="col-md-1">
          <input type="submit" class="btn btn-default" value="Удалить" onclick="curent_student_del();">
        </div>
      </div>
    </form>
    </div>

   


    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="design/bootstrap/js/bootstrap.min.js"></script>
    
  </body>
</html>