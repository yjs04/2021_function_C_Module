        <!-- 비쥬얼영역 -->
        <div id="visual">
            <div class="visual_slide"><img src="/resource/image/visual1.jpg" alt="visual_img" title="visual_img"></div>
            <div id="visual_text">공개 데이터 <i class="fas fa-angle-right"></i> 무형문화재 현황 조회</div>
        </div>
        <!-- /비쥬얼영역 -->

        <!-- 콘텐츠 -->
        <div class="content">
            <!-- 무형문화재 현황 조회 -->
            <div class="container">
                <div class="content_wrap">
                    <div class="content_title_box">
                        <h5>무형문화재 현황 조회 <span>공개 데이터 <i class="fas fa-angle-right"></i> 무형문화재 현황 조회</span></h5>
                    </div>
                    <div class="content_box" id='culture_status'>
                        <div id="culture_status_header">
                            <h5>공개 데이터 사용 방법</h5>
                            <p>호출 주소 : http://localhost/openAPI/nihList.php</p>
                            <p>페이지 번호(pageNo)와 페이지당 항목수(numOfRows)를 바탕으로 계산하여 해당하는 항목만 조회됩니다.</p>
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
                                            <td>pageNo</td>
                                            <td>페이지 번호</td>
                                            <td>필수</td>
                                            <td>1</td>
                                            <td>요청 페이지 번호</td>
                                        </tr>
                                        <tr>
                                            <td>numOfRows</td>
                                            <td>페이지당 항목수</td>
                                            <td>필수</td>
                                            <td>3</td>
                                            <td>-</td>
                                        </tr>
                                        <tr>
                                            <td>bcodeName</td>
                                            <td>무형문화 종류</td>
                                            <td>-</td>
                                            <td>전통 공연</td>
                                            <td>포함(LIKE 검색)</td>
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
                                            <td>numOfRows</td>
                                            <td>페이지당 항목수</td>
                                            <td>필수</td>
                                            <td>3</td>
                                            <td>요청 항목 수</td>
                                        </tr>
                                        <tr>
                                            <td>pageNo</td>
                                            <td>페이지</td>
                                            <td>필수</td>
                                            <td>1</td>
                                            <td>요청 페이지 번호</td>
                                        </tr>
                                        <tr>
                                            <td>totalCount</td>
                                            <td>모든 항목수</td>
                                            <td>필수</td>
                                            <td>11</td>
                                            <td>-</td>
                                        </tr>
                                        <tr>
                                            <td>items</td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td>조회 결과 항목 목록(0..n)</td>
                                        </tr>
                                        <tr class="item">
                                            <td>ccbaKdcd</td>
                                            <td>종목코드</td>
                                            <td>필수</td>
                                            <td>17</td>
                                            <td></td>
                                        </tr>
                                        <tr class="item">
                                            <td>ccbaAsno</td>
                                            <td>지정번호</td>
                                            <td>필수</td>
                                            <td>170000</td>
                                            <td></td>
                                        </tr>
                                        <tr class="item">
                                            <td>ccbaCtcd</td>
                                            <td>시도코드</td>
                                            <td>필수</td>
                                            <td>11</td>
                                            <td></td>
                                        </tr>
                                        <tr class="item">
                                            <td>ccbaCpno</td>
                                            <td>연계번호</td>
                                            <td></td>
                                            <td>1271100170000</td>
                                            <td>문화재 연계번호</td>
                                        </tr>
                                        <tr class="item">
                                            <td>ccmaName</td>
                                            <td>문화재종목</td>
                                            <td>필수</td>
                                            <td>국가무형문화재</td>
                                            <td></td>
                                        </tr>
                                        <tr class="item">
                                            <td>ccbaMnm1</td>
                                            <td>문화재명(국문)</td>
                                            <td>필수</td>
                                            <td>봉산탈춤</td>
                                            <td></td>
                                        </tr>
                                        <tr class="item">
                                            <td>ccbaMnm2</td>
                                            <td>문화재명(한자)</td>
                                            <td></td>
                                            <td>鳳山탈춤</td>
                                            <td></td>
                                        </tr>
                                        <tr class="item">
                                            <td>gcodeName</td>
                                            <td>문화재분류</td>
                                            <td></td>
                                            <td>무형문화재</td>
                                            <td></td>
                                        </tr>
                                        <tr class="item">
                                            <td>bcodeName</td>
                                            <td>문화재분류2(종류)</td>
                                            <td></td>
                                            <td>전통 공연ㆍ예술</td>
                                            <td></td>
                                        </tr>
                                        <tr class="item">
                                            <td>mcodeName</td>
                                            <td>문화재분류3</td>
                                            <td></td>
                                            <td>연희</td>
                                            <td></td>
                                        </tr>
                                        <tr class="item">
                                            <td>scodeName</td>
                                            <td>문화재분류4</td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                        <tr class="item">
                                            <td>ccbaQuan</td>
                                            <td>수량</td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                        <tr class="item">
                                            <td>ccbaAsdt</td>
                                            <td>지정(등록일)</td>
                                            <td></td>
                                            <td>1967-06-16</td>
                                            <td></td>
                                        </tr>
                                        <tr class="item">
                                            <td>ccbaCtcdNm</td>
                                            <td>시도명</td>
                                            <td></td>
                                            <td>서울특별시</td>
                                            <td></td>
                                        </tr>
                                        <tr class="item">
                                            <td>ccsiName</td>
                                            <td>시군구명</td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                        <tr class="item">
                                            <td>ccbaLcad</td>
                                            <td>소재지 상세</td>
                                            <td></td>
                                            <td>서울특별시</td>
                                            <td></td>
                                        </tr>
                                        <tr class="item">
                                            <td>ccceName</td>
                                            <td>시대</td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                        <tr class="item">
                                            <td>ccbaPoss</td>
                                            <td>소유자</td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                        <tr class="item">
                                            <td>ccbaAdmin</td>
                                            <td>관리자</td>
                                            <td></td>
                                            <td>(사)봉산탈춤...</td>
                                            <td></td>
                                        </tr>
                                        <tr class="item">
                                            <td>ccbaCncl</td>
                                            <td>지정해제여부</td>
                                            <td></td>
                                            <td>N</td>
                                            <td></td>
                                        </tr>
                                        <tr class="item">
                                            <td>ccbaCndt</td>
                                            <td>지정해제일</td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                        <tr class="item">
                                            <td>image</td>
                                            <td>이미지</td>
                                            <td></td>
                                            <td>data:image/.....</td>
                                            <td></td>
                                        </tr>
                                        <tr class="item">
                                            <td>content</td>
                                            <td>설명</td>
                                            <td></td>
                                            <td>탈춤이란....</td>
                                            <td></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <!-- /무형문화재 현황 조회 -->
        </div>
        <!-- /콘텐츠 -->