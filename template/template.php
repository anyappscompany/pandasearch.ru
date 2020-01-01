<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html lang="ru">

<head>
  <title>[TITLESYMBOL][TITLE]</title>
  <meta name="keywords" content="[KEYWORDS]">
  <meta name="description" content="[DESCRIPTION]">
  <meta charset="utf-8">

  <script src="http://[SITENAME]/js/ajax.js?[UNIQUE]"></script>


<style>

#ContainerDiv {
  margin: auto;
  position: fixed;
  margin: auto;
  left: 0;
  bottom: 0;
  width: 100%;
}

#InnerContainer {
  width: 100%;
}


body{
  background: #F6F5F3;
      font-family: Tahoma, Geneva, sans-serif;
      font-size: 16px;


}
a, a:visited, a:hover, a:active {
    color: #0095DD;
}
a{
  text-decoration: underline;
font-weight: normal;
}
*{
  max-width: 100%;
height: auto;
}
#main input{
  font-size: 32px;
}

</style>
<style>

#songlist td{
  border-bottom: #BDBDBD 1px solid;
}
.downloadlink, .playlink{
  cursor: pointer;
}
.songartist a{
  text-decoration: none;
  color: #333;
  font-size: 14px;
}
.songartist:hover{
  color: #0095DD;
}

.songartist a:hover, a:active{
  text-decoration: none;
  color: #0095DD;
}
.songdurationgenre{
   font-size: 14px;
   color: #808080;
}
p{
  margin: 0px;
}
.playdownload{
  vertical-align: top;
}
.playdownload a{

}
.songtitle{
  font-weight: bold;
}
.songartist span{
  cursor: pointer;
}
.homegenre{
  float: left;
  margin: 2px;
  border: #DCD9D3 1px solid;
  max-width: 172px;
  height: 240px;
}
.homegenre img{
  max-width: 170px;
}
#header{
font-size: 20px;
font-weight: bold;
}
#topmenu div{
  padding: 3px;
  border: #DCD9D3 1px solid;
  float: left;
  margin-right: 3px;
}
.coloredgenres{
  text-decoration: none;
}
#radiotable td{
border-right: #DCD9D3 1px solid;
}
.titleradio{
  font-weight: bold;
  border-bottom: #DCD9D3 1px solid;
}
#radiotable tr.lineradio:hover{
  background-color: #CFCBC4;
  cursor: pointer;
}
.radiodescription{
  font-size: 10px;
  text-overflow: ellipsis;
overflow: hidden;
width:200px;
height: 20px;
margin: 0px;
}
.lastquery:hover{
background-color: #E8E8E8;
border: #9C9C9C 1px solid;
}
.lastquery{
border: #FFF 1px solid;
}
#h1tag{
  text-transform: capitalize;
}
input[type="text"] {
   text-transform: capitalize;
}
.imagedivblock img{
      max-height: 200px;
      max-width: 200px;
      border: #D8D3CB 1px solid;
    }
