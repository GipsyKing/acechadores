<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<base href="http://acechador.es"/>
<title>Acechador.es</title>
<link rel="shortcut icon" href="http://acechador.es/favicon2.ico" />
<link rel="stylesheet" type="text/css" href="stylesheet.css" />
<script type="text/javascript" src="libs_oss/jquery/jquery-1.4.2.min.js"></script>
<script type="text/javascript">
//<![CDATA[
{literal}
Votes = {
	vote: function(link, value) {
		jQuery.ajax({
			url: 'ajax/vote.php',
			data: {
				link: link,
				vote: value
			},
			success: Votes.success
		});
	},
	success: function(data) {
		console.log(data);
	}
}
{/literal}
{*literal}
AcBanners = {
  html: '<iframe width="100px" scrolling="no" frameborder="0" src="http://banners.adultfriendfinder.com/piclist?background_color=transparent&banner_title=1Encuentra+mujeres+calientes+para+sexo+en+&border_color=transparent&display=vertical&grid=1x6&link_color=%23ffffff&movie=0&no_fakevid=1&no_flash=1&photo=2&pic_border_color=%23000000&pic_border_width=0&piclang=spanish&pid=g1212252-ppc&race=4&rollover_header_color=%23FFEE80&rows=6&show_join_link=0&size=1&text_color=%23aaaaaa&thumb=square&title_color=%23dddddd&width=100px&spcpromo_creative=July-spc&iframe=1" style="vertical-align: middle;" height="1080" allowtransparency="true"></iframe>',
  onLoad: function(e) {
    leftbanner = document.getElementById('leftbanner');
    leftbanner.innerHTML = AcBanners.html;
  }
}
window.onload = AcBanners.onLoad;
{/literal*}
{*literal}
AcechaCanvas = {
  onLoad: function(e) {
    AcechaCanvas.canvas = document.getElementById("canvas");
    //AcechaCanvas.canvas.style.
    
    AcechaCanvas.ctx = AcechaCanvas.canvas.getContext('2d');
    
    AcechaCanvas.ctx.fillStyle = "rgb(200,0,0)";
    for(i = 0; i < 2000; i+=150) {  
      for(k = 0; k < 1000; k+=150) {
        AcechaCanvas.ctx.beginPath();  
        AcechaCanvas.ctx.arc(i+75,k+75,50,0,Math.PI*2,true); // Outer circle  
        AcechaCanvas.ctx.moveTo(i+110,k+75);  
        AcechaCanvas.ctx.arc(i+75,k+75,35,0,Math.PI,false);   // Mouth (clockwise)  
        AcechaCanvas.ctx.moveTo(i+65,k+65);  
        AcechaCanvas.ctx.arc(i+60,k+65,5,0,Math.PI*2,true);  // Left eye  
        AcechaCanvas.ctx.moveTo(i+95,k+65);  
        AcechaCanvas.ctx.arc(i+90,k+65,5,0,Math.PI*2,true);  // Right eye  
        AcechaCanvas.ctx.stroke();
      }
    }      
  }
}
window.onload = AcechaCanvas.onLoad;
{/literal*}
//]]></script>
</head>
