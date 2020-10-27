//流程模块【projectreview.项目操作】下录入页面自定义js页面,初始函数
function initbodys()
{
    var mid = form('mid').value
    if(mid != ''){
        projectdata(mid)
    }
    c.onselectdata['num']=function(d){
        projectdata(d.value)

    }
}
function projectdata(v) {
    js.ajax(geturlact('projectdata'),{v:v},function(a){
        form('num').value = a.num
        form('title').value = a.title
        form('remarks').value = a.content
    },'get,json');
}