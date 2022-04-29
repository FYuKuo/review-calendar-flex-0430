<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>課後複習-0429</title>
    <style>
        * {
            box-sizing: border-box;

        }
        .table {
            display: flex;
            flex-wrap: wrap;
            width: 560px;
            height: 560px;
            align-content: flex-start;
            
        }
        .table>div {
            width: 80px;
            height: 80px;
            border: 1px solid lightblue;
            box-sizing: border-box;

        }
    </style>
</head>
<body>
    <h2>利用Flex模式+陣列製作月曆</h2>
    <?php
    $month=4; //月份
    $firstDay=date("Y-") . $month . "-1"; //月份的第一天日期
    $firstDaySecond=strtotime($firstDay); //月份的第一天秒數
    $firstDayWeek=date("w",$firstDaySecond); //月份的第一天星期幾
    $monthDay=date("t",$firstDaySecond); //月份有幾天
    $lastDay=date("Y-") . $month . "-" . $monthDay; //月份最後一天日期
    $lastDaySecond=strtotime($lastDay); //月份最後一天秒數
    $lastDayWeek=date("w",$lastDaySecond); //月份最後一天星期幾

    echo "月份 ==> $month <br>";
    echo "月份的第一天日期 ==> $firstDay <br>";
    echo "月份的第一天秒數 ==> $firstDaySecond <br>";
    echo "月份的第一天星期幾 ==> $firstDayWeek <br>";
    echo "月份有幾天 ==> $monthDay <br>";
    echo "月份最後一天日期 ==> $lastDay <br>";
    echo "月份最後一天秒數 ==> $lastDaySecond <br>";
    echo "月份最後一天星期幾 ==> $lastDayWeek <br>";

    echo "<hr>";

    $allDays=[]; //所有天數的空陣列

    for($i=0; $i<$monthDay; $i++){
        $date=date("Y-m-d",strtotime("+$i days",$firstDaySecond));
        $allDays[]=$date;
    }

    echo "<pre>";
    print_r($allDays);
    echo "</pre>";

    echo "<hr>";

    ?>

    <div class="table">

    <?php

    foreach($allDays as $day){
        echo "<div> {$day} </div>";
    }





    ?>

    </div>



</body>
</html>