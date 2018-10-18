(window["webpackJsonp"]=window["webpackJsonp"]||[]).push([["chunk-205e"],{"44c6":function(e,t,a){e.exports=a.p+"img/facebook.f6c23aa2.svg"},"546d":function(e,t,a){},b5df:function(e,t,a){e.exports=a.p+"img/google.2473ff62.svg"},ca73:function(e,t,a){"use strict";var s=a("546d"),n=a.n(s);n.a},e152:function(e,t,a){"use strict";a.r(t);var s=function(){var e=this,t=e.$createElement,s=e._self._c||t;return s("Layout",{staticClass:"bg-green-linear"},[s("div",{staticClass:"container mx-auto text-center my-4 md:my-8"},[s("h1",{staticClass:"font-sans font-thin text-5xl text-green-darker"},[e._v("Login")])]),s("form",{staticClass:"w-2/3 sm:w-2/3 md:w-1/2 lg:w-2/5 xl:w-1/3 mx-auto flex flex-col p-10 bg-white rounded-xl shadow mb-12",on:{submit:function(t){return t.preventDefault(),e.tryToLogIn(t)}}},[s("div",{staticClass:"bg-teal-lightest border-t-4 border-teal rounded-b text-teal-darkest px-4 py-3 my-2 mb-6",attrs:{role:"alert"}},[s("div",{staticClass:"flex leading-normal"},[s("svg",{staticClass:"h-6 w-6 text-teal mr-4",attrs:{xmlns:"http://www.w3.org/2000/svg",viewBox:"0 0 20 20"}},[s("path",{attrs:{d:"M2.93 17.07A10 10 0 1 1 17.07 2.93 10 10 0 0 1 2.93 17.07zm12.73-1.41A8 8 0 1 0 4.34 4.34a8 8 0 0 0 11.32 11.32zM9 11V9h2v6H9v-4zm0-6h2v2H9V5z"}})]),s("div",[s("p",{staticClass:"font-bold"},[e._v("User Test Credentials:")]),s("p",{staticClass:"text-sm"},[s("b",[e._v("Username:")]),e._v(" admin")]),s("p",{staticClass:"text-sm"},[s("b",[e._v("Password:")]),e._v(" Testing@123")])])])]),s("BaseInput",{directives:[{name:"validate",rawName:"v-validate",value:"required",expression:"'required'"}],attrs:{name:"username",placeholder:"Username"},model:{value:e.username,callback:function(t){e.username=t},expression:"username"}}),s("BaseInput",{directives:[{name:"validate",rawName:"v-validate",value:"required",expression:"'required'"}],attrs:{name:"password",type:"password",placeholder:"Password"},model:{value:e.password,callback:function(t){e.password=t},expression:"password"}}),s("BaseButton",{staticClass:"rounded p-4 my-2",attrs:{disabled:e.tryingToLogIn,type:"submit"}},[e.load?s("BaseIcon",{attrs:{name:"sync",spin:""}}):s("span",[e._v("\n        Log in\n      ")])],1),e.authError?s("p",{staticClass:"py-4 text-grey-dark text-sm"},[e._v("\n      There was an error logging in to your account.\n    ")]):e._e(),s("p",{staticClass:"flex flex-row mb-6"},[s("BaseCheckbox",{staticClass:"flex-1 cursor-pointer",attrs:{type:"checkbox",checked:e.remember_me},on:{input:e.toggleValue},model:{value:e.remember_me,callback:function(t){e.remember_me=t},expression:"remember_me"}},[e._v("\n        Remember Me\n      ")]),s("router-link",{staticClass:"flex-1 text-sm text-grey-darkest outline-none py-3 no-underline justify-end flex text-green-darker hover:text-blue",attrs:{to:{name:"forgot-password"}}},[e._v("Forgot Password\n      ")])],1),s("a",{staticClass:"no-underline text-center text-white bg-facebook-blue rounded p-3 my-2 text-sm -ml-1",attrs:{href:"#"},on:{click:function(t){e.loginViaSocial("facebook")}}},[s("img",{staticClass:"float-left",attrs:{src:a("44c6"),width:"17",alt:"Facebook"}}),e._v("\n        Continue with Facebook\n    ")]),s("a",{staticClass:"no-underline text-center text-white bg-google-red rounded p-3 my-2 text-sm -ml-1",attrs:{href:"#"},on:{click:function(t){e.loginViaSocial("google-oauth2")}}},[s("img",{staticClass:"float-left",attrs:{src:a("b5df"),width:"14",alt:"Google"}}),e._v("\n        Continue with Google\n    ")]),s("p",{staticClass:"pt-4 pb-1 text-center"},[s("router-link",{staticClass:"text-sm text-grey-darkest outline-none hover:text-blue",attrs:{to:"/register"}},[e._v("Create new account")])],1)],1)])},n=[],r=(a("96cf"),a("3040")),o=a("c93e"),i=a("4023"),l=a.n(i),c=(a("b0af"),a("c776")),u=a("2f62"),d=(Object(o["a"])({},Object(u["d"])("auth",{currentUser:function(e){return e.currentUser}}),Object(u["c"])("auth",["loggedIn"])),Object(u["b"])("auth",["logIn","logOut"])),m=a("5f87"),p={page:{title:"Log in",meta:[{name:"description",content:"Log in to ".concat(l.a.title)}]},components:{Layout:c["a"]},data:function(){return{username:"",password:"",remember_me:!1,authError:null,load:!1}},methods:Object(o["a"])({},d,{tryToLogIn:function(){var e=Object(r["a"])(regeneratorRuntime.mark(function e(){var t,a=this;return regeneratorRuntime.wrap(function(e){while(1)switch(e.prev=e.next){case 0:return this.load=!0,e.next=3,this.$validator.validateAll();case 3:t=e.sent,t?this.logIn({username:this.username,password:this.password,cb:function(){a.load=!1}}):this.load=!1;case 5:case"end":return e.stop()}},e,this)}));return function(){return e.apply(this,arguments)}}(),toggleValue:function(e){this.remember_me=e},loginViaSocial:m["b"]})},g=p,f=(a("ca73"),a("2877")),b=Object(f["a"])(g,s,n,!1,null,"cef1e0ce",null);b.options.__file="Login.vue";t["default"]=b.exports}}]);
//# sourceMappingURL=chunk-205e.59cb82ff.js.map