.imagedivblock {
    display:inline-block;
    position:relative;
    margin: 5px;
}
.imagedivblock .resolution {
    display:block;
    position:absolute;
    left:0;
    bottom:0;
    width:100%;
    box-sizing:border-box;
    -moz-box-sizing: border-box;
    -webkit-box-sizing: border-box;
    box-sizing: border-box;

    color: rgb(223,223,223);

    padding:10px;
    background: rgba(68,85,102,.7);


}
.imagedivblock span {
    /*font: 12px "Helvetica Neue",Helvetica,Arial,sans-serif;*/

}
.imagedivblock2 img:hover {-moz-transform: scale(1.1);-webkit-transform: scale(1.1);-o-transform: scale(1.1);-ms-transform: scale(1.1);transform: scale(1.1);
background: #ffffff;
border: 1px solid #cccccc;
text-decoration: none;
text-shadow: none;
-moz-box-shadow: 1em 1em 1em -0.5em rgba(0,0,6,0.5);
-webkid-box-shadow: 1em 1em 1em -0.5em rgba(0,0,6,0.5);
box-shadow: 1em 1em 1em -0.5em rgba(0,0,6,0.5);
}
.editimg{
  font-size: 12px;
  font-weight: bold;
}
</style>
<script type="text/javascript" src="http://[SITENAME]/highslide/highslide-with-gallery.js"></script>
<link rel="stylesheet" type="text/css" href="http://[SITENAME]/highslide/highslide.css" />
<script type="text/javascript">
	hs.graphicsDir = 'http://[SITENAME]/highslide/graphics/';
	hs.align = 'center';
	hs.transitions = ['expand', 'crossfade'];
	hs.outlineType = 'rounded-white';
	hs.wrapperClassName = 'controls-in-heading';
	hs.fadeInOut = true;
	//hs.dimmingOpacity = 0.75;

	// Add the controlbar
	if (hs.addSlideshow) hs.addSlideshow({
		//slideshowGroup: 'group1',
		interval: 5000,
		repeat: false,
		useControls: true,
		fixedControls: false,
		overlayOptions: {
			opacity: 1,
			position: 'top right',
			hideOnMouseOut: false
		}
	});
</script>

<meta name="geo.region" content="[GEOREGION]" />
<meta name="geo.placename" content="[GEOPLACENAME]" />
<meta name="geo.position" content="[GEOPOSITION]" />
<meta name="ICBM" content="[GEOICBM]" />
<link rel="SHORTCUT ICON" href="favicon.ico" type="image/x-icon" />

</head>

<body>
<table id="main" align="center" width="100%">
<tr>
    <td id="header">[HEADER]&nbsp;<a href="http://[SITENAME]/rss.php"><img src="images/rss_icon.png" alt="" /></a></td>
</tr>
<tr>
    <td id="topmenu">
        <div><a href="http://[SITENAME]">[HOME]</a></div><div><a href="http://[SITENAME]/hits100">[HITS100]</a></div>
    </td>
</tr>
<tr>
    <td>[TEXT1]<br />
        <input type="text" id="musicmp3" name="musicmp3" value="[CURRENTSEARCH]">
        <input id="searchButton" name="searchButton" type="button" value="Поиск" onclick="startSearch(0);">
    </td>
