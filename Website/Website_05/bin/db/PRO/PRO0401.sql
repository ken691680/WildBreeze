[############################## Qury SQL ##############################]
[qury01]
select *, 
(select property.pr02 from property where property.pr01=productinfo.pr01) as pr02, 
(select property.pr03 from property where property.pr01=productinfo.pr01) as pr03, 
(select property.pr04 from property where property.pr01=productinfo.pr01) as pr04 
from productinfo 
where 
	(1=1) 

[qury02]
select * 
from property 
where 
	(pr01=#1S) and 
	(1=1) 

[qury03]
select * 
from productinfo 
where 
	(pi01=#1S) and 
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
update productinfo set pi02=#1S, pi03=#2I, pi04=#3I, pi05=#4S, pi06=#5S, pi07=#6S, pi08=#7D, pi09=#8D, pi10=#9S, pi11=#10S, pi12=#11S, pi13=#12S, pi14=#13S, pi15=#14S, pi26=#15I, pi27=#16I, pi28=#17S, pr01=#18S, ma01=#19S, lasttime=now() 
where 
	(pi01=#20S) and 
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