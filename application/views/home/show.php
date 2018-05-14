<html>
    <head>
        <title>Ad page</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        <style>
        .thumbnail {
            padding:0px;
        }
        .panel {
            position:relative;
        }
        .panel>.panel-heading:after,.panel>.panel-heading:before{
            position:absolute;
            top:11px;left:-16px;
            right:100%;
            width:0;
            height:0;
            display:block;
            content:" ";
            border-color:transparent;
            border-style:solid solid outset;
            pointer-events:none;
        }
        .panel>.panel-heading:after{
            border-width:7px;
            border-right-color:#f7f7f7;
            margin-top:1px;
            margin-left:2px;
        }
        </style>
        <script>
    window.fbAsyncInit = function() {
        FB.init({
        appId      : '968922666451363',
        cookie     : true,
        xfbml      : true,
        version    : 'v3.0'
        });
        
        FB.AppEvents.logPageView();   
        
    };

    (function(d, s, id){
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) {return;}
        js = d.createElement(s); js.id = id;
        js.src = "https://connect.facebook.net/en_US/sdk.js";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));

    function checkLoginState() {
        FB.getLoginStatus(function(response) {
            FB.api('/me', function(response) {
                document.getElementById('name').value = response['name'];
            });
        });
    }
    </script>
    </head>
    <body>
    <div class="row">
    <div class="col-sm-3"></div>
        <div class="col-sm-7">
            <div class="image-flip">
                <div class="mainflip">
                    <div class="frontside">
                        <div class="card">
                            <div class="card-body text-center">
                                <p><img style="width:125px;height:80px;" class=" img-fluid" src="<?php echo $ad['image']; ?>" alt="card image"></p>
                                <p class="card-text"><?php echo $ad['description']; ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <?php foreach($comments as $comment){ ?>
                <div class="panel panel-default" style="margin-bottom:15px;">
                    <div class="panel-heading">
                        <strong><?php echo $comment['name']; ?></strong> <span class="text-muted" style="float:right;">commented <?php echo $comment['created_at']; ?></span>
                    </div>
                    <div class="panel-body">
                        <?php echo $comment['comment']; ?>
                    </div><!-- /panel-body -->
                </div><!-- /panel panel-default -->
            <?php } ?>
            <div class="panel panel-default" style="margin-bottom:15px;">
                    <form action="?a=Comment&id=<?php echo $ad['id']; ?>" method="post">
                        <div class="panel-heading">
                            
                        <fb:login-button 
                        scope="public_profile,email"
                        onlogin="checkLoginState();">
                        </fb:login-button>

                        </div>
                        <div class="panel-body">
                        <input type="hidden" name="name" id="name">
                        <div class="input-group">
                        <textarea name="comment" id="comment"></textarea>
                        </div>    
                        <button class="btn btn-primary" type="submit">Comment</button>
                    </form>
                        </div><!-- /panel-body -->
                </div><!-- /panel panel-default -->

        </div>
        
    </div>
    </body>
</html>