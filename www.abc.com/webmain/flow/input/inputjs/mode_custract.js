function initbodys(){
	if(form('id').value != 0){
		ractchange(form('id').value);
	}
	$(form('custid')).change(function(){
		var val = this.value,txt='';
		if(val!=''){
			txt = this.options[this.selectedIndex].text;
		}
		form('custname').value=txt;
		form('saleid').value = '';
	});
	$(form('saleid')).change(function(){
		salechange(this.value);
	});
}
function ractchange(v){
	js.ajax(geturlact('ractchange'),{ractid:v},function(a){
		form('accumulative').value=a;
	},'get,json');
}
function salechange(v){
	if(v==''){
		form('custid').value='';
		return;
	}
	js.ajax(geturlact('salechange'),{saleid:v},function(a){
		form('custid').value=a.custid;
		form('custname').value=a.custname;
		form('money').value=a.money;
	},'get,json');
}