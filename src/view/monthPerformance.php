        <!-- 비쥬얼영역 -->
        <div id="visual">
            <div class="visual_slide"><img src="/resource/image/visual1.jpg" alt="visual_img" title="visual_img"></div>
            <div id="visual_text">행사안내 <i class="fa fa-angle-right"></i> 공연 <i class="fa fa-angle-right"></i> 월간 공연 일정</div>
        </div>
        <!-- /비쥬얼영역 -->

        <!-- 콘텐츠 -->
        <div class="content">
            <div class="container">
                <div class="content_wrap" id="month_calendar">
                    <div class="content_title_box">
                        <h5>월간 공연 일정 <span>행사안내 <i class="fa fa-angle-right"></i> 공연 <i class="fa fa-angle-right"></i> 월간 공연 일정</span></h5>
                    </div>
                    <div class="content_box">
                        <div id="month_calendar_header" class="calendar_header">
                            <button class="month_calendar_btn calendar_btn" id="calendar_before"><i class="fa fa-angle-left"></i></button>
                            <h5><?=date('Y',$data['calendar']['first'])?>.<?=date('m',$data['calendar']['first'])?></h5>
                            <button class="month_calendar_btn calendar_btn" id="calendar_next"><i class="fa fa-angle-right"></i></button>
                            <button id="month_performance_add" class="calendar_add_btn">일정등록</button>
                        </div>
                        <table id="month_calendar_table">
                            <thead>
                                <tr>
                                    <th>Sun</th>
                                    <th>Mon</th>
                                    <th>Tue</th>
                                    <th>Wed</th>
                                    <th>Thu</th>
                                    <th>Fri</th>
                                    <th>Sat</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $day = $data['calendar']['start'];?>
                                <?php while($day <= $data['calendar']['end']):?>
                                <?php if(date('w',$day) == 0):?>
                                <tr>
                                <?php endif;?>

                                <td class="<?=date('m',$data['calendar']['first']) == date('m',$day) ? '' : 'hide' ?>">
                                    <span class="date"><?=date('d',$day)?></span>
                                    <div class="calendar_list">
                                    <?php foreach($data['list'] as $item):?>
                                    <?php if($item->showDate == date('Y-m-d',$day)):?>
                                    <div class="calendar_item" data-id="<?=$item->showUid?>">
                                        <span class="showName" data-id="<?=$item->showUid?>" ><?=$item->showName?></span>
                                        <span>D<?= (strtotime(date('Y-m-d')) > strtotime($item->showDate) ? "+".date_diff(new DateTime(date('Y-m-d')),new DateTime($item->showDate))->days : (strtotime(date('Y-m-d')) == strtotime($item->showDate) ? "-Day" : "-".date_diff(new DateTime(date('Y-m-d')),new DateTime($item->showDate))->days)) ?></span>
                                    </div>
                                    <?php endif;?>
                                    <?php endforeach;?>
                                    </div>
                                </td>

                                <?php if(date('w',$day) == 6):?>
                                </tr>
                                <?php endif;?>

                                <?php $day = strtotime(date('Y-m-d',$day)."+1 day")?>
                                <?php endwhile;?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- /콘텐츠 -->

        <script>
            document.querySelector("#calendar_before").addEventListener("click",()=>{location.href='<?=$data['calendar']["beforeQuery"]?>'});
            document.querySelector("#calendar_next").addEventListener("click",()=>{location.href='<?=$data['calendar']["nextQuery"]?>'});
            document.querySelector("#month_performance_add").addEventListener("click",()=>{location.href='/addPerformance';});
            document.querySelectorAll(".calendar_item").forEach(x=>{
                x.addEventListener("click",e=>{
                    let target = e.target;
                    let id = e.currentTarget.dataset.id;
                    if(target.classList.contains("showName")) location.href = `/modPerformance/${id}`;
                    else location.href = `/performance/${id}`;
                });
            });
        </script>
