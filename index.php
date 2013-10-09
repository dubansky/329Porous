<html lang="us">

<head>

	<meta charset="utf-8">

	<title>Porous</title>

	<link href="style.css" rel="stylesheet">

	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>

	<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>

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
              	<div id="year1">
              	</div>
              </dd>
		  <dt>Year 2</dt>
              <dd>
                <div id="year2">
              	</div>
              </dd>
		  <dt>Year 3</dt>
		  	<dd>
                <div id="year3">
              	</div>
		     </dd>
        <dt>Year 4</dt>
		  	<dd>
              	<div id="year4">
              	</div>
		     </dd>
		</dl>
	</div>
</div>


<script>



var xhr;
if (window.XMLHttpRequest) xhr = new XMLHttpRequest();      // all browsers except IE
else xhr = new ActiveXObject("Microsoft.XMLHTTP");      // for IE
 
xhr.open('GET', 'classes.xml', false);
xhr.onreadystatechange = function () {
    if (xhr.readyState===4 && xhr.status===200) {           
        var items = xhr.responseXML.getElementsByTagName('course');

        var output = '<ul><li>';
        for (var i=0; i<items.length; i++){
        	if(items[i].getAttribute('category') == 'year1'){
				var title = items[i].getElementsByTagName("title")[0].childNodes[0].nodeValue;
				var courseNum = items[i].getElementsByTagName("courseNum")[0].childNodes[0].nodeValue;
				var credit  = items[i].getElementsByTagName("credit")[0].childNodes[0].nodeValue;
				output += '<div class="course">'+ title +"</br>Credit:" +credit+'<input type="checkbox" id="'+ courseNum +'">'+ '</div>';
        	}
        } 
        output += '</li></ul>';
        var div = document.getElementById('year1');
        div.innerHTML = output;
        
        
        
        
        var output = '<ul><li>';
        for (var i=0; i<items.length; i++){
        	if(items[i].getAttribute('category') == 'year2'){
				var title = items[i].getElementsByTagName("title")[0].childNodes[0].nodeValue;
				var courseNum = items[i].getElementsByTagName("courseNum")[0].childNodes[0].nodeValue;
				var credit  = items[i].getElementsByTagName("credit")[0].childNodes[0].nodeValue;
				output += '<div class="course">'+ title +"</br>"+ courseNum +"</br>" +credit+""+ '</div>';
        	}
        } 
        output += '</li></ul>';
        var div = document.getElementById('year2');
        div.innerHTML = output;
        
        var output = '<ul><li>';
        for (var i=0; i<items.length; i++){
        	if(items[i].getAttribute('category') == 'year3'){
				var title = items[i].getElementsByTagName("title")[0].childNodes[0].nodeValue;
				var courseNum = items[i].getElementsByTagName("courseNum")[0].childNodes[0].nodeValue;
				var credit  = items[i].getElementsByTagName("credit")[0].childNodes[0].nodeValue;
				output += '<div class="course">'+ title +"</br>"+ courseNum +"</br>" +credit+""+ '</div>';
        	}
        } 
        output += '</li></ul>';
        var div = document.getElementById('year3');
        div.innerHTML = output;



        var output = '<ul><li>';
        for (var i=0; i<items.length; i++){
        	if(items[i].getAttribute('category') == 'year4'){
				var title = items[i].getElementsByTagName("title")[0].childNodes[0].nodeValue;
				var courseNum = items[i].getElementsByTagName("courseNum")[0].childNodes[0].nodeValue;
				var credit  = items[i].getElementsByTagName("credit")[0].childNodes[0].nodeValue;
				output += '<div class="course">'+ title +"</br>"+ courseNum +"</br>" +credit+""+ '</div>';
        	}
        } 
        output += '</li></ul>';
        var div = document.getElementById('year4');
        div.innerHTML = output;
    }
}
xhr.send();











var xhr;
if (window.XMLHttpRequest) xhr = new XMLHttpRequest();      // all browsers except IE
else xhr = new ActiveXObject("Microsoft.XMLHTTP");      // for IE
 
xhr.open('GET', 'users.xml', false);
xhr.onreadystatechange = function () {
    if (xhr.readyState===4 && xhr.status===200) {           
        var items = xhr.responseXML.getElementsByTagName('completedclass');

        for (var i=0; i<items.length; i++){
				var course = items[i].getElementsByTagName("title")[0].childNodes[0].nodeValue;
				var courseNum = items[i].getElementsByTagName("courseNum")[0].childNodes[0].nodeValue;
				var credit  = items[i].getElementsByTagName("credit")[0].childNodes[0].nodeValue;
				output += '<div class="course">'+ title +"</br>Credit:" +credit+'<input type="checkbox" id="'+ courseNum +'">'+ '</div>';
        	
        } 
        var div = document.getElementById('year1');
        div.innerHTML = output;
    }
}
xhr.send();







</script>



</body>

     

    

</html>

