        <!-- 비쥬얼영역 -->
        <div id="visual">
        <div class="visual_slide"><img src="/resource/image/visual1.jpg" alt="visual_img" title="visual_img"></div>
            <div id="visual_text">무형문화재 현황<i class="fa fa-angle-right"></i> 무형문화재 등록</div>
        </div>
        <!-- /비쥬얼영역 -->

        <!-- 콘텐츠 -->
        <div class="content">
            <div class="container">
                <div class="content_wrap" id="add_culture">
                    <div class="content_title_box">
                        <h5>무형문화재 등록 <span>무형문화재 현황 <i class="fa fa-angle-right"></i> 무형문화재 등록</span></h5>
                    </div>
                    <div class="content_box">
                        <form action="/addCultureProccess" method="post" class='mb-4' id="addCultureProccess" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="no" class="form-label"><span>(*)</span>고유 키값</label>
                                <input type="text" id="no" name="no" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="ccmaName" class="form-label"><span>(*)</span>문화재종목</label>
                                <input type="text" id="ccmaName" name="ccmaName" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="crltsnoNm" class="form-label"><span>(*)</span>지정호수</label>
                                <input type="text" id="crltsnoNm" name="crltsnoNm" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="ccbaMnm1" class="form-label"><span>(*)</span>문화재명</label>
                                <input type="text" id="ccbaMnm1" name="ccbaMnm1" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="ccbaMnm2" class="form-label">문화재명(한자)</label>
                                <input type="text" id="ccbaMnm2" name="ccbaMnm2" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="ccbaCtcdNm" class="form-label">시도명</label>
                                <input type="text" id="ccbaCtcdNm" name="ccbaCtcdNm" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="ccsiName" class="form-label">시군구명</label>
                                <input type="text" id="ccsiName" name="ccsiName" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="ccbaAdmin" class="form-label">관리자</label>
                                <input type="text" id="ccbaAdmin" name="ccbaAdmin" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="ccbaKdcd" class="form-label"><span>(*)</span>종목코드</label>
                                <input type="text" id="ccbaKdcd" name="ccbaKdcd" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="ccbaCtcd" class="form-label"><span>(*)</span>시도코드</label>
                                <input type="text" id="ccbaCtcd" name="ccbaCtcd" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="ccbaAsno" class="form-label"><span>(*)</span>지정번호</label>
                                <input type="text" id="ccbaAsno" name="ccbaAsno" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="ccbaCncl" class="form-label">지정해제여부</label>
                                <input type="text" id="ccbaCncl" name="ccbaCncl" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="ccbaCpno" class="form-label">문화재연계번호</label>
                                <input type="text" id="ccbaCpno" name="ccbaCpno" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="longitude" class="form-label">경도</label>
                                <input type="text" id="longitude" name="longitude" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="latitude" class="form-label">위도</label>
                                <input type="text" id="latitude" name="latitude" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="gcodeName" class="form-label">문화재분류</label>
                                <input type="text" id="gcodeName" name="gcodeName" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="bcodeName" class="form-label">문화재분류2(종류)</label>
                                <select name="bcodeName" id="bcodeName" class="form-control">
                                    <option value="">값을 선택해주세요.</option>
                                    <option value="전통 공연·예술">전통 공연·예술</option>
                                    <option value="전통기술">전통기술</option>
                                    <option value="전통지식">전통지식</option>
                                    <option value="구전 전통 및 표현">구전 전통 및 표현</option>
                                    <option value="전통 생활관습">전통 생활관습</option>
                                    <option value="의례·의식">의례·의식</option>
                                    <option value="전통 놀이·무예">전통 놀이·무예</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="mcodeName" class="form-label">문화재분류3</label>
                                <input type="text" id="mcodeName" name="mcodeName" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="scodeName" class="form-label">문화재분류4</label>
                                <input type="text" id="scodeName" name="scodeName" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="ccbaQuan" class="form-label">수량</label>
                                <input type="text" id="ccbaQuan" name="ccbaQuan" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="ccbaAsdt" class="form-label">지정(등록일)</label>
                                <input type="date" id="ccbaAsdt" name="ccbaAsdt" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="ccbaLcad" class="form-label">소재지 상세</label>
                                <input type="text" id="ccbaLcad" name="ccbaLcad" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="ccceName" class="form-label">시대</label>
                                <input type="text" id="ccceName" name="ccceName" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="ccbaPoss" class="form-label">소유자</label>
                                <input type="text" id="ccbaPoss" name="ccbaPoss" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="ccbaCndt" class="form-label">지정해제일</label>
                                <input type="date" id="ccbaCndt" name="ccbaCndt" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="image" class="form-label">이미지</label>
                                <input type="file" id="image" name="image" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="content" class="form-label">설명</label>
                                <textarea name="content" id="content" class="form-control" cols="30" rows="10"></textarea>
                            </div>
                            <button class="calendar_add_btn mt-2">무형문화재 등록</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- /콘텐츠 -->