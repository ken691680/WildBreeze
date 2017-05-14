//const...
var _tsAll		= 0;	//toolbar style all
var _tsText		= 1;	//toolbar style text only
var _tsImage	= 2;	//toolbar style image only

var _ttpRight	= 1;	//toolbar text position right
var _ttpBottom	= 2;	//toolbar text position bottom

var _taLeft		= 1;	//align to left(default)
var _taRight	= 2;	//align to right

var _ttSelf		= 1;	//toolbar target is self window
var _ttBlank	= 2;	//toolbar target is blank window

var _tSplit		= 1;	//toolbar split

var PREFIX_LEN	= 12;

var __ToolbarInstance = null;

//Bar item's method
function SetAttachFunction(Func)
{
	this.AttachFunc = Func;
}

function BarItem(AImg, ACaption, AUrl, ATarget, AToolTip)
{
	this.Img		= AImg;
	this.Caption	= ACaption ? ACaption : '';
	this.Url		= AUrl;			// url
	this.Target		= ATarget ? ATarget : _ttSelf;	//is the target window when onclick goto url
	this.ToolTip	= AToolTip ? AToolTip : '';

	this.AttachFunc	= null;			// you can attach a your custom function on a BarItem
									// it's will execute while you click the BarItem;

	this.SetAttachFunction = SetAttachFunction;
}

//toolbar function
function toolbar_MouseOver(Obj)
{
	if(window.status == defaultStatus)
	{
		var str = Obj.id;

		Item = __ToolbarInstance.GetItem(parseInt(str.substr(PREFIX_LEN)) - 1);

		window.status = Item.ToolTip;	
	}

	var Obj = eval(Obj.id);

	if(Obj.length > 1)
	{
	  for(var i = 0; i < Obj.length; i++) Obj[i].className = 'toolbar_button_MouseOver';
	}
	else
	{
		Obj.className = 'toolbar_button_MouseOver';
	}
}

function toolbar_MouseOut(Obj)
{
	var Obj = eval(Obj.id);

	if(Obj.length > 1)
	{
	  for(var i = 0; i < Obj.length; i++)  Obj[i].className = 'toolbar_button';
	}
	else
	{
		Obj.className = 'toolbar_button';
	}

	window.status = defaultStatus;
}

function toolbar_onClick(AIndex)
{
	var Item = __ToolbarInstance.GetItem(AIndex);

	if(Item.AttachFunc)
	{
		Item.AttachFunc();
	}
	else
	{
		if(Item && Item.Url)
		{
			if(Item.Target == _ttSelf)
			{
				window.location = Item.Url;
			}
			else if (Item.Target == _ttBlank)
			{
				window.open(Item.Url);
			}
			else eval(Item.Target + '.location = "' + Item.Url + '"');
		}
	}
}

//toolbar's member method
function AddItem(AItem)
{
	if(!(AItem instanceof BarItem) && AItem != _tSplit)
	{
		new Exception('AddItem param: "AItem" must be a instance of BarItem');
		return false;
	}

	this.Bars[this.Bars.length] = AItem;

	return true;
}

function GetItem(AIndex)
{
	if(this.Bars[AIndex] && this.Bars[AIndex] != _tSplit) return this.Bars[AIndex];
	else
	{
		new Exception('Index ' + AIndex + ' does\'nt exists in bars');
		return null;
	}
}

