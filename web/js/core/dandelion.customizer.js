(function(a){
    a(document).ready(function(h){
        var f="/dandelion";
        var g={
            blueprint:{
                name:"Blueprint",
                file:"images/bg/blueprint.png"
            },
            bricks:{
                name:"Bricks",
                file:"images/bg/bricks.png"
            },
            carbon:{
                name:"Carbon",
                file:"images/bg/carbon.png"
            },
            circuit:{
                name:"Circuit",
                file:"images/bg/circuit.png"
            },
            holes:{
                name:"Holes",
                file:"images/bg/holes.png"
            },
            mozaic:{
                name:"Mozaic",
                file:"images/bg/mozaic.png"
            },
            roof:{
                name:"Roof",
                file:"images/bg/roof.png"
            },
            stripes:{
                name:"Stripes",
                file:"images/bg/stripes.png"
            },
            darkWood:{
                name:"Dark Wood",
                file:"images/headers/wood.png"
            },
            lightWood:{
                name:"Light Wood",
                file:"images/headers/light-wood.png"
            }
        };
        var k={
            carbon:{
                name:"Carbon",
                file:"images/headers/carbon.png"
            },
            linen:{
                name:"Linen",
                file:"images/headers/linen.png"
            },
            leather:{
                name:"Leather",
                file:"images/headers/leather.png"
            },
            darkWood:{
                name:"Dark Wood",
                file:"images/headers/wood.png"
            },
            lightWood:{
                name:"Light Wood",
                file:"images/headers/light-wood.png"
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