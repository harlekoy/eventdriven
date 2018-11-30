(window["webpackJsonp"]=window["webpackJsonp"]||[]).push([["chunk-4a7a"],{"44c6":function(e,t,a){e.exports=a.p+"img/facebook.f6c23aa2.svg"},b5df:function(e,t,a){e.exports=a.p+"img/google.2473ff62.svg"},cc7b:function(e,t,a){"use strict";a.r(t);var r=function(){var e=this,t=e.$createElement,r=e._self._c||t;return r("Layout",{staticClass:"bg-green-linear"},[r("div",{staticClass:"container mx-auto"},[r("h1",{staticClass:"text-center my-4 md:my-8"},[e._v("Login")]),r("form",{staticClass:"white-wrapper form mb-12",on:{submit:function(t){return t.preventDefault(),e.tryToLogIn(t)}}},[r("BaseAlert",[r("p",{staticClass:"font-bold"},[e._v("User Test Credentials:")]),r("p",{staticClass:"text-sm"},[r("b",[e._v("Username:")]),e._v(" admin")]),r("p",{staticClass:"text-sm"},[r("b",[e._v("Password:")]),e._v(" Testing@123")])]),r("BaseInput",{directives:[{name:"validate",rawName:"v-validate",value:"required",expression:"'required'"}],attrs:{name:"username",placeholder:"Username"},model:{value:e.username,callback:function(t){e.username=t},expression:"username"}}),r("BasePassword",{directives:[{name:"validate",rawName:"v-validate",value:"required",expression:"'required'"}],attrs:{name:"password",type:"password",placeholder:"Password"},model:{value:e.password,callback:function(t){e.password=t},expression:"password"}}),r("BaseButton",{staticClass:"btn mb-5",attrs:{disabled:e.load,type:"submit"}},[e.load?r("BaseIcon",{attrs:{name:"spinner",spin:""}}):r("span",[e._v("Log in")])],1),e.authError?r("p",{staticClass:"invalid text-center"},[e._v(e._s(e.authError))]):e._e(),r("p",{staticClass:"flex flex-row mb-5 justify-between"},[r("BaseCheckbox",{staticClass:"cursor-pointer whitespace-no-wrap",attrs:{type:"checkbox",checked:e.remember_me},on:{input:e.toggleValue},model:{value:e.remember_me,callback:function(t){e.remember_me=t},expression:"remember_me"}},[e._v("\n          Remember Me\n        ")]),r("router-link",{staticClass:"forgot-password text-grey-darkest flex items-center text-green-darker hover:text-blue-dark",attrs:{to:{name:"forgot-password"}}},[e._v("Forgot Password")])],1),r("a",{staticClass:"btn btn-fb iconed-left mb-3",on:{click:function(t){e.loginViaSocial("facebook")}}},[r("img",{staticClass:"icon",attrs:{src:a("44c6"),width:"17",alt:"Facebook"}}),e._v("\n        Continue with Facebook\n      ")]),r("a",{staticClass:"btn btn-danger iconed-left mb-3",on:{click:function(t){e.loginViaSocial("google-oauth2")}}},[r("img",{staticClass:"icon",attrs:{src:a("b5df"),width:"14",alt:"Google"}}),e._v("\n        Continue with Google\n      ")]),r("div",{staticClass:"text-center mt-5"},[r("router-link",{staticClass:"text-grey-darkest hover:text-blue-dark",attrs:{to:"/register"}},[e._v("Create new account")])],1)],1)])])},n=[],s=(a("96cf"),a("3040")),o=a("c93e"),i=a("bc3a"),c=a.n(i),l=a("4023"),u=a.n(l),m=a("c776"),d=a("2f62"),b=(Object(o["a"])({},Object(d["d"])("auth",{currentUser:function(e){return e.currentUser}}),Object(d["c"])("auth",["loggedIn"])),Object(d["b"])("auth",["logIn","logOut"])),p=a("5f87"),v=a("eae4"),f={page:{title:"Log in",meta:[{name:"description",content:"Log in to ".concat(u.a.title)}]},components:{Layout:m["a"]},data:function(){return{username:"",password:"",authError:null,load:!1,remember_me:!1}},methods:Object(o["a"])({},b,Object(d["b"])({saveToken:"auth/saveToken"}),{tryToLogIn:function(){var e=Object(s["a"])(regeneratorRuntime.mark(function e(){var t,a=this;return regeneratorRuntime.wrap(function(e){while(1)switch(e.prev=e.next){case 0:return this.load=!0,this.authError=null,e.next=4,this.$validator.validateAll();case 4:if(t=e.sent,e.t0=t,!e.t0){e.next=10;break}return e.next=9,this.validateIP();case 9:e.t0=e.sent;case 10:if(!e.t0){e.next=15;break}this.logIn({username:this.username,password:this.password,cb:function(e){var t=e.error_description;a.authError=t,a.load=!1}}),this.saveToken({remember_me:this.remember_me}),e.next=17;break;case 15:this.load=!1,Object(v["a"])({text:"User's current location is not allowed."});case 17:case"end":return e.stop()}},e,this)}));return function(){return e.apply(this,arguments)}}(),toggleValue:function(e){this.remember_me=e},validateIP:function(){var e=Object(s["a"])(regeneratorRuntime.mark(function e(){var t,a;return regeneratorRuntime.wrap(function(e){while(1)switch(e.prev=e.next){case 0:return e.next=2,c.a.get("validate-ip");case 2:return t=e.sent,a=t.data.valid,e.abrupt("return",a);case 5:case"end":return e.stop()}},e,this)}));return function(){return e.apply(this,arguments)}}(),loginViaSocial:p["b"]})},g=f,h=a("2877"),w=Object(h["a"])(g,r,n,!1,null,null,null);w.options.__file="Login.vue";t["default"]=w.exports}}]);
//# sourceMappingURL=chunk-4a7a.acb96c37.js.map