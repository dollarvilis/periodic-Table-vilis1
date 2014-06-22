<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta http-equiv="X-UA-Compatible" content="ID=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>vilis</title>
	<link rel="stylesheet" href="themes/vi1.min.css" />
	<link rel="stylesheet" href="themes/jquery.mobile.icons.min.css" />
	<link rel="stylesheet" href="http://code.jquery.com/mobile/1.4.2/jquery.mobile.structure-1.4.2.min.css" />
	<script src="http://code.jquery.com/jquery-1.10.2.min.js"></script>
	<script src="http://code.jquery.com/mobile/1.4.2/jquery.mobile-1.4.2.min.js"></script>
</head>


<body>

<div data-role="page" id="one">
    <div data-role="header" data-position="fixed">
        <a href="#" data-icon="arrow-l" data-iconpos="left" data-rel="back" data-transition="slide" data-direction="reverse" >Back</a>
            <h1>สารเคมี และสารประกอบ</h1>
            <div data-role="navbar">
    <ul>
        <li><a href="#one" class="ui-btn-active">ตารางธาตุ</a></li>
        <li><a href="#bar">เลือกดู</a></li>
        <li><a href="#bob">สารประกอบ</a></li>
    </ul>
          
                
</div><!-- /navbar -->
    </div><!-- /header -->

  
    <?php

   class MyDB extends SQLite3
   {
      function __construct()
      {
         $this->open('db_elemental.sqlite');	
      }
   }
   $db = new MyDB();
   if(!$db){
      echo $db->lastErrorMsg(); 
   }
   $sql =<<<EOF
      SELECT * from tb_element;
EOF;
   
   $ret = $db->query($sql);
 
$count = $db->querySingle("SELECT COUNT(*) as count FROM tb_element");
?> <button class="ui-btn ui-btn-inline ui-icon-refresh ui-btn-icon-left"> <?php echo "ทั้งหมด ".$count." รายการ";?></button><?php
?>    
    <?php 
         while($row = $ret->fetchArray(SQLITE3_ASSOC) ){
    ?>
<ul data-role="listview" data-inset="true">
<h3 align="right">
    <?php
         echo "<li>" ."เลขที่อะตอม : ". $row['atomic_number'] . "</li>";
    ?>  
</h3>
<li>
    <?php    
     echo "<h1>" ."ชื่อไทย : ". $row['name'] ."</h1>";
     echo "<h4>" . "ชื่ออังกฤษหรือละติน :  ".$row['detail'] ."</h4>";
     echo "<h4>" . "สัญลักษณ์ธาตุ :  ".$row['elemental'] ."</h4>";
     echo "<h4>" . "หมู่ :  ".$row['group'] ."</h4>";
     echo "<h4>" . "น้ำหนักอะตอม :  ".$row['atomic_weight'] ."</h4>";
    ?>
</li> 
    <?php
        }  
    ?>
</ul>
    <?php
    $count = $db->querySingle("SELECT COUNT(*) as count FROM tb_element");
    echo "จำนวนทั้งหมด ".$count." รายการ";
    ?>

<div data-role="footer" data-position="fixed">
     <h1> Vilis®  2014</h1>
        
</div>

</div><!-- /page -->

<!-- 2222222222222222222222222222222222222 -->
<div data-role="page" id="bar">
    <div data-role="header">
        <a href="#" data-icon="arrow-l" data-iconpos="left" data-rel="back" data-transition="slide" data-direction="reverse">Back</a>
            <h1>สารเคมี และสารประกอบ</h1>
            <div data-role="navbar">
    <ul>
        <li><a href="#one">ตารางธาตุ</a></li>
        <li><a href="#bar" class="ui-btn-active" >เลือกดู</a></li>
        <li><a href="#bob">สารประกอบ</a></li>
    </ul>         
                
</div><!-- /navbar -->
    </div><!-- /header -->
    
	<div role="main" class="ui-content">
		<ul data-role="listview" data-inset="true" data-filter="true" data-filter-reveal="true" data-filter-placeholder="ค้นหาธาตุเคมี">
                    
    <?php
    $sql =<<<EOF
      SELECT * from tb_element;
EOF;
		
   $ret = $db->query($sql);
            while($row = $ret->fetchArray(SQLITE3_ASSOC) ){?>
         <li style="white-space: pre-wrap;"><?php echo "<br/>" .$row['atomic_number'] . "\n";?><?php echo $row['detail'] ."\n";echo $row['name'] ."\n";echo $row['elemental'] ."\n";echo $row['group'] ."\n";echo $row['atomic_weight'] ."\n";?></li>
         <?php
         }  
       
         ?> 
</ul>
            
	</div><!-- /content -->
  
<div data-role="footer" data-position="fixed">
     <h1> Vilis®  2014</h1>
        
</div>
</div><!-- /page -->

<!-- 33333333333333333333333333333 -->
<div data-role="page" id="bob">
    <div data-role="header">
        <a href="#" data-icon="arrow-l" data-iconpos="left" data-rel="back" data-transition="slide" data-direction="reverse">Back</a>
            <h1>สารเคมี และสารประกอบ</h1>
            <div data-role="navbar">
    <ul>
        <li><a href="#one">ตารางธาตุ</a></li>
        <li><a href="#bar"  >เลือกดู</a></li>
        <li class="ui-btn-active"><a href="#bob" class="ui-btn-active">สารประกอบ</a></li>
    </ul>         
                
</div><!-- /navbar -->
    </div><!-- /header -->
    
	
  
<div data-role="footer" data-position="fixed">
     <h1> Vilis®  2014</h1>
        
</div>
</div><!-- /page -->

<?php 
$db->close();
?>
</body>
</html>