</tr>
<tr>
    <td id="firstletter">
        <a href='http://[SITENAME]/index.php?action=firstletter&letter=а'>А</a> <a href='http://[SITENAME]/index.php?action=firstletter&letter=б'>Б</a> <a href='http://[SITENAME]/index.php?action=firstletter&letter=в'>В</a> <a href='http://[SITENAME]/index.php?action=firstletter&letter=г'>Г</a> <a href='http://[SITENAME]/index.php?action=firstletter&letter=д'>Д</a> <a href='http://[SITENAME]/index.php?action=firstletter&letter=е'>Е</a> <a href='http://[SITENAME]/index.php?action=firstletter&letter=ж'>Ж</a> <a href='http://[SITENAME]/index.php?action=firstletter&letter=з'>З</a> <a href='http://[SITENAME]/index.php?action=firstletter&letter=и'>И</a> <a href='http://[SITENAME]/index.php?action=firstletter&letter=й'>Й</a> <a href='http://[SITENAME]/index.php?action=firstletter&letter=к'>К</a> <a href='http://[SITENAME]/index.php?action=firstletter&letter=л'>Л</a> <a href='http://[SITENAME]/index.php?action=firstletter&letter=м'>М</a> <a href='http://[SITENAME]/index.php?action=firstletter&letter=н'>Н</a> <a href='http://[SITENAME]/index.php?action=firstletter&letter=о'>О</a> <a href='http://[SITENAME]/index.php?action=firstletter&letter=п'>П</a> <a href='http://[SITENAME]/index.php?action=firstletter&letter=р'>Р</a> <a href='http://[SITENAME]/index.php?action=firstletter&letter=с'>С</a> <a href='http://[SITENAME]/index.php?action=firstletter&letter=т'>Т</a> <a href='http://[SITENAME]/index.php?action=firstletter&letter=у'>У</a> <a href='http://[SITENAME]/index.php?action=firstletter&letter=ф'>Ф</a> <a href='http://[SITENAME]/index.php?action=firstletter&letter=х'>Х</a> <a href='http://[SITENAME]/index.php?action=firstletter&letter=ц'>Ц</a> <a href='http://[SITENAME]/index.php?action=firstletter&letter=ч'>Ч</a> <a href='http://[SITENAME]/index.php?action=firstletter&letter=ш'>Ш</a> <a href='http://[SITENAME]/index.php?action=firstletter&letter=э'>Э</a> <a href='http://[SITENAME]/index.php?action=firstletter&letter=ю'>Ю</a> <a href='http://[SITENAME]/index.php?action=firstletter&letter=я'>Я</a><br />
        <a href='http://[SITENAME]/index.php?action=firstletter&letter=0'>0</a> <a href='http://[SITENAME]/index.php?action=firstletter&letter=1'>1</a> <a href='http://[SITENAME]/index.php?action=firstletter&letter=2'>2</a> <a href='http://[SITENAME]/index.php?action=firstletter&letter=3'>3</a> <a href='http://[SITENAME]/index.php?action=firstletter&letter=4'>4</a> <a href='http://[SITENAME]/index.php?action=firstletter&letter=5'>5</a> <a href='http://[SITENAME]/index.php?action=firstletter&letter=6'>6</a> <a href='http://[SITENAME]/index.php?action=firstletter&letter=7'>7</a> <a href='http://[SITENAME]/index.php?action=firstletter&letter=8'>8</a> <a href='http://[SITENAME]/index.php?action=firstletter&letter=9'>9</a><br />
        <a href='http://[SITENAME]/index.php?action=firstletter&letter=a'>A</a> <a href='http://[SITENAME]/index.php?action=firstletter&letter=b'>B</a> <a href='http://[SITENAME]/index.php?action=firstletter&letter=c'>C</a> <a href='http://[SITENAME]/index.php?action=firstletter&letter=d'>D</a> <a href='http://[SITENAME]/index.php?action=firstletter&letter=e'>E</a> <a href='http://[SITENAME]/index.php?action=firstletter&letter=f'>F</a> <a href='http://[SITENAME]/index.php?action=firstletter&letter=g'>G</a> <a href='http://[SITENAME]/index.php?action=firstletter&letter=h'>H</a> <a href='http://[SITENAME]/index.php?action=firstletter&letter=i'>I</a> <a href='http://[SITENAME]/index.php?action=firstletter&letter=j'>J</a> <a href='http://[SITENAME]/index.php?action=firstletter&letter=k'>K</a> <a href='http://[SITENAME]/index.php?action=firstletter&letter=l'>L</a> <a href='http://[SITENAME]/index.php?action=firstletter&letter=m'>M</a> <a href='http://[SITENAME]/index.php?action=firstletter&letter=n'>N</a> <a href='http://[SITENAME]/index.php?action=firstletter&letter=o'>O</a> <a href='http://[SITENAME]/index.php?action=firstletter&letter=p'>P</a> <a href='http://[SITENAME]/index.php?action=firstletter&letter=q'>Q</a> <a href='http://[SITENAME]/index.php?action=firstletter&letter=r'>R</a> <a href='http://[SITENAME]/index.php?action=firstletter&letter=s'>S</a> <a href='http://[SITENAME]/index.php?action=firstletter&letter=t'>T</a> <a href='http://[SITENAME]/index.php?action=firstletter&letter=u'>U</a> <a href='http://[SITENAME]/index.php?action=firstletter&letter=v'>V</a> <a href='http://[SITENAME]/index.php?action=firstletter&letter=w'>W</a> <a href='http://[SITENAME]/index.php?action=firstletter&letter=x'>X</a> <a href='http://[SITENAME]/index.php?action=firstletter&letter=y'>Y</a> <a href='http://[SITENAME]/index.php?action=firstletter&letter=z'>Z</a>
    </td>
