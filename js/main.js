//機能②　テーブルのソート機能
(function() {
  'use strict';

  var start=document.getElementById("start");
  var rate=document.getElementById("rate");
  var sortOrderStart = 1; // 1: 昇順、-1: 降順
  var sortOrderRate = 1; // 1: 昇順、-1: 降順

  //テーブルを制御するための関数
  function rebuildTbody(rows) {
    var tbody = document.querySelector('tbody');
    var i;
    //テーブルの中身を消す
    while (tbody.firstChild) {
      tbody.removeChild(tbody.firstChild);
    }
    //rowsの配列に従って、テーブルの中身を再表示
    for (i = 0; i < rows.length; i++) {
      tbody.appendChild(rows[i]);
    }
  }

  //"開始日付"のクラス名をコントロールする関数
  function updateStartClassName() {
    //"税率"のクラスの名を削除
    rate.className="";
    //"税率"のsortOrderを初期値にリセット
    sortOrderRate=1;
    //"開始日付"のsortOrderによりクラス名をセット
    start.className = sortOrderStart === 1 ? 'asc' : 'desc';
  }

  //"税率"のクラス名をコントロールする関数（内容に関するコメントは割愛）
  function updateRateClassName() {
    start.className="";
    sortOrderStart=1;
    rate.className = sortOrderRate === 1 ? 'asc' : 'desc';
  }


  //"開始日付"の列のsortを実行するための関数
  function sortStartRows() {
    //テーブルの中身をrowsに格納
    var rows = Array.prototype.slice.call(document.querySelectorAll('tbody > tr'));
    //"開始日付"のセルを取得
    var col = start.cellIndex;
    //"開始日付"のdata-typeを取得
    var type = start.dataset.type;
    //rowsをcompareに従って並び替え
    rows.sort(function(a, b) {
      return compare(a, b, col, type) * sortOrderStart;
    });
    //ソート後の結果を返す
    return rows;
  }

  //"税率"のテーブルの列を実行するための関数（内容に関するコメントは割愛）
  function sortRateRows() {
    var rows = Array.prototype.slice.call(document.querySelectorAll('tbody > tr'));
    var col = rate.cellIndex;
    var type = rate.dataset.type;
    rows.sort(function(a, b) {
      return compare(a, b, col, type) * sortOrderRate;
    });
    return rows;
  }

  //ソートの条件の関数
  function compare(a, b, col, type) {
    //セルの内容を取得
    var _a = a.children[col].textContent;
    var _b = b.children[col].textContent;
    //邪魔な要素を削除のうえ、数値に変換
    if (type === "rate") {
      _a = _a.replace("%","")*1;
      _b = _b.replace("%","")*1;
    } else if (type === "start") {
      _a = _a.replace(/-/g,"0")*1;
      _b = _b.replace(/-/g,"0")*1;
    }
    //compareに返り値を設定し、ソートを管理する
    if (_a < _b) {
      return -1;
    }
    if (_a > _b) {
      return 1;
    }
    return 0;
  }

  //上記で出てきた関数を"開始日付"のthをクリックで起動するための関数
  function setupStart() {
      start.addEventListener('click', function() {
        //rowsを定義して…
        var rows;
        //ソート結果を取得。
        rows = sortStartRows();
        //テーブルの並び替えを実行し…
        rebuildTbody(rows);
        //クラス名を変更。
        updateStartClassName();
        //sortOrderを更新。
        sortOrderStart *= -1;
      });
  }

  //同様に"税率"のソートのクリックイベント
  function setupRate() {
      rate.addEventListener('click', function() {
        var rows;
        rows = sortRateRows();
        rebuildTbody(rows);
        updateRateClassName();
        sortOrderRate *= -1;
      });
  }

  setupStart();
  setupRate();

})();


//機能③　セルのアップデート処理
jQuery(document).ready(function($){
  //選択モードと編集モードを分けるためのフラグを定義
  var flag=1;//1．選択モード、-1.編集モード
  //更新されるid,開始日付,税率
  var updateId;
  var updateStart;
  var updateRate;
  //その他、テキスト
  var text;
  //テーブルのセルがクリックされたら…
  $("td").on("click",function(){
    //編集中のセルだったらなにもしない
    if ($(this).attr("class")==="edit") {
      return;
    }
    //選択モードなら
    if (flag===1) {
      //①inputに現在のデータを入れるための準備
      //選択したセルからテキストを取得。空白は排除。
      text=$(this).text().trim();
      //それが"税率"だったら%が邪魔なので消しておく
      if($(this).attr("class")==="rate"){
        text=text.slice(0,-1);
      }
      //選択したセルの中身を消す
      $(this).text("");
      //更新idの取得
      updateId=$(this).parent().children("input").val();

      //②inputを作って、データを入れていく
      //選択した列によって作成するinputを変える
      //もし、"開始日付"を選択したら…
      if ($(this).attr("class")==="start") {
        //条件付きのinputを作成
        $(this).append("<input type='tel' size='10' maxlength='10' pattern='\d{4}-\d{2}-\d{2}' id='updateStart'>");
        //①で取得したデータをinputのvalに入れる
        $("#updateStart").attr("value","");
        //inputにカーソルがあたっているようにする
        $("#updateStart").focus().val(text);
        //編集の邪魔にならないようにstartを消しておく
        $(this).removeClass("start");
      //同様に"税率"を選択したら…（以下略）
      }else if ($(this).attr("class")==="rate") {
        $(this).append("<input type='number' id='updateRate'>%");
        $("#updateRate").attr("value","");
        $("#updateRate").focus().val(text);
        $(this).removeClass("rate");
      }
      //hidden属性でinputを作成し、updateIdを取得する準備をしておく
      $(this).append("<input type='hidden' id='updateId'>");
      $("#updateId").attr("value",updateId);

      //③編集モードのための準備
      //選択したセルと同じ行のtdにeditクラスをつける
      $(this).parent().children("td").addClass("edit");
      //フラグを更新へ
      flag *=-1;

    //もし、編集モードなら…
    }else if(flag===-1){
      //①データの取得
      //更新するidを取得
      updateId=$("#updateId").val();

      //更新する開始日付及び税率を取得
      //もし、"開始日付"が編集中なら…
      if ($("#updateStart").length) {
        //打ち込んだ内容を取得
        updateStart=$("#updateStart").val();
        //親要素のクラス名にstartを戻して、
        $("#updateStart").parent().addClass("start");
        //打ち込んだ内容を表示
        $(".edit"+".start").text(updateStart);
      //もし、"開始日付"が編集中ではないのなら…
      }else {
        //元々のデータを取得。その際に空白をトリム
        updateStart=$(".start"+".edit").text().trim();
      }

      //もし、"税率"が編集中なら…
      //以下同内容なので割愛。
      if ($("#updateRate").length) {
        updateRate=$("#updateRate").val();
        text=updateRate+"%";
        $("#updateRate").parent().addClass("rate");
        $(".edit"+".rate").text(text);
      }else {
        updateRate=$(".rate"+".edit").text().trim().slice(0,-1);
      }

      //②取得したデータをpost送信
      //取得した値をDBに送信
      $.post("tax2/update",{
        id:updateId,
        start:updateStart,
        rate:updateRate
      });

      //③選択モードのための準備
      //変更されている部分を全部戻す
      $(".edit input").remove("input");
      $(".edit").removeClass("edit");
      //フラグを選択モードに変更
      flag *=-1;

    //それ以外はなにもしない
    }else{
      return;
    }
  })
})
