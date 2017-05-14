[############################## Qury SQL ##############################]
[qury01]
select * 
from orderheader 
where 
	(1=1) 

[qury02]
select * 
from orderdetail 
where 
	(oh01=#1S) and 
	(1=1) 

[qury03]
select * 
from orderheader 
where 
	(oh01=#1S) and 
	(1=1) 

[qury04]
select * 
from datacode 
where 
	(dc03=#1S) and 
	(1=1) 

[qury05]
select pi01, 
(select property.pr01 from property where property.pr01=productinfo.pr01 and property.pr03='3') as MainLevel03, 
(select property.pr04 from property where property.pr01=productinfo.pr01 and property.pr03='3') as MainLevel03Top, 
(select property.pr04 from property where property.pr01=(select property.pr04 from property where property.pr01=productinfo.pr01 and property.pr03='3') and property.pr03='2') as MainLevel03TopTop, 
(select property.pr01 from property where property.pr01=productinfo.pr01 and property.pr03='2') as MainLevel02, 
(select property.pr04 from property where property.pr01=productinfo.pr01 and property.pr03='2') as MainLevel02Top, 
(select property.pr01 from property where property.pr01=productinfo.pr01 and property.pr03='1') as MainLevel01 
from productinfo 
where 
	(pi01=#1S) and 
	(1=1)

[qury06]
select * 
from property 
where 
	(pr01=#1S) and 
	(pr03=#2S) and 
	(pr04=#3S) and 
	(1=1)

[######################################################################]

[############################# Execute SQL ############################]
[exec02]
update orderheader set oh02=#1S, oh26=#2S, oh27=#3S, lasttime=now() 
where 
	(oh01=#4S) and 
	(1=1)

[exec03]
delete from productinfo 
where 
	(pi01=#1S) and 
	(1=1)

[exec04]
update productinfo set pi16=#1S 
where 
	(pi01=#2S) and 
	(1=1)

[exec05]
update productinfo set pi17=#1S 
where 
	(pi01=#2S) and 
	(1=1)

[exec06]
update productinfo set pi18=#1S 
where 
	(pi01=#2S) and 
	(1=1)

[exec07]
update productinfo set pi19=#1S 
where 
	(pi01=#2S) and 
	(1=1)

[exec08]
update productinfo set pi20=#1S 
where 
	(pi01=#2S) and 
	(1=1)

[exec09]
update productinfo set pi21=#1S 
where 
	(pi01=#2S) and 
	(1=1)

[exec10]
update productinfo set pi22=#1S 
where 
	(pi01=#2S) and 
	(1=1)

[exec11]
update productinfo set pi23=#1S 
where 
	(pi01=#2S) and 
	(1=1)

[exec12]
update productinfo set pi24=#1S 
where 
	(pi01=#2S) and 
	(1=1)

[exec13]
update productinfo set pi25=#1S 
where 
	(pi01=#2S) and 
	(1=1)

[######################################################################]