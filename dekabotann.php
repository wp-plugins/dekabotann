<?php
/*
Plugin Name: dekabotann
Plugin URI: http://accountingse.net/2012/09/582/
Description: twitter・facebook・はてブ・google+のでかいボタンです。
Version: 0.1.2
Author: kazunii_ac
Author URI: https://twitter.com/kazunii_ac
License: GPL2
*/
 
/*  Copyright 2012 kazunii_ac (email : moskov@mcn.ne.jp)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License, version 2, as
	published by the Free Software Foundation.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/
function dekabotann($Honbun){
	$NowURL = get_bloginfo('url') . get_permalink();
	
	$Hatena = '<a href="http://b.hatena.ne.jp/entry/" class="hatena-bookmark-button" data-hatena-bookmark-layout="vertical" title="このエントリーをはてなブックマークに追加"><img src="http://b.st-hatena.com/images/entry-button/button-only.gif" alt="このエントリーをはてなブックマークに追加" width="20" height="20" style="border: none;" /></a><script type="text/javascript" src="http://b.st-hatena.com/js/bookmark_button.js" charset="utf-8" async="async"></script>';
	$Twitter = '<a href="https://twitter.com/share" class="twitter-share-button" data-lang="ja" data-count="vertical">ツイート</a>' . "\n"
		. '<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>';
	$FaceBook = '<iframe src="//www.facebook.com/plugins/like.php?href='
	    . urlencode($NowURL)
	    . '&amp;send=false&amp;layout=box_count&amp;width=86&amp;show_faces=true&amp;action=like&amp;colorscheme=light&amp;font&amp;height=90" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:86px; height:90px;" allowTransparency="true"></iframe>';
	$GooglePlus = '<!-- このタグを +1 ボタンを表示する場所に挿入してください -->' . "\n";
	$GooglePlus .= '<g:plusone size="tall"></g:plusone>' . "\n";
	$GooglePlus .= '' . "\n";
	$GooglePlus .= '<!-- この render 呼び出しを適切な位置に挿入してください -->' . "\n";
	$GooglePlus .= '<script type="text/javascript">' . "\n";
	$GooglePlus .= "  window.___gcfg = {lang: 'ja'};" . "\n";
	$GooglePlus .= '' . "\n";
	$GooglePlus .= '  (function() {' . "\n";
	$GooglePlus .= "    var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;" . "\n";
	$GooglePlus .= "    po.src = 'https://apis.google.com/js/plusone.js';" . "\n";
	$GooglePlus .= "    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);" . "\n";
	$GooglePlus .= '  })();' . "\n";
	$GooglePlus .= '</script>' . "\n";
	
	$S = '<ul>';
	$S .= '<li style="float: left;padding:5px;list-style-type:none">';
	$S .= $Hatena . "\n";
	$S .= '</li><li style="float: left;padding:5px;list-style-type:none">';
	$S .= $Twitter . "\n";
	$S .= '</li><li style="float: left;padding:5px;list-style-type:none">';
	$S .= $GooglePlus . "\n";
	$S .= '</li><li style="float: left;padding:5px;list-style-type:none">';
	$S .= $FaceBook . "\n";
	$S .= '</li>';
	$S .= '</ul><p style="clear:both;"></p>';
	
	if( is_singular() && in_the_loop() ){
		return($S . $Honbun . $S);
	}else{
		return($Honbun);
	}
}
add_filter( 'the_content', 'dekabotann'        );

?>