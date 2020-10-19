<?php
/**
*	模块：project.项目，
*	说明：自定义区域内可写您想要的代码，模块列表页面，生成分为2块
*	来源：流程模块→表单元素管理→[模块.项目]→生成列表页
*/
defined('HOST') or die ('not access');
?>
<script>
$(document).ready(function(){
	{params}
	var modenum = 'project',modename='项目',isflow=0,modeid='22',atype = params.atype,pnum=params.pnum;
	if(!atype)atype='';if(!pnum)pnum='';
	var fieldsarr = [{"name":"\u7533\u8bf7\u4eba","fields":"base_name"},{"name":"\u7533\u8bf7\u4eba\u90e8\u95e8","fields":"base_deptname"},{"name":"\u5355\u53f7","fields":"sericnum"},{"fields":"pid","name":"\u6240\u5c5e\u9879\u76ee","fieldstype":"select","ispx":"0","isalign":"0","islb":"0"},{"fields":"htnum","name":"\u5408\u540c\u7f16\u53f7","fieldstype":"selectdatafalse","ispx":"0","isalign":"0","islb":"0"},{"fields":"htname","name":"\u5408\u540c\u540d\u79f0","fieldstype":"text","ispx":"0","isalign":"0","islb":"0"},{"fields":"title","name":"\u9879\u76ee\u540d\u79f0","fieldstype":"text","ispx":"0","isalign":"1","islb":"1"},{"fields":"custid","name":"\u5ba2\u6237id","fieldstype":"text","ispx":"0","isalign":"0","islb":"0"},{"fields":"custname","name":"\u5ba2\u6237\u540d\u79f0","fieldstype":"text","ispx":"0","isalign":"0","islb":"0"},{"fields":"num","name":"\u9879\u76ee\u7f16\u53f7","fieldstype":"num","ispx":"1","isalign":"0","islb":"1"},{"fields":"totalp","name":"\u603b\u8fdb\u5c55","fieldstype":"text","ispx":"0","isalign":"0","islb":"0"},{"fields":"projectt","name":"\u9879\u76ee\u7c7b\u522b","fieldstype":"select","ispx":"0","isalign":"0","islb":"0"},{"fields":"businesst","name":"\u4e1a\u52a1\u7c7b\u522b","fieldstype":"select","ispx":"0","isalign":"0","islb":"0"},{"fields":"jobst","name":"\u5de5\u4f5c\u7c7b\u522b","fieldstype":"select","ispx":"0","isalign":"0","islb":"0"},{"fields":"fuze","name":"\u8d1f\u8d23\u4eba","fieldstype":"changeuser","ispx":"1","isalign":"0","islb":"1"},{"fields":"runuser","name":"\u90e8\u95e8\u540d\u79f0","fieldstype":"changedeptcheck","ispx":"0","isalign":"0","islb":"1"},{"fields":"plans","name":"\u8ba1\u5212\u5f00\u59cb","fieldstype":"datetime","ispx":"0","isalign":"0","islb":"0"},{"fields":"plane","name":"\u8ba1\u5212\u5b8c\u6210","fieldstype":"datetime","ispx":"0","isalign":"0","islb":"0"},{"fields":"area","name":"\u5730\u533a","fieldstype":"select","ispx":"0","isalign":"0","islb":"0"},{"fields":"delegatec","name":"\u59d4\u6258\u8054\u7cfb\u4eba","fieldstype":"text","ispx":"0","isalign":"0","islb":"0"},{"fields":"requesterp","name":"\u59d4\u6258\u5355\u4f4d\u7535\u8bdd","fieldstype":"text","ispx":"0","isalign":"0","islb":"0"},{"fields":"is_bidding","name":"\u662f\u5426\u516c\u5f00\u62db\u6807","fieldstype":"select","ispx":"0","isalign":"0","islb":"0"},{"fields":"is_free","name":"\u662f\u5426\u514d\u8d39\u5de5\u7a0b","fieldstype":"select","ispx":"0","isalign":"0","islb":"1"},{"fields":"receivedt","name":"\u63a5\u6536\u8d44\u6599\u65f6\u95f4","fieldstype":"datetime","ispx":"0","isalign":"0","islb":"0"},{"fields":"firstdraftt","name":"\u521d\u7a3f\u65f6\u95f4","fieldstype":"datetime","ispx":"0","isalign":"0","islb":"0"},{"fields":"formalreport","name":"\u6b63\u5f0f\u62a5\u544a","fieldstype":"datetime","ispx":"0","isalign":"0","islb":"0"},{"fields":"difficulty","name":"\u96be\u5ea6\u7cfb\u6570","fieldstype":"text","ispx":"0","isalign":"0","islb":"0"},{"fields":"consultingfee","name":"\u54a8\u8be2\u8d39","fieldstype":"number","ispx":"0","isalign":"0","islb":"0"},{"fields":"manufacturingp","name":"\u9001\u5ba1\/\u7f16\u5236\u9020\u4ef7","fieldstype":"number","ispx":"0","isalign":"0","islb":"1"},{"fields":"auditc","name":"\u5ba1\u6838\u9020\u4ef7","fieldstype":"number","ispx":"0","isalign":"0","islb":"0"},{"fields":"platform","name":"\u76d1\u7ba1\u670d\u52a1\u5e73\u53f0","fieldstype":"text","ispx":"0","isalign":"0","islb":"0"},{"fields":"sign_back","name":"\u56de\u7b7e\u5e8f\u53f7","fieldstype":"text","ispx":"0","isalign":"0","islb":"0"},{"fields":"deliverya","name":"\u5feb\u9012\u5730\u5740","fieldstype":"text","ispx":"0","isalign":"0","islb":"0"},{"fields":"trackingn","name":"\u5feb\u9012\u5355\u53f7","fieldstype":"text","ispx":"0","isalign":"0","islb":"0"},{"fields":"filebox","name":"\u6863\u6848\u76d2\u7f16\u53f7","fieldstype":"text","ispx":"0","isalign":"0","islb":"0"},{"fields":"editor","name":"\u7f16\u5236\u4eba","fieldstype":"text","ispx":"0","isalign":"0","islb":"0"},{"fields":"reviewer","name":"\u590d\u6838\u4eba","fieldstype":"changeuser","ispx":"0","isalign":"0","islb":"0"},{"fields":"approver","name":"\u6279\u51c6\u4eba","fieldstype":"changeuser","ispx":"0","isalign":"0","islb":"0"},{"fields":"submitter","name":"\u63d0\u4ea4\u4eba","fieldstype":"changeuser","ispx":"0","isalign":"0","islb":"0"},{"fields":"type","name":"\u9879\u76ee\u5c5e\u6027","fieldstype":"rockcombo","ispx":"1","isalign":"0","islb":"1"},{"fields":"paymentt","name":"\u4ed8\u6b3e\u6761\u6b3e","fieldstype":"textarea","ispx":"0","isalign":"0","islb":"0"},{"fields":"status","name":"\u72b6\u6001","fieldstype":"select","ispx":"1","isalign":"0","islb":"1"},{"fields":"content","name":"\u5907\u6ce8","fieldstype":"text","ispx":"0","isalign":"0","islb":"0"},{"fields":"workingh","name":"\u5de5\u65f6","fieldstype":"number","ispx":"0","isalign":"0","islb":"0"},{"fields":"grandt","name":"\u7d2f\u8ba1\u5de5\u65f6","fieldstype":"number","ispx":"0","isalign":"0","islb":"0"},{"fields":"startdt","name":"\u5f00\u59cb\u65f6\u95f4","fieldstype":"datetime","ispx":"1","isalign":"0","islb":"0"},{"fields":"enddt","name":"\u9884\u8ba1\u7ed3\u675f\u65f6\u95f4","fieldstype":"datetime","ispx":"0","isalign":"0","islb":"0"},{"fields":"progress","name":"\u8fdb\u5ea6(%)","fieldstype":"select","ispx":"0","isalign":"0","islb":"1"},{"fields":"workshu","name":"\u4efb\u52a1\u6570","fieldstype":"number","ispx":"0","isalign":"0","islb":"1"},{"fields":"distribution","name":"\u5206\u914d","fieldstype":"text","ispx":"0","isalign":"0","islb":"1"}],fieldsselarr= {"columns_projectstaff_":"xmselect,projectt,businesst,jobst,fuze,plans,status,content,num,jobtype,employees,duty,requestt,caozuo","columns_project_":"distribution,title,custname,num,projectt,businesst,jobst,fuze,runuser,is_free,type,status,grandt,workshu,caozuo"};
	
	var c = {
		reload:function(){
			a.reload();
		},
		clickwin:function(o1,lx){
			var id=0;
			if(lx==1)id=a.changeid;
			openinput(modename,modenum,id,'opegs{rand}');
		},
		view:function(){
			var d=a.changedata;
			openxiangs(modename,modenum,d.id,'opegs{rand}');
		},
		searchbtn:function(){
			this.search({});
		},
		search:function(cans){
			var s=get('key_{rand}').value,zt='';
			if(get('selstatus_{rand}'))zt=get('selstatus_{rand}').value;
			var canss = js.apply({key:s,keystatus:zt}, cans);
			a.setparams(canss,true);
		},
		//高级搜索
		searchhigh:function(){
			new highsearchclass({
				modenum:modenum,
				oncallback:function(d){
					c.searchhighb(d);
				}
			});
		},
		searchhighb:function(d){
			d.key='';
			get('key_{rand}').value='';
			a.setparams(d,true);
		},
		//导出
		daochu:function(o1,lx,lx1,e){
			if(!this.daochuobj)this.daochuobj=$.rockmenu({
				width:120,top:35,donghua:false,data:[],
				itemsclick:function(d, i){
					c.daonchuclick(d);
				}
			});
			var d = [{name:'导出全部',lx:0},{name:'导出当前页',lx:1},{name:'订阅此列表',lx:2}];
			this.daochuobj.setData(d);
			var lef = $(o1).offset();
			this.daochuobj.showAt(lef.left, lef.top+35);
		},
		daonchuclick:function(d){
			if(d.lx==0)a.exceldown();
			if(d.lx==1)a.exceldownnow();
			if(d.lx==2)this.subscribelist();
		},
		subscribelist:function(){
			js.subscribe({
				title:'项目('+nowtabs.name+')',
				cont:'项目('+nowtabs.name+')的列表的',
				explain:'订阅[项目]的列表',
				objtable:a
			});
		},
		getacturl:function(act){
			return js.getajaxurl(act,'mode_project|input','flow',{'modeid':modeid});
		},
		changatype:function(o1,lx){
			$("button[id^='changatype{rand}']").removeClass('active');
			$('#changatype{rand}_'+lx+'').addClass('active');
			a.setparams({atype:lx},true);
			nowtabssettext($(o1).html());
		},
		init:function(){
			$('#key_{rand}').keyup(function(e){
				if(e.keyCode==13)c.searchbtn();
			});
			this.initpage();
		},
		initpage:function(){
			
		},
		loaddata:function(d){
			if(!d.atypearr)return;
			get('addbtn_{rand}').disabled=(d.isadd!=true);
			if(d.isdaoru)$('#daoruspan_{rand}').show();
			var d1 = d.atypearr,len=d1.length,i,str='';
			for(i=0;i<len;i++){
				str+='<button class="btn btn-default" click="changatype,'+d1[i].num+'" id="changatype{rand}_'+d1[i].num+'" type="button">'+d1[i].name+'</button>';
			}
			$('#changatype{rand}').html(str);
			$('#changatype{rand}_'+atype+'').addClass('active');
			js.initbtn(c);
		},
		setcolumns:function(fid, cnas){
			var d = false,i,ad=bootparams.columns,len=ad.length,oi=-1;
			for(i=0;i<len;i++){
				if(ad[i].dataIndex==fid){
					d = ad[i];
					oi= i;
					break;
				}
			}
			if(d){
				d = js.apply(d, cnas);
				bootparams.columns[oi]=d;
			}
		},
		daoru:function(){
			window.managelistproject = a;
			addtabs({num:'daoruproject',url:'flow,input,daoru,modenum=project',icons:'plus',name:'导入项目'});
		},
		initcolumns:function(bots){
			var num = 'columns_'+modenum+'_'+pnum+'',d=[],d1,d2={},i,len=fieldsarr.length,bok;
			var nstr= fieldsselarr[num];if(!nstr)nstr='';
			if(nstr)nstr=','+nstr+',';
			if(nstr=='' && isflow==1){
				d.push({text:'申请人',dataIndex:'base_name',sortable:true});
				d.push({text:'申请人部门',dataIndex:'base_deptname',sortable:true});
			}
			for(i=0;i<len;i++){
				d1 = fieldsarr[i];
				bok= false;
				if(nstr==''){
					if(d1['islb']=='1')bok=true;
				}else{
					if(nstr.indexOf(','+d1.fields+',')>=0)bok=true;
				}
				if(bok){
					d2={text:d1.name,dataIndex:d1.fields};
					if(d1.ispx=='1')d2.sortable=true;
					if(d1.isalign=='1')d2.align='left';
					if(d1.isalign=='2')d2.align='right';
					d.push(d2);
				}
			}
			if(isflow==1)d.push({text:'状态',dataIndex:'statustext'});
			if(nstr=='' || nstr.indexOf(',caozuo,')>=0)d.push({text:'',dataIndex:'caozuo',callback:'opegs{rand}'});
			if(!bots){
				bootparams.columns=d;
			}else{
				a.setColumns(d);
			}
		},
		setparams:function(cs){
			var ds = js.apply({},cs);
			a.setparams(ds);
		},
		storeurl:function(){
			var url = this.getacturl('publicstore')+'&pnum='+pnum+'';
			return url;
		},
		printlist:function(){
			js.msg('success','可使用导出，然后打开在打印');
		},
		getbtnstr:function(txt, click, ys, ots){
			if(!ys)ys='default';
			if(!ots)ots='';
			return '<button class="btn btn-'+ys+'" id="btn'+click+'_{rand}" click="'+click+'" '+ots+' type="button">'+txt+'</button>';
		},
		setfieldslist:function(){
			new highsearchclass({
				modenum:modenum,
				modeid:modeid,
				type:1,
				isflow:isflow,
				pnum:pnum,atype:atype,
				fieldsarr:fieldsarr,
				fieldsselarr:fieldsselarr,
				oncallback:function(str){
					fieldsselarr[this.columnsnum]=str;
					c.initcolumns(true);
					c.reload();
				}
			});
		}
	};
	
	//表格参数设定
	var bootparams = {
        tree:true,fanye:true,modenum:modenum,modename:modename,statuschange:false,tablename:jm.base64decode('cHJvamVjdA::'),
		url:c.storeurl(),storeafteraction:'storeaftershow',storebeforeaction:'storebeforeshow',
		params:{atype:atype},
		columns:[{text:"项目名称",dataIndex:"title",align:"left"},{text:"项目编号",dataIndex:"num",sortable:true},{text:"负责人",dataIndex:"fuze",sortable:true},{text:"部门名称",dataIndex:"runuser"},{text:"是否免费工程",dataIndex:"is_free"},{text:"送审/编制造价",dataIndex:"manufacturingp"},{text:"项目属性",dataIndex:"type",sortable:true},{text:"状态",dataIndex:"status",sortable:true},{text:"进度(%)",dataIndex:"progress"},{text:"任务数",dataIndex:"workshu"},{text:"分配",dataIndex:"distribution"},{
			text:'',dataIndex:'caozuo',callback:'opegs{rand}'
		}],
		itemdblclick:function(){
			c.view();
		},
		load:function(d){
			c.loaddata(d);
		}
	};
	c.initcolumns(false);
	opegs{rand}=function(){
		c.reload();
	}
	
//[自定义区域start]

c.setcolumns('progress',{
	renderer:function(v){
		return '<div class="progress" style="margin:0;width:120px;"><div class="progress-bar progress-bar-success" style="width:'+v+'%;color:#000000;">'+v+'%</div></div>';
	},
	text:'进度'
});
c.setcolumns('workshu',{
	renderer:function(v,d,i){
		return ''+v+'&nbsp;<a href="javascript:;" onclick="viespere{rand}('+i+')">查看</a>';
	}
});
c.setcolumns('distribution',{
    renderer:function(v,d,i){
        return ''+v+'&nbsp;<a href="javascript:;" onclick="workinghours{rand}('+i+')">查看</a>';
    }
});
workinghours{rand}=function(id){
    var d 	= a.getData(id);
    var bo 	= addtabs({name:'项目['+d.title+']的员工',url:'flow,page,projectstaff,pnum=allall,atype=all,projcetid='+d.id+'',num:'projectidstaff'+d.id+''});
}
viespere{rand}=function(id){
    var d 	= a.getData(id);
    var bo 	= addtabs({name:'项目['+d.title+']的任务',url:'flow,page,work,pnum=allall,atype=all,projcetid='+d.id+'',num:'projcetidwork'+d.id+''});
}

//[自定义区域end]

	js.initbtn(c);
	var a = $('#viewproject_{rand}').bootstable(bootparams);
	c.init();
	var ddata = [{name:'高级搜索',lx:0}];
	if(admintype==1)ddata.push({name:'自定义列显示',lx:2});
	ddata.push({name:'打印',lx:1});
	$('#downbtn_{rand}').rockmenu({
		width:120,top:35,donghua:false,
		data:ddata,
		itemsclick:function(d, i){
			if(d.lx==0)c.searchhigh();
			if(d.lx==1)c.printlist();
			if(d.lx==2)c.setfieldslist();
		}
	});
	
	
});
</script>
<!--SCRIPTend-->
<!--HTMLstart-->
<div>
	<table width="100%">
	<tr>
		<td style="padding-right:10px;" id="tdleft_{rand}" nowrap><button id="addbtn_{rand}" class="btn btn-primary" click="clickwin,0" disabled type="button"><i class="icon-plus"></i> 新增</button></td>
		<td>
			<input class="form-control" style="width:160px" id="key_{rand}" placeholder="关键字">
		</td>
		<td style="padding-left:10px"><select class="form-control" style="width:120px" id="selstatus_{rand}"><option value="">-全部状态-</option><option style="color:blue" value="0">待执行</option><option style="color:green" value="1">已完成</option><option style="color:#888888" value="2">结束</option><option style="color:#ff6600" value="3">执行中</option><option style="color:#888888" value="5">已作废</option></select></td>
		<td style="padding-left:10px">
			<div style="width:85px" class="btn-group">
			<button class="btn btn-default" click="searchbtn" type="button">搜索</button><button class="btn btn-default" id="downbtn_{rand}" type="button" style="padding-left:8px;padding-right:8px"><i class="icon-angle-down"></i></button> 
			</div>
		</td>
		<td  width="90%" style="padding-left:10px"><div id="changatype{rand}" class="btn-group"></div></td>
	
		<td align="right" id="tdright_{rand}" nowrap>
			<span style="display:none" id="daoruspan_{rand}"><button class="btn btn-default" click="daoru,1" type="button">导入</button>&nbsp;&nbsp;&nbsp;</span><button class="btn btn-default" click="daochu" type="button">导出 <i class="icon-angle-down"></i></button> 
		</td>
	</tr>
	</table>
</div>
<div class="blank10"></div>
<div id="viewproject_{rand}"></div>
<!--HTMLend-->