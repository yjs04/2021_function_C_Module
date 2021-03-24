<?php

use App\Router;

Router::get("/","ViewController@index");
Router::get("/phone","ViewController@phone");
Router::get("/history","ViewController@history");
Router::get("/monthPerformance","ViewController@monthPerformance");
Router::get("/yearPerformance","ViewController@yearPerformance");
Router::get("/culture","ViewController@culture");
Router::get("/openStatus","ViewController@openStatus");
Router::get("/openPerformance","ViewController@openPerformance");

Router::get("/addPerformance","ViewController@addPerformance");
Router::get("/performance/{id}","ViewController@performance");
Router::get("/modPerformance/{id}","ViewController@modPerformance");

Router::get("/addCulture","ViewController@addCulture");
Router::get("/modCulture/{id}","ViewController@modCulture");
Router::get("/cultureLook/{id}","ViewController@cultureLook");

Router::post("/addCultureProccess","ActionController@addCultureProccess");
Router::post("/modCultureProccess/{id}","ActionController@modCultureProccess");
Router::get("/delCultureProccess/{id}","ActionController@delCultureProccess");

Router::post("/addPerformanceProcess","ActionController@addPerformanceProcess");
Router::post("/modPerformanceProcess/{id}","ActionController@modPerformanceProcess");
Router::get("/delPerformanceProcess/{id}","ActionController@delPerformanceProcess");

Router::get("/image","ActionController@loadImage");

Router::get("/openAPI/nihList.php","ApiController@apiNihList");
Router::get("/openAPI/showList.php","ApiController@apiShowList");

Router::start();