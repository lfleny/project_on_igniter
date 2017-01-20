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
		      <a class="navbar-brand" href="http://host20.vps10.r70.ru/group">Список групп</a>
		    </div>
		    <ul class="nav navbar-nav">
		      <li><a href="http://host20.vps10.r70.ru">Студенты</a></li>
		      <li class="active"><a href="http://host20.vps10.r70.ru/group">Группы</a></li>
		    </ul>
		  </div>
		</nav>

		<div class="col-md-12" id="page_list"></div>
		<div class="col-md-12" id="page_list"><a href="/group_edit">+ Добавить группу</a></div>
		<div class="col-md-12"><?=$pag?></div>

		
		
		<?=$table?>



    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="design/bootstrap/js/bootstrap.min.js"></script>
    
  </body>
</html>