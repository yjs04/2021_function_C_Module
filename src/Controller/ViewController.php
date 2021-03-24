<?php

namespace Controller;

use App\DB;

class ViewController{
    function index(){
        view("index");
    }

    function phone(){
        view("phone");
    }

    function history(){
        view("history");
    }

    function monthPerformance(){
        $year = isset($_GET['year']) ? $_GET['year'] : date('Y');
        $month = isset($_GET['month']) ? $_GET['month'] : date('m');
        $calendar = calendar($year,$month);
        $list = DB::fetchAll("SELECT * FROM shows WHERE `showDate` >= ? AND `showDate` <= ? ORDER BY `showDate` ASC",[date('Y-m-d',$calendar['first']),date('Y-m-d',$calendar['last'])]);
        view("monthPerformance",compact("calendar","list"));
    }

    function yearPerformance(){
        $year = isset($_GET['year']) ? $_GET['year'] : date('Y');
        $list = [];
        
        for($i = 1; $i <= 12; $i++){
            $month = $i < 10 ? "0$i" : $i;
            $first = date("Y-m-d",strtotime("$year-$month-01"));
            $lastDay = date("t",strtotime($first));
            $last = date('Y-m-d',strtotime("$year-$month-$lastDay"));
            $list["Month".$i] = DB::fetchAll("SELECT * FROM shows WHERE `showDate` >= ? AND `showDate` <= ? ORDER BY `showDate` ASC",[$first,$last]);
        }

        view("yearPerformance",compact("year","list"));
    }

    function addPerformance(){
        view("addPerformance");
    }

    function culture(){
        $cateList = ["전통 공연·예술","전통기술","전통지식","구전 전통 및 표현","전통 생활관습","의례·의식","전통 놀이·무예"];
        $cate = isset($_GET['bcodeName']) ? $_GET['bcodeName'] : "전체";
        $type = isset($_GET["type"]) ? $_GET['type'] : "album";
        $list = [];

        if($cate !== "전체"){
            $cate = $cateList[$cate];
            $sql = "SELECT * FROM cultures WHERE bcodeName = ? ORDER BY `sn` DESC";
            $list = DB::fetchAll($sql,[$cate]);
        }else{
            $sql = "SELECT * FROM cultures ORDER BY `sn` DESC";
            $list = DB::fetchAll($sql);
        }

        $bcodeName = isset($_GET['bcodeName']) ? $_GET['bcodeName'] : "";
        $list = pagination($list,$type);
        view("culture",compact("list","cate","type","bcodeName"));
    }

    function addCulture(){
        view("addCulture");
    }

    function modCulture($sn){
        $sql = "SELECT * FROM cultures WHERE sn = ?";
        $data = DB::fetch($sql,[$sn]);
        view("modCulture",compact("data"));
    }

    function cultureLook($sn){
        $sql = "SELECT * FROM cultures WHERE sn = ?";
        $data = DB::fetch($sql,[$sn]);
        view("cultureLook",compact("data"));
    }

    function openStatus(){
        view("openStatus");
    }

    function openPerformance(){
        view("openPerformance");
    }

    function modPerformance($id){
        $sql = "SELECT * FROM shows WHERE showUid = ?";
        $data = DB::fetch($sql,[$id]);
        view("modPerformance",compact("data"));
    }

    function performance($id){
        $sql = "SELECT * FROM shows WHERE showUid = ?";
        $result = (array) DB::fetch($sql,[$id]);
        view("performance",$result);
    }
}