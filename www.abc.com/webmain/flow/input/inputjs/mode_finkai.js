//流程模块【finkai.开票申请】下录入页面自定义js页面,初始函数
function initbodys(){
	c.onselectdata['num'] = function(d){
		salechange(d.value);
	}
}
function salechange(v){
	js.ajax(geturlact('ractchange'),{ractid:v},function(a){
		form('money').value=a.settlement_price;

	},'get,json');
}
function changesubmit(){
	var jg = parseFloat(form('money').value);
	if(jg<=0)return '开票金额不能小于0';
}