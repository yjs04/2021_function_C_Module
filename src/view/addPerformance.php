        <!-- 비쥬얼영역 -->
        <div id="visual">
        <div class="visual_slide"><img src="/resource/image/visual1.jpg" alt="visual_img" title="visual_img"></div>
            <div id="visual_text">행사안내 <i class="fa fa-angle-right"></i> 공연 <i class="fa fa-angle-right"></i> 공연 일정 등록</div>
        </div>
        <!-- /비쥬얼영역 -->

        <!-- 콘텐츠 -->
        <div class="content">
            <div class="container">
                <div class="content_wrap" id="add_performance">
                    <div class="content_title_box">
                        <h5>공연 일정 등록 <span>행사안내 <i class="fa fa-angle-right"></i> 공연 <i class="fa fa-angle-right"></i> 공연 일정 등록</span></h5>
                    </div>
                    <div class="content_box">
                        <form action="/addPerformanceProcess" method="post" id="addPerformanceForm">
                            <div class="form-group">
                                <label for="showName" class="form-label"><span>(*)</span> 공연명</label>
                                <input type="text" id="showName" name="showName" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="showDate" class="form-label"><span>(*)</span> 공연일</label>
                                <input type="date" id="showDate" name="showDate" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="showTime" class="form-label"><span>(*)</span> 공연시간</label>
                                <input type="time" id="showTime" name="showTime" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="organizer" class="form-label">주관</label>
                                <input type="text" id="organizer" name="organizer" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="place" class="form-label">공연장소</label>
                                <input type="text" id="place" name="place" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="cast" class="form-label">출연진</label>
                                <input type="text" id="cast" name="cast" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="rm" class="form-label">공연내용</label>
                                <textarea name="rm" id="rm" cols="30" rows="10" class="form-control"></textarea>
                            </div>
                            <button class="calendar_add_btn">일정등록</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- /콘텐츠 -->