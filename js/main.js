(function() {
  'use strict';

  var ths = document.getElementsByTagName('th');
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
  //可能なら上の関数と合わせて一つにしたいがちょっと思いつかないので保留。後日再検討
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


  //"開始日付"のテーブルのsortを実行するための関数
  //同様に関数をまとめたい。後日再検討。
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

  //"税率"のテーブルのsortを実行するための関数（内容に関するコメントは割愛）
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
    var _a = a.children[col].textContent;
    var _b = b.children[col].textContent;
    if (type === "rate") {
      _a = _a.replace("%","")*1;
      _b = _b.replace("%","")*1;
    } else if (type === "start") {
      _a = _a.replace(/-/g,"0")*1;
      _b = _b.replace(/-/g,"0")*1;
    }
    if (_a < _b) {
      return -1;
    }
    if (_a > _b) {
      return 1;
    }
    return 0;
  }

  //上記で出てきた関数を"開始日付"のthをクリックで起動するための関数
  //こちらもまとめたい
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
