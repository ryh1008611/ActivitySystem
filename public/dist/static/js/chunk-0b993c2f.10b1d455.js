(window["webpackJsonp"]=window["webpackJsonp"]||[]).push([["chunk-0b993c2f"],{"333d":function(t,e,n){"use strict";var i=function(){var t=this,e=t.$createElement,n=t._self._c||e;return n("div",{staticClass:"pagination-container",class:{hidden:t.hidden}},[n("el-pagination",t._b({staticStyle:{"text-align":"center"},attrs:{background:t.background,"current-page":t.currentPage,"page-size":t.pageSize,layout:t.layout,"page-sizes":t.pageSizes,total:t.total},on:{"update:currentPage":function(e){t.currentPage=e},"update:current-page":function(e){t.currentPage=e},"update:pageSize":function(e){t.pageSize=e},"update:page-size":function(e){t.pageSize=e},"size-change":t.handleSizeChange,"current-change":t.handleCurrentChange}},"el-pagination",t.$attrs,!1))],1)},a=[];n("c5f6");Math.easeInOutQuad=function(t,e,n,i){return t/=i/2,t<1?n/2*t*t+e:(t--,-n/2*(t*(t-2)-1)+e)};var r=function(){return window.requestAnimationFrame||window.webkitRequestAnimationFrame||window.mozRequestAnimationFrame||function(t){window.setTimeout(t,1e3/60)}}();function o(t){document.documentElement.scrollTop=t,document.body.parentNode.scrollTop=t,document.body.scrollTop=t}function u(){return document.documentElement.scrollTop||document.body.parentNode.scrollTop||document.body.scrollTop}function s(t,e,n){var i=u(),a=t-i,s=20,l=0;e="undefined"===typeof e?500:e;var c=function t(){l+=s;var u=Math.easeInOutQuad(l,i,a,e);o(u),l<e?r(t):n&&"function"===typeof n&&n()};c()}var l={name:"Pagination",props:{total:{required:!0,type:Number},page:{type:Number,default:1},limit:{type:Number,default:20},pageSizes:{type:Array,default:function(){return[10,20,30,50]}},layout:{type:String,default:"total, sizes, prev, pager, next, jumper"},background:{type:Boolean,default:!0},autoScroll:{type:Boolean,default:!0},hidden:{type:Boolean,default:!1}},computed:{currentPage:{get:function(){return this.page},set:function(t){this.$emit("update:page",t)}},pageSize:{get:function(){return this.limit},set:function(t){this.$emit("update:limit",t)}}},methods:{handleSizeChange:function(t){this.$emit("pagination",{page:this.currentPage,limit:t}),this.autoScroll&&s(0,800)},handleCurrentChange:function(t){this.$emit("pagination",{page:t,limit:this.pageSize}),this.autoScroll&&s(0,800)}}},c=l,d=(n("eaa8"),n("2877")),p=Object(d["a"])(c,i,a,!1,null,"0e8f124f",null);e["a"]=p.exports},"5d51":function(t,e,n){"use strict";n.d(e,"b",(function(){return a})),n.d(e,"a",(function(){return r})),n.d(e,"d",(function(){return o})),n.d(e,"c",(function(){return u}));var i=n("b775");function a(t){return Object(i["a"])({url:"/v1/rolelists",method:"get",params:t})}function r(t){return Object(i["a"])({url:"/v1/rolelists",method:"post",data:t})}function o(t,e){return Object(i["a"])({url:"/v1/rolelists/".concat(t),method:"put",data:e})}function u(t){return Object(i["a"])({url:"/v1/rolelists/".concat(t),method:"get"})}},"75d2":function(t,e,n){"use strict";n.r(e);var i=function(){var t=this,e=t.$createElement,n=t._self._c||e;return n("div",{staticClass:"app-container"},[n("div",{staticClass:"filter-container"},[n("el-input",{staticClass:"filter-item",staticStyle:{width:"200px"},attrs:{placeholder:"角色"},nativeOn:{keyup:function(e){return!e.type.indexOf("key")&&t._k(e.keyCode,"enter",13,e.key,"Enter")?null:t.handleFilter(e)}},model:{value:t.listQuery.role_name,callback:function(e){t.$set(t.listQuery,"role_name",e)},expression:"listQuery.role_name"}}),t._v(" "),n("el-button",{staticClass:"filter-item",attrs:{type:"primary",icon:"el-icon-search"},on:{click:t.handleFilter}},[t._v("\n      查询\n    ")]),t._v(" "),t.canAddapi?n("router-link",{attrs:{to:"/permission/createrole"}},[n("el-button",{staticClass:"filter-item",staticStyle:{position:"absolute",right:"20px"},attrs:{type:"primary",icon:"el-icon-plus"}},[t._v("新增")])],1):t._e()],1),t._v(" "),n("el-table",{directives:[{name:"loading",rawName:"v-loading",value:t.listLoading,expression:"listLoading"}],staticStyle:{width:"100%","margin-top":"30px"},attrs:{data:t.rolesList,border:"",fit:"","highlight-current-row":""}},[n("el-table-column",{attrs:{align:"center",label:"序号"},scopedSlots:t._u([{key:"default",fn:function(e){return[t._v("\n        "+t._s(e.$index+1)+"\n      ")]}}])}),t._v(" "),n("el-table-column",{attrs:{align:"header-center",label:"角色"},scopedSlots:t._u([{key:"default",fn:function(e){return[t._v("\n        "+t._s(e.row.role_name)+"\n      ")]}}])}),t._v(" "),n("el-table-column",{attrs:{align:"header-center",label:"描述"},scopedSlots:t._u([{key:"default",fn:function(e){return[t._v("\n        "+t._s(e.row.description)+"\n      ")]}}])}),t._v(" "),n("el-table-column",{attrs:{align:"header-center",label:"权限组"},scopedSlots:t._u([{key:"default",fn:function(e){return[n("div",t._l(e.row.permissions_group,(function(e){return n("el-tag",{key:e,staticStyle:{"margin-right":"15px"}},[t._v("\n              "+t._s(t.groups[e])+"\n            ")])})),1)]}}])}),t._v(" "),n("el-table-column",{attrs:{align:"center",label:"操作"},scopedSlots:t._u([{key:"default",fn:function(e){return[t.canUpdateapi?n("router-link",{attrs:{to:"/permission/updaterole/"+e.row.id}},[n("el-button",{attrs:{type:"primary",size:"small",icon:"el-icon-edit"}},[t._v("\n            编辑\n          ")])],1):t._e()]}}])})],1),t._v(" "),n("pagination",{directives:[{name:"show",rawName:"v-show",value:t.total>0,expression:"total>0"}],attrs:{total:t.total,page:t.listQuery.page,limit:t.listQuery.limit},on:{"update:page":function(e){return t.$set(t.listQuery,"page",e)},"update:limit":function(e){return t.$set(t.listQuery,"limit",e)},pagination:t.getRoles}})],1)},a=[],r=(n("96cf"),n("3b8d")),o=(n("6762"),n("2fdb"),n("7f7f"),n("db72")),u=n("2f62"),s=(n("ed08"),n("a417")),l=n("5d51"),c=n("333d"),d={key:"",role_name:"",description:"",routes:[]},p={name:"RolePermissionlist",components:{Pagination:c["a"]},data:function(){return{listLoading:!0,role:Object.assign({},d),routes:[],rolesList:[],total:0,listQuery:{page:1,limit:10,role_name:void 0},groups_key:{key:"group_name"},groups:[]}},activated:function(){this.getRoles(),this.getGroups()},computed:Object(o["a"])({},Object(u["b"])(["permissions","name"]),{canAddapi:function(){return"admin"==this.name||this.permissions.includes("RolePermissioncreate")},canUpdateapi:function(){return"admin"==this.name||this.permissions.includes("RolePermissionupdate")}}),methods:{getRoles:function(){var t=Object(r["a"])(regeneratorRuntime.mark((function t(){var e=this;return regeneratorRuntime.wrap((function(t){while(1)switch(t.prev=t.next){case 0:this.listLoading=!0,Object(l["b"])(this.listQuery).then((function(t){e.rolesList=t.data.list,e.total=t.data.total,e.listLoading=!1}));case 2:case"end":return t.stop()}}),t,this)})));function e(){return t.apply(this,arguments)}return e}(),handleFilter:function(){this.listQuery.page=1,this.getRoles()},getGroups:function(){var t=Object(r["a"])(regeneratorRuntime.mark((function t(){var e=this;return regeneratorRuntime.wrap((function(t){while(1)switch(t.prev=t.next){case 0:Object(s["a"])(this.groups_key).then((function(t){e.groups=t.data}));case 1:case"end":return t.stop()}}),t,this)})));function e(){return t.apply(this,arguments)}return e}()}},f=p,m=n("2877"),g=Object(m["a"])(f,i,a,!1,null,null,null);e["default"]=g.exports},"7de1":function(t,e,n){},a417:function(t,e,n){"use strict";n.d(e,"a",(function(){return a}));var i=n("b775");function a(t){return Object(i["a"])({url:"/v1/options",method:"get",params:t})}},eaa8:function(t,e,n){"use strict";var i=n("7de1"),a=n.n(i);a.a}}]);