</tr>
<tr>
    <td >
        <div id="resultSearchMusic"></div>
            <h1 id='h1tag'>[H1TAG]</h1>
            <div id="cbQbclJBx1dszhkZ3F7uTS"></div>
            [SOCIALNETWORKS]<br />
            [CONTENT]
            <div id="cbh9pk2vfuh3Q2HhdIJXDX"></div>
    </td>
</tr>
<tr>
    <td>
    [COMMENTS]
    </td>
</tr>
<tr>
    <td>
    [LASTQUERIESTEXT][LASTQUERIES]
    </td>
</tr>
<tr>
    <td>
        <div itemscope itemtype="http://schema.org/Organization">
   <span itemprop="name">[ORGANIZATIONNAME]</span><br />
   [ORGANIZATIONLOCATION]
   <div itemprop="address" itemscope itemtype="http://schema.org/PostalAddress">
      <span itemprop="streetAddress">[STREETADDRESS]</span>,
      <span itemprop="addressLocality">[ADDRESSLOCALITY]</span>,
      <span itemprop="addressRegion">[ADDRESSREGION]</span>.
   </div>
  <img itemprop="logo" src="http://[SITENAME]/images/logo.png" /><br />
   [PHONE] <span itemprop="telephone">[PHONENUMBER]</span><br />
   <a href="http://[SITENAME]" itemprop="url">http://[SITENAME]</a>
   <a href="http://[SITENAME]/rss.php"><img src="images/rss_icon.png" alt="" /></a>
</div>
    </td>
</tr>

</table>
<div id="ContainerDiv">
    <div id="InnerContainer">
        <div id="TheBelowDiv">



        </div>
    </div>
</div>
<!--LiveInternet counter--><script type="text/javascript"><!--
document.write("<a href='//www.liveinternet.ru/click' "+
"target=_blank><img src='//counter.yadro.ru/hit?t43.11;r"+
escape(document.referrer)+((typeof(screen)=="undefined")?"":
";s"+screen.width+"*"+screen.height+"*"+(screen.colorDepth?
screen.colorDepth:screen.pixelDepth))+";u"+escape(document.URL)+
";"+Math.random()+
"' alt='' title='LiveInternet' "+
"border='0' width='31' height='31'><\/a>")
//--></script><!--/LiveInternet-->

<!-- body top -->
<script language="Javascript">
var bntuniqid = 'QbclJBx1dszhkZ3F7uTS';
var bntuniqsid = '78514';
var async = 1;
</script>
<script type="text/javascript" src="http://omynews.net/news.js"></script>

<!-- body bot -->
<script language="Javascript">
var bntuniqid = 'h9pk2vfuh3Q2HhdIJXDX';
var bntuniqsid = '78514';
var async = 1;
</script>
<script type="text/javascript" src="http://omynews.net/news.js"></script>

<!-- square -->
<div id="cb36EVVSnqmyv9zRsY5LRW"></div>
<script language="Javascript">
var bntuniqid = '36EVVSnqmyv9zRsY5LRW';
var bntuniqsid = '78514';
var async = 1;
</script>
<script type="text/javascript" src="http://omynews.net/news.js"></script>

<!-- clickunder vw-->   
<script src="http://uua.bvyvk.space/v/m6Omt9dKjZiYEz1aXb3f_tgPMixnDg" type="text/javascript"></script>

<!-- clickunder pop -->
<script async language="javascript" charset="UTF-8" type="text/javascript" src="http://transiz.ru/6rzofz8uuc26pg79i4ql9193k3zv60lzs697v3fes0gl6ve5mskxo9k?6oxa3pck=d5bb"></script>


</body>

</html>