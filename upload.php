<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Upload Document</title>
        <link rel="stylesheet" type="text/css" href="style/reset.css"> 
        <link rel="stylesheet" type="text/css" href="style/jquery-ui.css"> 
        <link rel="stylesheet" type="text/css" href="style/mystyle.css"> 
    </head>
    <body>
 
        <h1>Upload New Document</h1> <Button><a href="memberpage.php">Back to Home Page</a></Button> 
      <form action="insert_product.php" method="POST" enctype="multipart/form-data">
             
            <input type="text" id="filename" name="filename"  class="rinput" placeholder="File Name" required/> <br/>
             <input type="text" id="expdate" name ="expdate" class="rinput dateinput" name="expdate" placeholder="Exp Date: 2014-12-31"/> <br/>
   
             <textarea class="rinput comment"  id="comment" name="comment" placeholder="Comment"></textarea> <br/>
             <input type="file"  id="uploadfile" name="uploadfile" class="uploadfile"/><br/><br/>
             <input type="submit" id="submit" name="submit"  value="Upload"/>
        </form> 
        
        
        <!--Javascript--> 
          <script type="text/javascript" src="script/jquery2.1.1.js" ></script> 
        <script type="text/javascript" src="DataTables/media/js/jquery.dataTables.js"></script>
        <script type="text/javascript" src="script/jquery-ui.js"></script>
         <script type="text/javascript" src="script/main.js"></script>
    </body>
</html>