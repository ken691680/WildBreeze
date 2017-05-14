[############################## Qury SQL ##############################]
[qury01]
select * 
from epaper 
where 
	(ep01=#1S) and 
	(1=1)

[qury02]
select * 
from epaperclass 
where 
	(1=1)

[qury03]
select *, 
(select epc02 from epaperclass where epaperclass.epc01=epaper.epc01) as epc02 
from epaper 
where 
	(ep02 like %#1S%) and 
	(1=1)

[qury04]
select * 
from member 
where 
	(me10=#1S) and 
	(1=1)

[qury04_old]
select * 
from member 
where 
	(me09=#1S) and 
	(1=1)

[######################################################################]

[############################# Execute SQL ############################]
[exec01]
insert into epaper (ep01, ep02, ep03, epc01, ma01, lasttime, ep04, ep05, ep06) 
values (#1S, #2S, #3S, #4S, #5S, now(), #6S, #7I, #8I)

[exec02]
update epaper set ep02=#1S, epc01=#2S, ma01=#3S, lasttime=now(), ep04=#4S, ep05=#5I, ep06=#6I 
where 
	(ep01=#7S) and 
	(1=1)

[exec03]
delete from epaper 
where 
	(ep01=#1S) and 
	(1=1)

[exec04]
update epaper set ep03=#1S 
where 
	(ep01=#2S) and 
	(1=1)

[######################################################################]