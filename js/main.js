//
// (function(){
//   'use strict';
//   // var tds=document.getElementsByTagName('td')
//   var start=document.getElementsByClassName("start");
//   // var rate=document.getElementsByClassName("rate");
//   var flag=1;//1．編集、-1.更新
//
//   // function update(){
//   //   var i;
//   //   for (var i = 0; i < tds.length; i++) {
//   //     tds[i]. addEventListener("click",function(){
//   //       // tds[i].
//   //           console.log("start or rate");
//   //         })
//   //       }
//   //     }
//
//   function updateStart(){
//     for (var i = 0; i < start.length; i++) {
//       start[i]. addEventListener("click",function(){
//         if (this.getAttribute("id")==="edit") {
//           console.log("edit");
//           return;
//         }
//         if (flag===-1) {
//           //DB更新処理
//           var edit=document.getElementById("edit");
//           var text=edit.firstChild.value;
//           console.log(edit.children);
//           console.log(text);
//           edit.textContent=text;
//           edit.removeAttribute("id");
//           flag *=-1;
//           console.log(flag);
//         }else if (flag===1) {
//           var input = document.createElement("input");
//           var form = document.createElement("form");
//           var text=this.textContent;
//           text=text.trim();
//           console.log(text);
//           this.textContent=null;
//           this.appendChild(input);
//           input.setAttribute("value",text);
//           this.setAttribute("id","edit");
//           console.log(this);
//           flag *=-1;
//           console.log(flag);
//         }
//       })
//     }
//   }
//
//
//   // function updateRate(){
//   //   var i;
//   //   for (var i = 0; i < rate.length; i++) {
//   //     rate[i]. addEventListener("click",function(){
//   //           console.log("rate");
//   //         })
//   //       }
//   //     }
//
//   // update();
//   updateStart();
//   // updateRate();
//
// })();

jQuery(document).ready(function($){
  $(".start").on("click",function(){
    var text=$(this).text();
    text=text.trim();

    $(this).text("");

    $(this).attr("id","edit");
    $(this).append("<input type='text'>");
    $("input").attr("value",text);
    console.log(text);
  })
})
