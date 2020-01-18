<?php
/*
Title:Unix时间戳
Subtitle:TimeStamp
Plugin Name:timestamp
Description:在线Unix时间戳转换
Author:Youngxj
Author Email:blog@youngxj.cn
Author URL:#
Version:1.1
*/
$CONF = require('../../function.config.php');
$self = $_SERVER['PHP_SELF'];
preg_match_all('/'.$CONF['config']['TOOLS_T'].'\/(.*)\//', $self, $name);
$id = $name[1][0];
include '../../header.php';?>
<div class="container clearfix">
	<div class="panel panel-default">
		<div class="panel-heading"><?php echo $title;?><small class="text-capitalize">-<?php echo $subtitle;?></small></div>
		<div class="panel-body">
			<div>
				时间：<a id="js_datetime" href="javascript:to_datetime();layer.tips('将现在时间填充到文本框', '#js_datetime');" title="将现在时间填充到文本框"></a>
				<br/>
				时间戳：<a id="js_timestamp" href="javascript:to_timestamp();layer.tips('将现在时间填充到文本框', '#js_timestamp');" title="将现在时间填充到文本框"></a>
			</div>
			<div class="content">
				<h4>北京时间转时间戳</h4>
				<div class="form-group row">
					<div class="col-xs-4">
						<div class="input-group">
							<input type="text" class="form-control" placeholder="时间戳" id="o_timestamp">
						</div>
					</div>
					<div class="col-xs-4">
						<div class="input-group">
							<input type="text" class="form-control" placeholder="YYYY-MM-DD HH:mm:ss" id="o_datetime">
						</div>
					</div>
					<div class="col-xs-4">
						<div class="input-group-btn">
							<button class="btn btn-primary" type="button" id="btn_state_o">转换</button>
						</div>
					</div>
				</div>
				<h4>北京时间转时间戳</h4>
				<div class="form-group row">
					<div class="col-xs-4">
						<div class="input-group">
							<input type="text" class="form-control" placeholder="YYYY-MM-DD HH:mm:ss" id="f_datetime">
						</div>
					</div>
					<div class="col-xs-4">
						<div class="input-group">
							<input type="text" class="form-control" placeholder="时间戳" id="f_timestamp">
						</div>
					</div>
					<div class="col-xs-4">
						<div class="input-group-btn">
							<button class="btn btn-primary" type="button" id="btn_state_f">转换</button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="panel panel-default">
		<div class="panel-heading">工具简介</div>
		<div class="panel-body">
			<p>时间戳：时间戳是指格林威治时间1970年01月01日00时00分00秒(北京时间1970年01月01日08时00分00秒)起至现在的总秒数。</p>
			<table class="tbl" width="100%" cellspacing="0" cellpadding="0">
				<tbody>
					<tr>
						<td>Swift</td>
						<td>
							<pre><code>NSDate().timeIntervalSince1970</code></pre>
						</td>
					</tr>
					<tr>
						<td>Go</td>
						<td><pre><code>import (
  "time"
)
int32(time.Now().Unix())</code></pre>
					</td>
				</tr>
				<tr>
					<td>Java</td>
					<td>
						<pre><code>// pure java
(int) (System.currentTimeMillis() / 1000)</code></pre>
						<pre><code>// joda
(int) (DateTime.now().getMillis() / 1000)</code></pre>
					</td>
				</tr>
				<tr>
					<td>JavaScript</td>
					<td>
						<pre><code>Math.round(new Date() / 1000)</code></pre>
					</td>
				</tr>
				<tr>
					<td>Objective-C</td>
					<td>
						<pre><code>[[NSDate date] timeIntervalSince1970]</code></pre>
					</td>
				</tr>
				<tr>
					<td>MySQL</td>
					<td>
						<pre><code>SELECT unix_timestamp(now())</code></pre>
					</td>
				</tr>
				<tr>
					<td>SQLite</td>
					<td>
						<pre><code>SELECT strftime('%s', 'now')</code></pre>
					</td>
				</tr>
				<tr>
					<td>Erlang</td>
					<td>
						<pre><code>calendar:datetime_to_gregorian_seconds(calendar:universal_time())-719528*24*3600.</code></pre>
					</td>
				</tr>
				<tr>
					<td>PHP</td>
					<td>
						<pre><code>// pure php
time()</code></pre>
						<pre><code>// Carbon\Carbon
Carbon::now()-&gt;timestamp</code></pre>
					</td>
				</tr>
				<tr>
					<td>Python</td>
					<td><pre><code>import time
time.time()</code></pre>
				</td>
			</tr>
			<tr>
				<td>Ruby</td>
				<td>
					<pre><code>Time.now.to_i</code></pre>
				</td>
			</tr>
			<tr>
				<td>Shell</td>
				<td>
					<pre><code>date +%s</code></pre>
				</td>
			</tr>
			<tr>
				<td>Groovy</td>
				<td>
					<pre><code>(new Date().time / 1000).intValue()</code></pre>
				</td>
			</tr>
			<tr>
				<td>Lua</td>
				<td>
					<pre><code>os.time()</code></pre>
				</td>
			</tr>
			<tr>
				<td>.NET/C#</td>
				<td>
					<pre><code>(DateTime.Now.ToUniversalTime().Ticks - 621355968000000000) / 10000000</code></pre>
				</td>
			</tr>
		</tbody>
	</table>
</div>
</div>

</div>
<script type="text/javascript" src="timestamp.js"></script>
<?php include '../../footer.php';?>