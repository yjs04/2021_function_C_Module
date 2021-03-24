        <!-- 비쥬얼영역 -->
        <div id="visual">
            <div class="visual_slide"><img src="/resource/image/visual1.jpg" alt="visual_img" title="visual_img"></div>
            <div id="visual_text">무형문화재관리원 <i class="fa fa-angle-right"></i> 일반현황 <i class="fa fa-angle-right"></i> 연혁</div>
        </div>
        <!-- /비쥬얼영역 -->

        <!-- 콘텐츠 -->
        <div class="content" id="history">
            <!-- 연혁 -->
            <div class="container">
                <div class="content_wrap" id='content_history'>
                    <div class="content_title_box">
                        <h5>연혁 <span>무형문화재관리원 <i class="fa fa-angle-right"></i> 일반현황 <i class="fa fa-angle-right"></i> 연혁</span></h5>
                    </div>

                    <div class="content_box">
                        <div id="history_header">
                            <button id="history_add_btn" data-target="#history_add_popup" data-toggle="modal">연혁 등록</button>
                            <div id="history_nav">
                                <div class="history_nav_item" data-since="2021">2021년</div>
                                <div class="history_nav_item" data-since="2020">2020년</div>
                                <div class="history_nav_item" data-since="2019">2019년</div>
                                <div class="history_nav_item" data-since="2018">2018년</div>
                                <div class="history_nav_item" data-since="2017">2017년</div>
                            </div>
                        </div>

                        <div id="history_area">
                            <h5 id="history_title">2021년</h5>
                            <div id="history_list"></div>
                        </div>
                    </div>

                </div>
            </div>

            <div class="modal fade" id="history_add_popup">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">연혁 관리</h5>
                            <button class="btn-close" data-dismiss="modal"></button>
                        </div>
                        <div class="modal-body">
                            <form id="history_add_form">
                                <div class="form-group">
                                    <label for="history_content" class="form-label"><span>(*)</span>연혁내용</label>
                                    <input type="text" name="history_content" class="form-control" id="history_content">
                                </div>
                                <div class="form-group">
                                    <label for="history_date" class="form-label"><span>(*)</span>연혁일자</label>
                                    <input type="date" name="history_date" class="form-control" id="history_date" min="2017-01-01" max="2021-12-31">
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button class="modal_btn" data-dismiss="modal" id='history_add_close'>닫기</button>
                            <button class="modal_btn blue" id="history_add">저장</button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal fade" id="history_mod_popup">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">연혁 관리</h5>
                            <button class="btn-close" data-dismiss="modal"></button>
                        </div>
                        <div class="modal-body">
                            <form id="history_mod_form">
                                <div class="form-group">
                                    <label for="history_mod_content" class="form-label"><span>(*)</span>연혁내용</label>
                                    <input type="text" name="history_mod_content" class="form-control" id="history_mod_content">
                                </div>
                                <div class="form-group">
                                    <label for="history_mod_date" class="form-label"><span>(*)</span>연혁일자</label>
                                    <input type="date" name="history_mod_date" class="form-control" id="history_mod_date" min="2017-01-01" max="2021-12-31">
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button class="modal_btn" data-dismiss="modal" id="history_mod_close">닫기</button>
                            <button class="modal_btn blue" id="history_mod">저장</button>
                        </div>
                    </div>
                </div>
            </div>

            <script src="/resource/js/history.js"></script>

            <!-- /연혁 -->
        </div>
        <!-- /콘텐츠 -->