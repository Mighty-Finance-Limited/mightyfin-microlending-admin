    <?php 


        $ip = $_SERVER['REMOTE_ADDR'];
        $ipInfo = file_get_contents('http://ip-api.com/json/' . $ip);
        $ipInfo = json_decode($ipInfo);
        $timezone = $ipInfo->timezone ?? "UTC";
        
        $dt = new DateTime("now", new DateTimeZone($timezone));
        echo $dt->format('Y-m-d H:i:s');
