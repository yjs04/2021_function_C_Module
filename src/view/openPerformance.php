        <!-- 비쥬얼영역 -->
        <div id="visual">
            <div class="visual_slide"><img src="/resource/image/visual1.jpg" alt="visual_img" title="visual_img"></div>
            <div id="visual_text">공개 데이터 <i class="fas fa-angle-right"></i> 공연 일정 조회</div>
        </div>
        <!-- /비쥬얼영역 -->

        <!-- 콘텐츠 -->
        <div class="content">
            <!-- 공개 데이터-->
            <div class="container">
                <div class="content_wrap">
                    <div class="content_title_box">
                        <h5>공연 일정 조회<span>공개 데이터 <i class="fas fa-angle-right"></i> 공연 일정 조회</span></h5>
                    </div>
                    <div class="content_box" id='culture_status'>
                        <div id="culture_status_header">
                            <h5>공개 데이터 사용 방법</h5>
                            <p>호출 주소 : http://localhost/openAPI/showList.php</p>
                            <p>년/월 구분 값을 바탕으로 공연일의 해당 년도, 또는 해당 월의 데이터가 조회됩니다.</p>
                        </div>
                        <div id="culture_status_body">
                            <div class="culture_status_box">
                                <h5 class="culture_status_title">요청변수</h5>
                                <table class="culture_status_table">
                                    <thead>
                                        <tr>
                                            <th>항목명</th>
                                            <th>국문명</th>
                                            <th>필수</th>
                                            <th>샘플</th>
                                            <th>항목설명</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>searchType</td>
                                            <td>조회 구분</td>
                                            <td>필수</td>
                                            <td>M</td>
                                            <td>M:월별, Y:년도별</td>
                                        </tr>
                                        <tr>
                                            <td>year</td>
                                            <td>년도</td>
                                            <td>필수</td>
                                            <td>2021</td>
                                            <td>4자리 년도</td>
                                        </tr>
                                        <tr>
                                            <td>month</td>
                                            <td>월</td>
                                            <td>가변</td>
                                            <td>4</td>
                                            <td>월별 조회 시 필수(1~12)</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>

                            <div class="culture_status_box">
                                <h5 class="culture_status_title">응답변수</h5>
                                <table class="culture_status_table">
                                    <thead>
                                        <tr>
                                            <th>항목명</th>
                                            <th>국문명</th>
                                            <th>필수</th>
                                            <th>샘플</th>
                                            <th>항목설명</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>showType</td>
                                            <td>공연 종류</td>
                                            <td>필수</td>
                                            <td>M</td>
                                            <td>요청 공연 종류</td>
                                        </tr>
                                        <tr>
                                            <td>year</td>
                                            <td>년도</td>
                                            <td>필수</td>
                                            <td>2021</td>
                                            <td>요청 년도</td>
                                        </tr>
                                        <tr>
                                            <td>month</td>
                                            <td>월</td>
                                            <td>가변</td>
                                            <td>4</td>
                                            <td>요청 월</td>
                                        </tr>
                                        <tr>
                                            <td>totalCount</td>
                                            <td>항목수</td>
                                            <td>필수</td>
                                            <td>17</td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td>items</td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td>조회 결과 항목 목록(0..n)</td>
                                        </tr>
                                        <tr class="item">
                                            <td>showUid</td>
                                            <td>공연 고유번호</td>
                                            <td>필수</td>
                                            <td>1</td>
                                            <td></td>
                                        </tr>
                                        <tr class="item">
                                            <td>showName</td>
                                            <td>공연명</td>
                                            <td>필수</td>
                                            <td>신노이</td>
                                            <td></td>
                                        </tr>
                                        <tr class="item">
                                            <td>showDt</td>
                                            <td>공연일시</td>
                                            <td>필수</td>
                                            <td>2018-01-01 14:00</td>
                                            <td>공연일자 + 공연일시</td>
                                        </tr>
                                        <tr class="item">
                                            <td>organizer</td>
                                            <td>주관</td>
                                            <td></td>
                                            <td>무형문화재관리원</td>
                                            <td></td>
                                        </tr>
                                        <tr class="item">
                                            <td>place</td>
                                            <td>공연장소</td>
                                            <td></td>
                                            <td>얼쑤마루</td>
                                            <td></td>
                                        </tr>
                                        <tr class="item">
                                            <td>cast</td>
                                            <td>출연진</td>
                                            <td></td>
                                            <td>미정</td>
                                            <td></td>
                                        </tr>
                                        <tr class="item">
                                            <td>rm</td>
                                            <td>공연내용</td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /공개 데이터-->
        </div>
        <!-- /콘텐츠 -->