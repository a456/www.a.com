<?php
/**
*	模块：zhaotb.招投标，
*	说明：自定义区域内可写您想要的代码，模块列表页面，生成分为2块
*	来源：流程模块→表单元素管理→[模块.招投标]→生成列表页
*/
defined('HOST') or die ('not access');
?>
<script>
$(document).ready(function(){
	{params}
	var modenum = 'zhaotb',modename='招投标',isflow=1,modeid='78',atype = params.atype,pnum=params.pnum;
	if(!atype)atype='';if(!pnum)pnum='';
	var fieldsarr = [{"name":"\u7533\u8bf7\u4eba","fields":"base_name"},{"name":"\u7533\u8bf7\u4eba\u90e8\u95e8","fields":"base_deptname"},{"name":"\u5355\u53f7","fields":"sericnum"},{"fields":"name","name":"\u9879\u76ee\u540d\u79f0","fieldstype":"text","ispx":"0","isalign":"0","islb":"1"},{"fields":"toubiaoren","name":"\u6295\u6807\u4eba","fieldstype":"text","ispx":"0","isalign":"0","islb":"1"},{"fields":"weituorenlx","name":"\u59d4\u6258\u4eba\u8054\u7cfb\u65b9\u5f0f","fieldstype":"text","ispx":"0","isalign":"0","islb":"1"},{"fields":"dailidw","name":"\u62db\u6807\u4ee3\u7406\u5355\u4f4d","fieldstype":"text","ispx":"0","isalign":"0","islb":"1"},{"fields":"daililx","name":"\u4ee3\u7406\u8054\u7cfb\u65b9\u5f0f","fieldstype":"text","ispx":"0","isalign":"0","islb":"1"},{"fields":"pingbiaoff","name":"\u8bc4\u6807\u65b9\u6cd5","fieldstype":"text","ispx":"0","isalign":"0","islb":"1"},{"fields":"dingbiaoff","name":"\u5b9a\u6807\u65b9\u6cd5","fieldstype":"text","ispx":"0","isalign":"0","islb":"1"},{"fields":"kongzhij","name":"\u63a7\u5236\u4ef7","fieldstype":"text","ispx":"0","isalign":"0","islb":"1"},{"fields":"yewulx","name":"\u4e1a\u52a1\u7c7b\u578b","fieldstype":"rockcombo","ispx":"0","isalign":"0","islb":"1"},{"fields":"gongchenglx","name":"\u5de5\u7a0b\u7c7b\u578b","fieldstype":"rockcombo","ispx":"0","isalign":"0","islb":"1"},{"fields":"zhaobiaowj","name":"\u62db\u6807\u6587\u4ef6\u60c5\u51b5","fieldstype":"text","ispx":"0","isalign":"0","islb":"1"},{"fields":"gongbubm","name":"\u516c\u544a\u53ca\u62a5\u540d\u65f6\u95f4","fieldstype":"datetime","ispx":"0","isalign":"0","islb":"1"},{"fields":"zigesc","name":"\u8d44\u683c\u5ba1\u67e5\u65b9\u5f0f","fieldstype":"text","ispx":"0","isalign":"0","islb":"1"},{"fields":"zhiyijz","name":"\u8d28\u7591\u622a\u6b62\u65f6\u95f4","fieldstype":"datetime","ispx":"0","isalign":"0","islb":"1"},{"fields":"dayijd","name":"\u7b54\u7591\u622a\u6b62\u65f6\u95f4","fieldstype":"datetime","ispx":"0","isalign":"0","islb":"1"},{"fields":"jiebiaosj","name":"\u622a\u6807\u65f6\u95f4","fieldstype":"datetime","ispx":"0","isalign":"0","islb":"1"},{"fields":"toubiaoscjj","name":"\u6295\u6807\u6587\u4ef6\u4e0a\u4f20\u9012\u4ea4\u65e5\u671f","fieldstype":"date","ispx":"0","isalign":"0","islb":"1"},{"fields":"gongbuly","name":"\u516c\u5e03\u6765\u6e90","fieldstype":"text","ispx":"0","isalign":"0","islb":"1"},{"fields":"zhaobiaobh","name":"\u62db\u6807\u7f16\u53f7","fieldstype":"text","ispx":"0","isalign":"0","islb":"1"},{"fields":"toubiaofzr","name":"\u6295\u6807\u8d1f\u8d23\u4eba","fieldstype":"text","ispx":"0","isalign":"0","islb":"1"},{"fields":"toubiaobzj","name":"\u6295\u6807\u4fdd\u8bc1\u91d1","fieldstype":"text","ispx":"0","isalign":"0","islb":"1"},{"fields":"toubiaobj","name":"\u6295\u6807\u62a5\u4ef7","fieldstype":"text","ispx":"0","isalign":"0","islb":"1"},{"fields":"toubiaobzjqk","name":"\u6295\u6807\u4fdd\u8bc1\u91d1\u60c5\u51b5\u8bf4\u660e","fieldstype":"text","ispx":"0","isalign":"0","islb":"1"},{"fields":"nipaixm","name":"\u62df\u6d3e\u9879\u76ee\u8d1f\u8d23\u4eba","fieldstype":"text","ispx":"0","isalign":"0","islb":"1"},{"fields":"zhaobiaowjbz","name":"\u62db\u6807\u6587\u4ef6\u5907\u6ce8\u4e8b\u9879","fieldstype":"text","ispx":"0","isalign":"0","islb":"1"},{"fields":"kaibiaosj","name":"\u5f00\u6807\u65f6\u95f4","fieldstype":"datetime","ispx":"0","isalign":"0","islb":"1"},{"fields":"pingbiaorq","name":"\u8bc4\u6807\u65e5\u671f","fieldstype":"date","ispx":"0","isalign":"0","islb":"1"},{"fields":"dingbiaorq","name":"\u5b9a\u6807\u65e5\u671f","fieldstype":"date","ispx":"0","isalign":"0","islb":"1"},{"fields":"zhongbiaodw","name":"\u4e2d\u6807\u5355\u4f4d","fieldstype":"text","ispx":"0","isalign":"0","islb":"1"},{"fields":"zhongbiaojia","name":"\u4e2d\u6807\u4ef7","fieldstype":"text","ispx":"0","isalign":"0","islb":"1"},{"fields":"zhongbiaoren","name":"\u4e2d\u6807\u4eba\u60c5\u51b5","fieldstype":"text","ispx":"0","isalign":"0","islb":"1"},{"fields":"zhongbiaodwwj","name":"\u4e2d\u6807\u5355\u4f4d\u6295\u6807\u6587\u4ef6\u4e0b\u8f7d","fieldstype":"text","ispx":"0","isalign":"0","islb":"1"},{"fields":"hetongqs","name":"\u5408\u540c\u7b7e\u7f72","fieldstype":"text","ispx":"0","isalign":"0","islb":"1"},{"fields":"yujinchangsj","name":"\u9884\u8ba1\u8fdb\u573a\u65e5\u671f","fieldstype":"datetime","ispx":"0","isalign":"0","islb":"1"},{"fields":"yutouruzy","name":"\u9884\u8ba1\u6295\u5165\u8d44\u6e90","fieldstype":"text","ispx":"0","isalign":"0","islb":"1"},{"fields":"xiangmubh","name":"\u9879\u76ee\u7f16\u53f7","fieldstype":"text","ispx":"0","isalign":"0","islb":"1"},{"fields":"zixunfei","name":"\u54a8\u8be2\u8d39(\u4e07\u5143)","fieldstype":"text","ispx":"0","isalign":"0","islb":"1"},{"fields":"zhongbiaotzs","name":"\u4e2d\u6807\u901a\u77e5\u4e66","fieldstype":"text","ispx":"0","isalign":"0","islb":"1"},{"fields":"gongchengzj","name":"\u5de5\u7a0b\u9020\u4ef7(\u4e07\u5143)","fieldstype":"text","ispx":"0","isalign":"0","islb":"1"},{"fields":"chuangjianz","name":"\u521b\u5efa\u8005","fieldstype":"text","ispx":"0","isalign":"0","islb":"1"},{"fields":"chuagjianrq","name":"\u521b\u5efa\u65e5\u671f","fieldstype":"date","ispx":"0","isalign":"0","islb":"1"},{"fields":"xiugaiz","name":"\u4fee\u6539\u8005","fieldstype":"text","ispx":"0","isalign":"0","islb":"1"},{"fields":"xiugairq","name":"\u4fee\u6539\u65e5\u671f","fieldstype":"date","ispx":"0","isalign":"0","islb":"1"}],fieldsselarr= [];
	
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
				title:'招投标('+nowtabs.name+')',
				cont:'招投标('+nowtabs.name+')的列表的',
				explain:'订阅[招投标]的列表',
				objtable:a
			});
		},
		getacturl:function(act){
			return js.getajaxurl(act,'mode_zhaotb|input','flow',{'modeid':modeid});
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
			window.managelistzhaotb = a;
			addtabs({num:'daoruzhaotb',url:'flow,input,daoru,modenum=zhaotb',icons:'plus',name:'导入招投标'});
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
		fanye:true,modenum:modenum,modename:modename,statuschange:false,tablename:jm.base64decode('dG91Ymlhbw::'),
		url:c.storeurl(),storeafteraction:'storeaftershow',storebeforeaction:'storebeforeshow',
		params:{atype:atype},
		columns:[{text:"申请人",dataIndex:"base_name",sortable:true},{text:"申请人部门",dataIndex:"base_deptname",sortable:true},{text:"单号",dataIndex:"sericnum"},{text:"项目名称",dataIndex:"name"},{text:"投标人",dataIndex:"toubiaoren"},{text:"委托人联系方式",dataIndex:"weituorenlx"},{text:"招标代理单位",dataIndex:"dailidw"},{text:"代理联系方式",dataIndex:"daililx"},{text:"评标方法",dataIndex:"pingbiaoff"},{text:"定标方法",dataIndex:"dingbiaoff"},{text:"控制价",dataIndex:"kongzhij"},{text:"业务类型",dataIndex:"yewulx"},{text:"工程类型",dataIndex:"gongchenglx"},{text:"招标文件情况",dataIndex:"zhaobiaowj"},{text:"公告及报名时间",dataIndex:"gongbubm"},{text:"资格审查方式",dataIndex:"zigesc"},{text:"质疑截止时间",dataIndex:"zhiyijz"},{text:"答疑截止时间",dataIndex:"dayijd"},{text:"截标时间",dataIndex:"jiebiaosj"},{text:"投标文件上传递交日期",dataIndex:"toubiaoscjj"},{text:"公布来源",dataIndex:"gongbuly"},{text:"招标编号",dataIndex:"zhaobiaobh"},{text:"投标负责人",dataIndex:"toubiaofzr"},{text:"投标保证金",dataIndex:"toubiaobzj"},{text:"投标报价",dataIndex:"toubiaobj"},{text:"投标保证金情况说明",dataIndex:"toubiaobzjqk"},{text:"拟派项目负责人",dataIndex:"nipaixm"},{text:"招标文件备注事项",dataIndex:"zhaobiaowjbz"},{text:"开标时间",dataIndex:"kaibiaosj"},{text:"评标日期",dataIndex:"pingbiaorq"},{text:"定标日期",dataIndex:"dingbiaorq"},{text:"中标单位",dataIndex:"zhongbiaodw"},{text:"中标价",dataIndex:"zhongbiaojia"},{text:"中标人情况",dataIndex:"zhongbiaoren"},{text:"中标单位投标文件下载",dataIndex:"zhongbiaodwwj"},{text:"合同签署",dataIndex:"hetongqs"},{text:"预计进场日期",dataIndex:"yujinchangsj"},{text:"预计投入资源",dataIndex:"yutouruzy"},{text:"项目编号",dataIndex:"xiangmubh"},{text:"咨询费(万元)",dataIndex:"zixunfei"},{text:"中标通知书",dataIndex:"zhongbiaotzs"},{text:"工程造价(万元)",dataIndex:"gongchengzj"},{text:"创建者",dataIndex:"chuangjianz"},{text:"创建日期",dataIndex:"chuagjianrq"},{text:"修改者",dataIndex:"xiugaiz"},{text:"修改日期",dataIndex:"xiugairq"},{text:"状态",dataIndex:"statustext"},{
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



//[自定义区域end]

	js.initbtn(c);
	var a = $('#viewzhaotb_{rand}').bootstable(bootparams);
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
			<input class="form-control" style="width:160px" id="key_{rand}" placeholder="关键字/申请人/单号">
		</td>
		<td style="padding-left:10px"><select class="form-control" style="width:120px" id="selstatus_{rand}"><option value="">-全部状态-</option><option style="color:blue" value="0">待处理</option><option style="color:green" value="1">已审核</option><option style="color:red" value="2">不同意</option><option style="color:#888888" value="5">已作废</option><option style="color:#17B2B7" value="23">退回</option></select></td>
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
<div id="viewzhaotb_{rand}"></div>
<!--HTMLend-->