</div>  <!-- END OF SITE CONTENT -->

<footer id="footer">
<div class="footer-container">
</div> 
    
</footer>
</div>  <!-- END OF PAGE WRAPPER -->


<?php wp_footer(); ?>

<script type="text/javascript">
			var temp = "<div class='staff-box' style='width:{width}px; height: {height}px;'><div class='person-content-wrapper' style='background: {thisUrl}; background-position: center !important;'><div class='person-content'></div></div></div>";
			/*
            var colour = [
				"rgb(142, 68, 173)",
				"rgb(243, 156, 18)",
				"rgb(211, 84, 0)",
				"rgb(0, 106, 63)",
				"rgb(41, 128, 185)",
				"rgb(192, 57, 43)",
				"rgb(135, 0, 0)",
				"rgb(39, 174, 96)"
			];
            */
    
    var staffBgUrls = ['url("http://192.168.11.6:8083/wp-content/themes/smoy/img/ihmiset/Maria_Blomberg.jpg")', 'url("http://192.168.11.6:8083/wp-content/themes/smoy/img/ihmiset/Katja_Himanen.jpg")', 'url("http://192.168.11.6:8083/wp-content/themes/smoy/img/ihmiset/jarno_laitinen@2x.jpg")', 'url("http://192.168.11.6:8083/wp-content/themes/smoy/img/ihmiset/Jukka_Illikainen.jpg")', 'url("http://192.168.11.6:8083/wp-content/themes/smoy/img/ihmiset/Kimmo_Levonen@2x.jpg")', 'url("http://192.168.11.6:8083/wp-content/themes/smoy/img/ihmiset/esa_sonninen@2x.jpg")', 'url("http://192.168.11.6:8083/wp-content/themes/smoy/img/ihmiset/teemu_eskola.jpg")', 'url("http://192.168.11.6:8083/wp-content/themes/smoy/img/ihmiset/jyri_huhtala@2x.jpg")', 'url("http://192.168.11.6:8083/wp-content/themes/smoy/img/ihmiset/marini_jarvenpaa_graafihrj.jpg")', 'url("http://192.168.11.6:8083/wp-content/themes/smoy/img/ihmiset/Mari_Eramaa@2x.jpg")', 'url("http://192.168.11.6:8083/wp-content/themes/smoy/img/ihmiset/Leyla_Avsar@2x.jpg")', 'url("http://192.168.11.6:8083/wp-content/themes/smoy/img/ihmiset/Pekka_Palonkorpi@2x.JPG")', 'url("http://192.168.11.6:8083/wp-content/themes/smoy/img/ihmiset/Dani_Raatikainen_@2x.jpg")', 'url("http://192.168.11.6:8083/wp-content/themes/smoy/img/ihmiset/rocky_rinne@2x.jpg")'];
    
    var sizeBooleans = [1, 1, 0, 0, 1, 0, 1, 0, 0, 0, 0, 0, 0, 0];

			var w = 1, h = 1, html = '', /*color = ''*/ thisUrl = '', limitItem = 14, thisBoolean = '';
			for (var i = 0; i < limitItem; ++i) {
				//h = 1 + 3 * Math.random() << 0;
				//w = 1 + 3 * Math.random() << 0;
				//color = colour[colour.length * Math.random() << 0];
                
                /*
                
                rand = Math.random();
                    
                if (rand >= 0.7){
                    h = 380;
                    w = 380;
                }else{
                    h = 190;
                    w = 190;
                }
                */
                
                thisBoolean = sizeBooleans[i];
                
                if(thisBoolean == 1){
                    h = 285;
                    w = 285;
                }else{
                    h = 152;
                    w = 152;
                }
                
                
                thisUrl = staffBgUrls[i];
                
				//html += temp.replace(/\{height\}/g, /*h*120*/ ).replace(/\{width\}/g, /*w*120*/ ).replace("{thisUrl}", thisUrl);
                html += temp.replace(/\{height\}/g, /*h*120*/ h ).replace(/\{width\}/g, /*w*120*/ w ).replace("{thisUrl}", thisUrl);
                //html += temp.replace("{thisUrl}", thisUrl);
			}
			jQuery("#staff-wrapper").html(html);


			jQuery(function() {
				var wall = new Freewall("#staff-wrapper");
                var windowWidth = '';
				wall.reset({
					selector: '.staff-box',
					animate: true,
					cellW: 152,
					cellH: 152,
                    gutterY: 0,
                    gutterX: 0,
					delay: 20,
					onResize: function() {
                        //wall.fillHoles(jQuery(window).width() - 30, jQuery(window).height() - 30);
						//wall.refresh(jQuery(window).width() - 30, jQuery(window).height() - 30);
                        
                        windowWidth = window.innerWidth;
                        
                        if(windowWidth < 929) {
                            console.log("fitZone");
                            wall.fitZone();
                            
                        }else{
                            console.log("refresh");
                            wall.refresh(jQuery(window).width() - 30, jQuery(window).height() - 30);
                        }
                        
                        
					}
				});
				// caculator width and height for IE7;
                //wall.refresh(jQuery(window).width() - 30, jQuery(window).height() - 30);
				//wall.fitZone();
                //$(window).trigger("resize");
                if(windowWidth < 929) {
                    wall.fitZone();      
                }else{
                    wall.refresh(jQuery(window).width() - 30, jQuery(window).height() - 30);
                }
			});
		</script>

</body>
</html>    