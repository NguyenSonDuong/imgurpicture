<?php
    include ("imgur.php");
    $jsonarray = stringtojson();
    
    $json = getImageOfUser("me","e2d9d3817f113fa9744d3d68e1fdbf820bae24ef",2);
    $jsoncover = json_decode($json,true);
    $dem = 0;
    foreach($jsoncover['data'] as $item){
        if($dem>=10)
            break;
        $link = $item['link'];
        $additem = array( 
            "attachment" =>
                array( 
                    "type" => "image",
                    "payload" =>
                        array( 
                            "url" => "$link"
                        )
                )
        );
          $jsonarray['messages'][] = $additem;
          $dem++;
    }
    echo json_encode($jsonarray);
?>