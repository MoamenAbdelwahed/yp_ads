<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Add Ad</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <style>
        .input-group{
            margin-top: 10px;
        }
        label{
            padding: 10px;
        }
    </style>
    </head>
<body>
   <div class="col-xs-12 col-sm-6 col-md-4">
        <div class="image-flip">
            <div class="mainflip">
                <div class="frontside">
                    <div class="card">
                        <div class="card-body text-center">
                            <form action="?c=admin&a=addForm" method="post" enctype="multipart/form-data">
                                <div class="input-group">
                                    <label for="image">Image:</label>
                                    <input style="width:125px;height:80px;" name="image" type="file" class="form-control" required>
                                </div>
                                <div class="input-group">
                                    <label for="image">Description:</label>
                                    <textarea name="description" class="form-control" required></textarea>
                                </div>
                                <button class="btn btn-primary" type="submit" style="margin-top: 10px;">Add</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>