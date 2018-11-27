(function(){
  'use strict';
  // var tds=document.getElementsByTagName('td')
  var start=document.getElementsByClassName("start");
  // var rate=document.getElementsByClassName("rate");
  var flag=1;//1．編集、-1.更新

  // function update(){
  //   var i;
  //   for (var i = 0; i < tds.length; i++) {
  //     tds[i]. addEventListener("click",function(){
  //       // tds[i].
  //           console.log("start or rate");
  //         })
  //       }
  //     }

  function updateStart(text){
    for (var i = 0; i < start.length; i++) {
      start[i]. addEventListener("click",function(){
        if (this.getAttribute("id")==="edit") {
          console.log("edit");
          return;
        }
        if (flag===-1) {
          //DB更新処理
          var edit=document.getElementById("edit");
          var text=edit.firstChild.value;
          var id=document.getElementById("id");
          var start=id.value;
          console.log(edit.children);
          console.log(text);
          console.log(start);
          jQuery(document).ready(function($){
            console.log("動く");
            console.log(text);
            $.post("tax2/update",{
              id:start,
              start:text,
              rate:3
            });
            // $.ajax({
            //   type:"post",
            //   // url:"http://localhost/Kyoino-Test-2/index.php/tax2/update",
            //   url:"tax2/update",
            //   dataType:"json",
            //   data:{
            //     id:start,
            //     start:text,
            //     rate:"11"
            //   },
            //   success:function(data){
            //     alert("送信成功");
            //   },
            //   error:function(XMLHttpRequest, textStatus, errorThrown){
            //     alert("送信失敗");
            //     console.log("XMLHttpRequest : " + XMLHttpRequest.status);
            //     console.log("textStatus     : " + textStatus);
            //     console.log("errorThrown    : " + errorThrown.message);
            //   }
            // });
          });
          if (text==="") {
            text=textall
          }
          edit.textContent=text;
          edit.removeAttribute("id");
          flag *=-1;
          console.log(flag);
        }else if (flag===1) {
          var input = document.createElement("input");
          var input2 = document.createElement("input");
          var form = document.createElement("form");
          var text=this.textContent;
          var id=this.parentNode.lastElementChild.value;
          text=text.trim();
          console.log(text);
          console.log(id);
          this.textContent=null;
          this.appendChild(input);
          input.setAttribute("value",text);
          input.setAttribute("id","edited");
          this.setAttribute("id","edit");
          this.appendChild(input2);
          this.lastElementChild.setAttribute("value",id);
          this.lastElementChild.setAttribute("type","hidden");
          this.lastElementChild.setAttribute("id","id");


          console.log(this);
          flag *=-1;
          console.log(flag);
        }
      })
    }
  }



  // function updateRate(){
  //   var i;
  //   for (var i = 0; i < rate.length; i++) {
  //     rate[i]. addEventListener("click",function(){
  //           console.log("rate");
  //         })
  //       }
  //     }

  // update();
  updateStart();

  // updateRate();

})();

// jQuery(document).ready(function($){
//   $(".start").on("click",function(){
//     var text=$(this).text();
//     text=text.trim();
//
//     $(this).text("");
//
//     $(this).attr("id","edit");
//     $(this).append("<input type='text' name='edited'>");
//     $("input").attr("value",text);
//     $(this).removeClass("start");
//     console.log(text);
//   })
// })
