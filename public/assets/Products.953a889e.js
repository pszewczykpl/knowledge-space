import{_ as D,o as l,c as i,b as e,d as S,y as T,r as j,l as o,k as m,e as a,w as n,F as x,z as $,A as I,j as B,f as c,t as d,B as O}from"./index.3c8cb8ef.js";import{_ as U,S as C,D as K,E as P}from"./SearchPanel.vue_vue_type_script_setup_true_lang.f408615c.js";import{u as A,A as G,s as W}from"./DataTable.93d387ed.js";import{E as F}from"./EditIcon.1d2524a3.js";import{i as h}from"./AuthService.e7e3c151.js";const H={name:"ViewIcon"},M={width:"16",height:"15",viewBox:"0 0 16 15",fill:"none",xmlns:"http://www.w3.org/2000/svg"},R=e("rect",{y:"6",width:"16",height:"3",rx:"1.5",fill:"currentColor"},null,-1),Z=e("rect",{opacity:"0.3",y:"12",width:"8",height:"3",rx:"1.5",fill:"currentColor"},null,-1),q=e("rect",{opacity:"0.3",width:"12",height:"3",rx:"1.5",fill:"currentColor"},null,-1),J=[R,Z,q];function Q(E,v,p,f,y,N){return l(),i("svg",M,J)}const X=D(H,[["render",Q]]),Y={key:0},ee={class:"d-flex align-items-center position-relative my-1"},te={class:"svg-icon svg-icon-1 position-absolute ms-6"},oe={class:"svg-icon svg-icon-muted"},ne={class:"col-lg-3"},se={class:"d-flex align-items-center position-relative"},ae={class:"svg-icon svg-icon-1 position-absolute ms-6"},le=["onUpdate:modelValue","placeholder"],ce={class:"col-lg-3"},de={class:"nav-group nav-group-fluid"},ie=e("input",{type:"radio",class:"btn-check",name:"type",checked:""},null,-1),re=e("input",{type:"radio",class:"btn-check",name:"type",value:"users"},null,-1),ue=e("input",{type:"radio",class:"btn-check",name:"type",value:"orders"},null,-1),me={key:0,class:"d-flex justify-content-end"},pe={class:"svg-icon svg-icon-muted svg-icon-1"},_e={key:1,class:"d-flex justify-content-end align-items-center"},be={class:"fw-bolder me-5"},ge={class:"me-2"},he={class:"badge badge-light-success fw-bold badge-lg"},ve={class:"badge badge-light-success fw-bold badge-lg"},fe={class:"svg-icon svg-icon-muted svg-icon-3"},ye={class:"svg-icon svg-icon-muted svg-icon-3"},ke={key:1,class:"btn btn-light btn-sm btn-icon btn-active-light-primary me-2","data-kt-menu-trigger":"click","data-kt-menu-placement":"bottom-end","data-kt-menu-flip":"top-end"},we={class:"svg-icon svg-icon-muted svg-icon-3"},xe={class:"menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-bold fs-7 w-125px py-4","data-kt-menu":"true"},$e={class:"menu-item px-3"},Ie=["onClick"],Le=S({__name:"Products",setup(E){const v=T([{columnName:"Nazwa produktu",columnLabel:"name",sortEnabled:!0,columnWidth:300},{columnName:"Kod TOiL",columnLabel:"code_toil",sortEnabled:!0},{columnName:"Kod produktu",columnLabel:"code",sortEnabled:!0},{columnName:"Dystrybutor",columnLabel:"partner_name",sortEnabled:!0},{columnName:"Grupa produktowa",columnLabel:"group_code",sortEnabled:!0},{columnName:"Rodzaj",columnLabel:"kind",sortEnabled:!0},{columnName:"Akcje",columnLabel:"actions",sortEnabled:!1}]),p=[{name:"Nazwa produktu",code:"name"},{name:"Kod TOiL",code:"code_toil"},{name:"Kod OWU",code:"code_owu"},{name:"Kod produktu",code:"code"},{name:"Grupa produktowa",code:"group_code"},{name:"Nazwa partnera",code:"partner_name"},{name:"Kod partnera",code:"partner_code"}],{loading:f,dataTable:y,initDataTable:N,selectedIds:k,search:r,onItemSelect:z,searchI:_,deleteElements:V,deleteElement:L}=A("products","product",p),b=w=>{r.value.type=w,_()};return(w,s)=>{const u=j("router-link");return l(),i(x,null,[o(f)?(l(),i("div",Y," \u0141adowanie... ")):m("",!0),a(U,{search:""},{title:n(()=>[e("div",ee,[e("span",te,[e("span",oe,[a(C)])]),$(e("input",{type:"text","onUpdate:modelValue":s[0]||(s[0]=t=>o(r).global=t),onInput:s[1]||(s[1]=t=>o(_)()),class:"form-control form-control-solid w-250px ps-15",placeholder:"Szukaj..."},null,544),[[I,o(r).global]])])]),search:n(()=>[(l(),i(x,null,B(p,t=>e("div",ne,[e("div",se,[e("span",ae,[a(C)]),$(e("input",{type:"text","onUpdate:modelValue":g=>o(r)[t.code]=g,onInput:s[2]||(s[2]=g=>o(_)()),class:"form-control form-control-solid ps-15",placeholder:t.name},null,40,le),[[I,o(r)[t.code]]])])])),64)),e("div",ce,[e("div",de,[e("label",null,[ie,e("span",{onClick:s[3]||(s[3]=t=>b("")),class:"btn btn-sm btn-color-muted btn-active btn-active-primary fw-bold px-4"},"Wszystkie")]),e("label",null,[re,e("span",{onClick:s[4]||(s[4]=t=>b("Indywidualny")),class:"btn btn-sm btn-color-muted btn-active btn-active-primary fw-bold px-4"},"Indywidualne")]),e("label",null,[ue,e("span",{onClick:s[5]||(s[5]=t=>b("Grupowy")),class:"btn btn-sm btn-color-muted btn-active btn-active-primary fw-bold px-4"},"Grupowe")])])])]),toolbar:n(()=>[o(k).length===0?(l(),i("div",me,[a(u,{to:{name:"ProductCreate"},class:"btn btn-primary"},{default:n(()=>[e("span",pe,[a(G)]),c(" Dodaj produkt ")]),_:1})])):(l(),i("div",_e,[e("div",be,[e("span",ge,d(o(k).length),1),c("Zaznaczonych ")]),o(h)?(l(),i("button",{key:0,type:"button",class:"btn btn-danger",onClick:s[6]||(s[6]=t=>o(V)())},"Usu\u0144 zaznaczone")):m("",!0)]))]),default:n(()=>[a(K,{onOnSort:o(W),onOnItemsSelect:o(z),data:o(y),header:v.value,"enable-items-per-page-dropdown":!0,"checkbox-enabled":!0,"checkbox-label":"id"},{name:n(({row:t})=>[a(u,{to:{name:"ProductView",params:{id:t.id}},class:"text-gray-600 text-hover-primary mb-1"},{default:n(()=>[c(d(t.name),1)]),_:2},1032,["to"])]),code_toil:n(({row:t})=>[c(d(t.code_toil),1)]),code:n(({row:t})=>[c(d(t.code),1)]),partner_name:n(({row:t})=>[e("div",he,d(t.partner_code),1),c(" "+d(t.partner_name),1)]),group_code:n(({row:t})=>[c(d(t.group_code),1)]),kind:n(({row:t})=>[e("div",ve,d(t.kind),1)]),actions:n(({row:t})=>[a(u,{to:{name:"ProductView",params:{id:t.id}},class:"btn btn-sm btn-light btn-active-light-primary me-2"},{default:n(()=>[e("span",fe,[a(X)]),c("Wy\u015Bwietl ")]),_:2},1032,["to"]),o(h)?(l(),O(u,{key:0,to:{name:"ProductUpdate",params:{id:t.id}},class:"btn btn-light btn-sm btn-icon btn-active-light-primary me-2"},{default:n(()=>[e("span",ye,[a(F)])]),_:2},1032,["to"])):m("",!0),o(h)?(l(),i("a",ke,[e("span",we,[a(P)])])):m("",!0),e("div",xe,[e("div",$e,[e("a",{onClick:g=>o(L)(t.id),class:"menu-link px-3"},"Usu\u0144",8,Ie)])])]),_:1},8,["onOnSort","onOnItemsSelect","data","header"])]),_:1})],64)}}});export{Le as default};