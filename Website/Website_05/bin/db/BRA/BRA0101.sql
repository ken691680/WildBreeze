[############################## Qury SQL ##############################]
[qury01]
select * 
from brands 
where 
	(br01=#1S) and 
	(1=1)

[qury03]
select * 
from brands 
where 
	(br02 like %#1S%) and 
	(1=1)

[######################################################################]

[############################# Execute SQL ############################]
[exec01]
insert into brands (br01, br02, br03, br04, lasttime) 
values (#1S, #2S, #3S, #4S, now())

[exec02]
update brands set br02=#1S, br04=#2S, lasttime=now() 
where 
	(br01=#3S) and 
	(1=1)

[exec03]
delete from brands 
where 
	(br01=#1S) and 
	(1=1)

[exec04]
insert into brandsclass (nc01, nc02, ma01, lasttime) 
values (#1S, #2S, #3S, now())

[exec05]
update brands set br03=#1S 
where 
	(br01=#2S) and 
	(1=1)

[exec06]
update brands set ne05=#1S 
where 
	(br01=#2S) and 
	(1=1)

[exec07]
update brands set ne06=#1S 
where 
	(br01=#2S) and 
	(1=1)

[######################################################################]