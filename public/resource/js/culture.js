class Culture{
    constructor(){
        this.list = [];
        this.listArea = document.querySelector("#culture_body");

        this.pageNumArea = document.querySelector("#culture_buttons");
        this.page = 1;
        this.pageNum = 1;
        this.totalPage = 1;

        this.pageBlock = 10;
        this.listNum = 8;

        this.prev = true;
        this.prev_block = true;
        this.next = true;
        this.next_block = true;

        this.start = 0;
        this.end = 0;

        this.AllList = [];
        this.AllListCnt = 0;

        this.setting();
    }

    async setting(){
        this.AllList = await this.getXml();

        let prev_btn = $("#culture_prev_btn");
        let next_btn = $("#culture_next_btn");
        let prev_block_btn = $("#culture_prev_block_btn");
        let next_block_btn = $("#culture_next_block_btn");
        
        if(prev_block_btn) prev_block_btn.on("click",()=>{this.page = this.start - this.pageBlock; this.setPagenation()});
        if(prev_btn) prev_btn.on("click",()=>{this.page -= 1; this.setPagenation()});
        if(next_block_btn) next_block_btn.on("click",()=>{this.page = this.start + this.pageBlock; this.setPagenation()});
        if(next_btn) next_btn.on("click",()=>{this.page+=1; this.setPagenation()});
        
        this.setPagenation();
    }

    setPagenation(){
        this.AllListCnt = this.AllList.length;

        this.totalPage = Math.ceil(this.AllListCnt / this.listNum);

        this.block = Math.ceil(this.page / this.pageBlock);
        this.end = this.block * this.pageBlock;
        this.start = this.end - this.pageBlock + 1;

        this.next = true;
        this.prev = true;
        this.next_block = true;
        this.prev_block = true;

        if(this.end >= this.totalPage){
            this.end = this.totalPage;
            this.next_block = false;
        }

        if(this.start <= 1){
            this.start = 1;
            this.prev_block = false;
        }

        this.prev = this.page - 1 <  1 ? false : true;
        this.next = this.page + 1 > this.totalPage ? false : true;

        this.list = this.AllList.slice((this.page - 1) * this.listNum,(this.page - 1) * this.listNum + this.listNum);

        document.querySelector("#culture_all_page > span").innerHTML = this.AllListCnt;
        document.querySelector("#culture_page .now").innerHTML = this.page;
        document.querySelector("#culture_page .all").innerHTML = this.totalPage;

        this.setPage();
        this.setPageBtn();
    }

    setPageBtn(){
        let prev_btn = $("#culture_prev_btn");
        let next_btn = $("#culture_next_btn");
        let prev_block_btn = $("#culture_prev_block_btn");
        let next_block_btn = $("#culture_next_block_btn");

        if(!this.prev) prev_btn.css({"display":"none"});
        else prev_btn.css({"display":"block"});
        if(!this.next) next_btn.css({"display":"none"});
        else next_btn.css({"display":"block"});
        if(!this.prev_block) prev_block_btn.css({"display":"none"});
        else prev_block_btn.css({"display":"block"});
        if(!this.next_block) next_block_btn.css({"display":"none"});
        else next_block_btn.css({"display":"block"});

        this.pageNumArea.innerHTML = "";
        for(let i = this.start; i <= this.end; i++){
            let dom = document.createElement("div");
            dom.innerHTML = `<button class="culture_btn ${i == this.page ? "select" : ""}">${i}</button>`;
            dom.querySelector(".culture_btn").addEventListener("click",(e)=>{this.page = parseInt(e.target.innerHTML); this.setPagenation()});
            this.pageNumArea.appendChild(dom.firstChild);
        }
    }

    setPage(){
        this.listArea.innerHTML = "";
        if(this.list.length){
            this.list.forEach((x)=>{
                let dom = this.makeCultureItem(x);
                this.listArea.appendChild(dom);
            });
        }else this.listArea.innerHTML = "<div class='noData'>관련 정보가 없습니다.</div>";
    }

    makeCultureItem({id,culture_name,culture_image}){
        let dom = document.createElement("div");
        dom.innerHTML = `<div class="culture_item" data-id="${id}">
                            <div class="culture_item_img">                                
                            </div>
                            <p class="culture_item_title">${culture_name}</p>
                        </div>`;
        if(culture_image !== "/xml/nihcImage/") dom.querySelector(".culture_item_img").innerHTML = `<img src="${culture_image}" src="culture_image">`;
        else dom.querySelector(".culture_item_img").innerHTML = "no image";
        return dom.firstChild;
    }

    getXml(){
        return fetch("/xml/nihList.xml")
                .then(res => res.text())
                .then(async xmlText =>{
                    let parser = new DOMParser();
                    let xml = parser.parseFromString(xmlText,"text/xml");

                    let cultures = Array.from(xml.querySelectorAll("item")).map(culture=>({
                        id:parseInt(culture.querySelector("sn").innerHTML),
                        culture_name:(culture.querySelector("ccbaMnm1").innerHTML.replace(/<!\[CDATA\[/g,"")).replace(/]]>/,""),
                        type_code:culture.querySelector("ccbaKdcd").innerHTML,
                        city_code:culture.querySelector("ccbaCtcd").innerHTML,
                        culture_num:culture.querySelector("ccbaAsno").innerHTML,
                    }));

                    console.log(cultures);

                    for(let i = 0; i < cultures.length; i++){
                        let item = cultures[i];
                        item.culture_image = await this.getXmlDetail(`/xml/detail/${item.type_code}_${item.city_code}_${item.culture_num}.xml`);
                    }

                    return cultures;
                });
    }

    getXmlDetail(url){
        return fetch(url)
        .then(res=>res.text())
        .then(xml =>{
            let parser = new DOMParser();
            let html = parser.parseFromString(xml,"text/xml");
            let item = html.querySelector("item");
            return `/xml/nihcImage/${item.querySelector("imageUrl").innerHTML}`;
        });
    }
}

let culture = new Culture();