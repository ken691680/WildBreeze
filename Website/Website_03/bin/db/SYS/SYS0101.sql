[############################## Qury SQL ##############################]
[qury01]
select * 
from manage 
where 
	(ma01=#1S) and 
	(1=1)

[######################################################################]

[############################# Execute SQL ############################]
[exec01]
insert into manage (ma01, ma02, ma03, lasttime) 
values (#1S, #2S, #3S, now())

[######################################################################]