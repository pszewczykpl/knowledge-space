import{d as k,y,r as x,c as i,k as t,j as C,g as s,w as o,F as w,o as l,b as e,z as E,A as I,h as c,t as d}from"./index.01a7ca81.js";import{_ as S,D as z,E as N}from"./SearchPanel.vue_vue_type_script_setup_true_lang.a26798f8.js";import{u as D,A as j,s as F}from"./DataTable.d8267ba6.js";import{S as T}from"./SearchIcon.0a2d9cf1.js";import{E as V}from"./EditIcon.6649f0e9.js";const A={key:0},O={class:"d-flex align-items-center position-relative my-1"},U={class:"svg-icon svg-icon-1 position-absolute ms-6"},$={class:"svg-icon svg-icon-muted"},B={key:0,class:"d-flex justify-content-end"},L={class:"svg-icon svg-icon-muted svg-icon-1"},H={key:1,class:"d-flex justify-content-end align-items-center"},M={class:"fw-bolder me-5"},P={class:"me-2"},Z={class:"svg-icon svg-icon-muted svg-icon-3"},q={class:"btn btn-light btn-sm btn-icon btn-active-light-primary me-2","data-kt-menu-trigger":"click","data-kt-menu-placement":"bottom-end","data-kt-menu-flip":"top-end"},G={class:"svg-icon svg-icon-muted svg-icon-3"},J={class:"menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-bold fs-7 w-125px py-4","data-kt-menu":"true"},K={class:"menu-item px-3"},Q=["onClick"],ae=k({__name:"FileCategories",setup(R){const p=y([{columnName:"Nazwa",columnLabel:"name",sortEnabled:!0},{columnName:"Prefix",columnLabel:"prefix",sortEnabled:!0},{columnName:"Akcje",columnLabel:"actions",sortEnabled:!1}]),{loading:b,dataTable:_,initDataTable:W,selectedIds:r,search:m,onItemSelect:g,searchI:f,deleteElements:v,deleteElement:h}=D("fileCategories","fileCategory");return(X,a)=>{const u=x("router-link");return l(),i(w,null,[t(b)?(l(),i("div",A," \u0141adowanie... ")):C("",!0),s(S,null,{title:o(()=>[e("div",O,[e("span",U,[e("span",$,[s(T)])]),E(e("input",{type:"text","onUpdate:modelValue":a[0]||(a[0]=n=>t(m).global=n),onInput:a[1]||(a[1]=n=>t(f)()),class:"form-control form-control-solid w-250px ps-15",placeholder:"Szukaj..."},null,544),[[I,t(m).global]])])]),toolbar:o(()=>[t(r).length===0?(l(),i("div",B,[s(u,{to:{name:"FileCategoryCreate"},class:"btn btn-primary"},{default:o(()=>[e("span",L,[s(j)]),c(" Dodaj kategori\u0119 ")]),_:1})])):(l(),i("div",H,[e("div",M,[e("span",P,d(t(r).length),1),c("Zaznaczonych ")]),e("button",{type:"button",class:"btn btn-danger",onClick:a[2]||(a[2]=n=>t(v)())},"Usu\u0144 zaznaczone")]))]),default:o(()=>[s(z,{onOnSort:t(F),onOnItemsSelect:t(g),data:t(_),header:p.value,"enable-items-per-page-dropdown":!0,"checkbox-enabled":!0,"checkbox-label":"id"},{name:o(({row:n})=>[c(d(n.name),1)]),description:o(({row:n})=>[c(d(n.prefix),1)]),actions:o(({row:n})=>[s(u,{to:{name:"FileCategoryUpdate",params:{id:n.id}},class:"btn btn-light btn-sm btn-icon btn-active-light-primary me-2"},{default:o(()=>[e("span",Z,[s(V)])]),_:2},1032,["to"]),e("a",q,[e("span",G,[s(N)])]),e("div",J,[e("div",K,[e("a",{onClick:Y=>t(h)(n.id),class:"menu-link px-3"},"Usu\u0144",8,Q)])])]),_:1},8,["onOnSort","onOnItemsSelect","data","header"])]),_:1})],64)}}});export{ae as default};
