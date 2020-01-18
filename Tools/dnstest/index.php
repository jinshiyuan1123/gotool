<?php
/*
Title:Dns检测
Subtitle:Dns Test
Plugin Name:dnstest
Description:在线dns检测,dns检测,dns劫持
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
      <div class="table-responsive position text-center">
        <table class="table table-striped table-bordered">
          <thead>
            <tr>
              <th width="80px"></th>
              <th class="text-center">本机IP</th>
              <th class="text-center">本机DNS</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <th>IP 信息</th>
              <td id="ip"></td>
              <td id="dns"></td>
            </tr>
            <tr>
              <th>地址信息</th>
              <td id="ip_add"></td>
              <td id="dns_add"></td>
            </tr>
            <tr>
              <th>网络信息</th>
              <td id="ip_isp"></td>
              <td id="dns_isp"></td>
            </tr>
            <tr>
              <th>检查结果</th>
              <td colspan="2" id="res"></td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
  <div class="panel panel-default">
    <div class="panel-heading">
      <h3 class="panel-title">工具简介</h3>
    </div>
    <div class="panel-body">
      <p>利用本工具能检测您本地的上网IP以及DNS相关信息，可用于判断DNS设置是否正确及是否遭到DNS劫持。</p>
      <p class="text-info">附常用DNS：</p>
      <p>114DNS 114.114.114.114 或 114.114.115.115</p>
      <p>阿里 DNS (<a href="http://www.alidns.com/" target="_blank">http://www.alidns.com/</a>) 223.5.5.5 或 223.6.6.6</p>
      <p>百度 DNS (<a href="http://dudns.baidu.com/intro/publicdns/" target="_blank">http://dudns.baidu.com/intro/publicdns/</a>) 180.76.76.76</p>
      <p>DNS 派 (<a href="http://www.dnspai.com/public.html" target="_blank">http://www.dnspai.com/public.html</a>) 电信：首选：101.226.4.6 联通：首选：123.125.81.6 移动：首选：101.226.4.6 铁通：首选：101.226.4.6</p>
      <p>OneDNS (<a href="http://www.onedns.net/" target="_blank">http://www.onedns.net/</a>) 南方：112.124.47.27 北方：114.215.126.16 共用：42.236.82.22</p>
      <p>Google DNS 8.8.8.8 或 8.8.4.4</p>
      <p>OpenDNS (<a href="https://www.opendns.com/" target="_blank">https://www.opendns.com/</a>) 208.67.222.222 或 208.67.220.220</p>
      <p>360 DNS 101.226.4.6 或 123.125.81.6</p>
    </div>
  </div>
</div>
<script type="text/javascript" src="dnstest.js"></script>
<?php include '../../footer.php';?>