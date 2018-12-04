(window["webpackJsonp"]=window["webpackJsonp"]||[]).push([["chunk-a5f0"],{"0af1":function(t,e,s){t.exports=s.p+"img/icon-checkmark-white.d9fceaf7.svg"},"17bf":function(t,e,s){"use strict";s.r(e);var a=function(){var t=this,e=t.$createElement,s=t._self._c||e;return s("section",{staticClass:"container mx-auto my-10"},[s("Tabs",{attrs:{tabs:t.tabSettings},on:{change:function(e){t.currentTab=e}}}),s("div",{staticClass:"cols py-4 mb-8"},[s("div",{staticClass:"col half flex flex-col"},[s("div",{staticClass:"flex items-center"},[s("img",{staticClass:"pr-4",attrs:{width:"200",src:"/images/events/fifa-world-cup.png"}}),s("h2",{staticClass:"font-bold"},[t._v("\n          "+t._s(t.event.name)+"\n        ")])]),t._m(0)]),s("div",{staticClass:"col half flex items-start justify-end"},[s("router-link",{staticClass:"btn btn-lg border-green w-min-full uppercase shadow-md",attrs:{to:"/events/all-game-lines"}},[t._v("\n        See All Game Lines\n      ")])],1)]),s("keep-alive",[s(t.currentTabComponent,{tag:"component"})],1)],1)},n=[function(){var t=this,e=t.$createElement,s=t._self._c||e;return s("div",{staticClass:"py-3"},[s("h4",{staticClass:"font-medium"},[t._v("\n          Current Favorite: "),s("span",{staticClass:"font-thin"},[t._v("\n            Germany (4:1)\n          ")])])])}],i=s("c93e"),l=(s("551c"),s("4023")),o=s.n(l),c=s("c776"),r=s("64e4"),d=s("6b7b"),u=s("3156"),v=s("2f62"),b={page:{title:"Competition",meta:[{name:"description",content:o.a.description}]},props:["id"],data:function(){return{currentTab:"to-win",tabSettings:[{label:"TO WIN",value:"to-win"},{label:"PROPOSITION BETS",value:"proposition-bets"}],prefixId:"sr:match:"}},computed:Object(i["a"])({},Object(v["c"])({event:"events/getEvent"}),{currentTabComponent:function(){return this.currentTab},eventId:function(){return this.prefixId+this.id}}),mounted:function(){this.fetchEvent(this.eventId)},methods:Object(i["a"])({},Object(v["b"])({fetchEvent:"events/fetchEvent"})),components:{Layout:c["a"],Tabs:r["a"],ToWin:d["a"],PropositionBets:u["a"]}},f=b,_=s("2877"),p=Object(_["a"])(f,a,n,!1,null,null,null);p.options.__file="Competition.vue";e["default"]=p.exports},3156:function(t,e,s){"use strict";var a=function(){var t=this,e=t.$createElement,s=t._self._c||e;return s("section",[s("h3",{staticClass:"uppercase font-bold"},[t._v("\n    Proposition Bets\n  ")]),s("FrontTable",{staticClass:"mt-5"},[s("template",{slot:"head"},[s("th",{staticClass:"text-left"},[t._v("\n        Label A\n      ")]),s("th",{staticClass:"text-left"},[t._v("\n        Label B\n      ")]),s("th",{staticClass:"text-left"},[t._v("\n        Label C\n      ")]),s("th",{staticClass:"text-left"},[t._v("\n        Label D\n      ")]),s("th",{staticClass:"text-left"},[t._v("\n        Label E\n      ")])]),s("tr",[s("td",[t._v("Text A")]),s("td",[t._v("Text B")]),s("td",[t._v("Text C")]),s("td",[t._v("Text D")]),s("td",[t._v("Text E")])]),s("tr",[s("td",[t._v("Text A")]),s("td",[t._v("Text B")]),s("td",[t._v("Text C")]),s("td",[t._v("Text D")]),s("td",[t._v("Text E")])]),s("tr",[s("td",[t._v("Text A")]),s("td",[t._v("Text B")]),s("td",[t._v("Text C")]),s("td",[t._v("Text D")]),s("td",[t._v("Text E")])]),s("tr",[s("td",[t._v("Text A")]),s("td",[t._v("Text B")]),s("td",[t._v("Text C")]),s("td",[t._v("Text D")]),s("td",[t._v("Text E")])])],2)],1)},n=[],i=s("a656"),l={components:{FrontTable:i["a"]},data:function(){return{}}},o=l,c=s("2877"),r=Object(c["a"])(o,a,n,!1,null,null,null);r.options.__file="PropositionBets.vue";e["a"]=r.exports},"4e39":function(t,e,s){"use strict";var a=function(){var t=this,e=t.$createElement,a=t._self._c||e;return a("BaseModal",{on:{close:t.close}},[a("div",{staticClass:"content bg-white px-5"},[a("div",{directives:[{name:"show",rawName:"v-show",value:1==t.step,expression:"step == 1"}]},[a("div",{staticClass:"flex flex-col"},[a("div",{staticClass:"text-center"},[a("h2",{staticClass:"mb-8"},[t._v("Choose your stake")]),a("div",{staticClass:"close",on:{click:t.close}},[t._v("\n            ×\n          ")])]),a("div",{staticClass:"flex-1 bg-teal-light p-6 w-full rounded-sm shadow-md"},[a("h5",{staticClass:"text-white"},[a("span",{staticClass:"font-bold"},[t._v("Your Bet - ")]),t._v("Arsenal to win the Premiere League "),a("br"),a("span",{},[t._v("Match Date: ")]),t._v("19:00 GMT November 2018\n          ")])])]),a("p",{staticClass:"flex-1 bg-yellow-light p-3 my-5 shadow"},[t._v("\n          Please note: Your current daily limit is $800. "),a("router-link",{attrs:{to:"/home"}},[t._v("Read more here")])],1),a("div",{staticClass:"flex-1 bg-white rounded-sm p-4 my-8 shadow-md text-center"},[a("div",{staticClass:"mb-4"},[a("span",{staticClass:"text-3xl"},[t._v("Up to ")]),a("input",{directives:[{name:"model",rawName:"v-model",value:t.amount,expression:"amount"}],staticClass:"p-2 bg-grey-lightest w-24 text-center text-3xl font-bold",attrs:{type:"text"},domProps:{value:t.amount},on:{input:function(e){e.target.composing||(t.amount=e.target.value)}}})]),a("div",{staticClass:"py-2 w-full border-l border-r border-width-2 border-grey"},[a("input",{directives:[{name:"model",rawName:"v-model",value:t.amount_range,expression:"amount_range"}],staticClass:"w-full",attrs:{type:"range",min:"1",max:"800"},domProps:{value:t.amount_range},on:{input:t.changeValue,__r:function(e){t.amount_range=e.target.value}}})])]),a("div",{staticClass:"flex-1 flex flex-col md:flex-row"},[a("div",{staticClass:"flex-1 text-center pr-6 border-r md:border-grey-lightest"},[a("h5",{staticClass:"mb-4 font-medium"},[t._v("\n              Market Odds\n            ")]),a("div",{staticClass:"py-4 bg-grey-lightest"},[a("h4",{staticClass:"font-bold"},[t._v("10:1")])]),a("div",{staticClass:"flex items-center p-3 bg-red-dark text-white"},[a("div",{staticClass:"flex-1 text-white"},[a("span",{staticClass:"icon flex text-4xl absolute"},[t._v("\n                  ×                \n                ")]),a("p",{staticClass:"uppercase text-sm mb-1"},[t._v("\n                  Potential Return\n                ")]),a("p",{staticClass:"text-2xl"},[t._v("\n                  $1000\n                ")])])])]),a("div",{staticClass:"flex-1 text-center pl-6"},[a("h5",{staticClass:"mb-4 font-medium"},[t._v("\n              Prophet Odds\n            ")]),a("div",{staticClass:"py-4 bg-grey-lightest"},[a("h4",{staticClass:"font-bold"},[t._v("20:1")])]),a("div",{staticClass:"flex items-center p-3 bg-brand-green text-white"},[a("div",{staticClass:"flex-1 text-white"},[a("span",{staticClass:"flex text-4xl absolute"},[a("img",{staticClass:"icon pr-2 pl-1 pt-2",attrs:{src:s("0af1")}})]),a("p",{staticClass:"uppercase text-sm mb-1"},[t._v("\n                  Potential Return\n                ")]),a("p",{staticClass:"text-2xl"},[t._v("\n                  $2000\n                ")])])]),a("div",[a("p",{staticClass:"bg-yellow-light p-3 uppercase"},[t._v("\n                x2 Premium with Prophet\n              ")])])])]),a("div",{staticClass:"flex-1 text-center py-8 mt-10"},[a("button",{staticClass:"w-2/5 btn btn-success btn-lg px-20 border-0 shadow-md",on:{click:t.nextStep}},[t._v("\n            Place you bet\n          ")])])])]),a("div",{directives:[{name:"show",rawName:"v-show",value:2==t.step,expression:"step == 2"}]},[a("div",{staticClass:"text-center mb-16"},[a("h2",{staticClass:"mb-8"},[t._v("Thank you for placing your bet")]),a("div",{staticClass:"close",on:{click:t.close}},[t._v("\n          ×\n        ")]),a("p",{staticClass:"text-lg"},[t._v("Your confirmation number is 000121343FD")])]),a("div",{staticClass:"flex-1 text-center py-8"},[a("button",{staticClass:"w-2/5 btn btn-success btn-md px-20 border-0 shadow",on:{click:t.close}},[t._v("\n          Continue Browsing\n        ")])])])])},n=[],i=s("a4df"),l=s("c1ec"),o=s("b3b3"),c=s("e67d"),r=s.n(c),d={data:function(){return{step:1,max:2,amount:"$100",amount_range:209,market_odds:""}},directives:{ClickOutside:r.a},components:{BaseModal:l["default"],Arrow:i["a"],BaseInput:o["default"]},methods:{close:function(){this.$emit("close")},nextStep:function(){this.step<this.max&&this.step++},changeValue:function(){this.amount=this.amount_range}}},u=d,v=(s("972f"),s("2877")),b=Object(v["a"])(u,a,n,!1,null,null,null);b.options.__file="BuyModal.vue";e["a"]=b.exports},"64e4":function(t,e,s){"use strict";var a=function(){var t=this,e=t.$createElement,s=t._self._c||e;return s("div",{staticClass:"tabs"},t._l(t.tabs,function(e,a){return s("button",{key:a,staticClass:"tab",class:[{active:t.tabActive==a}],on:{click:function(s){s.preventDefault(),t.changeTab({tab:e.value,key:a})}}},[t._v("\n    "+t._s(e.label)+"\n  ")])}))},n=[],i={props:{tabs:[Object,Array]},data:function(){return{tabActive:0}},methods:{changeTab:function(t){var e=t.tab,s=t.key;this.$emit("change",e),this.tabActive=s}}},l=i,o=(s("de00"),s("2877")),c=Object(o["a"])(l,a,n,!1,null,"21d33ed3",null);c.options.__file="FrontTabs.vue";e["a"]=c.exports},"6b7b":function(t,e,s){"use strict";var a=function(){var t=this,e=t.$createElement,s=t._self._c||e;return s("section",[t.showModal?s("BuyModal",{on:{close:function(e){t.showModal=!1}}}):t._e(),s("FrontTable",{staticClass:"mt-5"},[s("template",{slot:"head"},[s("th",{staticClass:"text-left"},[t._v("\n        TEAM\n      ")]),s("th",{staticClass:"text-left"},[t._v("\n        ODDS\n      ")]),s("th",{staticClass:"text-left"},[t._v("\n        RISK/RETURN\n      ")]),s("th",{staticClass:"text-left"},[t._v("\n        PRICE\n      ")]),s("th",{staticClass:"text-right"},[t._v("\n        ACTION\n      ")])]),s("tr",[s("td",[t._v("Australia")]),s("td",[t._v("-20")]),s("td",[t._v("£100 / £150")]),s("td",[t._v("£150")]),s("td",{staticClass:"text-right"},[s("button",{staticClass:"btn btn-xs border-0 btn-success-dark",on:{click:function(e){t.showModal=!0}}},[t._v("\n          BUY\n        ")])])]),s("tr",[s("td",[t._v("Manchester United")]),s("td",[t._v("-10")]),s("td",[t._v("£90 / £140")]),s("td",[t._v("£150")]),s("td",{staticClass:"text-right"},[s("button",{staticClass:"btn btn-xs border-0 btn-success-dark"},[t._v("\n          BUY\n        ")])])]),s("tr",[s("td",[t._v("Germany")]),s("td",[t._v("-10")]),s("td",[t._v("£40 / £120")]),s("td",[t._v("£110")]),s("td",{staticClass:"text-right"},[s("button",{staticClass:"btn btn-xs border-0 btn-success-dark",on:{click:function(e){t.showModal=!0}}},[t._v("\n          BUY\n        ")])])]),s("tr",[s("td",[t._v("France")]),s("td",[t._v("-30")]),s("td",[t._v("£20 / £400")]),s("td",[t._v("£90")]),s("td",{staticClass:"text-right"},[s("button",{staticClass:"btn btn-xs border-0 btn-success-dark",on:{click:function(e){t.showModal=!0}}},[t._v("\n          BUY\n        ")])])]),s("tr",[s("td",[t._v("Argentina")]),s("td",[t._v("-24")]),s("td",[t._v("£50 / £100")]),s("td",[t._v("£70")]),s("td",{staticClass:"text-right"},[s("button",{staticClass:"btn btn-xs border-0 btn-success-dark",on:{click:function(e){t.showModal=!0}}},[t._v("\n          BUY\n        ")])])])],2)],1)},n=[],i=(s("551c"),s("a656")),l=s("4e39"),o={components:{FrontTable:i["a"],BuyModal:l["a"]},data:function(){return{showModal:!1}}},c=o,r=s("2877"),d=Object(r["a"])(c,a,n,!1,null,null,null);d.options.__file="ToWin.vue";e["a"]=d.exports},"8c43":function(t,e,s){},"905b":function(t,e,s){},"972f":function(t,e,s){"use strict";var a=s("905b"),n=s.n(a);n.a},a4df:function(t,e,s){"use strict";var a=function(){var t=this,e=t.$createElement,s=t._self._c||e;return s("svg",{attrs:{xmlns:"http://www.w3.org/2000/svg",width:"82",viewBox:"0 0 86 14.9"}},[s("g",{attrs:{id:"Layer_2","data-name":"Layer 2"}},[s("g",{attrs:{id:"Layer_1-2","data-name":"Layer 1"}},[s("line",{staticClass:"cls-1",attrs:{y1:"7.4",x2:"82",y2:"7.4"}}),s("polygon",{staticClass:"cls-2",attrs:{points:"70.2 14.9 86 7.4 70.2 0 70.2 14.9"}})])])])},n=[],i=(s("b7d4"),s("2877")),l={},o=Object(i["a"])(l,a,n,!1,null,"2aa2823a",null);o.options.__file="Arrow.vue";e["a"]=o.exports},a656:function(t,e,s){"use strict";var a=function(){var t=this,e=t.$createElement,s=t._self._c||e;return s("table",[s("thead",[s("tr",[t._t("head")],2)]),s("tbody",[t._t("default")],2)])},n=[],i=(s("eb94"),s("2877")),l={},o=Object(i["a"])(l,a,n,!1,null,"9d939bde",null);o.options.__file="FrontTable.vue";e["a"]=o.exports},b7d4:function(t,e,s){"use strict";var a=s("e054"),n=s.n(a);n.a},de00:function(t,e,s){"use strict";var a=s("e17a"),n=s.n(a);n.a},e054:function(t,e,s){},e17a:function(t,e,s){},eb94:function(t,e,s){"use strict";var a=s("8c43"),n=s.n(a);n.a}}]);
//# sourceMappingURL=chunk-a5f0.11f77de0.js.map