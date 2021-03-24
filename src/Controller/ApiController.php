<?php

namespace Controller;

use App\DB;

class ApiController{
    function apiNihList(){
        if(!(isset($_GET['pageNo']) || isset($_GET["numOfRows"]))) return exit;
        $pageNo = (int)$_GET['pageNo'];
        $numOfRows = (int)$_GET['numOfRows'];
        $bcodeName = isset($_GET['bcodeName']) ? $_GET['bcodeName'] : '';

        if(!($pageNo && $numOfRows)) exit;
        $start = ($pageNo - 1) * $numOfRows;
        $sql = $bcodeName !== "" ? "SELECT ccbaKdcd,ccbaAsno,ccbaCtcd,ccbaCpno,ccmaName,ccbaMnm1,ccbaMnm2,gcodeName,bcodeName,mcodeName,scodeName,ccbaQuan,ccbaAsdt,ccbaCtcdNm,ccsiName,ccbaLcad,ccceName,ccbaPoss,ccbaAdmin,ccbaCncl,ccbaCndt,`image`,content FROM cultures WHERE bcodeName = ? LIMIT $pageNo, $numOfRows" : "SELECT ccbaKdcd,ccbaAsno,ccbaCtcd,ccbaCpno,ccmaName,ccbaMnm1,ccbaMnm2,gcodeName,bcodeName,mcodeName,scodeName,ccbaQuan,ccbaAsdt,ccbaCtcdNm,ccsiName,ccbaLcad,ccceName,ccbaPoss,ccbaAdmin,ccbaCncl,ccbaCndt,`image`,content FROM cultures LIMIT $pageNo, $numOfRows";
        $list = $bcodeName !== "" ? DB::fetchAll($sql,[$bcodeName]) : DB::fetchAll($sql);

        foreach($list as $item){
            $item->ccbaLcad = preg_replace("/(\\n||\\t)/","",$item->ccbaLcad);
            $item->ccbaPoss = preg_replace("/(\\n||\\t)/","",$item->ccbaPoss);
            $item->ccbaAdmin = preg_replace("/(\\n||\\t)/","",$item->ccbaAdmin);
            $item->image = ($item->image !== "" && is_file(IMAGE."/$item->image")) ? base64_upload($item->image) : "";
        }

        $data['numOfRows'] = $numOfRows;
        $data['pageNo'] = $pageNo;
        $data['totalCount'] = count($list);
        $data["items"] = $list;
        json_response($data);
    }

    function apiShowList(){
        $searchType = isset($_GET['searchType']) ? $_GET['searchType'] : false;
        $year = isset($_GET['year']) ? $_GET['year'] : false;
        $month = isset($_GET['month']) ? $_GET['month'] : false;
        if(!$searchType || !$year || ($searchType == "M" && !$month)) return exit;
        $sql = "SELECT `showUid`,`showName`,`showDate`,`organizer`,`place`,`cast`,`rm` FROM shows WHERE `showDate` >= ? AND `showDate` <= ?";
        if($searchType=="Y"){
            $start = date('Y-m-d',strtotime("$year-01-01"));
            $end = date('Y-m-d',strtotime($year."12".date("t",mktime(0,0,0,12,1,$year))));
        }else{
            $start = date('Y-m-d',mktime(0,0,0,$month,1,$year));
            $end = date('Y-m-d',mktime(0,0,0,$month,date("t",mktime(0,0,0,$month,1,$year)),$year));
        }
        $list = DB::fetchAll($sql,[$start,$end]);
        $data['showType'] = $searchType;
        $data['year'] = $year;
        $data['month'] = $month ? $month : "";
        $data['totalCount'] = count($list);
        $data['items'] = $list;
        json_response($data);
    }
}