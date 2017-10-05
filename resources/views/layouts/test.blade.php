<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="/css/app.css">
  <title>Document</title>
</head>
<body class="container">
  <div class="row">
    <div class="col-md-offset-2 col-md-8">
      <div class="panel panel-default">
        <div class="panel-body">
          <form action="">
            <div class="form-group">
              <label for="user" >user:</label>
              <div class="input-group"><span class="input-group-addon">@</span><input type="text" class="form-control" id="user"></div>
            </div>
            <div class="form-group">
              <label for="pw">pw:</label>
              <div class="input-group"><span class="input-group-addon">abc</span><input type="text" class="form-control" id="pw" data-toggle="popover" data-placement="top" title="pw title"  data-container="body"></div>
            </div>
            <div class="btn-group">
              <button class="btn btin-default">action</button>
              <button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                <span class="caret"></span>
              </button>
              <ul class="dropdown-menu" >
                <li><a href="#">Action</a></li>
                <li><a href="#">Another action</a></li>
                <li><a href="#">Something else here</a></li>
                <li role="separator" class="divider"></li>
                <li><a href="#">Separated link</a></li>
              </ul>
            </div>
            <button type="button" class="btn btn-default" aria-label="Left Align">
              <span class="glyphicon glyphicon-align-left" aria-hidden="true"></span>
            </button>
            <div class="btn-group">
              <button type="button" class="btn btn-default">Left</button>
              <button type="button" class="btn btn-default">Middle</button>
              <button type="button" class="btn btn-default">Right</button>
              </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  <script src="/js/app.js">
  </script>
  <script type="text/javascript">

    $(function(){
      debugger;
      $('[data-toggle="popover"]').popover()
    })
  </script>
</body>
</html>
