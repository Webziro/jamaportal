<?php  
        $time = date("H");
        $time_zone = date("e");
        if ($time < 12) {
        $morning = "Good Morning";
        }elseif($time >= 12 && $time < 16){
        $afternoon = "Good Afternoon";
        }elseif($time >= 16 or $time < 19 ){
        $evening = "Good Evening";
        }else{
        $night = "Good Night";
        }
    ?>