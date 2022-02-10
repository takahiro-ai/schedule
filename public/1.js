(window["webpackJsonp"] = window["webpackJsonp"] || []).push([[1],{

/***/ "./resources/js/calendar.js":
/*!**********************************!*\
  !*** ./resources/js/calendar.js ***!
  \**********************************/
/*! no exports provided */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _fullcalendar_core__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @fullcalendar/core */ "./node_modules/@fullcalendar/core/main.js");
/* harmony import */ var _fullcalendar_interaction__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @fullcalendar/interaction */ "./node_modules/@fullcalendar/interaction/main.js");
/* harmony import */ var _fullcalendar_daygrid__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! @fullcalendar/daygrid */ "./node_modules/@fullcalendar/daygrid/main.js");
/* harmony import */ var _fullcalendar_timegrid__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! @fullcalendar/timegrid */ "./node_modules/@fullcalendar/timegrid/main.js");
/* harmony import */ var _fullcalendar_list__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! @fullcalendar/list */ "./node_modules/@fullcalendar/list/main.js");
/* harmony import */ var axios__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! axios */ "./node_modules/axios/index.js");
/* harmony import */ var axios__WEBPACK_IMPORTED_MODULE_5___default = /*#__PURE__*/__webpack_require__.n(axios__WEBPACK_IMPORTED_MODULE_5__);






var calendarEl = document.getElementById("calendar");
var calendar = new _fullcalendar_core__WEBPACK_IMPORTED_MODULE_0__["Calendar"](calendarEl, {
  plugins: [_fullcalendar_interaction__WEBPACK_IMPORTED_MODULE_1__["default"], _fullcalendar_daygrid__WEBPACK_IMPORTED_MODULE_2__["default"], _fullcalendar_timegrid__WEBPACK_IMPORTED_MODULE_3__["default"], _fullcalendar_list__WEBPACK_IMPORTED_MODULE_4__["default"]],
  initialView: "dayGridMonth",
  headerToolbar: {
    left: "prev,next today",
    center: "title",
    right: "dayGridMonth,timeGridWeek,listWeek"
  },
  locale: "ja",
  // 日付をクリック、または範囲を選択したイベント
  selectable: true,
  select: function select(info) {
    //alert("selected " + info.startStr + " to " + info.endStr);
    // 入力ダイアログ
    var eventName = prompt("イベントを入力してください");

    if (eventName) {
      // Laravelの登録処理の呼び出し
      axios__WEBPACK_IMPORTED_MODULE_5___default.a.post("/schedule-add", {
        start: info.start.valueOf(),
        end: info.end.valueOf(),
        title: eventName
      }).then(function () {
        // イベントの追加
        calendar.addEvent({
          title: eventName,
          start: info.start,
          end: info.end,
          allDay: true
        });
      })["catch"](function () {
        alert("登録に失敗しました");
      });
    }
  },
  events: '/schedule-get' // function (info, successCallback, failureCallback) {
  //     // Laravelのスケジュール取得処理の呼び出し
  //     axios.get("/schedule-get", {
  //             start_date: info.start.valueOf(),
  //             end_date: info.end.valueOf(),
  //         })
  //         .then((response) => {
  //             successCallback(response.data);
  //         })
  //         .catch(() => {
  //             // バリデーションエラーなど
  //             alert("登録に失敗しました");
  //         });
  // },

});
calendar.render();

/***/ })

}]);