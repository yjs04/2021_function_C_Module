<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>무형문화재관리원</title>

    <script src="/resource/js/jquery-3.5.1.js"></script>
    <!-- 부트스트랩 -->
    <link rel="stylesheet" href="/resource/bootstrap/css/bootstrap.min.css">
    <script src="/resource/bootstrap/js/bootstrap.bundle.js"></script>
    <!-- /부트스트랩 -->

    <!-- 폰트어썸 -->
    <link rel="stylesheet" href="/resource/fontawesome/css/all.css">
    <!-- /폰트어썸 -->

    <!-- 스타일 -->
    <link rel="stylesheet" href="/resource/css/style.css">
    <!-- /스타일 -->

</head>
<body>
    <div id="wrap">
        <!-- 헤더 -->
        <input type="checkbox" name="menu_open" id="menu_open" hidden>
        <header class="d-flex justify-content-between align-items-center">
            <a href="/" id="logo"></a>
            <!-- 네비게이션 -->
            <nav>
                <ul class="d-flex m-0 p-0">
                    <li class="nav_dep1">
                        <a href="/">HOME</a>
                    </li>
                    <li class="nav_dep1">
                        <a href="#">무형문화재관리원</a>
                        <ul class="nav_dep2">
                            <li><a href="#">소개</a></li>
                            <li>
                                <a href="#">일반현황</a>
                                <ul class="nav_dep3">
                                    <li><a href="#">설립목적</a></li>
                                    <li><a href="/history">연혁</a></li>
                                    <li><a href="#">역할</a></li>
                                </ul>
                            </li>
                            <li><a href="#">주요업무계획</a></li>
                            <li><a href="#">조직 및 구성</a></li>
                            <li><a href="/phone">전화번호</a></li>
                        </ul>
                    </li>
                    <li class="nav_dep1">
                        <a href="/culture">무형문화재 현황</a>
                        <ul class="nav_dep2">
                            <li><a href="/culture?bcodeName=0">전통 공연ㆍ예술</a></li>
                            <li><a href="/culture?bcodeName=1">전통기술</a></li>
                            <li><a href="/culture?bcodeName=2">전통지식</a></li>
                            <li><a href="/culture?bcodeName=3">구전 전통 및 표현</a></li>
                            <li><a href="/culture?bcodeName=4">전통 생활관습</a></li>
                            <li><a href="/culture?bcodeName=5">의례ㆍ의식</a></li>
                            <li><a href="/culture?bcodeName=6">전통 놀이ㆍ무예</a></li>
                            <li><a href="/culture">전체 현황</a></li>
                        </ul>
                    </li>
                    <li class="nav_dep1">
                        <a href="#">행사 안내</a>
                        <ul class="nav_dep2">
                            <li>
                                <a href="#">공연</a>
                                <ul class="nav_dep3">
                                    <li><a href="/monthPerformance">월간 공연 일정</a></li>
                                    <li><a href="/yearPerformance">연간 공연 일정</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="#">전시</a>
                                <ul class="nav_dep3">
                                    <li><a href="#">관람 안내</a></li>
                                    <li><a href="#">전시실</a></li>
                                    <li><a href="#">디지털 체험관</a></li>
                                    <li><a href="#">기획 전시실</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="#">교육</a>
                                <ul class="nav_dep3">
                                    <li><a href="#">전문 교육</a></li>
                                    <li><a href="#">사회 교육</a></li>
                                    <li><a href="#">연간 교육일정</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li class="nav_dep1">
                        <a href="#">전승지원</a>
                        <ul class="nav_dep2">
                            <li><a href="#">공방</a></li>
                            <li><a href="#">공예품 갤러리</a></li>
                            <li><a href="#">전수교육관 현황</a></li>
                        </ul>
                    </li>
                    <li class="nav_dep1">
                        <a href="#">공개 데이터</a>
                        <ul class="nav_dep2">
                            <li><a href="/openStatus">무형문화재 현황 조회</a></li>
                            <li><a href="/openPerformance">공연 일정 조회</a></li>
                        </ul>
                    </li>
                </ul>
            </nav>
            <!-- /네비게이션 -->

            <!-- 유틸리티 -->
            <div id="util_area" class="d-flex">
                <ul class="util_menu d-flex align-items-center p-0">
                    <li><a href="#">로그인</a></li>
                    <li><a href="#">회원가입</a></li>
                    <li><a href="#">문의하기</a></li>
                </ul>
                <select id="util_language">
                    <option value="korea">한국어</option>
                    <option value="english">English</option>
                    <option value="china">中文(简体)</option>
                    <option value="japan">日本語</option>
                </select>
            </div>
            <!-- /유틸리티 -->

            <!-- 모바일 -->
            <label for="menu_open" class="main_480" id="menu_open_btn"><i class="fas fa-bars"></i></label>
            <!-- /모바일 -->
        </header>
        <!-- /헤더 -->