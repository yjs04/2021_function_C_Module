class History{
    constructor(){
        this.selSince = this.getLocal("selSince") === null ? new Date().getFullYear() : this.getLocal("selSince");
        this.historyList = this.getLocal("since"+this.selSince) === null ? [] : this.getLocal("since"+this.selSince);
        this.historyTitle = document.querySelector("#history_title");
        this.historyArea = document.querySelector("#history_list");
        this.historyNav = document.querySelectorAll(".history_nav_item");
        this.setEvent();
        this.setPage();
    }

    // localstorage 의 데이터 입력/출력
    setLocal(key,data){localStorage.setItem(key,JSON.stringify(data));}
    getLocal(key){return JSON.parse(localStorage.getItem(key));}

    // 이벤트 연결
    setEvent(){
        this.historyNav.forEach(item =>{item.addEventListener("click",this.changeSince);});
        $("#history_add").on("click",()=>{this.historyAdd()});
        $("#history_mod").on("click",(e)=>{this.historyModProcess(e);});
    }

    // 연혁 수정
    historyModProcess=e=>{
        let idx = e.target.dataset.idx;
        let form = document.querySelector("#history_mod_form");
        let date = form.history_mod_date.value, content = form.history_mod_content.value;
        let day = date.split("-")[1]+"."+date.split("-")[2];

        if(date == "" || content == "") return alert("내용을 입력해주세요");

        this.historyList[idx] = {date:day,content:content};
        this.historyList.sort((a,b)=>{if(a.date.replace(/\./g,"-") > b.date.replace(/\./g,"-")) return 1; else return -1;});
        this.setLocal(`since${this.selSince}`,this.historyList);

        $("#history_mod_close").click();
        alert("연혁이 수정되었습니다.");
        this.setPage();
    }

    // 연혁 추가
    historyAdd(){
        let form = document.querySelector("#history_add_form");
        let date = form.history_date.value, content = form.history_content.value;
        let year = date.split("-")[0], day = date.split("-")[1]+"."+date.split("-")[2];
        let list = this.getLocal(`since${year}`) == null ? [] : this.getLocal(`since${year}`);

        if(date == "" || content == "") return alert("내용을 입력해주세요");
        
        list.push({date:day,content:content}); 
        list.sort((a,b)=>{if(a.date.replace(/\./g,"-") > b.date.replace(/\./g,"-")) return 1; else return -1;});
        this.setLocal(`since${year}`,list);

        form.history_date.value = "";
        form.history_content.value = "";

        $("#history_add_close").click();
        alert("연혁이 등록되었습니다.");
        this.historyList = this.getLocal(`since${this.selSince}`) == null ? [] : this.getLocal(`since${this.selSince}`);
        this.setPage();
    }

    // 연혁 삭제
    historyDel=e=>{
        if(!confirm("해당 연혁을 삭제하시겠습니까?")) return false;
        let idx = e.target.dataset.idx;
        this.historyList.splice(idx,1);
        this.setLocal(`since${this.selSince}`,this.historyList);
        this.setPage();
    }

    // 연혁 수정 설정
    historyMod=e=>{
        let idx = e.target.dataset.idx;
        let date = `${this.selSince}-${this.historyList[idx].date.replace(/\./g,"-")}`;
        let content = this.historyList[idx].content;

        document.querySelector("#history_mod_date").value = date;
        document.querySelector("#history_mod_content").value = content;
        document.querySelector("#history_mod").setAttribute("data-idx",idx);
    }

    // 연혁 페이지 세팅
    setPage(){
        document.querySelector(`.history_nav_item[data-since='${this.selSince}']`).classList.add("select");
        this.historyTitle.innerHTML = this.selSince+'년';
        this.historyArea.innerHTML = '';
        if(this.historyList.length){
            this.historyList.forEach((item,idx) =>{
                let dom = this.makeHistoryItem(idx,item.date,item.content);
                dom.querySelector(".history_del_btn").addEventListener("click",this.historyDel);
                dom.querySelector(".history_mod_btn").addEventListener("click",this.historyMod);
                this.historyArea.appendChild(dom);
            });
        }else this.historyArea.innerHTML = `<div class="noData">해당 정보가 없습니다.</div>`;
    }

    // 연혁 연도 바꾸기
    changeSince=e=>{
        let since = e.target.dataset.since;
        document.querySelector(".history_nav_item.select").classList.remove("select");
        e.target.classList.add("select");
        this.historyList = this.getLocal(`since${since}`) === null ? [] : this.getLocal(`since${since}`);
        this.setLocal("selSince",since);
        this.selSince = since;
        this.setPage();
    }

    // 연혁 아이템 생성
    makeHistoryItem(idx,date,content){
        let dom = document.createElement("div");
        dom.innerHTML = `<div class="history_item">
                            <div class="history_item_body">
                                <span class="history_item_since">${date}</span>
                                <p class="history_item_content">${content}</p>
                            </div>

                            <div class="history_buttons_box">
                                <button class="history_btn history_mod_btn" data-bs-toggle="modal" data-bs-target="#history_mod_popup" data-idx="${idx}">수정</button>
                                <button class="history_btn history_del_btn" data-idx="${idx}">삭제</button>
                            </div>
                        </div>`;
        return dom.firstChild;
    }
}

let history = new History();