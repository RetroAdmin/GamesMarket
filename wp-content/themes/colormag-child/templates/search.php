<?php
	/*
	Template Name: Search Page
	*/
	get_header();
?>



<style media="screen">
	.auto_li{
		position:relative;
		padding-left: 5px !important;
	}
	.auto_li:hover{
		background: #dedede;
		cursor:pointer;
	}
	.auto_li a{
		width:100%;
		height:100%;
		position: absolute;
		z-index:1;
		top: 0;
		left: 0;
		padding: 0;
		border: 0 !important;
		background: transparent !important;
	}
	.auto_li a.ui-state-focus{
		padding: 0;
		border: 0 !important;
		background: transparent !important;
	}
	.auto_li p{
		position:relative;
		z-index: 2;
		margin: 0;
		line-height: 45px;
	}
	/********************************************/
	/*              Autocomplete                */
	/********************************************/
		/* .ui-helper-hidden-accessible{display:none;}
		.ui-autocomplete{padding-left:0;width:436px;border:2px solid #202224;background-image:url(../images/design/background2.png);}
		.auto_li {list-style:none;border-bottom:1px solid #202224;cursor:pointer;padding:4px;min-height:57px;position:relative;}
		.auto_img {width:43px;float:left;margin-right:3px;}
		.auto_li:hover{background-color:rgba(0,0,0,0.17);}
		.ui-state-hover,.ui-widget-content .ui-state-hover,.ui-widget-header .ui-state-hover,.ui-state-focus,.ui-widget-content .ui-state-focus,.ui-widget-header .ui-state-focus{display:block;width:100%;min-height:65px;position:absolute;top:0;left:0;z-index:-100;background-color:rgba(0,0,0,0.2) !important;}
		.auto_p{margin:0;padding:0;}
		.auto_titre{font-weight:600;}
		.auto_rea{letter-spacing:-1px;font-size:14px;} */

</style>




<div id="">
	<div id="content" class="clearfix">
		<article class="type-page">

			<header class="entry-header">
				<h1 class="entry-title">Recherche</h1>
			</header>

			<form action="#" method="post" class="formGM" id="formInscription">
				<div class="row">
					<input type="text" name="search" value="" id="searchField">
				</div>
			</form>


		</article>
	</div>
</div>




<script src="//code.jquery.com/ui/1.9.1/jquery-ui.js"></script>
<script type="text/javascript">

jQuery(function($){

	/*******************************/
	/*        Autocomplete         */
	/*******************************/
		jQuery('#searchField').autocomplete({
			minLength : 2,
			position : { my : 'top', at : 'bottom' },
			source : '<?php echo get_site_url(); ?>/wp-content/themes/colormag-child/assets/functions/recherche.php',
		    select : function(event, ui) {
		        window.location.href = '<?php echo get_site_url();?>/'+ui.item.URL;
		        return false;
		    }
		})
		.data('autocomplete')._renderItem=function(ul,item){
			return jQuery('<li class="auto_li"><a href="<?php echo get_site_url();?>/'+item.URL+'"></a></li>')
			.data('item.autocomplete', item)
			.append('<p class="auto_p"><span class="auto_titre">'+item.NOM+'</span> / <span class="auto_console">'+item.CONSOLE+'</span> / <span class="auto_console">'+item.REGION+'</span></p>')
			.appendTo(ul);
		};
});

</script>


<?php get_footer(); ?>
