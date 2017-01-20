<html>   
    <head>   
        <title><?=$page_title?></title>   
    </head>   
    <body>   
        <?php foreach($content as $c):?>   
        <h3><?=$c->fc_title?></h3>   
        <p><?=$c->ft_text?></p>   
        <br />   
        <?php endforeach;?>   
    </body>   
</html>