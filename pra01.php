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
            width: 700px;
            height: 700px;
            align-content: flex-start;
            text-align: center;
            margin:0 auto;
            margin-top: 1px;

        }

        .table>div {
            width: 100px;
            height: 100px;
            border: 1px solid lightgray;
            line-height: 100px;
            margin-left: -1px;
            margin-top: -1px;
        }

        .table>.header {
            font-weight: bolder;
            height: 50px;
            line-height: 50px;
        }
        
        .workday {
            background-color: #DAF7A6;
        }
        .weekend {
            background-color: #FBCEB1;
        }
        .today {
            font-size: 20px;
            color: red;
            text-decoration: underline;
            text-decoration-color: red;
            text-underline-offset: 5px;

        }
    </style>
</head>

<body>
    <h2>利用Flex模式+陣列製作月曆</h2>
    <?php
    $month = 4; //月份
    $firstDay = date("Y-") . $month . "-1"; //月份的第一天日期
    $firstDaySecond = strtotime($firstDay); //月份的第一天秒數
    $firstDayWeek = date("w", $firstDaySecond); //月份的第一天星期幾
    $monthDay = date("t", $firstDaySecond); //月份有幾天
    $lastDay = date("Y-") . $month . "-" . $monthDay; //月份最後一天日期
    $lastDaySecond = strtotime($lastDay); //月份最後一天秒數
    $lastDayWeek = date("w", $lastDaySecond); //月份最後一天星期幾
    $checktoday=""; //檢查是否為今天的空變數
    $today=date("Y-m-d"); //今天的日期

    echo "月份 ==> $month <br>";
    echo "月份的第一天日期 ==> $firstDay <br>";
    echo "月份的第一天秒數 ==> $firstDaySecond <br>";
    echo "月份的第一天星期幾 ==> $firstDayWeek <br>";
    echo "月份有幾天 ==> $monthDay <br>";
    echo "月份最後一天日期 ==> $lastDay <br>";
    echo "月份最後一天秒數 ==> $lastDaySecond <br>";
    echo "月份最後一天星期幾 ==> $lastDayWeek <br>";

    echo "<hr>";

    $allDays = []; //所有天數的空陣列

    //將月份開始前的空白加入陣列
    for ($i = 0; $i < $firstDayWeek; $i++) {
        $allDays[] = "";
    }

    //月份所有的日期加入陣列
    for ($i = 0; $i < $monthDay; $i++) {
        $date = date("Y-m-d", strtotime("+$i days", $firstDaySecond));
        $allDays[] = $date;
    }

    //月份最後的空白加入陣列
    for ($i = 0; $i < 6 - $lastDayWeek; $i++) {
        $allDays[] = "";
    }

    echo "<pre>";
    print_r($allDays);
    echo "</pre>";

    echo "<hr>";

    ?>

    <div class="table">

        <div class="header">星期日</div>
        <div class="header">星期一</div>
        <div class="header">星期二</div>
        <div class="header">星期三</div>
        <div class="header">星期四</div>
        <div class="header">星期五</div>
        <div class="header">星期六</div>
        
        <?php


        //利用陣列的FOR迴圈印出表格及日期
        foreach ($allDays as $day) {

            //如果陣列中的日期是今天的日期,就將today放入變數中
            if($day == $today){
                $checktoday="today";
            }

            //如果$day字串不是空白時轉換字串的型態為日期,並印出div和日期
            if (!empty($day)) { 
                $dateFont=date("d", strtotime($day)); //將陣列字串轉成日期的"日"格式
                $dateweek=date("w",strtotime($day));  //將陣列字串轉成日期的"星期幾"格式

                //判斷是否為周末
                if($dateweek == 0 || $dateweek == 6){
                    echo "<div class='$checktoday weekend'> {$dateFont} </div>"; //是週末就印出有class=weekend 的日期,並加上檢查是否為今天的變數
                }else{
                    echo "<div class='$checktoday workday'> {$dateFont} </div>"; //是上班日就印出有class=workday 的日期,並加上檢查是否為今天的變數
                }

                
            }else{
                //如果$day字串是空白時,印出空白的div
                echo "<div></div>";
            }
            
        }
 




        ?>

    </div>



</body>

</html>