import{d,a as r,f as c,m as n,r as l,c as i,b as e,g as m,w as u,l as p,o as _,h as b}from"./index.f718b679.js";const f="/assets/500-error.26f335fa.png",h="/assets/500-error-dark.de292c63.png",g={class:"d-flex flex-column flex-center flex-column-fluid"},x={class:"d-flex flex-column flex-center text-center p-10"},y={class:"card card-flush w-lg-650px py-5"},v={class:"card-body py-15 py-lg-20"},w=p('<h1 class="fw-bolder fs-2qx text-gray-900 mb-4">B\u0142\u0105d systemu</h1><div class="fw-semibold fs-6 text-gray-500 mb-7"> Co\u015B posz\u0142o nie tak! Spr\xF3buj ponownie p\xF3\u017Aniej. </div><div class="mb-11"><img src="'+f+'" class="mw-100 mh-300px theme-light-show" alt=""><img src="'+h+'" class="mw-100 mh-300px theme-dark-show" alt=""></div>',3),k={class:"mb-0"},F=d({__name:"Error500",setup(N){const t=r(),o=c(()=>t.getters.layoutConfig("general.mode")).value!=="dark"?"bg7.jpg":"bg7-dark.jpg";return n(()=>{document.body.className="";for(const s of document.body.attributes)document.body.removeAttributeNode(s);t.dispatch("addBodyClassName","bg-body"),t.dispatch("addBodyAttribute",{qualifiedName:"style",value:`background-image: url("media/auth/${o}")`})}),(s,C)=>{const a=l("router-link");return _(),i("div",g,[e("div",x,[e("div",y,[e("div",v,[w,e("div",k,[m(a,{to:"/",class:"btn btn-sm btn-primary"},{default:u(()=>[b("Powr\xF3t do strony g\u0142\xF3wnej")]),_:1})])])])])])}}});export{F as default};
