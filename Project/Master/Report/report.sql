--laporan penjualan perbulan yang di pilih user
--input : februari 2020
SELECT menu.nama_menu AS "Nama Menu",SUM(djual.jumlah) AS "Jumlah",SUM(djual.subtotal) AS "Total"
FROM menu
JOIN djual ON djual.id_menu = menu.id_menu
JOIN hjual ON hjual.id_hjual = djual.id_hjual
WHERE DATE_FORMAT(hjual.tanggal_transaksi,'%Y-%m') = '2020-02';

--laporan penjualan hari itu
SELECT menu.nama_menu AS "Nama Menu",SUM(djual.jumlah) AS "Jumlah",SUM(djual.subtotal) AS "Total"
FROM menu
JOIN djual ON djual.id_menu = menu.id_menu
JOIN hjual ON hjual.id_hjual = djual.id_hjual
WHERE DATE_FORMAT(hjual.tanggal_transaksi,'%Y-%m-%d') = DATE_FORMAT(SYSDATE(),'%Y-%m-%d');

--laporan penjualan rentang tertentu
--tanggal awal : 2020-02-14
-- sampai : 2020-03-18
SELECT menu.nama_menu AS "Nama Menu",SUM(djual.jumlah) AS "Jumlah",SUM(djual.subtotal) AS "Total"
FROM menu
JOIN djual ON djual.id_menu = menu.id_menu
JOIN hjual ON hjual.id_hjual = djual.id_hjual
WHERE DATE_FORMAT(hjual.tanggal_transaksi,'%Y-%m-%d') BETWEEN '2020-02-14' AND '2020-03-18';

--laporan penjualan terbanyak tiap jenis transaksi
SELECT hjual.jenis_pemesanan AS jenis,SUM(djual.jumlah) AS jumlah
FROM hjual
JOIN djual ON djual.id_hjual = hjual.id_hjual
GROUP BY hjual.id_hjual
ORDER BY SUM(djual.jumlah);

--Laporan 10 member beli terbanyak
SELECT member.Nama_depan,SUM(hjual.total)
FROM hjual
JOIN member ON member.id_member = hjual.id_member
GROUP BY member.Nama_depan
LIMIT 10;

--laporan menu terfavorit perbulan
--input : 2020-02
SELECT menu.nama_menu, COUNT(menu.id_menu)
FROM menu
JOIN djual ON djual.id_menu = menu.id_menu
JOIN hjual ON djual.id_hjual = hjual.id_hjual
WHERE DATE_FORMAT(hjual.tanggal_transaksi,'%Y-%m') = '2020-02'
GROUP BY menu.nama_menu
LIMIT 10;

--laporan menu terfavorit perhari
--input : 2020-02-14
SELECT menu.nama_menu, COUNT(menu.id_menu)
FROM menu
JOIN djual ON djual.id_menu = menu.id_menu
JOIN hjual ON djual.id_hjual = hjual.id_hjual
WHERE DATE_FORMAT(hjual.tanggal_transaksi,'%Y-%m-%d') = '2020-02-14'
GROUP BY menu.nama_menu
LIMIT 10;