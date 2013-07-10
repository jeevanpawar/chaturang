<html>
  <head>
    <script language="javascript" type="text/javascript" src="js/jquery.js"></script>
  </head>
  <body>

  <h2> Client example </h2>

  <select>
  <option id="output"></option>
  </select>

  <script id="source" language="javascript" type="text/javascript">
  $(function () 
  {

    $.ajax({                                      
      url: 'api.php',                  //the script to call to get data          
      data: "",                        //you can insert url argumnets here to pass to api.php for example "id=5&parent=6"
      dataType: 'json',                //data format      
      success: function(data)          //on recieve of reply
      {
        //get id
        var vname = data[2];           //get name
        $('#output').html("<b></b>"+vname);     //Set output element html
        //recommend reading up on jquery selectors they are awesome http://api.jquery.com/category/selectors/
      } 
    });
  
  }); 
  </script>
   
  </body>
</html>  
