[############################## Qury SQL ##############################]
[qury01]
select * 
from epaperclass 
where 
	(epc01=#1S) and 
	(1=1)

[qury02]
select * 
from epaperclass 
where 
	(epc02=#1S) and 
	(1=1)

[qury03]
select * 
from epaperclass 
where 
	(epc02 like %#1S%) and 
	(1=1)

[qury04]
select * 
from member 
where 
	(me10=#1S) and 
	(1=1)

[######################################################################]

[############################# Execute SQL ############################]
[exec01]
insert into epaperclass (epc01, epc02, ma01, lasttime) 
values (#1S, #2S, #3S, now())

[exec02]
update epaperclass set epc02=#1S, ma01=#2S, lasttime=now() 
where 
	(epc01=#3S) and 
	(1=1)

[exec03]
delete from epaperclass 
where 
	(epc01=#1S) and 
	(1=1)

[exec04]
insert into epapersubscribe (me01, epc01, eps01, lasttime) 
values (#1S, #2S, #3S, now())

[######################################################################]