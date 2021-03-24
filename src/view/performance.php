        <!-- 비쥬얼영역 -->
        <div id="visual">
            <div class="visual_slide"><img src="/resource/image/visual1.jpg" alt="visual_img" title="visual_img"></div>
            <div id="visual_text">행사안내 <i class="fa fa-angle-right"></i> 공연 <i class="fa fa-angle-right"></i> 공연 일정 조회</div>
        </div>
        <!-- /비쥬얼영역 -->

        <!-- 콘텐츠 -->
        <div class="content">
            <div class="container">
                <div class="content_wrap" id="performance">
                    <div class="content_title_box">
                        <h5>공연 일정 조회 <span>행사안내 <i class="fa fa-angle-right"></i> 공연 <i class="fa fa-angle-right"></i> 공연 일정 조회</span></h5>
                    </div>
                    <div class="content_box">
                        <div id="performance_header">
                            <h2 id="performance_title"><?=$data['showName']?></h2>
                            <p>등록일 : <?=$data['registDt']?> <?= $data['updtDt'] !== null ? "수정일 : ".$data['updtDt'] : ""?></p>
                        </div>
                        <div id="performance_body">
                            <p>공연일 : <?= $data['showDate']?></p>
                            <p>공연시간 : <?=$data['showTime']?></p>
                            <?php if($data['organizer']): ?>
                            <p>주관 : <?=$data['organizer']?></p>
                            <?php endif;?>
                            <?php if($data['place']): ?>
                            <p>공연장소 : <?=$data['place']?></p>
                            <?php endif;?>
                            <?php if($data['cast']): ?>
                            <p>출연진 : <?=$data['cast']?></p>
                            <?php endif;?>
                            <?php if($data['rm']): ?>
                            <p><?=nl2br(htmlentities($data['rm']))?></p>
                            <?php endif;?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /콘텐츠 -->