/**
* Template Name: Xadmino
* Dashboard
* DEMO ONLY MINIFY
*/

$(document).ready(function(){var o=function(){$("#sparkline1").sparkline([22,23,33,35,42,38,48,32,42],{type:"line",width:$("#sparkline1").width(),maxSpotColor:!1,minSpotColor:!1,spotColor:!1,height:"190",chartRangeMax:50,lineColor:"#3bafda",fillColor:"rgba(59,175,218,0.3)",highlightLineColor:"rgba(0,0,0,.1)",highlightSpotColor:"rgba(0,0,0,.2)"}),$("#sparkline2").sparkline([25,28,33,35,42,38,48,32,42],{type:"line",width:$("#sparkline2").width(),maxSpotColor:!1,minSpotColor:!1,spotColor:!1,height:"190",chartRangeMax:50,lineColor:"#01ba9a",fillColor:"rgba(1,186,154,0.3)",highlightLineColor:"rgba(0,0,0,.1)",highlightSpotColor:"rgba(0,0,0,.2)"}),$("#sparkline3").sparkline([22,23,33,35,42,38,48,32,42],{type:"line",width:$("#sparkline3").width(),maxSpotColor:!1,minSpotColor:!1,spotColor:!1,height:"190",chartRangeMax:50,lineColor:"#f8ca4e",fillColor:"rgba(248,202,78,0.3)",highlightLineColor:"rgba(0,0,0,.1)",highlightSpotColor:"rgba(0,0,0,.2)"})};o();var i;$(window).resize(function(){clearTimeout(i),i=setTimeout(function(){o()},300)})}),$(document).ready(function(){$("#datatable-responsive").DataTable()});
