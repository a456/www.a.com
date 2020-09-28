//流程模块【finkai.开票申请】下录入页面自定义js页面,初始函数
function initbodys(){

	c.onselectdata['numselect'] = function(d){
		salechange(form('num').value);
	}
	if(form('num').value != ''){
		salechange(form('num').value);
	}
}
function salechange(v){
	js.ajax(geturlact('ractchange'),{ractid:v},function(a){
		form('numselect').value=a.num;
		form('fullname').value=a.contract_name;
		form('moneys').value=a.money;
		form('settlement_price').value=a.settlement_price;
		form('contract_adjustment').value=a.contract_adjustment;
		form('accumulative').value=a.accumulative;
	},'get,json');
}
function changesubmit(){
	var jg = parseFloat(form('money').value);
	if(jg<=0)return '开票金额不能小于0';
}