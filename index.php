<?php
    
    $weatherInfo = "";
    $displayError = "";
    if(isset($_GET['city'])){
        
        $weatherAPI = file_get_contents("http://api.openweathermap.org/data/2.5/weather?q=".urlencode($_GET['city'])."us&appid=726edf0a6e56113447b24d04facf7019");
        
        $json_data = json_decode($weatherAPI, true);
        
        if($json_data['cod'] == 200){
            $weatherInfo = "The weather in " . $_GET['city'] . " is currently '" . $json_data['weather'][0]['description'] . "'.";
        }
        else{
            $displayError = "Could not find city - please try again later.";
        }
        
    }


?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
        <!-- Stylesheet -->
        <style type="text/css">
            html {
                background: url(images/background.jpg) no-repeat center center fixed;
                -webkit-background-size: cover;
                -moz-background-size: cover;
                -o-background-size: cover;
                background-size: cover;
            }
            
            body {
                background: none;
            }
            
            .container {
                text-align: center;
                margin-top: 200px;
                width: 500px;
            }
            
            input {
                margin: 20px 0;
            }
            
            #weatherInfo {
                margin-top: 20px;
            }
        </style>
    </head>

    <body>
        <div class="container">
            <h1>What's the weather?</h1>
            <form>
                <div class="form-group">
                    <label for="city">Enter your City Name</label>
                    <input type="text" class="form-control" name="city" id="city" placeholder="Eg. Rochester" value="<?php if(isset($_GET['city'])){
                        echo $_GET['city']; } else{
                        echo " ";
                    } ?>"> </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
            <div id="weatherInfo">
                <?php 
              
              if ($weatherInfo) {
                  echo '<div class="alert alert-success" role="alert">'.$weatherInfo.'</div>';    
              } else if ($displayError) {   
                  echo '<div class="alert alert-danger" role="alert">'.$displayError.'</div>';   
              }
              ?></div>
        </div>
        <!-- jQuery first, then Tether, then Bootstrap JS. -->
        <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
    </body>

    </html>