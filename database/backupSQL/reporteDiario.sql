CREATE DEFINER=`grupoc25_adminworkbench`@`157.100.91.240` PROCEDURE `reporteDiario`()
BEGIN
SELECT 
		   uuid() id , tabla.*    from (
        SELECT 
		 sum(d.cantidad) incidencia
        , p.nombre  as detalle
        ,concat('Fac. p. ' , upper(d.precio_tipo))   as precio_tipo 
        ,sum(d.subtotal) as valor
        FROM grupoc25_facturacion.facturas f 
                            inner join detalles d on d.factura_id = f.id
                            inner join productos p on p.id = d.producto_id
                            where  CAST(f.fecha as date) >=  CAST(curdate() as date)
                            group by  d.producto_id , d.precio_tipo  
       union all                     
       select 1 as incidencia, c.detalle,  'ABONO CREDITO' as precio_tipo , sum(dc.abono) as valor from creditos c 
       INNER JOIN detalle_creditos dc on c.id = dc.credito_id
       WHERE  CAST(dc.fecha as date) >=  CAST(curdate() as date)
       group by c.detalle
       
       union all
        select  1 incidencia,  concat( 'Orden N° ' , ao.id) , 'Abonos', sum(ao.abono) as valor  from abono_ordenes ao
 inner join ordenes o on o.id = ao.orden_id
 where  CAST(ao.fecha as date) >=  CAST(curdate() as date)
 and o.estado =1
 group by ao.orden_id        
 
       ) as tabla ;
END