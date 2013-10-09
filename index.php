<html lang="us">
<head>
	<meta charset="utf-8">
	<title>Porous</title>
	<link href="css/smoothness/jquery-ui-1.10.1.custom.css" rel="stylesheet">
	<script src="js/jquery-1.9.1.js"></script>
	<script src="js/jquery-ui-1.10.1.custom.js"></script>
	<script>	
		$(function() {
		  $( "#accordion" ).accordion();
		});
		
		$(function() {
		  $( "#tabs" ).tabs();
		});
		
		
		var lastScrollTop = 0;
		var itemIndex = 0;		
		$(window).scroll(function(event){
		   var st = $(this).scrollTop();
		   if ((st > lastScrollTop) && (itemIndex > 1)){
		       itemIndex = itemIndex - 1;
		   } else {
		      itemIndex = itemIndex + 1;
		   }
		   itemIndex = parseInt(itemIndex, 10);   
		   $("#accordion").accordion('option','active', (itemIndex));
		   lastScrollTop = st;
		});
		
		
	$(function() {
	
	    // Set up variables
	    var $el, $parentWrap, $otherWrap, 
	        $allTitles = $("dt").css({
	            padding: 5, // setting the padding here prevents a weird situation, where it would start animating at 0 padding instead of 5
	            "cursor": "pointer" // make it seem clickable
	        }),
	        $allCells = $("dd").css({
	            position: "relative",
	            top: -1,
	            left: 0,
	            display: "none" // info cells are just kicked off the page with CSS (for accessibility)
	        });
	    
	    // clicking image of inactive column just opens column, doesn't go to link   
	    $("#wrap").delegate("a.image","click", function(e) { 
	        
	        if ( !$(this).parent().hasClass("curCol") ) {         
	            e.preventDefault(); 
	            $(this).next().find('dt:first').click(); 
	        } 
	        
	    });
	    
	    // clicking on titles does stuff
	    $("#wrap").delegate("dt", "click", function() {
	        
	        // cache this, as always, is good form
	        $el = $(this);
	        
	        // if this is already the active cell, don't do anything
	        if (!$el.hasClass("current")) {
	        
	            $parentWrap = $el.parent().parent();
	            $otherWraps = $(".info-col").not($parentWrap);
	            
	            // remove current cell from selection of all cells
	            $allTitles = $("dt").not(this);
	            
	            // close all info cells
	            $allCells.slideUp();
	            
	            // return all titles (except current one) to normal size
	            $allTitles.animate({
	                fontSize: "14px",
	                paddingTop: 5,
	                paddingRight: 5,
	                paddingBottom: 5,
	                paddingLeft: 5
	            });
	            
	            // animate current title to larger size            
	            $el.animate({
	                "font-size": "20px",
	                paddingTop: 10,
	                paddingRight: 5,
	                paddingBottom: 0,
	                paddingLeft: 10
	            }).next().slideDown();
	            
	            // make the current column the large size
	            $parentWrap.animate({
	                width: 900
	            }).addClass("curCol");
	            
	            // make other columns the small size
	            $otherWraps.animate({
	                width: 140
	            }).removeClass("curCol");
	            
	            // make sure the correct column is current
	            $allTitles.removeClass("current");
	            $el.addClass("current");  
	        
	        }
	        
	    });
	    
	    $("#starter").trigger("click");
	    
	});
		
        
        
                    
        
		
	</script>
	<style>	  
	* { margin: 0; padding: 0; }
	html, body { height: 100%; overflow: hidden; background: #b8c85e; }
	body { font: 14px Georgia, serif; }
	#wrap { width: 85%; padding: 0 0 0 15px; margin: 0 auto; overflow: hidden; height: 100%; }
	
	.info-col { float: left; width: 132px; height: 100%; padding: 50px 0 0 0; }
	.info-col h2 { text-align: center; font-weight: normal; padding: 25px 0; }
	
	.image { height: 100px; text-indent: -9999px; display: block; border-right: 1px solid white; }
	
	dt { padding: 5px; background: #900; color: white; border-top: 1px solid white; border-right: 1px solid white; }
	dd { position: absolute; left: -9999px; top: -9999px; width: 879px; height: 400px; background: #900; padding: 10px; color: white; border-right: 1px solid white; overflow-y: scroll;
	}
	
	dt:nth-of-type(1) { background: #b44835; }
	dd:nth-of-type(1) { background: #b44835; }
	
	dt:nth-of-type(2) { background: #ff7d3e; }
	dd:nth-of-type(2) { background: #ff7d3e; }
	
	dt:nth-of-type(3) { background: #ffb03b; }
	dd:nth-of-type(3) { background: #ffb03b; }
	
	dt:nth-of-type(4) { background: #c2a25c; }
	dd:nth-of-type(4) { background: #c2a25c; }
	
	dt:nth-of-type(5) { background: #4c443c; }
	dd:nth-of-type(5) { background: #4c443c; }
	
	dt:nth-of-type(6) { background: #656b60; }
	dd:nth-of-type(6) { background: #656b60; }
	
	.curCol { -moz-box-shadow: 0 0 10px rgba(0,0,0,0.2); -webkit-box-shadow: 0 0 10px rgba(0,0,0,0.2); z-index: 1; position: relative;
	}
	
	#post-wrap{
		width: 100%;
		hight: 100px;
		background-color: gray;
	}
	
	
	   </style>
</head>
<body>

<div id="wrap">
    <div class="info-col">
    
    	<h2>User</h2>
    	
    	<dl>
    		<dt id="starter">first page</dt>
    			<dd>
				Add Classes here	   
    	  		</dd>
    	 </dl>
    </div>
	<div class="info-col">
		<h2>Classes</h2>
		<dl>
		  <dt>Year 1</dt>
              <dd>
              	<div class="year1">
              	</div>

              </dd>
		  <dt>Year 2</dt>
              <dd>
                    info for year 2
              </dd>
		  <dt>Year 3</dt>
		  	<dd>
                info for year 3
		     </dd>
        <dt>Year 4</dt>
		  	<dd>
                info for year 4
		     </dd>
		</dl>
	
	</div>
			
</div>

</body>
    
<script>
        
    function loadXMLDoc(dname)
    {
        if (window.XMLHttpRequest){
          xhttp=new XMLHttpRequest();
          }else{
          xhttp=new ActiveXObject("Microsoft.XMLHTTP");
        }
        xhttp.open("GET",dname,false);
        xhttp.send();
        return xhttp.responseXML;
    }
                              
        xmlDoc=loadXMLDoc("classes.xml");

        x=xmlDoc.getElementsByTagName("title");

        for (i=0;i<10;i++)
        {
            $( ".year1" ).append( "<p>Test</p>" );

        }
                      
                

</script>    
    
</html>
