<?php

namespace Controller;

use App\DB;

class ActionController{
    function addPerformanceProcess(){
        extract($_POST);
        $sql = "INSERT INTO shows(`showName`,`showDate`,`showTime`,`organizer`,`place`,`cast`,`rm`,`registDt`) VALUES(?,?,?,?,?,?,?,?)";
        DB::query($sql,[$showName,$showDate,$showTime,$organizer,$place,$cast,$rm,date('Y-m-d')]);
        doubleback("공연 일정이 등록되었습니다.");
    }

    function modPerformanceProcess($id){
        extract($_POST);
        $sql = "UPDATE shows SET `showName` = ?, `showDate` = ?, `showTime` = ?, `organizer` = ?, `place` = ?, `cast` = ? , `rm` = ?, `updtDt` = ? WHERE showUid = ? ";
        DB::query($sql,[$showName,$showDate,$showTime,$organizer,$place,$cast,$rm,date('Y-m-d'),$id]);
        doubleback("공연 일정이 수정되었습니다.");
    }
    
    function delPerformanceProcess($id){
        $sql = "DELETE FROM shows WHERE `showUid`= ?";
        DB::query($sql,[$id]);
        doubleback("공연 일정을 삭제했습니다.");
    }

    function addCultureProccess(){
        extract($_POST);
        $filename = "";
        if($_FILES['image']['name'] !== "") $filename = file_upload($_FILES['image']);
        $sql = "INSERT INTO cultures(`no`,`ccmaName`,`crltsnoNm`,`ccbaMnm1`,`ccbaMnm2`,`ccbaCtcdNm`,`ccsiName`,`ccbaKdcd`,`ccbaCtcd`,`ccbaAsno`,`ccbaCncl`,`ccbaCpno`,`longitude`,`latitude`,`gcodeName`,`bcodeName`,`mcodeName`,`scodeName`,`ccbaQuan`,`ccbaAsdt`,`ccbaLcad`,`ccceName`,`ccbaPoss`,`ccbaAdmin`,`ccbaCndt`,`image`,`content`) VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
        DB::query($sql,[$no,$ccmaName,$crltsnoNm,$ccbaMnm1,$ccbaMnm2,$ccbaCtcdNm,$ccsiName,$ccbaKdcd,$ccbaCtcd,$ccbaAsno,$ccbaCncl,$ccbaCpno,$longitude,$latitude,$gcodeName,$bcodeName,$mcodeName,$scodeName,$ccbaQuan,$ccbaAsdt,$ccbaLcad,$ccceName,$ccbaPoss,$ccbaAdmin,$ccbaCndt,$filename,$content]);
        go("/culture","무형문화재가 등록되었습니다.");
    }

    function modCultureProccess($sn){
        extract($_POST);
        $culture = DB::fetch("SELECT * FROM cultures WHERE sn = ?",[$sn]);
        $filename = "";
        if($_FILES['image']['name'] !== "") $filename = file_upload($_FILES['image']);
        else $filename = $culture->image;
        $sql = "UPDATE cultures SET `no`=?,`ccmaName`=?,`crltsnoNm`=?,`ccbaMnm1`=?,`ccbaMnm2`=?,`ccbaCtcdNm`=?,`ccsiName`=?,`ccbaKdcd`=?,`ccbaCtcd`=?,`ccbaAsno`=?,`ccbaCncl`=?,`ccbaCpno`=?,`longitude`=?,`latitude`=?,`gcodeName`=?,`bcodeName`=?,`mcodeName`=?,`scodeName`=?,`ccbaQuan`=?,`ccbaAsdt`=?,`ccbaLcad`=?,`ccceName`=?,`ccbaPoss`=?,`ccbaAdmin`=?,`ccbaCndt`=?,`image`=?,`content`=? WHERE sn = ?";
        DB::query($sql,[$no,$ccmaName,$crltsnoNm,$ccbaMnm1,$ccbaMnm2,$ccbaCtcdNm,$ccsiName,$ccbaKdcd,$ccbaCtcd,$ccbaAsno,$ccbaCncl,$ccbaCpno,$longitude,$latitude,$gcodeName,$bcodeName,$mcodeName,$scodeName,$ccbaQuan,$ccbaAsdt,$ccbaLcad,$ccceName,$ccbaPoss,$ccbaAdmin,$ccbaCndt,$filename,$content,$sn]);
        go("/culture","해당 무형문화재가 수정되었습니다.");
    }

    function delCultureProccess($sn){
        $sql = "DELETE FROM cultures WHERE sn = ?";
        DB::query($sql,[$sn]);
        go("/culture","해당 무형문화재가 삭제되었습니다.");
    }

    function loadImage(){
        $name = $_GET['name'];
        $path = IMAGE . DIRECTORY_SEPARATOR . $name;
        if(!file_exists($path)) return exit;
        header('Content-Description:application/octet-stream');
        header("Content-Disposition:attachment;filename=$name");
        header("Content-Length:".filesize($path));
        readfile($path);
    }
}