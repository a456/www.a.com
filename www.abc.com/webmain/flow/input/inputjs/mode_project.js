//初始函数
function initbodys(){
    if(form('title').value != ''){
        form('temporary').value = form('num').value
    }
    c.onselectdata['htnum']=function(d){
        form('htname').value = d.contract_name;
        form('custname').value = d.custname;
        form('custid').value = d.custid;
        contractnum()
    }
    $(form('projectt')).click(function(){
        num()
    });
    $(form('businesst')).click(function(){
        num()
    });
    $(form('jobst')).click(function(){
        num()
    });
}

/**
 * 项目编号
 */
function num() {
    var projectt = form('projectt').value
    var businesst = form('businesst').value
    var jobst = form('jobst').value
    var num = form('num').value
    if(businesst == 7 || businesst == 8 || businesst == 9){
        form('num').value = num.substring(0,9)+'      ';
        return true;
    }
    var projecttArr = new Array('S','F','G','D','L');
    var businesstArr = new Array('G','Y','K','B','J','C','Q');
    var jobstArr = new Array('B','S');
    if(projectt == '' || businesst == '' || jobst == ''){
        return false;
    }
    var contractnum = projecttArr[projectt]+businesstArr[businesst]+jobstArr[jobst]
    var temporary = form('temporary').value
    if(temporary.substring(9,12) == contractnum){
        form('num').value = temporary
    }else{
        js.ajax(geturlact('projectnum'),{nums:contractnum},function(a){
            form('num').value = num.substring(0,9)+contractnum+'-'+a;
        },'get,json');
    }
    return true;
}

/**
 * 合同编号
 */
function contractnum() {
    var htnum = form('htnum').value
    var contract_name = htnum.substring(0,2)//合同名称
    var contract_num = htnum.substring(3,9)//合同编号
    form('num').value = contract_name+'【'+contract_num+'】'+form('num').value.substring(9,16);
}