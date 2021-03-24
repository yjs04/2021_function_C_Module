<?php

use App\DB;

function init(){
    $flag = DB::fetchAll("SELECT * FROM cultures");
    if(count($flag)) exit;
    $sql = "INSERT INTO cultures(`no`,`ccmaName`,`crltsnoNm`,`ccbaMnm1`,`ccbaMnm2`,`ccbaCtcdNm`,`ccsiName`,`ccbaKdcd`,`ccbaCtcd`,`ccbaAsno`,`ccbaCncl`,`ccbaCpno`,`longitude`,`latitude`,`gcodeName`,`bcodeName`,`mcodeName`,`scodeName`,`ccbaQuan`,`ccbaAsdt`,`ccbaLcad`,`ccceName`,`ccbaPoss`,`ccbaAdmin`,`ccbaCndt`,`image`,`content`) VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
    $xml = simplexml_load_file(XML."/nihList.xml");
    $totalCnt = $xml->totalCnt;
    for($i = 0;$i < $totalCnt; $i++){
        $item = $xml->item[$i];

        $no = (string)$item->no;
        $ccmaName = (string)$item->ccmaName;
        $crltsnoNm = (string)$item->crltsnoNm;
        $ccbaMnm1 = (string)$item->ccbaMnm1;
        $ccbaMnm2 = (string)$item->ccbaMnm2;
        $ccbaCtcdNm = (string)$item->ccbaCtcdNm;
        $ccsiName = (string)$item->ccsiName;
        $ccbaKdcd = (string)$item->ccbaKdcd;
        $ccbaCtcd = (string)$item->ccbaCtcd;
        $ccbaAsno = (string)$item->ccbaAsno;
        $ccbaCncl = (string)$item->ccbaCncl;
        $ccbaCpno = (string)$item->ccbaCpno;
        $longitude = (string)$item->longitude;
        $latitude = (string)$item->latitude;

        $filename = DETAIL."/{$ccbaKdcd}_{$ccbaCtcd}_{$ccbaAsno}.xml";
        $detail = simplexml_load_file($filename);
        $detail = $detail->item;

        $gcodeName = (string)$detail->gcodeName;
        $bcodeName = (string)$detail->bcodeName;
        $mcodeName = (string)$detail->mcodeName;
        $scodeName = (string)$detail->scodeName;
        $ccbaQuan = (string)$detail->ccbaQuan;
        $ccbaAsdt = (string)$detail->ccbaAsdt;
        $ccbaAsdt = date('Y-m-d',mktime(0,0,0,(int)substr($ccbaAsdt,4,2),(int)substr($ccbaAsdt,6,2),(int)substr($ccbaAsdt,0,4)));
        $ccbaLcad = (string)$detail->ccbaLcad;
        $ccceName = (string)$detail->ccceName;
        $ccbaPoss = (string)$detail->ccbaPoss;
        $ccbaAdmin = (string)$detail->ccbaAdmin;
        $ccbaCndt = (string)$detail->ccbaCndt;
        $image = (string)$detail->imageUrl;
        $content = (string)$detail->content;
        DB::query($sql,[$no,$ccmaName,$crltsnoNm,$ccbaMnm1,$ccbaMnm2,$ccbaCtcdNm,$ccsiName,$ccbaKdcd,$ccbaCtcd,$ccbaAsno,$ccbaCncl,$ccbaCpno,$longitude,$latitude,$gcodeName,$bcodeName,$mcodeName,$scodeName,$ccbaQuan,$ccbaAsdt,$ccbaLcad,$ccceName,$ccbaPoss,$ccbaAdmin,$ccbaCndt,$image,$content]);
    }
}

function view($viewName,$data=[]){
    extract($data);
    include_once VIEW."/header.php";
    include_once VIEW."/$viewName.php";
    include_once VIEW."/footer.php";
}

function go($url,$msg=""){
    echo "<script> alert('$msg');location.href='$url';</script>";
}

function back($msg=""){
    echo "<script>alert('$msg');history.back();</script>";
}

function doubleback($msg=""){
    echo "<script>alert('$msg');history.go(-2);</script>";
}

function calendar($year,$month){
    $first = strtotime("{$year}-{$month}-1");

    $start = $first;
    while(true){
        $day = date('w',$start);
        if($day == 0) break;
        $start = strtotime(date('Y-m-d',$start) . "-1 day");
    }

    $nextMonth = date('Y-m-d',strtotime("+1 months",$first));
    $beforeMonth = date('Y-m-d',strtotime("-1 months",$first));

    $last = strtotime($nextMonth."-1 day");
    $end = $last;

    while(true){
        $day = date('w',$end);
        if($day == 6) break;
        $end = strtotime(date('Y-m-d',$end)."+1 day");
    }

    $nextQuery = "/monthPerformance?year=".date('Y',strtotime($nextMonth))."&month=".date("m",strtotime($nextMonth));
    $beforeQuery = "/monthPerformance?year=".date('Y',strtotime($beforeMonth))."&month=".date("m",strtotime($beforeMonth));
    

    return compact("first","start","last","end","nextQuery","beforeQuery");
}

function checkEmpty(){
    foreach($_POST as $data){
        if(!is_array($data) && trim($data) === "") back("모든 정보를 입력해주세요.");
    }
}

function pagination($data,$type){
    define("LIST_LENGTH",$type == "list" ? 10 : 8);
    define("BLOCK_LENGTH",10);

    $items = [];
    $page = isset($_GET['page']) && (int)$_GET['page'] ? (int) $_GET['page'] : 1;
    $page = $page >=1 ? $page : 1;
    $totalPage = ceil(count($data)/LIST_LENGTH);
    $block = ceil($page / BLOCK_LENGTH);
    $end = $block * BLOCK_LENGTH;
    $start = $end - BLOCK_LENGTH + 1;
    $next = true;
    $prev = true;
    $nextBlock = true;
    $prevBlock = true;

    if($end >= $totalPage){
        $end = $totalPage;
        $nextBlock = false;
    }

    if($start <= 1){
        $start = 1;
        $prevBlock = false;
    }

    $prev = $page - 1 < 1 ? false : true;
    $next = $page + 1 > $totalPage ? false : true;

    $items = array_slice($data,($page - 1) * LIST_LENGTH,LIST_LENGTH);
    return compact("data","items","prev","next","prevBlock","nextBlock","start","end","totalPage","page");
}

function extname($filename){
    return strtolower(substr($filename,strrpos($filename,".")));
}

function file_upload($file){
    $i = 0;
    $filename = time().$i.extname($file['name']);
    while(file_exists($filename)){
        $i++;
        $filename = time().$i.extname($file['name']);
    }

    move_uploaded_file($file['tmp_name'],IMAGE."/$filename");
    return $filename;
}

function json_response($data){
    echo json_encode($data,JSON_UNESCAPED_UNICODE);
}

function base64_upload($data){
    $data = base64_encode(file_get_contents(IMAGE."/$data"));
    $filename = 'data:image/jpg;base64,'.$data;
    return $filename;
}