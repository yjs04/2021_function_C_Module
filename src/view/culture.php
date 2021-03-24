        <!-- 비쥬얼영역 -->
        <div id="visual">
            <div class="visual_slide"><img src="/resource/image/visual1.jpg" alt="visual_img" title="visual_img"></div>
            <div id="visual_text">무형문화재 현황</div>
        </div>
        <!-- /비쥬얼영역 -->

        <!-- 콘텐츠 -->
        <div class="content">
            <!-- 무형문화재 현황 -->
            <div class="container">
                <div class="content_wrap" id='culture_status'>
                    <div class="content_title_box">
                        <h5>무형문화재 현황 <span>무형문화재 현황 <i class="fas fa-angle-right"></i> <?=$data['cate']?></span></h5>
                    </div>
                    <div class="content_box">
                        
                        <div id="culture_header">
                            <div id="culture_page_info">
                                <p id="culture_all_page">총 <span><?=count($data['list']['data'])?></span>건</p>
                                <p id="culture_page"><span class="now"><?=$data['list']['page']?></span>p / <span class="all"><?=$data['list']['totalPage']?></span>p</p>
                            </div>
                            <div id="culture_list_type">
                                <button class="calendar_add_btn position-relative mr-2" id="culture_add_btn">무형문화재 등록</button>
                                <button class="culture_list_btn <?=$data['type'] == 'list' ? '' : 'select'?>" id="album_btn" data-href="/culture?<?=isset($_GET['page']) ? 'page='.$_GET['page'].'&' : ''?><?=$data['bcodeName'] !== '' ? 'bcodeName='.$data['bcodeName'].'&' : ''?>type=album">앨범</button>
                                <button class="culture_list_btn <?=$data['type'] !== 'list' ? '' : 'select'?>" id="list_btn" data-href="/culture?<?=isset($_GET['page']) ? 'page='.$_GET['page'].'&' : ''?><?=$data['bcodeName'] !== '' ? 'bcodeName='.$data['bcodeName'].'&' : ''?>type=list">목록</button>
                            </div>
                        </div>

                        <div id="culture_body" class="<?=$data['type']?>">
                        <?php if(count($data['list']['items'])):?>
                            <?php foreach($data['list']['items'] as $item):?>
                            <?php if($data['type'] == 'list'):?>
                            <div class="culture_list" data-id="<?=$item->sn?>">
                                <span class="culture_list_idx"><?=$item->sn?></span>
                                <p class="culture_list_cate"><?=$item->ccmaName?></p>
                                <p class="culture_list_title"><?=$item->ccbaMnm1?></p>
                                <p class="culture_list_area"><?=$item->ccbaCtcdNm?></p>
                                <p class="culture_list_admin"><?=$item->ccbaAdmin?></p>
                            </div>
                            <?php else:?>
                            <div class="culture_item" data-id="<?=$item->sn?>">
                                <div class="culture_item_img">
                                    <?php if($item->image !== ""): ?>
                                    <img src="/image?name=<?=$item->image?>" alt="culture_img" title="culture_img">
                                    <?php else:?>
                                    no Image
                                    <?php endif;?>
                                </div>
                                <p class="culture_item_title"><?=$item->ccbaMnm1?></p>
                            </div>
                            <?php endif;?>
                            <?php endforeach;?>
                        <?php else:?>
                            <div class="noData">관련 정보가 없습니다.</div>
                        <?php endif;?>
                        </div>

                        <div id="culture_footer">
                            <div id="culture_buttons">
                                <?php for($i = $data['list']['start']; $i <= $data['list']['end']; $i++):?>
                                <button class="culture_btn <?=$i == $data['list']['page'] ? 'select' : ''?>" data-href="/culture?<?=$data['bcodeName'] !== '' ? 'bcodeName='.$data['bcodeName'].'&':''?><?=isset($_GET['type']) ? 'type='.$_GET['type'].'&' : ''?>page=<?=$i?>"><?=$i?></button>
                                <?php endfor;?>
                            </div>
                            <div id="culture_pagination_buttons">
                                <div id="culture_page_prev">
                                    <?php if($data['list']['prevBlock']):?>
                                    <button class="culture_btn" id="culture_prev_block_btn" data-href="/culture?<?=$data['bcodeName'] !== '' ? 'bcodeName='.$data['bcodeName'].'&':''?><?=isset($_GET['type']) ? 'type='.$_GET['type'].'&' : ''?>page=<?=$data['list']['start'] - 1?>"><i class="fas fa-angle-double-left"></i></button>
                                    <?php endif;?>
                                    <?php if($data['list']['prev']):?>
                                    <button class="culture_btn" id="culture_prev_btn" data-href="/culture?<?=$data['bcodeName'] !== '' ? 'bcodeName='.$data['bcodeName'].'&':''?><?=isset($_GET['type']) ? 'type='.$_GET['type'].'&' : ''?>page=<?=$data['list']['page'] - 1?>"><i class="fas fa-angle-left"></i></button>
                                    <?php endif;?>
                                </div>
                                <div id="culture_page_next">
                                    <?php if($data['list']['next']):?>
                                    <button class="culture_btn" id="culture_next_btn" data-href="/culture?<?=$data['bcodeName'] !== '' ? 'bcodeName='.$data['bcodeName'].'&':''?><?=isset($_GET['type']) ? 'type='.$_GET['type'].'&' : ''?>page=<?=$data['list']['page'] + 1?>"><i class="fas fa-angle-right"></i></button>
                                    <?php endif;?>
                                    <?php if($data['list']['nextBlock']):?>
                                    <button class="culture_btn" id="culture_next_block_btn" data-href="/culture?<?=$data['bcodeName'] !== '' ? 'bcodeName='.$data['bcodeName'].'&':''?><?=isset($_GET['type']) ? 'type='.$_GET['type'].'&' : ''?>page=<?=$data['list']['end'] + 1?>"><i class="fas fa-angle-double-right"></i></button>
                                    <?php endif;?>
                                </div>
                            </div>
                        </div>

                        <!-- <script src="/resource/js/culture.js"></script> -->

                    </div>
                </div>
            </div>
            <!-- /무형문화재 현황 -->
        </div>
        <!-- /콘텐츠 -->

        <script>
            document.querySelectorAll(".culture_list_btn").forEach(x=>{x.addEventListener("click",e=>{location.href=e.target.dataset.href;})});
            document.querySelectorAll(".culture_btn").forEach(x=>{x.addEventListener("click",e=>{location.href=e.target.dataset.href;})});
            document.querySelector("#culture_add_btn").addEventListener("click",()=>{location.href='/addCulture';});
            document.querySelectorAll(".culture_item").forEach(x=>{
                x.addEventListener("click",e=>{
                    let idx = e.currentTarget.dataset.id;
                    if(!e.target.classList.contains("culture_item")) location.href = `/modCulture/${idx}`;
                    else location.href = `/cultureLook/${idx}`;
                });
            });
            document.querySelectorAll(".culture_list").forEach(x=>{
                x.addEventListener("click",e=>{
                    let id = e.currentTarget.dataset.id;
                    if(!e.target.classList.contains("culture_list_title")) location.href= `/cultureLook/${id}`;
                    else location.href = `/modCulture/${idx}`;
                });
            })
        </script>