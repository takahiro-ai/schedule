import { Calendar } from "@fullcalendar/core";
import interactionPlugin from "@fullcalendar/interaction";
import dayGridPlugin from "@fullcalendar/daygrid";
import timeGridPlugin from "@fullcalendar/timegrid";
import listPlugin from "@fullcalendar/list";
import axios from 'axios';


var calendarEl = document.getElementById("calendar");

let calendar = new Calendar(calendarEl, {
    plugins: [interactionPlugin, dayGridPlugin, timeGridPlugin, listPlugin],
    initialView: "dayGridMonth",
    headerToolbar: {
        left: "prev,next today",
        center: "title",
        right: "dayGridMonth,timeGridWeek,listWeek",
    },
    locale: "ja",

    // 日付をクリック、または範囲を選択したイベント
    selectable: true,
    select: function (info) {
        //alert("selected " + info.startStr + " to " + info.endStr);

        // 入力ダイアログ
        const eventName = prompt("イベントを入力してください");

        if (eventName) {
            // Laravelの登録処理の呼び出し
            axios.post("/schedule-add", {
                    start: info.start.valueOf(),
                    end: info.end.valueOf(),
                    title: eventName,
                })
                .then(() => {
                    // イベントの追加
                    calendar.addEvent({
                        title: eventName,
                        start: info.start,
                        end: info.end,
                        allDay: true,
                    });
                })
                .catch(() => {
                    alert("登録に失敗しました");
                });
        }
    },
    events: '/schedule-get',
    // function (info, successCallback, failureCallback) {
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