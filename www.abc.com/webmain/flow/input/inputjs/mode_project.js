//初始函数
function initbodys(){
    c.onselectdata['htnum']=function(d){
        form('htname').value = d.contract_name;
        form('custname').value = d.custname;
        form('custid').value = d.custid;
    }
}