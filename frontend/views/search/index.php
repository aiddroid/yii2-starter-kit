<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta name="googlebot" content="index,noarchive,nofollow,noodp" />
<meta name="robots" content="index,nofollow,noarchive,noodp" />
<title>Demo 搜索 - Powered by xunsearch</title>
<meta http-equiv="keywords" content="Fulltext Search Engine Demo xunsearch" />
<meta http-equiv="description" content="Fulltext Search for Demo, Powered by xunsearch/1.4.6 " />
<link rel="stylesheet" type="text/css" href="http://www.xunsearch.com/demo/css/bootstrap.css"/>
<link rel="stylesheet" type="text/css" href="http://www.xunsearch.com/demo/css/style.css"/>
<link rel="stylesheet" type="text/css" href="http://libs.baidu.com/jqueryui/1.8.22/themes/redmond/jquery-ui.css" media="all" />
<!--[if lt IE 9]>
<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->
<!--[if lte IE 6]>
<link rel="stylesheet" type="text/css" href="css/bootstrap-ie6.css" />
<link rel="stylesheet" type="text/css" href="css/ie.css" />
<![endif]-->
<style type="text/css">
.logo{display: block;width: 100px;overflow: hidden;}
.logo img{max-width:none;}
.result-list dd p em{color:#dd4b39;font-style:normal;}
.result-list .field-title{font-size:18px;}
.result-list .field-title:visited{color:#609;}
.result-list .field-body{margin: 0 0 5px;}
.result-list .field-info{margin: 0 0 20px 0;color:#008000;}
</style>
</head>
<!-- search.tpl Demo 搜索模板 -->	
<body>
<div class="container">
  <div class="row">
	<!-- search form -->
    <div class="span12">
      <h1><a class="logo" href="./"><img src="http://www.xunsearch.com/demo/img/logo.jpg" /></a></h1>
      <form class="form-search" id="q-form" method="get">
        <div class="input-append" id="q-input">
          <input type="text" class="span6 search-query" name="q" title="输入任意关键词皆可搜索" value="<?php echo $q;?>">
          <button type="submit" class="btn">搜索</button>
        </div>
        <div class="condition" id="q-options">
          <label class="radio inline"><input type="radio" name="f" value="subject"  />标题</label>
          <label class="radio inline">
            <input type="radio" name="f" value="_all"  checked />全文
          </label>
          <label class="checkbox inline">
            <input type="checkbox" name="m" value="yes"  />模糊搜索 
          </label>
          <label class="checkbox inline">
            <input type="checkbox" name="syn" value="yes"  />同义词
          </label>
          按
          <select name="s" size="1">
            <option value="relevance">相关性</option>
			<option value="published_at_DESC">发表时间正序</option>
			<option value="published_at_ASC" >发表时间倒序</option>
          </select>
          排序
		</div>
      </form>
    </div>

    <!-- begin search result -->
    <div class="span12">
        <p class="result">大约有<b><?php echo $count;?></b>项符合查询结果，库内数据总量为<b><?php echo $allCount;?></b>项。（搜索耗时：<?php echo sprintf('%.4f',$costTime);?>秒）</p>
        <dl class="result-list">
            <?php foreach($docs as $doc):?>
            <dd>
                <?php echo \yii\helpers\Html::a($doc->title, "/article/{$doc->slug}",['class'=>'field-title','target'=>'_blank']);?>
            </dd>
            <dd>
              <p class="field-body"><?php echo strip_tags($search->highlight($doc->body),'<em></em>');?></p>
              <p class="field-info">
                  <?php
			//echo date('Y-m-d',$doc->published_at);
			echo \yii\helpers\Url::toRoute("/article/{$doc->slug}",true);
		  ?>
              </p>
            </dd>
            <?php endforeach;?>
        </dl>
        <div class="pagination"><?php echo yii\widgets\LinkPager::widget(['pagination'=>$pagination]);?></div>
    </div>
        <!-- end search result -->
  </div>
</div>

<!-- related query -->

<!-- footer -->
<footer>
  <div class="container">
      Powered by <a href="http://www.xunsearch.com/" target="_blank" title="开源免费的中文全文检索">xunsearch</a></p>
  </div>
</footer>
<script type="text/javascript" src="http://libs.baidu.com/jquery/1.6.2/jquery.min.js"></script>
<script type="text/javascript" src="http://libs.baidu.com/jqueryui/1.8.16/jquery-ui.min.js"></script>
<script type="text/javascript">
$(function(){
	// input tips
	$('#q-input .search-query').focus(function(){
		if ($(this).val() == $(this).attr('title')) {
			$(this).val('').removeClass('tips');
		}
	}).blur(function(){
		if ($(this).val() == '' || $(this).val() == $(this).attr('title')) {
			$(this).addClass('tips').val($(this).attr('title'));
		}
	}).blur().autocomplete({
		'source':'suggest.php',
		'select':function(ev,ui) {
			$('#q-input .search-query').val(ui.item.label);
			$('#q-form').submit();
		}
	});
	// submit check
	$('#q-form').submit(function(){
		var $input = $('#q-input .search-query');
		if ($input.val() == $input.attr('title')) {
			alert('请先输入关键词');
			$input.focus();
			return false;
		}
	});	
});	
</script>
</body>
</html>
