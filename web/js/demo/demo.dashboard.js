(function(a){
    a(document).ready(function(d){
        a(".da-circular-stat").daCircularStat();
        var c=a("#da-ex-wizard-form").validate({
            onsubmit:false
        });
        a("#da-ex-wizard-form").daWizard({
            forwardOnly:false,
            onLeaveStep:function(e,g){
                return c.form()
            },
            onBeforeSubmit:function(){
                return c.form()
            }
        });
        a("#da-ex-calendar-gcal").fullCalendar({
            events:"http://www.google.com/calendar/feeds/usa__en%40holiday.calendar.google.com/public/basic",
            eventClick:function(e){
                window.open(e.url,"gcalevent","width=700,height=600");
                return false
            }
        });
        google.setOnLoadCallback(f);
        function f(){
            b()
        }
        function b(){
            var h=google.visualization.arrayToDataTable([["Month","Seeds","Plants"],["Jan",1000,400],["Feb",1170,460],["Mar",660,1120],["Apr",1030,540]]);
            var e={};
        
            var g=new google.visualization.LineChart(a("#da-ex-gchart-line").get(0));
            a(window).on("debouncedresize",function(){
                g.draw(h,e)
            });
            g.draw(h,e)
        }
    })
})(jQuery);
