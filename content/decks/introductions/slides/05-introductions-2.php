<h2>Introductions</h2>
<?php /*
<h3>Eric Miller</h3>
<style type="text/css" media="screen">
.history-list li {
	list-style:none;
	width:200px;
	height:200px;
	float:left;
	display:block;
	margin:0 1em 1em 0;
	overflow:hidden;
}
.history-entry {
	font-size:.5em;
	text-align:center;
	position:relative;
}
.history-entry img {
	max-width:140px;
	max-height:140px;
	width: 100%;
}

</style>
*/?>
<div class="container" id="timeline-embed"></div>
	<script type="text/javascript">
	var timeline_config = {
		width:              '100%',
		height:             '600',
		source:             '<?php app()->contentWD();?>/timeline.json',
		// embed_id:           'timeline-embed',               //OPTIONAL USE A DIFFERENT DIV ID FOR EMBED
		// start_at_end:       false,                          //OPTIONAL START AT LATEST DATE
		// start_at_slide:     '1',                            //OPTIONAL START AT SPECIFIC SLIDE
		// start_zoom_adjust:  '3',                            //OPTIONAL TWEAK THE DEFAULT ZOOM LEVEL
		// hash_bookmark:      true,                           //OPTIONAL LOCATION BAR HASHES
		// font:               'Bevan-PotanoSans',             //OPTIONAL FONT
		// debug:              true,                           //OPTIONAL DEBUG TO CONSOLE
		// lang:               'fr',                           //OPTIONAL LANGUAGE
		// maptype:            'watercolor',                   //OPTIONAL MAP STYLE
		// css:                'path_to_css/timeline.css',     //OPTIONAL PATH TO CSS
		// js:                 'path_to_js/timeline-min.js'    //OPTIONAL PATH TO JS
	}
</script>
<script type="text/javascript" src="http://cdn.knightlab.com/libs/timeline/latest/js/storyjs-embed.js"></script>
<?php /* 
<ol class="history-list">
	<li>
		<figure class="history-entry">
			<p>1995-2000</p>
			<img src="http://www.stanford.edu/group/armyrotc/imgs/stanfordoval.jpg">
			<figcaption><a href="http://stanford.edu">Stanford</a> <a href="http://symsys.stanford.edu">Symbolic Systems</a> / <a href="https://ccrma.stanford.edu">MST</a></figcaption>
		</figure>
	</li>
	<li>
		<figure class="history-entry">
			<p>2000-2003</p>
			<img src="https://lh6.ggpht.com/NtEOeb0fHzKC7Cpz2DepxvvyrpdphKhY9yZfaiAB2CKHckY4I572e-3yOnud2r8xep8P%3Dw300">
			<figcaption><a href="http://www.avid.com/US/resources/digi-orientation">Digidesign/Avid: ProTools</a></figcaption>
		</figure>
	</li>
	<li>
		<figure class="history-entry">
			<p>2003-2007</p>
			<img src="http://www.stardust.com/mm5/graphics/00000001/modern-architecture-edmonds-lee1.jpg">
			<figcaption>CU Denver: <a href="http://www.ucdenver.edu/academics/colleges/ArchitecturePlanning/Academics/DegreePrograms/MArch/Pages/MArch.aspx">M.Arch</a></figcaption>
		</figure>
	</li>
	<li>
		<figure class="history-entry">
			<p>2007-2010</p>
			<img src="http://media.cdn.builtincolorado.com/sites/www.builtincolorado.com/files/imagecache/Medium/crowd-favorite-logo.jpg">
			<figcaption><a href="http://crowdfavorite.com">Crowd Favorite</a></figcaption>
		</figure>
	</li>
	<li>
		<figure class="history-entry">
			<p>2010-2012</p>
			<img src="http://gil.poly.edu/wp-content/uploads/2013/02/sifteo_cubits_02_610x407.jpg">
			<figcaption><a href="http://sifteo.com">Sifteo</a></figcaption>
		</figure>
	</li>
	<li>
		<figure class="history-entry">
			<p>2004-present</p>
			<img src="http://patternleaf.com/img/logo-orange.png">
			<figcaption><a href="http://patternleaf.com">patternleaf</a></figcaption>
		</figure>
	</li>
	<li>
		<figure class="history-entry">
			<p>2013-present</p>
			<img src="http://gravyplane.net/wp-content/uploads/2013/12/gravyplanead-289x300.png">
			<figcaption><a href="http://gravyplane.net">Gravy Plane</a></figcaption>
		</figure>
	</li>
	<li>
		<figure class="history-entry">
			<p>2014-present</p>
			<img src="<?php app()->contentWD(); ?>../slides/imgs/ia.png">
			<figcaption><a href="http://inspiringapps.com">Inspiring Apps</a></figcaption>
		</figure>
	</li>
</ol>
*/?>