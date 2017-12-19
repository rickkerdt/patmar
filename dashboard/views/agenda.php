<?php
/**
 * Created by PhpStorm.
 * User: patip
 * Date: 12/18/2017
 * Time: 09:33
 */
?>
<script>
    $(document).ready(function () {
        var date = new Date();
        var d = date.getDate();
        var m = date.getMonth();
        var y = date.getFullYear();


        var calendar = $('#calendar').fullCalendar({
            editable: true,
            header: {
                left: 'prev,next today',
                center: 'title',
                right: 'month,agendaWeek,agendaDay'
            },


            events: "/dashboard/events.php",


            eventRender: function (event, element, view) {
                if (event.allDay === 'true') {
                    event.allDay = true;
                } else {
                    event.allDay = false;
                }
            },
            selectable: true,
            selectHelper: true,
            select: function (start, end, allDay) {
                var title = prompt('Event Title:');


                if (title) {
                    var start = $.fullCalendar.formatDate(start, "Y-MM-DD HH:mm:ss");
                    var end = $.fullCalendar.formatDate(end, "Y-MM-DD HH:mm:ss");
                    $.ajax({
                        url: '/dashboard/add_events.php',
                        data: 'title=' + title + '&start=' + start + '&end=' + end,
                        type: "POST",
                        success: function (json) {
                            alert('Added Successfully');
                            console.log(json);
                        }
                    });
                    calendar.fullCalendar('renderEvent',
                        {
                            title: title,
                            start: start,
                            end: end,
                            allDay: allDay
                        },
                        true
                    );
                }
                calendar.fullCalendar('unselect');
            },


            editable: true,
            eventDrop: function (event, delta) {
                var start = $.fullCalendar.formatDate(event.start, "Y-MM-DD HH:mm:ss");
                var end = $.fullCalendar.formatDate(event.end, "Y-MM-DD HH:mm:ss");
                $.ajax({
                    url: '/dashboard/update_events.php',
                    data: 'title=' + event.title + '&start=' + start + '&end=' + end + '&id=' + event.id,
                    type: "POST",
                    success: function (json) {
                        alert("Updated Successfully");
                        console.log(json);
                    }
                });
            },
            eventClick: function (event) {
                var decision = confirm("Do you really want to do that?");
                if (decision) {
                    $.ajax({
                        type: "POST",
                        url: "/dashboard/delete_event.php",
                        data: "&id=" + event.id,
                        success: function (json) {
                            $('#calendar').fullCalendar('removeEvents', event.id);
                            alert("Updated Successfully");
                            console.log(json);
                        }
                    });
                }
            },
            eventResize: function (event) {
                var start = $.fullCalendar.formatDate(event.start, "yyyy-MM-dd HH:mm:ss");
                var end = $.fullCalendar.formatDate(event.end, "yyyy-MM-dd HH:mm:ss");
                $.ajax({
                    url: '/dashboard/update_events.php',
                    data: 'title=' + event.title + '&start=' + start + '&end=' + end + '&id=' + event.id,
                    type: "POST",
                    success: function (json) {
                        alert("Updated Successfully");
                        console.log(json);
                    }
                });
            }

        });

    });


</script>
<style>
    #calendar {
        width: inherit;
        margin: 0 auto;
    }
</style>

<div id='calendar'></div>