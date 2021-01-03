<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP萬年曆</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
<link href="https://fonts.googleapis.com/css2?family=Share+Tech+Mono&display=swap" rel="stylesheet">
<script src="https://kit.fontawesome.com/90885657e1.js" crossorigin="anonymous"></script>

<style>
body{
background: RGBA(252,248,248,.6);
font-family: 'Share Tech Mono', monospace;
}
.t{
    position:absolute;
    top:35px;
    left:50px;
    font-size:8px;
    width:90px;
    height:100px;

}
.h a{
    color: hotpink;
}
a {
    color: black;
}
a:hover {
  color: hotpink;
}
.today{
    color: hotpink;
}
</style>
</head>
<body class=" mx-auto my-0">

    <?php
    //當月月份
    
    if (isset($_GET["month"])&&  $_GET["month"]<=12 && $_GET["month"]>=0) {//使用is_not_empty會造成month=0判為empty
        
        if ($_GET["month"]==1) {
            
            $month=1;
            
            
        }elseif ($_GET["month"]==12) {
            
            $month=12;
            
            
        }else {
            $month=$_GET["month"];
            
            
        }
        
    }else {
        $month=date('n',strtotime("now"));
    };
   
    if (!empty($_GET["year"])) {

            $year=$_GET["year"];
  
    }else {
        $year=date('Y',strtotime("now"));
        
    };
   
    
    echo "<div class='container'>";
    echo "<div class='d-lg-flex flex-wrap m-5 h' >";
    echo "<div class='text-center d-flex col-12 justify-content-center'>".$year."</div>";
    echo '<br>';
    if ($month==12) {
        
        echo '<div class=" d-lg-flex d-none col-lg-5 justify-content-center align-items-center" style="font-size:30px;"><a href="index.php?month='.($month-1)."&&year=".($year).'"'."><i class='fas fa-angle-left'></i></a></div>";
        echo "<div class=' d-flex col-lg-2  justify-content-center align-items-center' style='font-size:42px;'>".date('F',strtotime("$year-$month"))."</div>";
        echo '<div class=" d-lg-flex  d-none col-lg-5  justify-content-center align-items-center" style="font-size:30px;"><a href="index.php?month=1'."&&year=".($year+1).'"'."><i class='fas fa-angle-right'></i></a></div>";
    }elseif ($month==1) {
        echo '<div class=" d-lg-flex  d-none col-lg-5  justify-content-center align-items-center" style="font-size:30px;"><a href="index.php?month=12'."&&year=".($year-1).'"'."><i class='fas fa-angle-left'></i></a></div>";
        echo "<div class=' d-flex col-lg-2  justify-content-center align-items-center' style='font-size:42px;'>".date('F',strtotime("$year-$month"))."</div>";
        echo '<div class=" d-lg-flex  d-none col-lg-5  justify-content-center align-items-center" style="font-size:30px;"><a href="index.php?month='.($month+1)."&&year=".($year).'"'."><i class='fas fa-angle-right'></i></a></div>";
    }else {
        echo '<div class=" d-lg-flex  d-none col-lg-5  justify-content-center align-items-center" style="font-size:30px;"><a href="index.php?month='.($month-1)."&&year=".($year).'"'."><i class='fas fa-angle-left'></i></a></div>";
        echo "<div class=' d-flex col-lg-2  justify-content-center align-items-center' style='font-size:42px;'>".date('F',strtotime("$year-$month"))."</div>";
        echo '<div class=" d-lg-flex  d-none col-lg-5  justify-content-center align-items-center" style="font-size:30px;"><a href="index.php?month='.($month+1)."&&year=".($year).'"'."><i class='fas fa-angle-right'></i></a></div>";
        
    }
    
    
    
    
    
    echo"</div>";
    $day=date('t',strtotime("$year-$month"));//當月天數
    $startW=date('w',strtotime("$year-$month-01"));//當月從星期幾開始
    echo "<div class='d-flex flex-row w-100 ' style='height:350px;' >";//物件外框
    echo "<div class='d-lg-flex  flex-column  col-lg-2 d-none'>";
    //圖案 對話框 回當日時間
    echo '<a href="index.php"><div class="position-relative"><img src="image/textbox1.png"></div>';
    echo '<div ><img src="image/ghosticon1.png"></div>';
    $today=date('m/d');
    $thisMonth=date('m');
    $thisYear=date('Y');
    if ($year>$thisYear || ($year==$thisYear&&$month>$thisMonth)) {
        echo '<div class="t  ">Maybe future will be a better place . Click me to return .</div>';
    }elseif ($thisYear>$year || ($year==$thisYear&&$month<$thisMonth)) {
        echo '<div class="t  ">Whatever you lost in past can never be found .Click me to return.</div>';
    }else  {
        echo '<div class="t  "  >Today is ' .$today. '. You can go when ever you want.</div>';
    }

    echo "</div></a>";
    //下為表格圖片
    echo "<div class='col-lg-2 col-12 d-lg-flex d-none h-100 px-0 shadow' style='overflow:hidden'>";
    echo "<img src='image/";
    echo $month;
    echo ".png'></div>";
    //下為表格
    echo "<div class='col-lg-6 col-12 d-flex p-0 shadow-sm text-center'><table class='table table-light h-100 table-bordered'style='text-align:center;'>";
    echo"<thead>";
    echo"<tr>
    
    <td>日</td>
    <td>一</td>
    <td>二</td>
    <td>三</td>
    <td>四</td>
    <td>五</td>
    <td>六</td>
    </tr>";
    
    echo"</thead>";
    for ($i=0; $i < 6; $i++) { 
        echo "<tr>";
        for($j=0;$j < 7;$j++) {
            
            if ($i==0 && $j<$startW || (($i*7+$j)-($startW-1))>$day) {
                echo "<td>";
                echo "&nbsp";
                echo "</td>";
            }
            else {
                if ((($i*7+$j)-($startW-1)== date('j'))&& $year==date('Y') && $month==date('m')) {
                    echo "<td class='today'>";
                    echo ($i*7+$j)-($startW-1);
                    echo "</td>";
                }else {
                    echo "<td>";
                    echo ($i*7+$j)-($startW-1);
                    echo "</td>";
                }
                
            }
            
        }
        echo "</tr>";
    }
    

    echo "</table></div>";
    echo "<div class='d-lg-flex d-none col-lg-2 align-items-center '>";//選擇要去的年月 -->
    ?>
   
    <form action="index.php" method="GET" >
    <div class="form-row">
    <div class="form-group col-md-12">
      <label for="inputmonth">Month</label>
      <select id="inputmonth" name="month" class="form-control">
        <option selected> <?=$month?></option>
        <?php
        for ($i=1; $i <=12; $i++) { 
            echo "<option>";
            echo $i;
            echo"</option>";
        }
        ?> 
      </select>
    </div>
    <div class="form-group col-12" >
      <label for="year">Year</label>
      <input type="text" class="form-control" name="year" id="year" value="<?=$year?>">
    </div>
     </div>
     <div class="text-center">
     <button type="submit" class="btn" style="background-color:hotpink">Go!</button>
     </div>
    </form>
    <?php
    echo"</div>";
    echo  "</div>";
    ?>


    </div >
    
    

</body>
</html>