function Draw()
{
	var str = '';

	if(this.UseDefaultTable) str += '<table width=100% border=0 cellspacing=0 cellpadding=0 class=toolbar>';

	switch(this.BarStyle)
	{
		case _tsAll:
				if(this.TextPos == _ttpBottom)
				{
					str += '<tr>';

					if(this.Align == _taRight) str += '<td rowspan=2>&nbsp;</td>';

					for(var i = 0; i < this.Bars.length; i++)
					{
						if(this.Bars[i] == _tSplit) str += '<td class="toolbar_split" rowspan=2><span class="toolbar_separator"></span></td>';
						else str += '<td onMouseOver="toolbar_MouseOver(this);" style="border-bottom: none; vertical-align:middle" onMouseOut="toolbar_MouseOut(this);" class="toolbar_button" onClick="toolbar_onClick(' + i + ');" id=btn_toolbar_' + (i + 1) + '>' + (this.Bars[i].Img ? ('<img border=0 src="' + this.Bars[i].Img + '">') : '&nbsp;') + '</td>';
					}

					if(this.Align == _taLeft) str += '<td rowspan=2>&nbsp;</td>';
					str += '</tr>\n';	//output image

					str += '<tr>';		// output text
					for(var i = 0; i < this.Bars.length; i++)
					{
						if(this.Bars[i] == _tSplit) continue;
						str += '<td class="toolbar_button" onMouseOver="toolbar_MouseOver(this);"  style="border-top: none; vertical-align:bottom" onMouseOut="toolbar_MouseOut(this);" onClick="toolbar_onClick(' + i + ');" id=btn_toolbar_' + (i + 1) + '>' + (this.Bars[i].Caption ? this.Bars[i].Caption : '&nbsp;') + '</td>';
					}
					str += '</tr>\n';
				}
				else if(this.TextPos == _ttpRight)
				{
					str += '<tr>';

					if(this.Align == _taRight) str += '<td rowspan=2>&nbsp;</td>';

					for(var i = 0; i < this.Bars.length; i++)
					{
						if(this.Bars[i] == _tSplit) str += '<td class="toolbar_split"></td>';
						else
						{
							str += '<td onMouseOver="toolbar_MouseOver(this);" style="border-right: none" onMouseOut="toolbar_MouseOut(this);" class="toolbar_button" onClick="toolbar_onClick(' + i + ');" id=btn_toolbar_' + (i + 1) + '>' + (this.Bars[i].Img ? ('<img border=0 src="' + this.Bars[i].Img + '">') : '&nbsp;') + '</td>';
							str += '<td class="toolbar_button" onMouseOver="toolbar_MouseOver(this);"  style="border-left: none" onMouseOut="toolbar_MouseOut(this);" onClick="toolbar_onClick(' + i + ');" id=btn_toolbar_' + (i + 1) + '>' + (this.Bars[i].Caption ? this.Bars[i].Caption : '&nbsp;') + '</td>';
						}
					}

					if(this.Align == _taLeft) str += '<td rowspan=2>&nbsp;</td>';

					str += '</tr>\n';	//output image
				}
				else new Exception('Invaild text position, it can be "_ttpRight" or "_ttpBottom"');
				break;
		case _tsText:
				str += '<tr>';

				if(this.Align == _taRight) str += '<td rowspan=2>&nbsp;</td>';

				for(var i = 0; i < this.Bars.length; i++)
				{
					if(this.Bars[i] == _tSplit) str += '<td class="toolbar_split"></td>';
					else
					{
						str += '<td class="toolbar_button" onMouseOver="toolbar_MouseOver(this);" onMouseOut="toolbar_MouseOut(this);" onClick="toolbar_onClick(' + i + ');" id=btn_toolbar_' + (i + 1) + '>' + (this.Bars[i].Caption ? this.Bars[i].Caption : '&nbsp;') + '</td>';
					}
				}

					if(this.Align == _taLeft) str += '<td rowspan=2>&nbsp;</td>';
				str += '</tr>\n';	//output image
				break;
		case _tsImage:
					str += '<tr>';

					if(this.Align == _taRight) str += '<td rowspan=2>&nbsp;</td>';

					for(var i = 0; i < this.Bars.length; i++)
					{
						if(this.Bars[i] == _tSplit) str += '<td class="toolbar_split"></td>';
						else
						{
							str += '<td onMouseOver="toolbar_MouseOver(this);" onMouseOut="toolbar_MouseOut(this);" class="toolbar_button" onClick="toolbar_onClick(' + i + ');" id=btn_toolbar_' + (i + 1) + '>' + (this.Bars[i].Img ? ('<img border=0 src="' + this.Bars[i].Img + '">') : '&nbsp;') + '</td>';
						}
					}

					if(this.Align == _taLeft) str += '<td rowspan=2>&nbsp;</td>';
					str += '</tr>\n';	//output image
				break;
		default:
			new Exception('Invaild toolbar button style, it can be "_tsAll" or "_tsText" or "_tsImage"');
	}

	if(this.UseDefaultTable) str += '</table>';

	document.writeln(str);
}

function Toolbar()
{
	//private member
	this.Bars		= new Array();

	//public member
	this.BarStyle	= _tsAll;
	this.TextPos	= _ttpBottom;
	
	this.Align		= _taRight;
	
	this.UseDefaultTable = true;
	
	this.AddItem	= AddItem;
	this.GetItem	= GetItem;

	this.Draw		= Draw;

	//apply this instance to reference
	__ToolbarInstance = this;
}

function Exception(MSG)
{
	alert('錯誤: ' + MSG);
}
