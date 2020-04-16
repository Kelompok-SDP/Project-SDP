
select tab.a,rpad(decode(tab.jum, maxx.ma, '*'),4,' ') as "MOST", rpad(decode(tab.jum, minn.mi, '*'),5,' ') as "LEAST"
from 
(
    select  f.namafasilitas a,sum(u.jumlah) jum
    from fasilitas f, usefas u
    where f.kodefasilitas = u.kodefasilitas
    group by f.namafasilitas
) tab 
left join 
(
    select f.namafasilitas a,sum(u.jumlah) ma
    from fasilitas f, usefas u
    where f.kodefasilitas = u.kodefasilitas
    having sum(u.jumlah)=(
        select max(sum(u.jumlah))
        from fasilitas f, usefas u
        where f.kodefasilitas = u.kodefasilitas
        group by f.namafasilitas
        )
    group by f.namafasilitas
) maxx
on tab.a =maxx.a 
left join
(
    select f.namafasilitas a,sum(u.jumlah) mi
    from fasilitas f, usefas u
    where f.kodefasilitas = u.kodefasilitas
    having sum(u.jumlah)=(
        select min(sum(u.jumlah))
        from fasilitas f, usefas u
        where f.kodefasilitas = u.kodefasilitas
        group by f.namafasilitas
    )
    group by f.namafasilitas
)minn
on tab.a =minn.a ;