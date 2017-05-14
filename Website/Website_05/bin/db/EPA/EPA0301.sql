[############################## Qury SQL ##############################]
[qury01]
select * 
from epaperimportlist 
where 
	(eil01=#1S) and 
	(1=1)

[qury02]
select * 
from epaperimportlistclass 
where 
	(1=1)

[qury03]
select * 
from epaperimportlist 
where 
	(eil02 like %#1S%) and 
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
insert into epaperimportlist (eil01, eil02, eil03, eil04, eil05, eil06, eil07, ma01, lasttime) 
values (#1S, #2S, #3S, #4S, #5S, #6I, #7I, #8S, now())

[exec02]
update epaperimportlist set eil02=#1S, epc01=#2S, ma01=#3S, lasttime=now() 
where 
	(eil01=#4S) and 
	(1=1)

[exec03]
delete from epaperimportlist 
where 
	(eil01=#1S) and 
	(1=1)

[exec04]
update epaperimportlist set eil03=#1S 
where 
	(eil01=#2S) and 
	(1=1)

[######################################################################]