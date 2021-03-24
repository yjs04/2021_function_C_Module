<?php

session_start();

define("ROOT",dirname(__DIR__));
define("SRC",ROOT."/src");
define("VIEW",SRC."/view");
define("IMAGE",pathinfo(ROOT,PATHINFO_DIRNAME)."/nihcImage");
define("XML",ROOT."/public/xml");
define("DETAIL",XML."/detail");

include_once SRC."/autoload.php";
include_once SRC."/helper.php";
include_once SRC."/web.php";

init();