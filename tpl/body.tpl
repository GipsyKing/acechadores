<body>
{*<canvas id="canvas" width="1600" height="1200"></canvas>*}
<div id="page">
  <div id="leftbanner"></div>
	<div id="backcard" class="card">
		<div id="ocho">8</div>
		<div id="logo">Acechado<span>r</span>.es</div>
		<!--<div id="mouse">&spades;</div>-->
	</div>
	<div id="card" class="card">
		<div id="leftpanel">
			<a href="/" id="as">
				A
			</a>
			<form class="box submit_go" action="submit/" method="get">
				<button type="submit">
					Enviar un enlace
				</button>
			</form>
			<form class="box search" action="search" method="get">
			  <input type="text" placeholder="Buscar" name="q" />
				<button type="submit" disabled="disabled" title="Enviar búsqueda">
					&#8629;
				</button>
			</form>
			<!--<div class="box">
				Acechos recientes
			</div>-->
			<div class="box">
			 <h3>Sabías que...</h3>
			 <p>{$tip}</p>
			</div>
			<div class="box ad">
<script type="text/javascript"><!--
google_ad_client = "pub-1527586273799797";
/* panel lateral 200x200, creado 15/03/10 */
google_ad_slot = "1827022614";
google_ad_width = 200;
google_ad_height = 200;
//-->
</script>
<script type="text/javascript"
src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
</script>			
			</div>
		</div>
		<div id="view">
  		<div class="ad w468">
        <script type="text/javascript"><!--
        google_ad_client = "pub-1527586273799797";
        /* banner-top 468x60, creado 15/03/10 */
        google_ad_slot = "9454466895";
        google_ad_width = 588;
        google_ad_height = 60;
        //-->
        </script>
        <script type="text/javascript"
        src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
        </script>
  		</div>
		
		{*include file="menu.tpl"*}
		{if $page_tpl}
		{include file=$page_tpl}
		{/if}
		  <div style="text-align: center; margin-top: 20px">
		    <h1>Nuestros tésnicos están trabajando en la güé.</h1>
		  </div>
		</div>
	</div>

</div>
<div id="footer">
  <div>
    &copy; 2010 LA BANDICA GESTIONA FUERTE / acechador.es
  </div>
</div>
</body>
