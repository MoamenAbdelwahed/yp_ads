<html>
    <head>
        <title>Home Page</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    </head>
    <body>
    <div class="container">
        <div class="row">
            <?php foreach($ads as $ad){ ?>
                <div class="col-xs-12 col-sm-6 col-md-4">
                    <div class="image-flip">
                        <div class="mainflip">
                            <div class="frontside">
                                <a href="index.php?c=admin&a=show&id=<?php echo $ad['id'];?>">
                                <div class="card">
                                    <div class="card-body text-center">
                                        <p><img style="width:125px;height:80px;" class=" img-fluid" src="<?php echo $ad['image']; ?>" alt="card image"></p>
                                        <p class="card-text"><?php echo $ad['description']; ?></p>
                                    </div>
                                </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
    </body>
</html>