        <!-- 비쥬얼영역 -->
        <div id="visual">
        <div class="visual_slide"><img src="/resource/image/visual1.jpg" alt="visual_img" title="visual_img"></div>
            <div id="visual_text">무형문화재 현황 <i class="fa fa-angle-right"></i> 무형문화재 조회</div>
        </div>
        <!-- /비쥬얼영역 -->

        <!-- 콘텐츠 -->
        <div class="content">
            <div class="container">
                <div class="content_wrap" id="cultureLook">
                    <div class="content_title_box">
                        <h5>무형문화재 조회 <span>무형문화재 현황 <i class="fa fa-angle-right"></i> 무형문화재 조회</span></h5>
                    </div>
                    <div class="content_box">
                        <div id="culture_look_header">
                            <h2><?=$data->ccbaMnm1?><?=$data->ccbaMnm2 !== '' ? "($data->ccbaMnm2)" : ""?><span><?=$data->ccmaName?><?=$data->gcodeName !== '' ? ' <i class="fas fa-angle-right"></i> '.$data->gcodeName : ''?><?=$data->bcodeName !== '' ? ' <i class="fas fa-angle-right"></i> '.$data->bcodeName : ''?><?=$data->mcodeName !== '' ? ' <i class="fas fa-angle-right"></i> '.$data->mcodeName : ''?><?=$data->scodeName !== '' ? ' <i class="fas fa-angle-right"></i> '.$data->scodeName : ''?></span> </h2>
                            <div id="culture_look_head_info">
                                <p>종목코드 : <?=$data->ccbaKdcd?></p>
                                <p>지정번호 : <?=$data->ccbaAsno?></p>
                                <p>시도코드 : <?=$data->ccbaCtcd?></p>
                                <?=$data->ccbaCpno !== "" ? "<p>문화재연계번호 : $data->ccbaCpno</p>" : ""?>
                            </div>
                        </div>
                        <div id="culture_look_body">
                            <div id="culture_look_img">
                                <?php if($data->image !== ""):?>
                                <img src="/image?name=<?=$data->image?>" alt="image" title="image">
                                <?php else:?>
                                no Image
                                <?php endif;?>
                            </div>
                            <div id="culture_look_info">
                                <?=trim($data->ccbaCtcdNm) !== "" ? "<p>시도명 : $data->ccbaCtcdNm</p>" : ""?>
                                <?=trim($data->ccsiName) !== "" ? "<p>시군구명 : $data->ccsiName</p>" : ""?>
                                <?=trim($data->ccbaAdmin) !== "" ? "<p>관리자 : $data->ccbaAdmin</p>" : ""?>
                                <?=trim($data->longitude) !== "0" ? "<p>경도 : $data->longitude</p>" : ""?>
                                <?=trim($data->latitude) !== "0" ? "<p>위도 : $data->latitude</p>" : ""?>
                                <?=trim($data->ccbaLcad) !== "" ? "<p>소재지 상세 : $data->ccbaLcad</p>" : ""?>
                                <?=trim($data->ccceName) !== "" ? "<p>시대 : $data->ccceName</p>" : ""?>
                                <?=trim($data->ccbaPoss) !== "" ? "<p>소유자 : $data->ccbaPoss</p>" : ""?>
                                <?=trim($data->content) !== "" ? "<p>".nl2br(htmlentities($data->content))."</p>" : ""?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /콘텐츠 -->