class Phone{
    constructor(){
        this.selectCate = document.querySelector(".phone_item.select").dataset.cate === null ? "전체" : document.querySelector(".phone_item.select").dataset.cate;
        this.phoneListArea = document.querySelector("#phone_list");
        this.itemList = [];
        this.itemCate = [];
        this.allList = {};
        this.setting();
    }

    async setting(){
        let {statusCd,statusMsg,totalCount,items} = await this.getPhoneData();
        if(statusCd !== "200"){
            alert(statusMsg);
            return location.href = 'index.html';
        }else{
            items.forEach(x=>{if(this.itemCate.find(cate=>cate==x.deptNm) === undefined) this.itemCate.push(x.deptNm);});
            this.itemCate.forEach(x=>{
                this.allList[x] = [];
                items.forEach(item => {if(item.deptNm == x) this.allList[x].push(item);});
            });
        }

        this.setPage();
        this.setEvent();
    }

    setPage(){
        this.itemList = this.selectCate == "전체" ? this.itemCate : this.allList[this.selectCate];
        this.phoneListArea.innerHTML = "";
        if(this.itemList){
            if(this.selectCate == "전체"){
                this.itemList.forEach(cate=>{
                    let list = this.allList[cate];
                    let dom = this.makePhoneList(cate,list);
                    this.phoneListArea.appendChild(dom);
                });
            }else{
                let dom = this.makePhoneList(this.selectCate,this.itemList);
                this.phoneListArea.appendChild(dom);
            }
        }else{
            let dom = this.makePhoneList(this.selectCate,[]);
            this.phoneListArea.appendChild(dom);
        }
    }

    setEvent(){
        document.querySelectorAll(".phone_item").forEach(x=>{x.addEventListener("click",(e)=>{this.setCate(e);})});
    }

    setCate=e=>{
        let cate = e.target.dataset.cate;

        document.querySelector(".phone_item.select").classList.remove("select");
        e.target.classList.add("select");

        this.selectCate = cate;
        this.setPage();
    }

    makePhoneList(title,data){
        let dom = document.createElement("div");
        dom.innerHTML = `<div class="phone_list_item">
                            <div class="phone_list_title">
                                <h5>${title}</h5>
                            </div>
                            <div class="phone_list_body">                                
                            </div>
                        </div>`;
        if(data.length){
            data.forEach(x=>{
                dom.querySelector(".phone_list_body").innerHTML += `<div class="phone_list_body_item">
                                                                        <span class="name">${x.name}</span>
                                                                        <span class="phone_number">${x.telNo}</span>
                                                                    </div>`;
            });
        }else{
            dom.querySelector(".phone_list_body").innerHTML += `<div class='noData'>관련 정보가 없습니다.</div>`;
        }
        return dom.firstChild;
    }

    async getPhoneData(){const res = await fetch("/restAPI/phone.php");
    return await res.json();}
}

let phone = new Phone();