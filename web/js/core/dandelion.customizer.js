(function(a){
    a(document).ready(function(h){
        var f="/dandelion";
        var g={
            blueprint:{
                name:"Blueprint",
                file: _app.urls.images.bg.blueprint
            },
            bricks:{
                name:"Bricks",
                file: _app.urls.images.bg.bricks
            },
            carbon:{
                name:"Carbon",
                file: _app.urls.images.bg.carbon
            },
            circuit:{
                name:"Circuit",
                file: _app.urls.images.bg.circuit
            },
            holes:{
                name:"Holes",
                file: _app.urls.images.bg.holes
            },
            mozaic:{
                name:"Mozaic",
                file: _app.urls.images.bg.mozaic
            },
            roof:{
                name:"Roof",
                file: _app.urls.images.bg.roof
            },
            stripes:{
                name:"Stripes",
                file: _app.urls.images.bg.stripes
            },
            darkWood:{
                name:"Dark Wood",
                file: _app.urls.images.bg.wood
            },
            lightWood:{
                name:"Light Wood",
                file: _app.urls.images.bg.lightWood
            }
        };
        var k={
            carbon:{
                name:"Carbon",
                file: _app.urls.images.headers.carbon
            },
            linen:{
                name:"Linen",
                file: _app.urls.images.headers.linen
            },
            leather:{
                name:"Leather",
                file: _app.urls.images.headers.leather
            },
            darkWood:{
                name:"Dark Wood",
                file: _app.urls.images.headers.wood
            },
            lightWood:{
                name:"Light Wood",
                file: _app.urls.images.headers.lightWood
            }
        };
    
        $select=a(document.createElement("select")).attr("id","da-body-pat").bind("change",function(i){
            a("body").css("background-image","url("+g[a(this).val()].file+")");
            i.preventDefault()
        });
        for(var c in g){
            $option=a(document.createElement("option"));
            $option.val(c).text(g[c].name);
            $option.appendTo($select)
        }
        a("#da-customizer #da-customizer-body-bg").append($select);
        $select=a(document.createElement("select")).attr("id","da-header-pat").bind("change",function(i){
            a("div#da-header #da-header-top").css("background-image","url("+k[a(this).val()].file+")");
            i.preventDefault()
        });
        for(var c in k){
            $option=a(document.createElement("option"));
            $option.val(c).text(k[c].name);
            $option.appendTo($select)
        }
        a("#da-customizer #da-customizer-header-bg").append($select);
        var d=a("#da-customizer #da-customizer-content");
        var b=d.css("height","auto").height();
        d.css("height","");
        a("#da-customizer #da-customizer-pulldown").bind("click",function(i){
            d=a(this).prev("#da-customizer-content");
            if(!d.hasClass("visible")){
                d.animate({
                    height:b
                },function(){
                    d.addClass("visible")
                })
            }else{
                d.animate({
                    height:0
                },function(){
                    d.removeClass("visible")
                })
            }
            i.preventDefault()
        });
        a("#da-customizer-fixed, #da-customizer-fluid").bind("change",function(){
            $fixed=a("#da-customizer-fixed").is(":checked");
            if($fixed){
                a("body #da-wrapper").removeClass("fluid").addClass("fixed")
            }else{
                a("body #da-wrapper").removeClass("fixed").addClass("fluid")
            }
            a(window).trigger("resize")
        }).trigger("change");
        function j(){
            var i=g[a("#da-body-pat").val()].file;
            var l=k[a("#da-header-pat").val()].file;
            var e="/* Paste the following code in /css/dandelion.theme.css */\n\nbody\n{\n\tbackground-image:url(../"+i+");\n}\n\ndiv#da-header #da-header-top\n{\n\tbackground-image:url(../"+l+");\n}\n";
            a("#da-customizer-dialog textarea").val(e)
        }
        if(a.fn.dialog){
            a('<div id="da-customizer-dialog" class="no-padding"><textarea readonly="readonly" id="da-customizer-css"></textarea></div>').hide().appendTo("body").dialog({
                modal:true,
                autoOpen:false,
                title:"Get CSS Style",
                resizable:false,
                width:450
            });
            a("#da-customizer-button button").bind("click",function(i){
                j();
                a("#da-customizer-dialog").dialog("open");
                i.preventDefault()
            })
        }
    })
})(jQuery);