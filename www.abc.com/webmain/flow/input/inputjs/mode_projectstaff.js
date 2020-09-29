//流程模块【projec_staff.项目员工】下录入页面自定义js页面,初始函数
function initbodys(){
    c.onselectdata['xmselect']=function(d){
        form('num').value = d.num;
    }
}