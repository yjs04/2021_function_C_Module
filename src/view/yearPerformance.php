        <!-- 비쥬얼영역 -->
        <div id="visual">
            <div class="visual_slide"><img src="/resource/image/visual1.jpg" alt="visual_img" title="visual_img"></div>
            <div id="visual_text">행사안내 <i class="fa fa-angle-right"></i> 공연 <i class="fa fa-angle-right"></i> 연간 공연 일정</div>
        </div>
        <!-- /비쥬얼영역 -->

        <!-- 콘텐츠 -->
        <div class="content">
            <div class="container">
                <div class="content_wrap" id="year_calendar">
                    <div class="content_title_box">
                        <h5>연간 공연 일정 <span>행사안내 <i class="fa fa-angle-right"></i> 공연 <i class="fa fa-angle-right"></i> 연간 공연 일정</span></h5>
                    </div>
                    <div class="content_box">
                        <div id="year_calendar_header" class="calendar_header">
                            <button class="year_calendar_btn calendar_btn" data-href='/yearPerformance?year=<?=$data['year']-1?>'><i class="fa fa-angle-left"></i></button>
                            <h5><?=$data['year']?></h5>
                            <button class="year_calendar_btn calendar_btn" data-href='/yearPerformance?year=<?=$data['year']+1?>'><i class="fa fa-angle-right"></i></button>
                            <button id="year_performance_add" class="calendar_add_btn">일정등록</button>
                        </div>
                        <div id="year_calendar_body">
                            <?php for($i = 1; $i <=12; $i++): ?>
                            <div class="year_calendar_item">
                                <h5 class="year_calendar_month"><?=$i?>월</h5>
                                <div class="year_calendar_list">
                                    <?php if($data['list']['Month'.$i] !== []):?>
                                    <?php foreach($data['list']['Month'.$i] as $item):?>
                                    <div class="year_calendar_month_item" data-id="<?=$item->showUid?>">
                                        <span class="date"><?=date('m',strtotime($item->showDate)).".".date('d',strtotime($item->showDate))?> [D<?= (strtotime(date('Y-m-d')) > strtotime($item->showDate) ? "+".date_diff(new DateTime(date('Y-m-d')),new DateTime($item->showDate))->days : (strtotime(date('Y-m-d')) == strtotime($item->showDate) ? "-Day" : "-".date_diff(new DateTime(date('Y-m-d')),new DateTime($item->showDate))->days)) ?>]</span>
                                        <p class="year_calendar_content"><?=$item->showName?></p>
                                    </div>
                                    <?php endforeach;?>
                                    <?php else:?>
                                    <div class="noData">관련 정보가 없습니다.</div>
                                    <?php endif;?>
                                </div>
                            </div>
                            <?php endfor;?>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /콘텐츠 -->

        <script>
            document.querySelectorAll(".year_calendar_btn").forEach(x=>{x.addEventListener("click",e=>{location.href=e.target.dataset.href;});});
            document.querySelector("#year_performance_add").addEventListener("click",()=>{location.href='/addPerformance';});
            document.querySelectorAll(".year_calendar_month_item").forEach(x=>{
                x.addEventListener("click",e=>{
                    let target = e.target;
                    let id = e.currentTarget.dataset.id;
                    if(target.classList.contains("year_calendar_content")) location.href = `/modPerformance/${id}`;
                    else location.href = `/performance/${id}`;
                });
            });
        </script>