(function(a){
    a(document).ready(function(c){
        a(".da-panel.collapsible .da-panel-header").each(function(){
            if(a(this).find(".da-panel-toggler").size()===0){
                a("<span></span>").addClass("da-panel-toggler").appendTo(a(this))
            }
        });
        a("div.da-panel.collapsible .da-panel-header .da-panel-toggler").live("click",function(f){
            parentToggled=false;
            a(this).closest(".da-panel").children(":not(.da-panel-header)").slideToggle("normal",function(){
                if(!parentToggled){
                    a(this).closest(".da-panel").toggleClass("collapsed");
                    parentToggled=true
                }
            });
            f.preventDefault()
        });
        a(".da-header-dropdown").each(function(){
            var e=a(this).bind("click",function(f){
                f.stopPropagation()
            });
            e.parent().bind("click",function(f){
                e.toggle()
            })
        });
        a("body").bind("click",function(f){
            a(".da-header-dropdown:visible").each(function(){
                if(!a(f.target).closest(a(this).parent()).length){
                    a(this).hide()
                }
            })
        });
        a(".da-message").live("click",function(f){
            a(this).animate({
                opacity:0
            },function(){
                a(this).slideUp("normal",function(){
                    a(this).css("opacity","")
                })
            });
            f.preventDefault()
        });
        a("div#da-content #da-sidebar #da-main-nav").bind("click",function(f){
            f.stopPropagation()
        });
        a("div#da-content #da-sidebar").bind("click",function(f){
            a("#da-main-nav",a(this)).slideToggle("normal",function(){
                a(this).removeAttr("style").toggleClass("open")
            });
            f.preventDefault()
        });
        a(".da-header-button").bind("mousedown",function(f){
            a(this).addClass("active")
        }).bind("mouseup",function(f){
            a(this).removeClass("active")
        }).children(".da-header-dropdown").bind("mousedown",function(f){
            f.stopPropagation()
        });
        if(a.fn.placeholder){
            a("[placeholder]").placeholder()
        }
        a("table.da-table tbody tr:nth-child(2n)").addClass("even");
        a("table.da-table tbody tr:nth-child(2n+1)").addClass("odd");
        a("div#da-content #da-main-nav ul li a, div#da-content #da-main-nav ul li span").bind("click",function(f){
            if(a(this).next("ul").size()!==0){
                a(this).next("ul").slideToggle("normal",function(){
                    a(this).toggleClass("closed")
                });
                f.preventDefault()
            }
        });
        if(a.fn.tinyscrollbar){
            a(".da-panel.scrollable .da-panel-content").each(function(){
                var e=a(this).height(),f=a(this).children().wrapAll('<div class="overview"></div>').end().children().wrapAll('<div class="viewport"></div>').end().find(".viewport").css("height",e).end().append('<div class="scrollbar"><div class="track"><div class="thumb"><div class="end"></div></div></div></div>').tinyscrollbar({
                    axis:"x"
                });
                a(window).resize(function(){
                    f.tinyscrollbar_update()
                })
            })
        }
        if(a.fn.tipsy){
            var d=["n","ne","e","se","s","sw","w","nw"];
            for(var b in d){
                a(".da-tooltip-"+d[b]).tipsy({
                    gravity:d[b]
                })
            }
            a("input[title], select[title], textarea[title]").tipsy({
                trigger:"focus",
                gravity:"w"
            })
        }
        if(a.fn.customFileInput){
            a("input[type='file'].da-custom-file").customFileInput()
        }
    })
})(jQuery);