        <!-- 비쥬얼영역 -->
        <div id="visual">
            <div class="visual_slide"><img src="/resource/image/visual1.jpg" alt="visual_img" title="visual_img"></div>
            <div id="visual_text">행사안내 <i class="fa fa-angle-right"></i> 공연 <i class="fa fa-angle-right"></i> 공연 일정 수정</div>
        </div>
        <!-- /비쥬얼영역 -->

        <!-- 콘텐츠 -->
        <div class="content">
            <div class="container">
                <div class="content_wrap" id="mod_performance">
                    <div class="content_title_box">
                        <h5>공연 일정 수정 <span>행사안내 <i class="fa fa-angle-right"></i> 공연 <i class="fa fa-angle-right"></i> 공연 일정 수정</span></h5>
                    </div>
                    <div class="content_box">
                        <form action="/modPerformanceProcess/<?=$data->showUid?>" method="post" id="modPerformanceForm">
                            <div class="form-group">
                                <label for="showName" class="form-label"><span>(*)</span> 공연명</label>
                                <input type="text" id="showName" name="showName" class="form-control" required value="<?=$data->showName?>">
                            </div>
                            <div class="form-group">
                                <label for="showDate" class="form-label"><span>(*)</span> 공연일</label>
                                <input type="date" id="showDate" name="showDate" class="form-control" required value="<?=$data->showDate?>">
                            </div>
                            <div class="form-group">
                                <label for="showTime" class="form-label"><span>(*)</span> 공연시간</label>
                                <input type="time" id="showTime" name="showTime" class="form-control" required value="<?=$data->showTime?>">
                            </div>
                            <div class="form-group">
                                <label for="organizer" class="form-label">주관</label>
                                <input type="text" id="organizer" name="organizer" class="form-control" value="<?=$data->organizer?>">
                            </div>
                            <div class="form-group">
                                <label for="place" class="form-label">공연장소</label>
                                <input type="text" id="place" name="place" class="form-control" value="<?=$data->place?>">
                            </div>
                            <div class="form-group">
                                <label for="cast" class="form-label">출연진</label>
                                <input type="text" id="cast" name="cast" class="form-control" value="<?=$data->cast?>">
                            </div>
                            <div class="form-group">
                                <label for="rm" class="form-label">공연내용</label>
                                <textarea name="rm" id="rm" cols="30" rows="10" class="form-control"><?=$data->rm?></textarea>
                            </div>
                            <button type="button" class="calendar_add_btn" id="del_performance_btn" data-id="<?=$data->showUid?>">일정삭제</button>
                            <button class="calendar_add_btn">일정수정</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- /콘텐츠 -->

        <script>
            document.querySelector("#del_performance_btn").addEventListener("click",e=>{
                if(confirm("해당 공연 일정을 삭제하시겠습니까?")){
                    let idx = e.target.dataset.id; location.href=`/delPerformanceProcess/${idx}`;
                }
            });
        </script>