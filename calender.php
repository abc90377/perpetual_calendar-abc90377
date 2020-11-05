<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
<style>
body{
background: RGBA(252,248,248,.6);
}
</style>
</head>
<body class=" mx-auto my-0">

    <?php
    //當月月份
    
    if (isset($_GET["month"])&&  $_GET["month"]<=13 && $_GET["month"]>=0) {//使用is_not_empty會造成month=0判為empty
        
        if ($_GET["month"]==13) {
            
            $month=1;
            
            
        }elseif ($_GET["month"]==0) {
            
            $month=12;
            
            
        }else {
            $month=$_GET["month"];
            
            
        }
        
    }else {
        $month=date('m',strtotime("now"));
        
    };
   
    if (!empty($_GET["year"])) {

            $year=$_GET["year"];
  
    }else {
        $year=date('Y',strtotime("now"));
        
    };
   
    
    echo "<div class='container'>";
    echo "<div class='m-4'>";
    echo "<div class='text-center'>".$year."年"."</div>";
    echo "<div class='text-center' style='font-size:42px;'>".$month."月"."</div>";
    echo"</div>";
    $day=date('t',strtotime("$year-$month"));//當月天數
    $startW=date('w',strtotime("$year-$month-01"));//當月從星期幾開始
    echo "<div class='d-flex flex-row w-100 ' style='height:350px;' >";//物件外框
    echo "<div class='d-flex bg-dark col-3'>";
    //圖案 對話框 回當日時間
    echo 123;
    echo "</div>";
    //下為表格圖片
    echo "<div class='col-2 d-flex h-100 px-0 shadow' style='overflow:hidden'><img src="."'https://picsum.photos/500/600/?random=1'"."></div>";
    //下為表格
    echo "<div class='col-5 d-flex p-0 shadow-sm'><table class='table table-light h-100 table-bordered'style='text-align:center;'>";
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
            echo "<td>";
            if ($i==0 && $j<$startW || (($i*7+$j)-($startW-1))>$day) {
                echo "&nbsp";
            }
            else {
                echo ($i*7+$j)-($startW-1);
            }
            echo "</td>";
        }
        echo "</tr>";
    }
    

    echo "</table></div>";
    echo "<div class='d-flex col-2 align-items-center justify-content-center'>";//選擇要去的年月 -->
    ?>
   
    <form action="calender.php" method="GET" >
    <div class="form-row">
    <div class="form-group col-md-10">
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
    <div class="form-group col-md-10" >
      <label for="year">Year</label>
      <input type="text" class="form-control" name="year" id="year" value="<?=$year?>">
    </div>
     </div>
     <button type="submit" class="btn btn-primary">Go!</button>
    </form>
    <?php
    echo"</div>";
    echo  "</div>";
    ?>


    </div >
    
    


    <?php
    if ($month==12) {
        
        echo '<a href="calender.php?month='.($month-1)."&&year=".($year).'"'.">上個月</a>";
        echo '<a href="calender.php?month='.($month+1)."&&year=".($year+1).'"'.">下個月</a>";
    }elseif ($month==1) {
        echo '<a href="calender.php?month='.($month-1)."&&year=".($year-1).'"'.">上個月</a>";
        echo '<a href="calender.php?month='.($month+1)."&&year=".($year).'"'.">下個月</a>";
    }else {
        echo '<a href="calender.php?month='.($month-1)."&&year=".($year).'"'.">上個月</a>";
        echo '<a href="calender.php?month='.($month+1)."&&year=".($year).'"'.">下個月</a>";
        
    }
    
    
    ?>
 


    <a href="calender.php">返回現在時間</a>

</body>
</html>